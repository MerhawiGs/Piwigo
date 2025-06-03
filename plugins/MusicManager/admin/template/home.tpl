{combine_css path=$SKELETON_PATH|@cat:"admin/template/style.css"}

{html_style}
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
{/html_style}

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
