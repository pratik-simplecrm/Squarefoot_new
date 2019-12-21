<?php
namespace Reports\PDF;

/**
 * This class contains basic manipulations for PDF document
 * 
 * @access public
 * @author Richlode Solutions
 * @package classes.Reports.PDF
 */
abstract class Basic implements Content
{
    /**
     * The storage for TCPDF instance
     */
    protected $tcpdfInstance = null;
    
    /**
     * The name of PDF file which could be saved or downloaded
     */
    private $nameOfPdf = null;

    /**
     * Path for save data.
     */
    public $pathToSave = 'cache/upload/';

    /**
     * Type images into pdf.
     */
    public $typeImage = '.png';

    /**
     * This method will init the TCPDF class which built-in into Sugar.
     * 
     * Stores the instance of TCPDF in self
     * @access public
     * @return TCPDF
     * @ReturnType TCPDF
     */
    public function loadTcpdf() 
    {
        require_once('include/tcpdf/tcpdf.php');
        
        $this->tcpdfInstance = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        return $this->tcpdfInstance;
    }

    /**
     * Return the path to PNG Image of Chart
     * 
     * @return string
     */
    public final function getChartImageFilename() {
        require_once('include/SugarCharts/SugarChartFactory.php');
        $sugar_сhart = \SugarChartFactory::getInstance();
        if (!$sugar_сhart->supports_image_export) {
            throw new \Exception('The Image building is curently not supported by SugarChart', 25);
        }
        return $sugar_сhart->get_image_cache_file_name($sugar_сhart->getXMLFileName(\Reports\Settings\Storage::getFocus()->id));
    }
    

    /**
     * Return the HTML of Spreadsheet of Report.
     * 
     * Here we use the Reports\Grid class.
     * @access public
     * @return string
     * @ReturnType string
     */
    public function getSpreadsheetHtml() 
    {
        \Reports\Settings\Storage::load();
        $settings = \Reports\Settings\Storage::getSettings();
        $spreadsheet = \Reports\Grid\Factory::loadGrid($settings['grid']['type']);

        return $spreadsheet->display();
    }

    /**
     * Output the PDF document into Client (Browser)
     * @access public
     * @return string
     * @ReturnType string
     */
    public function outputPdf() 
    {
        $result = $this->tcpdfInstance->Output(
            $this->getNameOfPdf(), 
            'I'
        );
        
        return $result;
    }

    /**
     * Saves the PDF document to disk.
     * @access public
     * @param path The path for PDF file
     * @return boolean
     * @ParamType path 
     * The path for PDF file
     * @ReturnType boolean
     */
    public function savePdfToDisk($path) 
    {
        $result = $this->tcpdfInstance->Output(
            $path. '/' .$this->getNameOfPdf(), 
            'F'
        );
        
        return $result;
    }

    /**
     * @access public
     * @param tcpdfInstance
     * @ParamType tcpdfInstance 
     */
    public function setTcpdfInstance($tcpdfInstance) 
    {
        $this->tcpdfInstance = $tcpdfInstance;
    }

    /**
     * @access public
     */
    public function getTcpdfInstance() 
    {
        return $this->tcpdfInstance;
    }

    /**
     * @access public
     * @param nameOfPdf
     * @ParamType nameOfPdf 
     */
    public function setNameOfPdf($nameOfPdf) 
    {
        $this->nameOfPdf = $nameOfPdf;
    }

    /**
     * @access public
     */
    public function getNameOfPdf() 
    {
        return $this->nameOfPdf;
    }
}

