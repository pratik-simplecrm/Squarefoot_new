<?php

/** 
  * Manifest File for SimpleCRM Facebook Campaign Connector plugin.
  * Date    : Dec-02-2017
*/

$manifest = array (
  0 => 
  array (

    'acceptable_sugar_versions' => 
    array (
      0 => '6.*.*',
    ),

  ),
  1 => 
  array (
    'acceptable_sugar_flavors' => 
    array (
      0 => 'CE',
    ),
  ),
  'readme' => 'SimpleCRM Facebook Campaign Connector Plugin',
  'key' => 'SimpleCRMFacebookCampaign',
  'author' => 'SimpleCRM',
  'description' => 'SimpleCRM Facebook Campaign Connector Plugin',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'SimpleCRM_Facebook_Campaign_Connector_License_Addon',
  'published_date' => '2017-20-02 10:10:00',
  'type' => 'module',
  'version' => 1,
  // 'remove_tables' => 'prompt',
  'remove_tables' => false,
);


$installdefs = array (
  'id' => 'SimpleCRM_Facebook_Campaign_Connector_License_Addon',
  'copy' => 
  array (

    0 => 
    array (
      'from' => '<basepath>/root/custom/include/css',
      'to' => 'custom/include/css',
    ),

	  1 => 
    array (
      'from' => '<basepath>/root/custom/Extension/modules',
      'to' => 'custom/Extension/modules',
    ),

	  2 => 
    array (
      'from' => '<basepath>/root/custom/modules/Administration',
      'to' => 'custom/modules/Administration',
    ),

    3 => 
    array (
      'from' => '<basepath>/root/themes',
      'to' => 'themes',
    ),

    4 => 
    array (
      'from' => '<basepath>/root/custom/include/facebook',
      'to' => 'custom/include/facebook',
    ),

    5 => 
    array (
      'from' => '<basepath>/root/facebook',
      'to' => 'facebook',
    ),

    6 => 
    array (
      'from' => '<basepath>/root/webhook.php',
      'to' => 'webhook.php',
    ),

    7 => 
    array (
      'from' => '<basepath>/root/fbcampaignauthentication.php',
      'to' => 'fbcampaignauthentication.php',
    ),

    8 => 
    array (
      'from' => '<basepath>/root/fbleadcreation.php',
      'to' => 'fbleadcreation.php',
    ),

    9 => 
    array (
      'from' => '<basepath>/root/fbconfiguration.php',
      'to' => 'fbconfiguration.php',
    ),

  ),

);

