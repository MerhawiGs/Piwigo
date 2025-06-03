<?php
defined('SKELETON_PATH') or die('Hacking attempt!');
// +-----------------------------------------------------------------------+
// | Home tab                                                              |
// +-----------------------------------------------------------------------+
$template->assign(array(
  
'MusicManager' => isset($conf['MusicManager']) ? $conf['MusicManager'] : 'default_value',
  'INTRO_CONTENT' => load_language('intro.html', SKELETON_PATH, array('return'=>true)),
  ));

// define template file
$template->set_filename('skeleton_content', realpath(SKELETON_PATH . 'admin/template/home.tpl'));
