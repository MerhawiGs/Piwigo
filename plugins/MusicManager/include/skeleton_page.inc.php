<?php
defined('SKELETON_PATH') or die('Hacking attempt!');
global $page, $template, $conf, $user, $tokens, $pwg_loaded_plugins;
$template->set_filename('skeleton_page', realpath(SKELETON_PATH . 'template/skeleton_page.tpl'));
$template->assign_var_from_handle('CONTENT', 'skeleton_page');
