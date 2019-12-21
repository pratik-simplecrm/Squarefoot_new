
<script type='text/javascript'> 
    
 
var LBL_LOGIN_SUBMIT = '{sugar_translate module="Users" label="LBL_LOGIN_SUBMIT"}';
var LBL_REQUEST_SUBMIT = '{sugar_translate module="Users" label="LBL_REQUEST_SUBMIT"}';
var LBL_SHOWOPTIONS = '{sugar_translate module="Users" label="LBL_SHOWOPTIONS"}';
var LBL_HIDEOPTIONS = '{sugar_translate module="Users" label="LBL_HIDEOPTIONS"}';
</script>

<div class="col-md-4"></div>
<div class="col-md-4 form">
    <div id="logo-div">
          <img id="logo" align="center" src='custom/themes/default/images/company_logo.png'/>
       
        </div>
    <form role="form" action="index.php" method="post" autocomplete="off" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
        <div id='error' style="text-align:center;padding-bottom: 10px;">
        <span class="error" id="browser_warning" style="display:none">
            {sugar_translate label="WARN_BROWSER_VERSION_WARNING"}
        </span>
		<span class="error" id="ie_compatibility_mode_warning" style="display:none">
		{sugar_translate label="WARN_BROWSER_IE_COMPATIBILITY_MODE_WARNING"}
		</span>
        <input type="hidden" name="module" value="Users">
        <input type="hidden" name="action" value="Authenticate">
        <input type="hidden" name="return_module" value="Users">
        <input type="hidden" name="return_action" value="Login">
        <input type="hidden" id="cant_login" name="cant_login" value="">
        {foreach from=$LOGIN_VARS key=key item=var}
            <input type="hidden" name="{$key}" value="{$var}">
        {/foreach}
        {if !empty($SELECT_LANGUAGE)}
                {sugar_translate module="Users" label="LBL_LANGUAGE"}:
                <select name='login_language' onchange="switchLanguage(this.value)">{$SELECT_LANGUAGE}</select>
        {/if}
        {if $LOGIN_ERROR !=''}
            <span class="error">{$LOGIN_ERROR}</span>
            {if $WAITING_ERROR !=''}
                <span class="error">{$WAITING_ERROR}</span>
            {/if}
        {else}
            <span id='post_error' class="error"></span>
        {/if}
        <!-- <div style="font-size: 14px;font-weight: 600;">Admin Login</div> -->
      </div>
  <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="fa fa-lg fa-user prefix"></i></span>
              <input type="text" class="" required  tabindex="1" id="user_name" name="user_name"  value='{$LOGIN_USER_NAME}' placeholder="{sugar_translate module="Users" label="LBL_USER_NAME"}"/>
  </div>
   <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="fa fa-lg fa-lock prefix"></i></span>
              <input type="password" class="" tabindex="2" id="user_password" name="user_password" placeholder="{sugar_translate module="Users" label="LBL_PASSWORD"}" value='{$LOGIN_PASSWORD}' />
   </div>
      
      
      <input class="btn btn-primary" type="submit" title="Connect" tabindex="3" name="Login" value="LOGIN" label="LOGIN">
      
      <div class="message" id="forgotpasslink" style="cursor: pointer;display:{$DISPLAY_FORGOT_PASSWORD_FEATURE}; ">
            {sugar_translate module="Users" label="LBL_LOGIN_FORGOT_PASSWORD"} <a href='javascript:void(0)'>Click here</a>
        </div>
    </form>
    <form class="form-signin passform" role="form" action="index.php" method="post" name="DetailView" id="form" name="fp_form" id="fp_form" style="display:none">
        
      <div id="forgot_password_dialog"  >
                
                <input type="hidden" name="entryPoint" value="GeneratePassword">
                <div id="generate_success" class='error' style="padding-bottom: 10px;"></div>
              
                <!-- <div class="input-group"> -->
                  <div style="margin-bottom: 25px" class="input-group">

                <span class="input-group-addon"><i class="fa fa-lg fa-user prefix"></i></span>
                    <!-- <span class="input-group-addon logininput glyphicon glyphicon-user"></span> -->
                    <input type="text"  id="fp_user_name" name="fp_user_name"  value='{$LOGIN_USER_NAME}' placeholder="{sugar_translate module="Users" label="LBL_USER_NAME"}"/>
{*                    <label id="fpuser_user_namelbl" for="fp_user_name" class="mdblabels">{sugar_translate module="Users" label="LBL_USER_NAME"}</label>*}
                  </div> 
              
                <!-- <div class="input-group"> -->
                  <div style="margin-bottom: 25px" class="input-group">

                <span class="input-group-addon"><i class="fa fa-lg fa-envelope prefix"></i></span>
                    <!-- <span class="input-group-addon logininput glyphicon glyphicon-envelope"></span> -->
                    <input type="text" id="fp_user_mail" name="fp_user_mail" value ='' placeholder="{sugar_translate module="Users" label="LBL_EMAIL"}">
                  </div>
{*                    <label id="fp_user_maillbl" for="fp_user_mail" class="mdblabels">{sugar_translate module="Users" label="LBL_EMAIL"}</label>*}
{$CAPTCHA}
<div id='wait_pwd_generation'></div>

<input title="Email Temp Password" class=" btn btn-primary" type="button" onclick="validateAndSubmit(); return document.getElementById('cant_login').value == ''" id="generate_pwd_button" name="fp_login" value="RESET PASSWORD">

<div class="message" id="loginlink" style="cursor: pointer; ">
            <a href='javascript:void(0)'>Login Here</a>
        </div>
                
    </form>
  </div>
