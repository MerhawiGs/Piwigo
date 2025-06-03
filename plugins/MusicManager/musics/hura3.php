<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt');

global $template;

// Define the Hura3 music directory
$music_dir = SKELETON_PATH . 'uploads/hura3/';
$music_url = get_root_url() . 'plugins/MusicManager/uploads/hura3/';

// Read audio files
$music_files = [];
if (is_dir($music_dir)) {
  $files = scandir($music_dir);
  foreach ($files as $file) {
    if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['mp3', 'wav', 'ogg'])) {
      $short_name = strlen($file) > 40 ? substr($file, 0, 37) . '...' : $file;
      $music_files[] = [
        'name' => $short_name,
        'url' => $music_url . $file
      ];
    }
  }
}

// Assign to template
$template->assign([
  'TITLE' => 'Hura Tembien Music',
  'DESCRIPTION' => 'Traditional sounds of Hura Tembien region.',
  'MUSIC_LIST' => $music_files,
]);

// Render template
$template->set_filename('hura3_page', realpath(dirname(__FILE__) . '/hura3.tpl'));
$template->pparse('hura3_page');
?>
