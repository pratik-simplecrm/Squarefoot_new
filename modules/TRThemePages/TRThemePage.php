<?php

require_once('data/SugarBean.php');
require_once('include/utils.php');

// ProductTemplate is used to store customer information.
class TRThemePage extends SugarBean {

    var $new_schema = true;
    var $module_dir = 'TRThemePages';
    var $object_name = 'TRThemePage';
    var $table_name = 'trthemepages';
    var $importable = false;

    function TRThemePage() {
        parent::SugarBean();
    }

    function get_summary_text() {
        return $this->name;
    }

    function bean_implements($interface) {
        switch ($interface) {
            case 'ACL':return true;
        }
        return false;
    }

    public static function mergePages(&$pages, &$dashlets = null, $activePage = 0) {
        global $current_user;
        $dashletsChanged = false;

        $loadedUsers = array();
        // $themePage = BeanFactory::getBean('TRThemePages');
        $refPages = $current_user->get_linked_beans('trthemepages_link', 'TRThemePage');

        $prePages = array();
        $postPages = array();

        // sort pages based on pre flag and priority into a temp array
        foreach ($refPages as $thisPage) {
            if ($thisPage->page_priority == '')
                $thisPage->page_priority = 999;
            if ($thisPage->page_position_first == 1)
                $prePages[$thisPage->page_priority][] = $thisPage;
            else
                $postPages[$thisPage->page_priority][] = $thisPage;
        }

        // sort the array accoridng to key == priority
        ksort($prePages);
        ksort($postPages);

        // process the prepages
        $prePageArray = array();
        foreach ($prePages as $thisPagesPriority => $thisPages) {
            foreach ($thisPages as $thisPage) {
                if (empty($loadedUsers[$thisPage->puser_id])) {
                    $loadedUsers[$thisPage->puser_id] = BeanFactory::getBean('Users');
                    $loadedUsers[$thisPage->puser_id]->retrieve($thisPage->puser_id);
                    $loadedUsers[$thisPage->puser_id]->pages = $loadedUsers[$thisPage->puser_id]->getPreference('pages', 'Home');
                    $loadedUsers[$thisPage->puser_id]->dashlets = $loadedUsers[$thisPage->puser_id]->getPreference('dashlets', 'Home');
                };
                
                if (isset($loadedUsers[$thisPage->puser_id]->pages[$thisPage->page_index])) {
                    $thisRefPage = $loadedUsers[$thisPage->puser_id]->pages[$thisPage->page_index];
                    $thisRefPage['isReference'] = true;

                    if ($dashlets != null) {
                        foreach ($thisRefPage['columns'] as $thisColumnIndex => $thisColumn) {
                            foreach ($thisColumn['dashlets'] as $thisDashletIndex => $thisDashlet) {
                                if (empty($dashlets[$thisDashlet]) && !empty($loadedUsers[$thisPage->puser_id]->dashlets[$thisDashlet])) {
                                    $dashlets[$thisDashlet] = $loadedUsers[$thisPage->puser_id]->dashlets[$thisDashlet];
                                    $dashletsChanged = true;
                                } elseif (empty($loadedUsers[$thisPage->puser_id]->dashlets[$thisDashlet])) {
                                    // the dashlet has been deleted from the page ... also delete it from the users record
                                    unset($thisRefPage['columns'][$thisColumnIndex]['dashlets'][$thisDashletIndex]);
                                    unset($dashlets[$thisDashlet]);
                                    $dashletsChanged = true;
                                }
                            }
                        }
                    }
                }
                $prePageArray[] = $thisRefPage;
            }
        }
        $pages = array_merge($prePageArray, $pages);

        // process the post pages
        foreach ($postPages as $thisPagesPriority => $thisPages) {
            foreach ($thisPages as $thisPage) {
                if (empty($loadedUsers[$thisPage->puser_id])) {
                    $loadedUsers[$thisPage->puser_id] = BeanFactory::getBean('Users');
                    $loadedUsers[$thisPage->puser_id]->retrieve($thisPage->puser_id);
                    $loadedUsers[$thisPage->puser_id]->pages = $loadedUsers[$thisPage->puser_id]->getPreference('pages', 'Home');
                    $loadedUsers[$thisPage->puser_id]->dashlets = $loadedUsers[$thisPage->puser_id]->getPreference('dashlets', 'Home');
                };

                if (isset($loadedUsers[$thisPage->puser_id]->pages[$thisPage->page_index])) {
                    $thisRefPage = $loadedUsers[$thisPage->puser_id]->pages[$thisPage->page_index];
                    $thisRefPage['isReference'] = true;

                    if ($dashlets != null) {
                        foreach ($thisRefPage['columns'] as $thisColumnIndex => $thisColumn) {
                            foreach ($thisColumn['dashlets'] as $thisDashletIndex => $thisDashlet) {
                                if (empty($dashlets[$thisDashlet]) && !empty($loadedUsers[$thisPage->puser_id]->dashlets[$thisDashlet])) {
                                    $dashlets[$thisDashlet] = $loadedUsers[$thisPage->puser_id]->dashlets[$thisDashlet];
                                    $dashletsChanged = true;
                                } elseif (empty($loadedUsers[$thisPage->puser_id]->dashlets[$thisDashlet])) {
                                    // the dashlet has been deleted from the page ... also delete it from the users record
                                    unset($thisRefPage['columns'][$thisColumnIndex]['dashlets'][$thisDashletIndex]);
                                    unset($dashlets[$thisDashlet]);
                                    $dashletsChanged = true;
                                }
                            }
                        }
                    }
                }

                $pages[] = $thisRefPage;
            }
        }

        // write back Dashlet Information
        if ($dashlets != null && $dashletsChanged)
            $current_user->setPreference('dashlets', $dashlets, 0, 'Home');
    }

}

?>
