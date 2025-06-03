<?php
defined('SKELETON_PATH') or die('Hacking attempt!');

global $template, $page, $conf;

// get current tab
$page['tab'] = isset($_GET['tab']) ? $_GET['tab'] : 'home';
$page['title'] = l10n('Admin Music Manager');

// plugin tabsheet is not present on photo page
if ($page['tab'] != 'photo')
{
  include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');
  $tabsheet = new tabsheet();
  $tabsheet->set_id('skeleton');
  $tabsheet->add('home', l10n('Welcome'), SKELETON_ADMIN . '-home');
  $selected_category = isset($_GET['r']) ? $_GET['r'] : 'default'; // <- Add this line
  $template->assign('selected_category', $selected_category); 
  $tabsheet->add('config', l10n('Music Manager'), SKELETON_ADMIN . '-config');
  $tabsheet->select($page['tab']);
  $tabsheet->assign();
}

// include tab PHP logic
include(SKELETON_PATH . 'admin/' . $page['tab'] . '.php');
// assign template file for current tab to handle skeleton_content
$template->set_filenames(array(
  'skeleton_content' => SKELETON_PATH . 'admin/template/' . $page['tab'] . '.tpl',
));
// assign plugin variables
$template->assign(array(
  'SKELETON_PATH'=> SKELETON_PATH,
  'SKELETON_ABS_PATH'=> realpath(SKELETON_PATH),
  'SKELETON_ADMIN' => SKELETON_ADMIN,
  'plugin_id' => SKELETON_ID, 
));

// assign the handle to admin content
$template->assign_var_from_handle('ADMIN_CONTENT', 'skeleton_content');
