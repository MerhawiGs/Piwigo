<?php
defined('SKELETON_PATH') or die('Hacking attempt!');

class SkeletonMenu
{
  /**
   * add link in existing menu
   */
  
  static function blockmanager_apply1($menu_ref_arr)
  {
    $menu = &$menu_ref_arr[0];
    if (($block = $menu->get_block('mbMenu')) != null)
    {
      $block->data[] = array(
        'URL' => SKELETON_PUBLIC,
        'TITLE' => l10n('Musics'),
        'NAME' => l10n('Musics'),
      );
    }
  }

  /**
   * add a new menu block
   */
  static function blockmanager_register_blocks($menu_ref_arr)
  {
    $menu = &$menu_ref_arr[0];

    if ($menu->get_id() == 'menubar')
    {
      // identifier, title, owner
      $menu->register_block(new RegisteredBlock('mbSkeleton', l10n('Musics'), 'Musics'));
    }
  }

  /**
   * fill the added menu block
   */
  static function blockmanager_apply2($menu_ref_arr)
  {
    $menu = &$menu_ref_arr[0];

    if (($block = $menu->get_block('mbSkeleton')) != null)
    {
      $block->set_title(l10n('Musics'));

      $block->data['link1'] = array(
        'URL' => get_absolute_root_url() . 'index.php?/MusicManager/musics/raya',
        'TITLE' => l10n('Raya music page'),
        'NAME' => l10n('Raya'),
        'REL'  => 'rel="nofollow"',
      );

      $public_base = rtrim(SKELETON_PUBLIC, '/');
      $block->data['link2'] = array(
        'URL' => get_absolute_root_url() . 'index.php?/MusicManager/musics/kuda',
        'TITLE' => l10n('Kuda music page'),
        'NAME' => l10n('Kuda'),
      );
      $block->data['link3'] = array(
        'URL' => get_absolute_root_url() . 'index.php?/MusicManager/musics/hura3',
        'TITLE' => l10n('Hura3 music page'),
        'NAME' => l10n('Hura3'),
        'REL'  => 'rel="nofollow"',
      );

      $block->data['link4'] = array(
        'URL' => get_absolute_root_url() . 'index.php?/MusicManager/musics/awrs',
        'TITLE' => l10n('Awrs music page'),
        'NAME' => l10n('Awrs'),
        'REL'  => 'rel="nofollow"',
      );

      $block->data['link5'] = array(
        'URL' => get_absolute_root_url() . 'index.php?/MusicManager/musics/kunama',
        'TITLE' => l10n('Kunama music page'),
        'NAME' => l10n('Kunama'),
        'REL'  => 'rel="nofollow"',
      );

      $block->template = realpath(SKELETON_PATH . 'template/menubar_skeleton.tpl');
    }
  }
} 