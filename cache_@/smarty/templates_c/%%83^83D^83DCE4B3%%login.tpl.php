<?php /* Smarty version 2.6.29, created on 2019-12-09 09:54:08
         compiled from themes/SuiteR/tpls/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'themes/SuiteR/tpls/login.tpl', 5, false),)), $this); ?>

<script type='text/javascript'> 
    
 
var LBL_LOGIN_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_SUBMIT'), $this);?>
';
var LBL_REQUEST_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_REQUEST_SUBMIT'), $this);?>
';
var LBL_SHOWOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_SHOWOPTIONS'), $this);?>
';
var LBL_HIDEOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_HIDEOPTIONS'), $this);?>
';
</script>

<div class="col-md-4"></div>
<div class="col-md-4 form">
    <div id="logo-div">
          <img id="logo" align="center" src='custom/themes/default/images/company_logo.png'/>
       
        </div>
    <form role="form" action="index.php" method="post" autocomplete="off" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
        <div id='error' style="text-align:center;padding-bottom: 10px;">
        <span class="error" id="browser_warning" style="display:none">
            <?php echo smarty_function_sugar_translate(array('label' => 'WARN_BROWSER_VERSION_WARNING'), $this);?>

        </span>
		<span class="error" id="ie_compatibility_mode_warning" style="display:none">
		<?php echo smarty_function_sugar_translate(array('label' => 'WARN_BROWSER_IE_COMPATIBILITY_MODE_WARNING'), $this);?>

		</span>
        <input type="hidden" name="module" value="Users">
        <input type="hidden" name="action" value="Authenticate">
        <input type="hidden" name="return_module" value="Users">
        <input type="hidden" name="return_action" value="Login">
        <input type="hidden" id="cant_login" name="cant_login" value="">
        <?php $_from = $this->_tpl_vars['LOGIN_VARS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['var']):
?>
            <input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['var']; ?>
">
        <?php endforeach; endif; unset($_from); ?>
        <?php if (! empty ( $this->_tpl_vars['SELECT_LANGUAGE'] )): ?>
                <?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LANGUAGE'), $this);?>
:
                <select name='login_language' onchange="switchLanguage(this.value)"><?php echo $this->_tpl_vars['SELECT_LANGUAGE']; ?>
</select>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['LOGIN_ERROR'] != ''): ?>
            <span class="error"><?php echo $this->_tpl_vars['LOGIN_ERROR']; ?>
</span>
            <?php if ($this->_tpl_vars['WAITING_ERROR'] != ''): ?>
                <span class="error"><?php echo $this->_tpl_vars['WAITING_ERROR']; ?>
</span>
            <?php endif; ?>
        <?php else: ?>
            <span id='post_error' class="error"></span>
        <?php endif; ?>
        <!-- <div style="font-size: 14px;font-weight: 600;">Admin Login</div> -->
      </div>
  <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="fa fa-lg fa-user prefix"></i></span>
              <input type="text" class="" required  tabindex="1" id="user_name" name="user_name"  value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_USER_NAME'), $this);?>
"/>
  </div>
   <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="fa fa-lg fa-lock prefix"></i></span>
              <input type="password" class="" tabindex="2" id="user_password" name="user_password" placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_PASSWORD'), $this);?>
" value='<?php echo $this->_tpl_vars['LOGIN_PASSWORD']; ?>
' />
   </div>
      
      
      <input class="btn btn-primary" type="submit" title="Connect" tabindex="3" name="Login" value="LOGIN" label="LOGIN">
      
      <div class="message" id="forgotpasslink" style="cursor: pointer;display:<?php echo $this->_tpl_vars['DISPLAY_FORGOT_PASSWORD_FEATURE']; ?>
; ">
            <?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_FORGOT_PASSWORD'), $this);?>
 <a href='javascript:void(0)'>Click here</a>
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
                    <input type="text"  id="fp_user_name" name="fp_user_name"  value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_USER_NAME'), $this);?>
"/>
                  </div> 
              
                <!-- <div class="input-group"> -->
                  <div style="margin-bottom: 25px" class="input-group">

                <span class="input-group-addon"><i class="fa fa-lg fa-envelope prefix"></i></span>
                    <!-- <span class="input-group-addon logininput glyphicon glyphicon-envelope"></span> -->
                    <input type="text" id="fp_user_mail" name="fp_user_mail" value ='' placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_EMAIL'), $this);?>
">
                  </div>
<?php echo $this->_tpl_vars['CAPTCHA']; ?>

<div id='wait_pwd_generation'></div>

<input title="Email Temp Password" class=" btn btn-primary" type="button" onclick="validateAndSubmit(); return document.getElementById('cant_login').value == ''" id="generate_pwd_button" name="fp_login" value="RESET PASSWORD">

<div class="message" id="loginlink" style="cursor: pointer; ">
            <a href='javascript:void(0)'>Login Here</a>
        </div>
                
    </form>
  </div>