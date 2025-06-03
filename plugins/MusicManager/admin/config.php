<?php
defined('SKELETON_PATH') or die('Hacking attempt!');

global $template, $prefixeTable;

// Valid music categories
$valid_categories = ['raya', 'awrs', 'hura3', 'kuda', 'kunama'];

// Function to create the music table if it doesn't exist
function skeleton_create_music_table($prefixeTable)
{
    $table_name = $prefixeTable . 'music_manager_musics';

    $query = "
        CREATE TABLE IF NOT EXISTS {$table_name} (
            id SERIAL PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            singer VARCHAR(255),
            filename VARCHAR(255) NOT NULL,
            category VARCHAR(50) NOT NULL,
            uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    pwg_query($query);
}

// Call table creation on plugin init
skeleton_create_music_table($prefixeTable);

// Get category from GET parameter 'r'
$selected_category = null;
if (isset($_GET['r']) && !empty($_GET['r'])) {
    $requested_cat = strtolower(trim($_GET['r']));
    if (in_array($requested_cat, $valid_categories)) {
        $selected_category = $requested_cat;
    } else {
        $selected_category = null;
    }
}

if ($selected_category === null) {
    // Default category if missing or invalid
    $selected_category = 'raya';
}

// Load plugin admin template config.tpl
$template_file = dirname(__FILE__) . '/template/config.tpl';
if (!file_exists($template_file)) {
    die('Template file not found: ' . $template_file);
}

$template->set_filenames([
    'plugin_admin_content' => $template_file
]);

$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');

load_language('plugin.lang', SKELETON_PATH);

$my_base_url = get_root_url() . 'admin.php?page=plugin-' . basename(dirname(__FILE__));

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$upload_dir = PHPWG_ROOT_PATH . 'plugins/MusicManager/uploads/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

if (isset($_POST['submit_music'])) {
    handle_music_upload($selected_category, $upload_dir, $prefixeTable);
}
if (isset($_POST['delete_music'])) {
    $music_id = intval($_POST['music_id']);
    $query = "SELECT filename, category FROM {$prefixeTable}music_manager_musics WHERE id = {$music_id}";
    $result = pwg_query($query);
    $music_to_delete = pwg_db_fetch_assoc($result);

    if ($music_to_delete) {
        $delete_query = "DELETE FROM {$prefixeTable}music_manager_musics WHERE id = {$music_id}";
        pwg_query($delete_query);

        $file_path = $upload_dir . $music_to_delete['category'] . '/' . $music_to_delete['filename'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    // Redirect to the current page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
if (isset($_POST['edit_music'])) {
    $music_id = intval($_POST['music_id']);
    $query = "SELECT * FROM {$prefixeTable}music_manager_musics WHERE id = {$music_id}";
    $result = pwg_query($query);
    $music_to_edit = pwg_db_fetch_assoc($result);
}

if (isset($_POST['update_music'])) {
    $music_id = intval($_POST['music_id']);
    $title = pwg_db_real_escape_string($_POST['title']);
    $description = pwg_db_real_escape_string($_POST['description']);
    $singer = pwg_db_real_escape_string($_POST['singer']);

    $query = "SELECT filename, category FROM {$prefixeTable}music_manager_musics WHERE id = {$music_id}";
    $result = pwg_query($query);
    $music_to_update = pwg_db_fetch_assoc($result);

    $update_query = "
        UPDATE {$prefixeTable}music_manager_musics
        SET title = '{$title}', description = '{$description}', singer = '{$singer}'
        WHERE id = {$music_id}";
    pwg_query($update_query);

    if (!empty($_FILES['music_file']['name'])) {
        $filename = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', basename($_FILES['music_file']['name']));
        $category_dir = $upload_dir . $music_to_update['category'] . '/';
        $target_path = $category_dir . $filename;

        if (move_uploaded_file($_FILES['music_file']['tmp_name'], $target_path)) {
            $old_file_path = $category_dir . $music_to_update['filename'];
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }

            $update_filename_query = "
                UPDATE {$prefixeTable}music_manager_musics
                SET filename = '{$filename}'
                WHERE id = {$music_id}";
            pwg_query($update_filename_query);
        }
    }

 header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

// Fetch music list for selected category
$query = "SELECT * FROM {$prefixeTable}music_manager_musics WHERE category = '" . pwg_db_real_escape_string($selected_category) . "' ORDER BY uploaded_on DESC";
$result = pwg_query($query);
$music_list = [];
while ($row = pwg_db_fetch_assoc($result)) {
    $music_list[] = $row;
}

// If no music found, assign a flag
$no_music_found = empty($music_list);

$template->assign([
    'selected_category' => $selected_category,
    'valid_categories' => $valid_categories,
    'music_list' => $music_list,
    'music_to_edit' => isset($music_to_edit) ? $music_to_edit : null,
    'my_base_url' => $my_base_url,
    'no_music_found' => $no_music_found,
]);

function handle_music_upload($category, $upload_dir, $prefixeTable)
{
    if (isset($_SESSION['uploaded'])) {
        return;
    }

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $singer = $_POST['singer'] ?? '';

    if (empty($_FILES['music_file']['name'])) {
        echo '<script>alert("No file was uploaded. Please select a music file.");</script>';
        return;
    }

    $filename = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', basename($_FILES['music_file']['name']));
    $category_dir = $upload_dir . $category . '/';

    if (!file_exists($category_dir)) {
        mkdir($category_dir, 0755, true);
    }

    $target_path = $category_dir . $filename;

    if (move_uploaded_file($_FILES['music_file']['tmp_name'], $target_path)) {
        $escaped_title = pwg_db_real_escape_string($title);
        $escaped_description = pwg_db_real_escape_string($description);
        $escaped_singer = pwg_db_real_escape_string($singer);
        $query = "
            INSERT INTO {$prefixeTable}music_manager_musics
            (title, description, singer, filename, category, uploaded_on)
            VALUES ('{$escaped_title}', '{$escaped_description}', '{$escaped_singer}', '{$filename}', '{$category}', NOW())";
        pwg_query($query);

        $_SESSION['uploaded'] = true;

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        echo '<script>alert("Failed to move the uploaded file. Please try again.");</script>';
    }
}

if (!isset($_POST['submit_music'])) {
    unset($_SESSION['uploaded']);
}
