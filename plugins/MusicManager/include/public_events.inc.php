<?php
defined('SKELETON_PATH') or die('Hacking attempt!');

/**
 * Detect current section and subpage from URL tokens
 */
function skeleton_loc_end_section_init()
{
  global $tokens, $page, $conf;

  if ($tokens[0] == 'MusicManager') {
    $page['section'] = 'MusicManager';

    // Capture subpage and sub-subpage if exists
    $page['skeleton_subpage'] = isset($tokens[1]) ? $tokens[1] : null;
    $page['skeleton_sub_subpage'] = isset($tokens[2]) ? $tokens[2] : null;

    // Build section title breadcrumb
    $base_url = get_absolute_root_url();
    $skeleton_url = SKELETON_PUBLIC;

    $page['section_title'] = '<a href="'.$base_url.'">'.l10n('Home').'</a>'
                           .$conf['level_separator']
                           .'<a href="'.$skeleton_url.'">'.l10n('MusicManager').'</a>';

    if (!empty($page['skeleton_subpage'])) {
      $subpage = $page['skeleton_subpage'];
      $page['section_title'] .= $conf['level_separator'] . ucfirst($subpage);
    }

    if (!empty($page['skeleton_sub_subpage'])) {
      $subsub = $page['skeleton_sub_subpage'];
      $page['section_title'] .= $conf['level_separator'] . ucfirst($subsub);
    }

    $page['title'] = ucfirst($page['skeleton_sub_subpage'] ?? '');
    $page['body_id'] = 'theSkeletonPage';
    $page['is_external'] = true;
  }
}

/**
 * Get all music files from a specific category (directory)
 */
function get_music_by_category($category)
{
  // Sanitize input
  $escaped = pwg_db_real_escape_string($category);

  // Build paths
  $music_dir = PHPWG_ROOT_PATH . 'plugins/MusicManager/uploads/' . $escaped;
  $music_url = get_absolute_root_url() . 'plugins/MusicManager/uploads/' . rawurlencode($escaped) . '/';

  $music_list = [];

  if (is_dir($music_dir)) {
    foreach (glob($music_dir . '/*.mp3') as $file_path) {
      $filename = basename($file_path);
      $name_without_ext = pathinfo($filename, PATHINFO_FILENAME);
      $parts = explode('-', $name_without_ext, 2);

      $singer = isset($parts[0]) ? trim($parts[0]) : 'Unknown';
      $title = isset($parts[1]) ? trim($parts[1]) : 'Untitled';

      $music_list[] = [
        'singer'   => $singer,
        'title'    => $title,
        'filename' => $filename,
        'url'      => $music_url . rawurlencode($filename),
      ];
    }
  }

  return $music_list;
}

/**
 * Include plugin page based on requested subpage and sub-subpage
 */
function skeleton_loc_end_page()
{
  global $page, $template;

  if (isset($page['section']) && $page['section'] === 'MusicManager') {
    if (!empty($page['skeleton_sub_subpage'])) {
      $category = $page['skeleton_sub_subpage'];
      $music_list = get_music_by_category($category);

      $template->assign([
        'CATEGORY'    => ucfirst($category),
        'MUSIC_LIST'  => $music_list
      ]);

      // Use a single template (dynamic)
      $template->set_filename('index', realpath(SKELETON_PATH . 'musics/raya.tpl'));
    } else {
      $template->assign('MESSAGE', 'Please choose a music category');
      $template->set_filename('index', realpath(SKELETON_PATH . 'musics/raya.tpl'));
    }

    $template->assign_var_from_handle('PLUGIN_INDEX_CONTENT', 'index');
  }
}

/* Other existing functions below, no change needed */

function skeleton_add_button()
{
  global $template;

  $template->assign('SKELETON_PATH', SKELETON_PATH);
  $template->set_filename('skeleton_button', realpath(SKELETON_PATH.'template/my_button.tpl'));
  $button = $template->parse('skeleton_button', true);

  if (script_basename()=='index') {
    $template->add_index_button($button, BUTTONS_RANK_NEUTRAL);
  } else {
    $template->add_picture_button($button, BUTTONS_RANK_NEUTRAL);
  }
}

function skeleton_loc_end_picture()
{
  global $template;
  $template->set_prefilter('picture', 'skeleton_picture_prefilter');
}

function skeleton_picture_prefilter($content)
{
  $search = '{if $display_info.author and isset($INFO_AUTHOR)}';
  $replace = '
<div id="MusicManager" class="imageInfo">
  <dt>{\'MusicManager\'|@translate}</dt>
  <dd style="color:orange;">{\'Piwigo rocks\'|@translate}</dd>
</div>
';
  return str_replace($search, $replace.$search, $content);
}

function skeleton_add_profile_block()
{
  global $template;

  $block = array(
    'name' => 'Profile MusicManager',
    'desc' => 'This is the simplest example to add block in plugin',
    'template' => 'plugins/' . SKELETON_ID . '/template/skeleton_profile_block.tpl',
    'standard_show_save' => true
  );
  $template->append('PLUGINS_PROFILE', $block);
}  