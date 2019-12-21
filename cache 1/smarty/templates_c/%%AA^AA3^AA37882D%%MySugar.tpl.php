<?php /* Smarty version 2.6.29, created on 2019-11-29 12:09:02
         compiled from themes/SuiteR/tpls/MySugar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getscript', 'themes/SuiteR/tpls/MySugar.tpl', 160, false),array('function', 'counter', 'themes/SuiteR/tpls/MySugar.tpl', 221, false),array('function', 'sugar_getjspath', 'themes/SuiteR/tpls/MySugar.tpl', 361, false),)), $this); ?>

<?php echo '
    <style>
        .footable-toggle{
            display:none !important;
        }
        .menu {
            z-index: 100;
        }

        .subDmenu {
            z-index: 100;
        }

        div.moduleTitle {
            height: 10px;
        }
        .imageLoading{
			padding-left:50px;
		}
		@media screen and (-webkit-min-device-pixel-ratio:0) {
		.imageLoading{padding-left:50px;}
		}
		.ft .first-child button
		{
		background: #2767A8 !important;
		color: #fff !important;
		padding: 4px 8px;
		border: none;
		border-radius: 3px;
		margin: 5px;
		}
		#addpageform table tbody tr td
		{
		padding:10px;
		}
		.modal-backdrop.in
		{
		z-index:1;
		}
        .bd .edit-configure-tab
{   
    display: none;
}
  
    </style>


'; ?>


<?php echo '
<script>

$(document).ready(function(){
 /* if($("td #percentage_c").html().indexOf(\'%\') == -1)
{
    setInterval(function(){ 
        jQuery("td #percentage_c").append("%"); 
}, 100);
    }*/
        
        
        $("#dashletsDialognew").on("hidden.bs.modal", function () {
        $("#ajaxStatusDiv").hide();    
        });
        

$(".bd").on("click",".dashlet-edit-button",function(e){

e.preventDefault();

$("#edit-dashlet-modal").modal(\'hide\');
return false;
})

            $(".custom_dashboard_tabs").click(function(){
            
            var title=$(this).data("title");
        
            if(title=="Customer 360")
            {
            $(".custom_add_tiles_button").parent("li").hide();
           
            }else
            {
            $(".custom_add_tiles_button").parent("li").show();
           
            }
            })


})

             function openbacktab(x)
            {

            x.css(\'display\',\'none\');
            setTimeout(function(){
            x.css(\'display\',\'\');
            },2000);
            var ttitle=$(".custom_dashboard_tabs.current").attr(\'data-title\');
            if(ttitle=="Customer 360"){
            setTimeout(function(){
            $("#myTabconfigure").css("display","block");
            },1000);


            }else
            {

            $("#myTabconfigure").hide();
            }

            }

</script>
'; ?>


<?php echo smarty_function_sugar_getscript(array('file' => "cache/include/javascript/sugar_grp_yui_widgets
.js"), $this);?>

<?php echo smarty_function_sugar_getscript(array('file' => 'include/javascript/dashlets.js'), $this);?>


<?php echo $this->_tpl_vars['chartResources']; ?>

<?php echo $this->_tpl_vars['mySugarChartResources']; ?>


<div class="row" style="margin-top:11px">
<ul class="dashboardTabList">

    
        <?php $_from = $this->_tpl_vars['dashboardPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tabNum'] => $this->_tpl_vars['tab']):
?>
        <?php if ($this->_tpl_vars['tabNum'] == 0): ?> <li id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
" class="padding-tab">
            <a id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
_anchor" class="custom_dashboard_tabs" data-title="<?php echo $this->_tpl_vars['tab']['pageTitle']; ?>
" style='cursor: pointer;'  onClick=retrievePage(<?php echo $this->_tpl_vars['tabNum']; ?>
);>
                <span><?php echo $this->_tpl_vars['tab']['pageTitle']; ?>
</span>
            </a>
        </li>
        <?php else: ?> <li id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
" class="padding-tab">
            <a id="pageNum_<?php echo $this->_tpl_vars['tabNum']; ?>
_anchor"  class="custom_dashboard_tabs" data-title="<?php echo $this->_tpl_vars['tab']['pageTitle']; ?>
" style='cursor: pointer;' <?php if (! $this->_tpl_vars['lock_homepage']): ?>  <?php if ($this->_tpl_vars['tab']['pageTitle'] != 'Customer 360'): ?>ondblclick="renameTab(<?php echo $this->_tpl_vars['tabNum']; ?>
)"<?php endif;  endif; ?> onClick="retrievePage(<?php echo $this->_tpl_vars['tabNum']; ?>
);changeFooterView(1);">
                <span id="name_<?php echo $this->_tpl_vars['tabNum']; ?>
"><?php echo $this->_tpl_vars['tab']['pageTitle']; ?>
</span>
            </a>
            <?php if ($this->_tpl_vars['tab']['pageTitle'] != 'Customer 360'): ?>
            <?php if (! $this->_tpl_vars['lock_homepage']): ?><a id="removeTab_anchor"  onClick=removeDashboardForm(<?php echo $this->_tpl_vars['tabNum']; ?>
);><i class="fa fa-times" aria-hidden="true"></i>
</a>
<?php endif; ?>

<?php endif; ?>

            </li><?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php if (! $this->_tpl_vars['lock_homepage']): ?>
        <li class="addButton ">
            <!--<a style='cursor: pointer;border:1px solid #2767A8' class="btn-sm " onclick="return SUGAR.mySugar.showDashletsDialog();"><?php echo $this->_tpl_vars['lblAddDashlets']; ?>
</a>-->
 <a style='cursor: pointer;border:1px solid #2767A8; background-color:#2767A8 !important;color:white' class="btn-sm custom_add_tiles_button" data-toggle="modal" data-target="#dashletsDialognew" onclick="return SUGAR.mySugar.showDashletsDialog();">Add Active Tiles</a>
        </li>

        <li class="addButton ">
            <a style='cursor: pointer;border:1px solid #2767A8;background-color:#2767A8 !important;color:white' class="btn-sm custom_add_tab_button" onclick="addDashboardForm(<?php echo $this->_tpl_vars['tabNum']; ?>
);">
                <span><?php echo $this->_tpl_vars['lblAddTab']; ?>
</span>
            </a>
        </li>
    <?php endif; ?>
</ul>
</div>
<div class="clear"></div>

<!-- Construct Dashlets -->
<div id="pageContainer" class="yui-skin-sam">
    <div id="pageNum_<?php echo $this->_tpl_vars['activePage']; ?>
_div">
        <table width="100%">
            <tr>
                <td align='right'>
                    <?php if (! $this->_tpl_vars['lock_homepage']): ?><input id="add_dashlets" class="button" type="button"
                                               value="<?php echo $this->_tpl_vars['lblAddDashlets']; ?>
"
                                               onclick="return SUGAR.mySugar.showDashletsDialog();"/><?php endif; ?>
                </td>
            </tr>
            <tr>
                <?php echo smarty_function_counter(array('assign' => 'hiddenCounter','start' => 0,'print' => false), $this);?>

                <?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colNum'] => $this->_tpl_vars['data']):
?>
                    <td class="dashletcontainer" valign='top' width='<?php echo $this->_tpl_vars['data']['width']; ?>
'>
                        <ul class='noBullet' id='col_<?php echo $this->_tpl_vars['activePage']; ?>
_<?php echo $this->_tpl_vars['colNum']; ?>
'>
                            <li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
b'
                                style='height: 5px; margin-top:12px;' class='noBullet'>
                                &nbsp;&nbsp;&nbsp;</li>
                            <?php $_from = $this->_tpl_vars['data']['dashlets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dashlet']):
?>
                                <li class='noBullet' id='dashlet_<?php echo $this->_tpl_vars['id']; ?>
'>
                                    <div id='dashlet_entire_<?php echo $this->_tpl_vars['id']; ?>
' class='dashletPanel '>
                                       
                                        <?php echo $this->_tpl_vars['dashlet']['script']; ?>

                                        <?php echo $this->_tpl_vars['dashlet']['displayHeader']; ?>

                                        <?php echo $this->_tpl_vars['dashlet']['display']; ?>

                                        <?php echo $this->_tpl_vars['dashlet']['displayFooter']; ?>

                                       
                                    </div>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                            <li id='page_<?php echo $this->_tpl_vars['activePage']; ?>
_hidden<?php echo $this->_tpl_vars['hiddenCounter']; ?>
' style='height: 5px'
                                class='noBullet'>&nbsp;&nbsp;&nbsp;</li>
                        </ul>
                    </td>
                    <?php echo smarty_function_counter(array(), $this);?>

                <?php endforeach; endif; unset($_from); ?>
            </tr>
        </table>
    </div>
    <?php $_from = $this->_tpl_vars['divPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['divPageIndex'] => $this->_tpl_vars['divPageNum']):
?>
        <div id="pageNum_<?php echo $this->_tpl_vars['divPageNum']; ?>
_div" style="display:none;">
        </div>
    <?php endforeach; endif; unset($_from); ?>

    <!--<div id="dashletsDialog" style="display:none;">
        <div class="hd" id="dashletsDialogHeader"><a href="javascript:void(0)"
                                                     onClick="javascript:SUGAR.mySugar.closeDashletsDialog();">
                <div class="container-close">&nbsp;</div>
            </a><?php echo $this->_tpl_vars['lblAdd']; ?>

        </div>
        <div class="bd" id="dashletsList">
            <form></form>
        </div>
    </div>-->
    <div class="modal fade" id="dashletsDialognew" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title text-center text-uppercase">Add Active Tiles</h1>
        </div>
        <div class="modal-body" style="min-height:250px">
          <div class="bd" id="dashletsList">
            <form></form>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary " style="background-color:#2767A8 !important;color:white !important;" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
 <!-- <div class="modal fade" id="edit-dashlet-modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
      
      </div>
    </div>
  </div>
-->
</div>
<script type="text/javascript" src="include/MySugar/javascript/AddRemoveDashboardPages.js"></script>
<script type="text/javascript" src="custom/include/MySugar/javascript/retrievePage.js"></script>
<link rel="stylesheet" type="text/css" href="themes/SuiteR/css/dashboardstyle.css">
<script type="text/javascript">

    var activePage = <?php echo $this->_tpl_vars['activePage']; ?>
;
    var theme = '<?php echo $this->_tpl_vars['theme']; ?>
';
    current_user_id = '<?php echo $this->_tpl_vars['current_user']; ?>
';
    jsChartsArray = new Array();
    var moduleName = '<?php echo $this->_tpl_vars['module']; ?>
';
    document.body.setAttribute("class", "yui-skin-sam");
    <?php echo '
    var mySugarLoader = new YAHOO.util.YUILoader({
        require: ["my_sugar", "sugar_charts"],
        // Bug #48940 Skin always must be blank
        skin: {
            base: \'blank\',
            defaultSkin: \'\'
        },
        onSuccess: function () {
            initMySugar();
            initmySugarCharts();
            SUGAR.mySugar.maxCount =    ';  echo $this->_tpl_vars['maxCount'];  echo ';
            SUGAR.mySugar.homepage_dd = new Array();
            var j = 0;

            '; ?>

            var dashletIds = <?php echo $this->_tpl_vars['dashletIds']; ?>
;

            <?php if (! $this->_tpl_vars['lock_homepage']): ?>
            for (i in dashletIds) {
                SUGAR.mySugar.homepage_dd[j] = new ygDDList('dashlet_' + dashletIds[i]);
                SUGAR.mySugar.homepage_dd[j].setHandleElId('dashlet_header_' + dashletIds[i]);
                // Bug #47097 : Dashlets not displayed after moving them
                // add new property to save real id of dashlet, it needs to have ability reload dashlet by id
                SUGAR.mySugar.homepage_dd[j].dashletID = dashletIds[i];
                SUGAR.mySugar.homepage_dd[j].onMouseDown = SUGAR.mySugar.onDrag;
                SUGAR.mySugar.homepage_dd[j].afterEndDrag = SUGAR.mySugar.onDrop;
                j++;
                }
            <?php if ($this->_tpl_vars['hiddenCounter'] > 0): ?>
            for (var wp = 0; wp <= <?php echo $this->_tpl_vars['hiddenCounter']; ?>
; wp++) {
                SUGAR.mySugar.homepage_dd[j++] = new ygDDListBoundary('page_' + activePage + '_hidden' + wp);
                }
            <?php endif; ?>
            YAHOO.util.DDM.mode = 1;
            <?php endif; ?>
            <?php echo '
            SUGAR.mySugar.renderDashletsDialog();
            SUGAR.mySugar.sugarCharts.loadSugarCharts(activePage);
            '; ?>

            <?php echo '
        }
    });
    mySugarLoader.addModule({
        name: "my_sugar",
        type: "js",
        fullpath: '; ?>
"<?php echo smarty_function_sugar_getjspath(array('file' => 'include/MySugar/javascript/MySugar.js'), $this);?>
"<?php echo ',
        varName: "initMySugar",
        requires: []
    });
    mySugarLoader.addModule({
        name: "sugar_charts",
        type: "js",
        fullpath: '; ?>
"<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarCharts/Jit/js/mySugarCharts.js"), $this);?>
"<?php echo ',
        varName: "initmySugarCharts",
        requires: []
    });
    mySugarLoader.insert();
    '; ?>

</script>

