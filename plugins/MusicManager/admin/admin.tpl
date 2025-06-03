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
    {foreach from=$valid_categories item=cat}
      {assign var=label value=$cat|capitalize}
      {if $cat == 'hura'}{assign var=label value='Hura Tembien'}{/if}
      <a href="admin.php?page=plugin-music_manager&r={$cat}"
         class="{if $selected_category == $cat}active{/if}">
        <i class="icon fas fa-folder"></i> {$label}
      </a>
    {/foreach}
  </div>

  <h3>Manage music for category:
    {if $selected_category == 'hura'}
      Hura Tembien
    {else}
      {$selected_category|capitalize}
    {/if}
  </h3>

  {if isset($music_to_edit)}
    <h2>✏️ Edit Music</h2>
    <form method="POST" enctype="multipart/form-data" action="">
        <input type="hidden" name="music_id" value="{$music_to_edit.id}">
        <label for="title">Title: <span style="color: red;">*</span></label>
        <input type="text" name="title" id="title" value="{$music_to_edit.title}" required>

        <label for="singer">Singer:</label>
        <input type="text" name="singer" id="singer" value="{$music_to_edit.singer}">

        <label for="description">Description:</label>
        <textarea name="description" id="description">{$music_to_edit.description}</textarea>

        <label for="music_file">Upload New File (optional):</label>
        <input type="file" name="music_file" id="music_file" accept=".mp3,.wav">

        <input type="submit" name="update_music" value="Update Music">
    </form>
  {else}
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
  {/if}

  {if $music_list|@count > 0}
    <h4>🎵 Uploaded Musics:</h4>
    <ul class="music-list">
      {foreach from=$music_list item=music}
        <li class="music-card">
          <div>
            <strong>{if isset($music.singer) && $music.singer}Artist:{$music.singer|escape}{else}Unknown Singer{/if}</strong><br>
            <strong>{$music.title|escape} - {$music.filename|escape}</strong>
          </div>
          <audio controls preload="none" style="width: 100%; margin-top: 5px;">
            <source src="/photos/plugins/music_manager/uploads/{$music.category|escape}/{$music.filename|escape}" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          <div class="button-row">
            <form method="POST" action="{$smarty.server.REQUEST_URI}">
              <input type="hidden" name="music_id" value="{$music.id}">
              <button type="submit" name="edit_music" class="icon-button">
                <i class="icon fas fa-edit edit-icon"></i> Edit
              </button>
            </form>
            <form method="POST" action="{$smarty.server.REQUEST_URI}">
              <input type="hidden" name="music_id" value="{$music.id}">
              <button type="submit" name="delete_music" class="icon-button">
                <i class="icon fas fa-trash-alt delete-icon"></i> Delete
              </button>
            </form>
          </div>
        </li>
      {/foreach}
    </ul>
  {else}
    <p>No music uploaded yet in this category. Please upload music files to display them here.</p>
  {/if}
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">