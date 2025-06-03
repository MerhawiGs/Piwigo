<?php
/* Smarty version 4.3.1, created on 2025-06-03 14:13:38
  from 'D:\XA\htdocs\photos\plugins\MusicManager\admin\template\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_683ee6f2dd8ac2_35835337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'add62a38ccdef39cf25269dfab2865c429cdb784' => 
    array (
      0 => 'D:\\XA\\htdocs\\photos\\plugins\\MusicManager\\admin\\template\\home.tpl',
      1 => 1748620720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683ee6f2dd8ac2_35835337 (Smarty_Internal_Template $_smarty_tpl) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0], array( array('path'=>($_smarty_tpl->tpl_vars['SKELETON_PATH']->value).("admin/template/style.css")),$_smarty_tpl ) );?>


<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'block_html_style'))) {
throw new SmartyException('block tag \'html_style\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('html_style', array());
$_block_repeat=true;
echo $_block_plugin1->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
  .music-manager-container {
    max-width: 960px;
    margin: 30px auto;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 30px;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  }

  .music-manager-container h2 {
    font-size: 26px;
    color: #222;
    margin-bottom: 15px;
    border-bottom: 3px solid #FFAB04FF;
    padding-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .music-manager-container h2 i {
    color: #FFAB04FF;
    font-size: 24px;
  }

  .music-manager-container fieldset {
    border: none;
    margin-top: 20px;
    padding: 0;
  }

  .music-manager-container legend {
    font-weight: bold;
    font-size: 18px;
    color: #FFAB04FF;
    margin-bottom: 10px;
  }

  .music-manager-container p {
    font-size: 15px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 15px;
  }

  .music-manager-container ul {
    padding-left: 20px;
    color: #555;
    font-size: 14px;
  }

  .music-manager-container ul li {
    margin-bottom: 8px;
  }

  .highlight {
    color: #FFAB04FF;
    font-weight: bold;
  }
<?php $_block_repeat=false;
echo $_block_plugin1->block_html_style(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

<div class="music-manager-container">
  <h2><i class="icon-music"></i> Music Manager</h2>

  <form method="post" action="" class="properties">
    <fieldset>
      <legend>Welcome to the Music Manager Plugin</legend>
      <p>
        🎶 <span class="highlight">Music Manager</span> is a powerful Piwigo plugin that brings life to your photo gallery by letting you attach music tracks to your collections. 
        It supports categorization by traditional Tigrigna music styles, enhancing user engagement and cultural immersion.
      </p>
      <p>
        As an admin, you can:
      </p>
      <ul>
        <li>➕ Add new music files to specific cultural categories (e.g. Raya, Awrs, Hura Tembien, Collections)</li>
        <li>📝 Modify existing tracks or update metadata</li>
        <li>🗑️ Safely delete or replace outdated music entries</li>
        <li>🎧 Offer a regional audio experience alongside your photo content</li>
      </ul>
      <p>
        Get started by navigating to the <span class="highlight">Music Manager</span> section in your admin menu. Your gallery is about to get a soundtrack!
      </p>
    </fieldset>
  </form>
</div>
<?php }
}
