<?php
/* Smarty version 4.3.1, created on 2025-06-03 14:13:39
  from 'D:\XA\htdocs\photos\plugins\AdminTools\template\admin_controller.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_683ee6f36d0f20_13604454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e243d04b166200e3c809c4fa9d4d979795cb5170' => 
    array (
      0 => 'D:\\XA\\htdocs\\photos\\plugins\\AdminTools\\template\\admin_controller.tpl',
      1 => 1741773353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683ee6f36d0f20_13604454 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0], array( array('path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/admin_style.css')),$_smarty_tpl ) );
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0], array( array('path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/fontello/css/fontello-ato.css')),$_smarty_tpl ) );
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0], array( array('id'=>'admintools.controller','load'=>'footer','require'=>'jquery','path'=>($_smarty_tpl->tpl_vars['ADMINTOOLS_PATH']->value).('template/admin_controller.js')),$_smarty_tpl ) );?>


<?php $_block_plugin2 = isset($_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0] : null;
if (!is_callable(array($_block_plugin2, 'block_footer_script'))) {
throw new SmartyException('block tag \'footer_script\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('footer_script', array('require'=>'admintools.controller'));
$_block_repeat=true;
echo $_block_plugin2->block_footer_script(array('require'=>'admintools.controller'), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
AdminTools.urlWS = '<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ws.php?format=json&method=';
AdminTools.urlSelf = '<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
';

AdminTools.multiView = {
  view_as: <?php echo $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['view_as'];?>
,
  theme: '<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['name'];?>
',
  lang: '<?php echo $_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['lang'];?>
'
};

<?php if ($_smarty_tpl->tpl_vars['ato']->value['DELETE_CACHE']) {?>
  AdminTools.deleteCache();
<?php }?>
  AdminTools.init();
<?php $_block_repeat=false;
echo $_block_plugin2->block_footer_script(array('require'=>'admintools.controller'), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

<ul class="multiview">
  <li><label><?php echo l10n('View as');?>
</label>
    <select class="switcher" data-type="view_as"></select>
  </li>
  <li><label><?php echo l10n('Theme');?>
</label>
    <select class="switcher" data-type="theme"></select>
  </li>
  <li><label><?php echo l10n('Language');?>
</label>
    <select class="switcher" data-type="lang"></select>
  </li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['show_queries']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_show_queries=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['show_queries'];?>
"><?php echo l10n('Show SQL queries');?>
</a></li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_l10n']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_debug_l10n=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_l10n'];?>
"><?php echo l10n('Debug languages');?>
</a></li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_template']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_debug_template=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['debug_template'];?>
"><?php echo l10n('Debug template');?>
</a></li>
  <li><a class="icon-check<?php if (!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['template_combine_files']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_template_combine_files=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['template_combine_files'];?>
"><?php echo l10n('Combine JS&CSS');?>
</a></li>
  <li><a class="icon-check<?php if ($_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['no_history']) {?>-empty<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_no_history=<?php echo (int)!$_smarty_tpl->tpl_vars['ato']->value['MULTIVIEW']['no_history'];?>
"><?php echo l10n('Save visit in history');?>
</a></li>
  <li><a class="icon-ato-null" href="<?php echo $_smarty_tpl->tpl_vars['ato']->value['U_SELF'];?>
ato_purge_template=1"><?php echo l10n('Purge compiled templates');?>
</a></li>
</ul><?php }
}
