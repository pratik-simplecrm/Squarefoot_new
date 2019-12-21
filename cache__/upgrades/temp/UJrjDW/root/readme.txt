=== Facebook Campaign Connector Plugin ===
Contributors: Nitheesh.R <nitheesh@simplecrm.com.sg>

== Description ==

SugarCRM Facebook Campaign Connector plugin is for capturing leads from your Facebook campaigns.
When ever the Facebook user submit Facebook campaign lead form, a real time triggering happens to CRM and lead creates in the CRM along with Facebook campaign details such as campaign name, campaign id etc., which can then trigger a workflow for lead assignment or notification. This plugin works with SugarCE, SuiteCRM and Commercial Editions of SugarCRM. [You need at least temporary admin access to the Facebook page/ campaigns that you want to connect to your CRM].

Lead Creation :
a. Facebook user click on the Facebook campaign link.
b. Facebook campaign lead form opens.
c. Facebook user submit the information in Facebook campaign lead form.
d. When ever the Facebook user submit Facebook lead form, lead creates the in CRM along with 
   Facebook campaign details such as campaign name, campaign id etc.


We need the following things for Facebook Integration and lead/ case creation.

	1. Facebook Page
	2. Facebook Developer App
	3. Webserver with PHP (PHP version > 5.4)
	4. CRM should be in Secured server(https://), since Facebook allow campaign integration only with 
	   secured server systems.

== Installation ==

	1. Download the plugin from https://www.sugaroutfitters.com.

	2. Go to admin page of CRM and upload the zip package through module loader.
	   This step may takes some time, please wait for the completion of the step.

	3. After the successful installation in step 2, give proper permission for the crm application folder 
	   if you are using Linux operating system.Open the terminal and give the permission for
	   the crm application folder.
	   
	4. After step 3, copy the following url <CRM_SITE_URL>/fbconfiguration.php
	   replace <CRM_SITE_URL> with the CRM instance url.

	   For example, if CRM_SITE_URL is https://crm.example.com, 
	   run like this : https://crm.example.com/fbconfiguration.php in browser.

	5. After step 4, go the admin page and do a quick repair and rebuild.
	   In this step CRM may ask you to do the changes in the database, allow/ execute it.
	   This step may takes some time, please wait for the completion of the step.


    The following files/ folders will move to CRM after installing the facebook plugin 
   
	1. ../custom/include/css
	2. ../custom/Extension/modules/Administration/Ext/Language
	3. ../custom/Extension/modules/Administration/Ext/Administration
	4. ../custom/Extension/modules/Leads/Ext/Language
	5. ../custom/modules/Administration
	6. ../custom/include/facebook
	7. ../themes/SuiteR/images
	8. ../themes/SuiteP/images
	9. ../themes/Suite7/images
	10. ../themes/default/images
	11. ../facebook
	12. ../fbcampaignauthentication.php
	13. ../fbconfiguration.php
	14. ../fbleadcreation.php
	15. ../webhook.php


    Please make sure proper permissions to the newly added files and folders 
    Recommended file permission is 775.

== Facebook Configuration ==

After the installation, there will be a Facebook configuration link in the admin page of the CRM.

Go to the admin page and click on the Facebook Configuration link and fill and save the required fields.


    1. Facebook Page ID                 - ID of Facebook page

    2. Facebook Page Name               - Name of Facebook page

    3. App ID                           - App ID of the Facebook App which is created
                                          from developers.facebook.com

    4. Secret ID                        - App secret ID of the Facebook App which is created
                                          from developers.facebook.com

    5. Concerned person's email         - Concerned person's email address for future communication with
                                          support team/ sending any alerts regarding the integration.

    6. Facebook webhook secret code     - Secret code which is given while adding web hook service 
                                          for Facebook campaign integration in developers.facebook.com


== Facebook authentication and access token generation == 

To integrate CRM with Facebook, we need to authenticate CRM app with Facebook and generate a valid access token.

1.  Run the facebook authentication script in a browser,
    Enter site_url/fbcampaignauthentication.php​ in browser

    site_url - your crm site_url (http://demo.example.com/crm)
    For example http://demo.example.com/crm/fbcampaignauthentication.php

    Note : This authentication url(site_url/fbcampaignauthentication.php) and
    Valid OAuth redirect URIs in ‘Valid OAuth redirect URI(s)’ section of
    Facebook app should be same.

2.  Authenticate Facebook app and allow permissions to get access token.

3.  After successful authentication user will get response like this ‘Connected successfully and 
    saved  Access Token data’ in browser.
