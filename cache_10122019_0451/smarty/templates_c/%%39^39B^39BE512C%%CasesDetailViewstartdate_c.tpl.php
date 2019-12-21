<?php /* Smarty version 2.6.29, created on 2019-12-10 11:21:01
         compiled from cache/modules/AOW_WorkFlow/CasesDetailViewstartdate_c.tpl */ ?>


    <?php if (strlen ( $this->_tpl_vars['fields']['startdate_c']['value'] ) <= 0): ?>
        <?php $this->assign('value', $this->_tpl_vars['fields']['startdate_c']['default_value']); ?>
    <?php else: ?>
        <?php $this->assign('value', $this->_tpl_vars['fields']['startdate_c']['value']); ?>
    <?php endif; ?>



<span class="sugar_field" id="<?php echo $this->_tpl_vars['fields']['startdate_c']['name']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</span>