<?php
/* Smarty version 4.3.1, created on 2025-06-03 14:14:00
  from 'D:\XA\htdocs\photos\plugins\MusicManager\admin\template\config.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_683ee708226fb2_25481674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93688ac60cc813c6140add65b005489b70b0c150' => 
    array (
      0 => 'D:\\XA\\htdocs\\photos\\plugins\\MusicManager\\admin\\template\\config.tpl',
      1 => 1748664280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_683ee708226fb2_25481674 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\XA\\htdocs\\photos\\include\\smarty\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'D:\\XA\\htdocs\\photos\\include\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<style>
  /* Styles for modern UI */
  :root {
    --primary-color: #007bff;
    --primary-hover: #0056b3;
    --bg-color: #f8f9fa;
    --card-bg: #ffffff;
    --border-radius: 5px;
    --shadow: rgba(0, 0, 0, 0.1);
    --text-color: #212529;
    --input-border: #ced4da;
    --icon-color: #ffc107; /* Yellow color for icons */
    --edit-icon-color: #28a745; /* Green color for edit icon */
    --delete-icon-color: #dc3545; /* Red color for delete icon */
  }
  body {
    font-family: "Arial", sans-serif;
    background-color: var(--bg-color);
    color: var(--text-color);
    margin: 0;
    padding: 0;
  }
  .container {
    max-width: 900px;
    margin: 2rem auto;
    padding: 1.5rem;
    background: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: 0 2px 8px var(--shadow);
  }
  .categories {
    display: flex;
    gap: 10px;
    margin-bottom: 1rem;
  }
  .categories a {
    padding: 10px 15px;
    border-radius: var(--border-radius);
    text-decoration: none;
    font-weight: 600;
    color: var(--primary-color);
    background-color: #e9ecef;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    margin-top: 5px; /* Small space above icons */
  }
  .categories a:hover {
    background-color: var(--primary-hover);
    color: #fff;
  }
  .categories a.active {
    background-color: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
  }
  form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
  }
  form input[type="text"],
  form textarea,
  form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 1rem;
    border: 1px solid var(--input-border);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: border-color 0.2s ease;
  }
  form input[type="text"]:focus,
  form textarea:focus,
  form input[type="file"]:focus {
    border-color: var(--primary-color);
    outline: none;
  }
  form textarea {
    resize: vertical;
    min-height: 100px;
  }
  form input[type="submit"] {
    background-color: var(--primary-color);
    color: white;
    font-weight: 700;
    padding: 12px;
    border: none;
    border-radius: var(--border-radius);
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  form input[type="submit"]:hover {
    background-color: var(--primary-hover);
  }
  .music-card {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: 0 2px 4px var(--shadow);
    padding: 10px;
    margin: 10px 0;
    display: flex;
    flex-direction: column;
  }
  h2, h3, h4 {
    color: var(--primary-color);
  }
  ul.music-list {
    list-style: none;
    padding-left: 0;
  }
  ul.music-list li {
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    border-bottom: 1px solid #e0e0e0;
  }
  ul.music-list li:last-child {
    border-bottom: none;
  }
  .icon {
    margin-right: 10px; /* Space between icon and text */
    color: var(--icon-color); /* Yellow color for icons */
    font-size: 1.5rem; /* Increase icon size */
    margin-top: 5px; /* Small space above icons */
  }
  .icon-button {
    background: none; /* Remove background */
    border: none; /* Remove border */
    cursor: pointer; /* Change cursor */
    display: flex; /* Flexbox for icon and text */
    align-items: center; /* Center align */
    margin-right: 15px; /* Spacing between buttons */
    font-size: 1rem; /* Normal text size */
  }
  .edit-icon {
    color: var(--edit-icon-color); /* Green color for edit icon */
  }
  .delete-icon {
    color: var(--delete-icon-color); /* Red color for delete icon */
  }
  .button-row {
    display: flex; /* Row layout for buttons */
    gap: 10px; /* Space between buttons */
    margin-top: 10px; /* Space above the button row */
  }
</style>

<div class="container">
  <h2>🎶 Music Manager Admin Interface</h2>

  <div class="categories">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['valid_categories']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
      <?php $_smarty_tpl->_assignInScope('label', smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cat']->value));?>
      <?php if ($_smarty_tpl->tpl_vars['cat']->value == 'hura') {
$_smarty_tpl->_assignInScope('label', 'Hura Tembien');
}?>
<a href="admin.php?page=plugin-<?php echo $_smarty_tpl->tpl_vars['plugin_id']->value;?>
&tab=config&r=<?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
"
         class="<?php if ($_smarty_tpl->tpl_vars['selected_category']->value == $_smarty_tpl->tpl_vars['cat']->value) {?>active<?php }?>">
        <i class="icon fas fa-folder"></i> <?php echo $_smarty_tpl->tpl_vars['label']->value;?>

      </a>
      
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>

  <h3>Manage music for category:
<?php if ($_smarty_tpl->tpl_vars['selected_category']->value == 'hura') {?>
      Hura Tembien
<?php } else { ?>
      <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['selected_category']->value);?>

<?php }?>
  </h3>

<?php if ((isset($_smarty_tpl->tpl_vars['music_to_edit']->value))) {?>
    <h2>✏️ Edit Music</h2>
    <form method="POST" enctype="multipart/form-data" action="">
        <input type="hidden" name="music_id" value="<?php echo $_smarty_tpl->tpl_vars['music_to_edit']->value['id'];?>
">
        <label for="title">Title: <span style="color: red;">*</span></label>
        <input type="text" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['music_to_edit']->value['title'];?>
" required>

        <label for="singer">Singer:</label>
        <input type="text" name="singer" id="singer" value="<?php echo $_smarty_tpl->tpl_vars['music_to_edit']->value['singer'];?>
">

        <label for="description">Description:</label>
        <textarea name="description" id="description"><?php echo $_smarty_tpl->tpl_vars['music_to_edit']->value['description'];?>
</textarea>

        <label for="music_file">Upload New File (optional):</label>
        <input type="file" name="music_file" id="music_file" accept=".mp3,.wav">

        <input type="submit" name="update_music" value="Update Music">
    </form>
<?php } else { ?>
    <h2>📥 Upload New Music</h2>
    <form method="post" enctype="multipart/form-data" action="">
        <label for="title">Title: <span style="color: red;">*</span></label>
        <input type="text" name="title" id="title" placeholder="Enter music title" required>

        <label for="singer">Singer:</label>
        <input type="text" name="singer" id="singer" placeholder="Enter singer name">

        <label for="description">Description:</label>
        <textarea name="description" id="description" placeholder="Enter description (optional)"></textarea>

        <label for="music_file">Upload Music File:</label>
        <input type="file" name="music_file" id="music_file" accept=".mp3,.wav" required>

        <input type="submit" name="submit_music" value="Upload Music">
    </form>
<?php }
if (smarty_modifier_count($_smarty_tpl->tpl_vars['music_list']->value) > 0) {?>
    <h4>🎵 Uploaded Musics:</h4>
    <ul class="music-list">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['music_list']->value, 'music');
$_smarty_tpl->tpl_vars['music']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['music']->value) {
$_smarty_tpl->tpl_vars['music']->do_else = false;
?>
        <li class="music-card">
          <div>
            <strong><?php if ((isset($_smarty_tpl->tpl_vars['music']->value['singer'])) && $_smarty_tpl->tpl_vars['music']->value['singer']) {?>Artist:<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['music']->value['singer'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Unknown Singer<?php }?></strong><br>
            <strong><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['music']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
 - <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['music']->value['filename'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
          </div>
          <audio controls preload="none" style="width: 100%; margin-top: 5px;">
            <source src="/photos/plugins/MusicManager/uploads/<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['music']->value['category'], ENT_QUOTES, 'UTF-8', true);?>
/<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['music']->value['filename'], ENT_QUOTES, 'UTF-8', true);?>
" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          <div class="button-row">
            <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
">
              <input type="hidden" name="music_id" value="<?php echo $_smarty_tpl->tpl_vars['music']->value['id'];?>
">
              <button type="submit" name="edit_music" class="icon-button">
                <i class="icon fas fa-edit edit-icon"></i> Edit
              </button>
            </form>
            <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
">
              <input type="hidden" name="music_id" value="<?php echo $_smarty_tpl->tpl_vars['music']->value['id'];?>
">
              <button type="submit" name="delete_music" class="icon-button">
                <i class="icon fas fa-trash-alt delete-icon"></i> Delete
              </button>
            </form>
          </div>
        </li>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php } else { ?>
    <p>No music uploaded yet in this category. Please upload music files to display them here.</p>
<?php }?>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"><?php }
}
