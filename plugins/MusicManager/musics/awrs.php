<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt');

global $template;

// Helper function to shorten strings nicely with "..." if longer than max length
function shorten_filename($filename, $max_length = 40)
{
    if (strlen($filename) <= $max_length) {
        return $filename;
    }
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = pathinfo($filename, PATHINFO_FILENAME);

    $max_base_len = $max_length - strlen($ext) - 3;
    if ($max_base_len < 1) {
        return substr($filename, 0, $max_length - 3) . '...';
    }

    $short_base = substr($basename, 0, $max_base_len);
    return $short_base . '...' . '.' . $ext;
}

// Define the path to the awrs music folder
$music_dir = SKELETON_PATH . 'uploads/awrs/';
$music_url = get_root_url() . 'plugins/MusicManager/uploads/awrs/';

// Read all .mp3, .wav, or .ogg files
$music_files = [];
if (is_dir($music_dir)) {
    $files = scandir($music_dir);
    foreach ($files as $file) {
        if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['mp3', 'wav', 'ogg'])) {
            $music_files[] = [
                'name' => $file,
                'short_name' => shorten_filename($file, 40),
                'url' => $music_url . rawurlencode($file),
            ];
        }
    }
}

// Assign values to Smarty template
$template->assign([
    'TITLE' => 'Awrs Music',
    'DESCRIPTION' => 'Enjoy the best Awrs category music here!',
    'MUSIC_LIST' => $music_files,
]);

// Set and parse the template
$template->set_filename('awrs_page', realpath(dirname(__FILE__) . '/awrs.tpl'));
$template->pparse('awrs_page');
?>
