<?php
/*
Plugin Name:Music Manager
Version: 1.0
Description: Manage musics in Tigrigna categories
Author: Haile Tassew
Author URI: http://github.com/Haile-12
Has Settings: true
*/

defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

// Ensure the plugin is in a folder named "MusicManager"
if (basename(dirname(__FILE__)) != 'MusicManager') {
  add_event_handler('init', 'skeleton_error');
  function skeleton_error() {
    global $page;
    $page['errors'][] = 'The folder name is incorrect, uninstall the plugin and rename it to "MusicManager"';
  }
  return;
}

// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+
global $prefixeTable;
define('SKELETON_ID',      basename(dirname(__FILE__)));
define('SKELETON_PATH',    PHPWG_PLUGINS_PATH . SKELETON_ID . '/');
define('SKELETON_TABLE',   $prefixeTable . 'MusicManager_');
define('SKELETON_ADMIN',   get_root_url() . 'admin.php?page=plugin-' . SKELETON_ID);
define('PHPWG_PLUGIN_NAME', 'musicmanager');
define('SKELETON_PUBLIC',  get_absolute_root_url() . make_index_url(array('section' => 'MusicManager')) . '/');
define('SKELETON_DIR',     PHPWG_ROOT_PATH . PWG_LOCAL_DIR . 'MusicManager/');

// +-----------------------------------------------------------------------+
// | Admin menu link registration                                         |
// +-----------------------------------------------------------------------+
add_event_handler('get_admin_plugin_menu_links', 'skeleton_admin_menu');
function skeleton_admin_menu($menu) {
  array_push($menu, array(
    'NAME' => 'Music Manager',
    'URL'  => get_admin_plugin_menu_link(SKELETON_PATH . 'admin.php')
  ));
  return $menu;
}

// +-----------------------------------------------------------------------+
// | Add event handlers                                                    |
// +-----------------------------------------------------------------------+

if (defined('IN_ADMIN')) {
  $admin_file = SKELETON_PATH . 'include/admin_events.inc.php';
  // You can include admin-related events here if needed
} else {
  $public_file = SKELETON_PATH . 'include/public_events.inc.php';
  add_event_handler('loc_end_section_init', 'skeleton_loc_end_section_init',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file);
  add_event_handler('loc_end_index', 'skeleton_loc_end_page',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file);
}


// Add menu hooks
$menu_file = SKELETON_PATH . 'include/menu_events.class.php';
add_event_handler('blockmanager_apply', array('SkeletonMenu', 'blockmanager_apply1'),
  EVENT_HANDLER_PRIORITY_NEUTRAL + 10, $menu_file);
add_event_handler('blockmanager_register_blocks', array('SkeletonMenu', 'blockmanager_register_blocks'),
  EVENT_HANDLER_PRIORITY_NEUTRAL, $menu_file);
add_event_handler('blockmanager_apply', array('SkeletonMenu', 'blockmanager_apply2'),
  EVENT_HANDLER_PRIORITY_NEUTRAL, $menu_file);


// Plugin initialization
function skeleton_init() {
  global $conf;
  load_language('plugin.lang', SKELETON_PATH);
  if (!isset($conf[SKELETON_ID])) {
    $conf[SKELETON_ID] = array(
      'skeleton_config' => array(
        'option1' => 'value1',
        'option2' => 'value2',
      ),
    );
  }
}
