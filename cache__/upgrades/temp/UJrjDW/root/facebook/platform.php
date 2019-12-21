<?php

/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

  /*
  * Facebook integration file,to link FB page with FB app.
  * Date    : Mar-17-2017
  * Author  : Nitheesh.R <nitheesh@simplecrm.com.sg> 
  * Facebook api version : 2.8
  * PHP version : 5.6
  */

include '../config.php';
include '../config_override.php';
$facebook_campaign_app_id  = $sugar_config['facebook_campaign_app_id'];
?>

<h2>My Platform</h2>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo $facebook_campaign_app_id; ?>',
      xfbml      : true,
      version    : 'v2.8'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function subscribeApp(page_id, page_name, page_access_token) {
    console.log('Subscribing page to app! ' + page_id);
    FB.api(
      '/' + page_id + '/subscribed_apps',
      'post',
      {access_token: page_access_token},
      function(response) {
      console.log('Successfully subscribed page', response);
      alert('Successfully subscribed page : '+page_name);
    });
  }

  // Only works after `FB.init` is called
  function myFacebookLogin() {
    FB.login(function(response){
      console.log('Successfully logged in', response);
      FB.api('/me/accounts', function(response) {
        console.log('Successfully retrieved pages', response);
        var pages = response.data;
        var ul = document.getElementById('list');
        for (var i = 0, len = pages.length; i < len; i++) {
          var page = pages[i];
          var li = document.createElement('li');
          var a = document.createElement('a');
          a.href = "#";
          a.onclick = subscribeApp.bind(this, page.id, page.name, page.access_token);
          a.innerHTML = page.name;
          li.appendChild(a);
          ul.appendChild(li);
        }
        document.getElementById("myFacebookLoginButton").style.visibility = "hidden";
      });
    }, {scope: 'manage_pages'});
  }
</script>
<button onclick="myFacebookLogin()" id="myFacebookLoginButton" >Login with Facebook</button>
<ul id="list"></ul>