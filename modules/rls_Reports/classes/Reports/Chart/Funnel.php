<?php
namespace Reports\Chart;

/**
 * The class to represent Funnel type of charts
 * 
 * @access public
 * @author Richlode Solutions
 * @package Chart
 */
class Funnel extends Basic 
{
    /**
     * Returns an array for setting Dataset into SugarCharts Engine
     * 
     * @return array
     */
    protected function buildDataset()
    {
        $store     = new \Reports\Data\Collection();
        $settings  = \Reports\Settings\Storage::getSettings();
        $grouping  = \Reports\Data\Grouping::load();
        $summaries = \Reports\Data\Summarizing::load();
        $drilldown = \Reports\Chart\Drilldown::getInstance();
        $criterion = \Reports\Data\Criterion::getInstance()
            ->setSettings($settings)
            ->buildCriteria();        
        
        if (!$categroies_group = $criterion->getCategoriesByGrouping($grouping)) {
            return $this;
        }        
        
        $groupBy = $this->getGroupBy();
        foreach ($categroies_group as $category_info) {
            $collection = $store->getRows(
                $criterion                    
                    ->setAdditionalWhere($category_info['additionalWhere'])
                    ->setAdditionalGrouping(array(0))
                    ->applySummaries()
            );
            
            foreach ($collection as $row){
                $summary_field = 
                    $summaries->getQueriedName(
                        $settings['chart']['datastore']['summariesIndex']
                    );
                if (!$row[$summary_field]) continue;

                $concatenated  = $grouping->getQueriedName(0);
                $drilldown->addUrlGroupingData(
                    '&' . $groupBy[0] . '=' . urlencode($row[$concatenated]),
                    $row
                );

                $this->dataset[] = array(
                    'total' => $row[$summary_field],
                    $groupBy[0] => $this->setSectionTitle($row),
                    'key' => $row[$grouping->getQueriedName(0)],

                );
            }
        }
        
        return $grouping->sortChartDataset($this);
    }
    
    /**
     * Generates full code for chart
     * 
     * @return string
     * */
    public function display()
    {
        global $current_user, $mod_strings;
        require_once('include/SugarCharts/SugarChartFactory.php');
                 
        $focus = \Reports\Settings\Storage::getFocus();
        $settings = \Reports\Settings\Storage::getSettings();
        $drilldown = \Reports\Chart\Drilldown::getInstance();
        $drilldown->setNumberGroupLevels(count($this->getGroupBy()));
        $guid  = $focus->id;
        
        $sugarChart = \SugarChartFactory::getInstance();
        $sugarChart->base_url   = $this->getBaseUrl();
        $sugarChart->url_params = $this->getUrlParams();
        $sugarChart->group_by   = $this->getGroupBy();
        
        //FIXME: JS error appears when it uncommented
        //$sugarChart->setColors($settings['chart']['colors']);
        
        $sugarChart->setData(
            $this
              ->buildDataset()
              ->getDataset()
        );
        $this->getDataFormatCurrency();
        (!empty($_SESSION['name_summaried_field'])) ? $format_mytotal = currency_format_number($sugarChart->getTotal()) : $format_mytotal = $sugarChart->getTotal();
        $sugarChart->setProperties($mod_strings['LBL_TOTAL'] . ': ' . $format_mytotal, $focus->name, 'funnel chart 3D');
        $xmlFile = $sugarChart->getXMLFileName($guid);
        
        $xmlContent = $sugarChart->generateXML();
        $xmlContent = $drilldown->replaceSearchUrl($xmlContent);
        $xmlContent = $drilldown->removeDrilldownLinks($xmlContent);
        
        $sugarChart->saveXMLFile($xmlFile, $xmlContent);
        return $sugarChart->display($guid, $xmlFile, '100%', '480', false); 
    }
}
