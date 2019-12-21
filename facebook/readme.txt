=== Facebook Listener Plugin ===
Contributors: Vivek Gaidhane <vivek@simplecrm.com.sg>

== Description ==

Facebook listener plugin makes integration between Facebook and CRM.
Creates Leads/ Cases in CRM based on Facebook page posts.

We need the following things for Facebook Integration and lead/ case creation.

	1. Facebook Page
	2. Facebook Developer App
	5. Webserver with PHP (PHP version > 5.4)

== Installation ==

	1. Download the plugin from https://www.sugaroutfitters.com.

	2. Go to admin page of CRM and upload the zip package through module loader.
	   This step may takes some time, please wait for the completion of the step.

	3. After the successful installation in step 2, give proper permission for the crm application folder 
	   if you are using Linux operating system.Open the terminal and give the permission for
	   the crm application folder.
	   
	4. After step 3, copy the following url <CRM_SITE_URL>/createvalues.php
	   replace <CRM_SITE_URL> with the CRM instance url.

	   For example, if CRM_SITE_URL is https://crm.example.com, 
	   run like this : https://crm.example.com/createvalues.php in browser.

	5. After step 4, go the admin page and do a quick repair and rebuild.
	   In this step CRM may ask you to do the changes in the database, allow/ execute it.
	   This step may takes some time, please wait for the completion of the step.


    The following files/ folders will move to CRM after installing the facebook plugin 
   
	1. ../custom/include/css
	2. ../custom/Extension/modules/Administration/Ext/Language
	3. ../custom/Extension/modules/Administration/Ext/Administration
	4. ../custom/Extension/modules/Cases/Ext/Language
	5. ../custom/Extension/modules/Leads/Ext/Language
	6. ../custom/Extension/modules/Notes/Ext/Language
	7. ../custom/modules/Administration
	8. ../custom/include/facebook
	9. ../themes/SuiteR/images
	10. ../themes/SuiteP/images
	11. ../themes/Suite7/images
	12. ../themes/default/images
	13. ../facebook
	14. ../createvalues.php
	15. ../fb.php


    Please make sure proper permissions to the newly added files and folders 
    Recommended file permission is 775.

== Facebook Configuration ==

After the installation, there will be a Facebook configuration link in the admin page of the CRM.

Go to the admin page and click on the Facebook Configuration link and fill and save the required fields.

	1. Facebook Page ID     - ID of Facebook page
	2. Facebook Page Name   - Name of Facebook page
	3. App ID               - App ID of the Facebook App which is created from developers.facebook.com
	4. Secret ID            - App secret ID of the Facebook App which is created from developers.facebook.com
	4. Page Access Token    - Page Access Token of the Facebook App which is created from developers.facebook.com Graph API Explorer
    5. Leads Keywords       - Keywords for Leads creation from Facebook page post.
    6. Cases Keywords       - Keywords for Case creation from Facebook page post.

== CRM Scheduler for Facebook Listener ==

Add a CRM Scheduler for Facebook Listener.

Note : 
 
1. In order to run CRM Schedulers, please make sure that you have added cron job for your CRM
   in your web server user's crontab file.

2. Select Job value as URL in CRM Scheduler. 

3. Give Job URL as site_url/fb.php

   site_url - your crm site_url (http://demo.example.com/crm)
   For example http://demo.example.com/crm/fb.php

4. Scheduler interval you can give from 1 min to higher values.I am giving as 10 min.
   You may can change scheduler properties like interval from ‘Advanced Option’ of CRM Scheduler.
   It is better to give higher value to scheduler interval, to avoid number of api calls 
   to Facebook from CRM system.Also there is graph API call limit per page per month in Facebook API.
         

== Facebook check valid access token == 

To integrate CRM with Facebook, we need Facebook page valid access token.

1.  Run the facebook  access token test script in a browser,
    Enter site_url/facebook/test.php​ in browser

    site_url - your crm site_url (http://demo.example.com/crm)
    For example http://demo.example.com/crm/facebook/test.php​

    Note : Page Access Token of the Facebook App which is created from developers.facebook.com Graph API Explorer.

