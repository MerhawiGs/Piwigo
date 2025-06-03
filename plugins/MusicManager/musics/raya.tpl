<style>
  :root {
    --primary-color: #3b5998;
    --primary-hover: #2e477a;
    --bg-color: #f9f9f9;
    --card-bg: #ffffff;
    --border-radius: 10px;
    --shadow: rgba(0, 0, 0, 0.15);
    --text-color: #333333;
    --input-border: #e1e1e1;
    --hover-bg: #f1f1f1;
    --left-padding: 20px;
  }

  body {
    padding-left: var(--left-padding);
    font-family: Arial, sans-serif;
    background-color: var(--bg-color);
    color: var(--text-color);
  }

  .kuda-container {
    background-color: var(--bg-color);
    padding: 40px;
    border-radius: var(--border-radius);
    box-shadow: 0 4px 15px var(--shadow);
    max-width: 1200px;
    margin: 40px auto;
  }

  .kuda-title {
    color: var(--primary-color);
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-size: 2.8rem;
    text-align: left;
    padding-left: var(--left-padding);
  }

  .kuda-description {
    color: var(--text-color);
    margin-bottom: 2rem;
    font-size: 1.3rem;
    text-align: left;
    padding-left: var(--left-padding);
  }

  .kuda-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
  }

  .kuda-card {
    background: var(--card-bg);
    border-radius: var(--border-radius);
    box-shadow: 0 2px 10px var(--shadow);
    border: 1px solid var(--input-border);
    padding: 25px;
    flex: 1 1 calc(33.33% - 20px);
    min-width: 280px;
    display: flex;
    flex-direction: column;
    transition: background-color 0.3s, transform 0.2s;
  }

  .kuda-card:hover {
    background-color: var(--hover-bg);
    transform: translateY(-3px);
  }

  .kuda-card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-color);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
  }

  .kuda-card-singer {
    font-size: 1rem;
    color: #444;
    margin-bottom: 8px;
  }

  .kuda-card-filename {
    font-size: 0.9rem;
    color: #666666;
    margin-bottom: 12px;
    font-style: italic;
  }

  .kuda-audio {
    width: 100%;
    outline-color: var(--primary-color);
    margin-top: auto;
  }

  .kuda-alert {
    background-color: #ffeeba;
    border: 1px solid #ffd600;
    color: #856404;
    padding: 15px;
    border-radius: var(--border-radius);
    font-weight: 600;
    text-align: center;
  }

  @media (max-width: 768px) {
    .kuda-card {
      flex: 1 1 calc(50% - 20px);
    }
  }

  @media (max-width: 480px) {
    .kuda-card {
      flex: 1 1 100%;
    }
  }
</style>

<div class="kuda-container">
  <h2 class="kuda-title">{$CATEGORY} Music Collection</h2>
  <p class="kuda-description">Explore a selection of our favorite {$CATEGORY} tracks. Enjoy the music!</p>

  {if $MUSIC_LIST|@count > 0}
    <div class="kuda-row">
      {foreach from=$MUSIC_LIST item=music}
        <div class="kuda-card">
          <div class="kuda-card-title">🎵 Title:{$music.title|escape}</div>
          <div class="kuda-card-singer">👤 Singer: {$music.singer|escape}</div>
          <div class="kuda-card-filename">📁 File: {$music.filename|escape}</div>
          <audio class="kuda-audio" controls preload="none">
            <source src="{$music.url|escape}" type="audio/mpeg" />
            Your browser does not support the audio element.
          </audio>
        </div>
      {/foreach}
    </div>
  {else}
    <div class="kuda-alert">
      No music files found in the {$CATEGORY} folder.
    </div>
  {/if}
</div>
