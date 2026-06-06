<?php
// ── Gestione download calendario ──────────────────────────────────────────────
$flcError   = '';
$flcSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flc_key'])) {
    $key = trim($_POST['flc_key']);
    if (isValidFlc($key)) {
        $zipPath = __DIR__ . '/calendarioUdinese_2026_27_www_friulcoin_it.zip';
        if (file_exists($zipPath)) {
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="calendarioUdinese_2026_27_www_friulcoin_it.zip"');
            header('Content-Length: ' . filesize($zipPath));
            header('Pragma: no-cache');
            readfile($zipPath);
            exit;
        } else {
            $flcSuccess = true; // chiave ok ma zip non trovato server-side
        }
    } else {
        $flcError = 'Chiave FLC non valida. Verifica di aver copiato correttamente l\'indirizzo dal tuo portafogli.';
    }
}

/**
 * Validazione base indirizzo Friulcoin (FLC).
 * FLC è un fork di Litecoin: indirizzi base58, iniziano con 'F', 25–34 caratteri.
 */
function isValidFlc(string $addr): bool {
    if (strlen($addr) < 25 || strlen($addr) > 34) return false;
    if ($addr[0] !== 'F') return false;
    $base58 = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
    for ($i = 0; $i < strlen($addr); $i++) {
        if (strpos($base58, $addr[$i]) === false) return false;
    }
    return true;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Udinese Calcio – Calendario 2026/27 | Friulcoin</title>
<style>
  /* ── Reset & base ──────────────────────────────────────────── */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --nero:    #0a0a0a;
    --bianco:  #f5f5f5;
    --zebra1:  #1a1a1a;
    --zebra2:  #2e2e2e;
    --oro:     #d4af37;
    --testo:   #e8e8e8;
    --accent:  #ffffff;
    --muted:   #999;
    --success: #4caf50;
    --danger:  #e53935;
    --radius:  8px;
  }

  html { scroll-behavior: smooth; }

  body {
    background-color: var(--nero);
    color: var(--testo);
    font-family: 'Segoe UI', Arial, sans-serif;
    font-size: 16px;
    line-height: 1.6;
    min-height: 100vh;
  }

  /* ── Strisce zebrate in background ────────────────────────── */
  body::before {
    content: '';
    position: fixed; inset: 0;
    background: repeating-linear-gradient(
      -45deg,
      var(--nero)    0px, var(--nero)    28px,
      var(--zebra1)  28px, var(--zebra1) 56px
    );
    opacity: .35;
    pointer-events: none;
    z-index: 0;
  }

  /* ── Wrapper principale ────────────────────────────────────── */
  .page-wrap {
    position: relative; z-index: 1;
    max-width: 860px;
    margin: 0 auto;
    padding: 32px 20px 60px;
  }

  /* ── Header ────────────────────────────────────────────────── */
  header {
    text-align: center;
    padding-bottom: 28px;
    border-bottom: 2px solid var(--oro);
    margin-bottom: 36px;
  }

  header img.logo {
    width: 100px;
    height: 100px;
    object-fit: contain;
    display: block;
    margin: 0 auto 18px;
    filter: drop-shadow(0 0 12px rgba(212,175,55,.45));
  }

  header h1 {
    font-size: clamp(1.3rem, 4vw, 2rem);
    font-weight: 800;
    letter-spacing: .04em;
    color: var(--accent);
    text-transform: uppercase;
  }

  header p.sub {
    font-size: .95rem;
    color: var(--oro);
    margin-top: 4px;
    letter-spacing: .06em;
    text-transform: uppercase;
  }

  /* ── Sezione istruzioni ────────────────────────────────────── */
  .istruzioni {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: var(--radius);
    padding: 28px 32px;
    margin-bottom: 32px;
  }

  .istruzioni h2 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--oro);
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: 22px;
  }

  .step {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
    align-items: flex-start;
  }

  .step-num {
    background: var(--oro);
    color: var(--nero);
    font-weight: 800;
    font-size: .85rem;
    border-radius: 50%;
    min-width: 30px; height: 30px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
  }

  .step-body { flex: 1; }

  .step-body strong { color: var(--accent); }

  .step-body a {
    color: var(--oro);
    font-weight: 700;
    text-decoration: none;
    border-bottom: 1px dashed var(--oro);
    transition: opacity .2s;
  }
  .step-body a:hover { opacity: .75; }

  .sub-steps {
    margin-top: 8px;
    padding-left: 4px;
  }
  .sub-steps li {
    list-style: none;
    padding: 3px 0 3px 22px;
    position: relative;
    font-size: .95rem;
    color: #ccc;
  }
  .sub-steps li::before {
    content: attr(data-sub);
    position: absolute; left: 0;
    color: var(--oro);
    font-weight: 700;
    font-size: .8rem;
  }

  /* ── Preview immagini ──────────────────────────────────────── */
  .preview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 16px;
    margin: 24px 0 32px;
  }

  .preview-card {
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.12);
    border-radius: var(--radius);
    overflow: hidden;
    text-align: center;
  }

  .preview-card img {
    width: 100%;
    height: auto;
    display: block;
  }

  .preview-card .caption {
    padding: 8px;
    font-size: .78rem;
    color: var(--muted);
    letter-spacing: .05em;
    text-transform: uppercase;
  }

  /* ── Form FLC ──────────────────────────────────────────────── */
  .flc-section {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: var(--radius);
    padding: 28px 32px;
    margin-bottom: 32px;
  }

  .flc-section h2 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--oro);
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: 16px;
  }

  .flc-section label {
    display: block;
    font-size: .9rem;
    color: #bbb;
    margin-bottom: 8px;
  }

  .flc-section textarea {
    width: 100%;
    background: rgba(0,0,0,.5);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 6px;
    color: #fff;
    font-family: 'Courier New', monospace;
    font-size: .95rem;
    padding: 12px 14px;
    resize: vertical;
    min-height: 80px;
    outline: none;
    transition: border-color .2s;
  }
  .flc-section textarea:focus { border-color: var(--oro); }

  .btn-submit {
    margin-top: 14px;
    background: var(--oro);
    color: var(--nero);
    border: none;
    padding: 12px 32px;
    font-size: 1rem;
    font-weight: 800;
    border-radius: 6px;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: .06em;
    transition: opacity .2s, transform .1s;
  }
  .btn-submit:hover { opacity: .85; }
  .btn-submit:active { transform: scale(.97); }

  .msg-error {
    margin-top: 12px;
    background: rgba(229,57,53,.15);
    border: 1px solid var(--danger);
    border-radius: 6px;
    padding: 10px 14px;
    color: #ff6b6b;
    font-size: .9rem;
  }

  .msg-success {
    margin-top: 12px;
    background: rgba(76,175,80,.15);
    border: 1px solid var(--success);
    border-radius: 6px;
    padding: 10px 14px;
    color: #81c784;
    font-size: .9rem;
  }

  /* ── Google Calendar ───────────────────────────────────────── */
  .gcal-section {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: var(--radius);
    padding: 28px 32px;
    margin-bottom: 32px;
  }

  .gcal-section h2 {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--oro);
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: 16px;
  }

  .gcal-steps {
    padding-left: 0;
    list-style: none;
  }

  .gcal-steps li {
    padding: 6px 0 6px 28px;
    position: relative;
    color: #ccc;
    font-size: .95rem;
  }

  .gcal-steps li::before {
    content: '▸';
    position: absolute; left: 0;
    color: var(--oro);
  }

  /* ── Divisore ──────────────────────────────────────────────── */
  hr.divider {
    border: none;
    border-top: 2px solid rgba(212,175,55,.35);
    margin: 36px 0;
  }

  /* ── Zangi footer ──────────────────────────────────────────── */
  .zangi-box {
    background: rgba(212,175,55,.07);
    border: 1px solid rgba(212,175,55,.35);
    border-radius: var(--radius);
    padding: 20px 28px;
    text-align: center;
  }

  .zangi-box p {
    color: var(--testo);
    font-size: 1rem;
    line-height: 1.7;
  }

  .zangi-box strong { color: var(--oro); }

  .zangi-box .zangi-num {
    display: inline-block;
    margin-top: 10px;
    background: var(--oro);
    color: var(--nero);
    font-size: 1.1rem;
    font-weight: 800;
    padding: 8px 22px;
    border-radius: 40px;
    letter-spacing: .06em;
  }

  /* ── Responsive tweaks ─────────────────────────────────────── */
  @media (max-width: 540px) {
    .istruzioni, .flc-section, .gcal-section { padding: 20px 18px; }
    .page-wrap { padding: 20px 14px 48px; }
    .preview-grid { grid-template-columns: 1fr 1fr; }
  }
</style>
</head>
<body>
<div class="page-wrap">

  <!-- ── HEADER ─────────────────────────────────────────────── -->
  <header>
    <img class="logo" src="06.png" alt="Logo Udinese / Friulcoin">
    <h1>Calendario Udinese 2026/27</h1>
    <p class="sub">powered by Friulcoin &nbsp;·&nbsp; FLC</p>
  </header>

  <!-- ── ISTRUZIONI ─────────────────────────────────────────── -->
  <section class="istruzioni">
    <h2>Istruzioni</h2>

    <div class="step">
      <div class="step-num">1</div>
      <div class="step-body">
        Raggiungi il sito <a href="https://tunnel.libars.it" target="_blank" rel="noopener noreferrer">tunnel.libars.it</a>
      </div>
    </div>

    <div class="step">
      <div class="step-num">2</div>
      <div class="step-body">
        <strong>Crea il tuo portafogli</strong> (uno per persona):
        <ul class="sub-steps">
          <li data-sub="2a)">Inserisci un <strong>nome breve</strong></li>
          <li data-sub="2b)">Inserisci un <strong>codice PIN numerico di 6 cifre</strong></li>
          <li data-sub="2c)">Inserisci una <strong>password</strong> per eventualmente cambiare il PIN</li>
          <li data-sub="2d)">Risolvi la <strong>somma di verifica</strong> e premi <em>Spedisci</em></li>
        </ul>
      </div>
    </div>

    <div class="step">
      <div class="step-num">3</div>
      <div class="step-body">
        <strong>Accedi</strong> al tuo portafogli inserendo il tuo <em>nome</em> e il <em>PIN</em>
      </div>
    </div>

    <div class="step">
      <div class="step-num">4</div>
      <div class="step-body">
        Premi il pulsante <strong>PORTAFOGLI</strong> — vedrai una schermata simile a questa:
      </div>
    </div>

    <div class="step">
      <div class="step-num">5</div>
      <div class="step-body">
        Premi il pulsante <strong>CASSAFORTE</strong> — vedrai una schermata simile a questa:
      </div>
    </div>

    <div class="step">
      <div class="step-num">6</div>
      <div class="step-body">
        Premi <strong>TAP PER QR-CODE</strong> — vedrai una schermata simile a questa:
      </div>
    </div>

    <div class="step">
      <div class="step-num">7</div>
      <div class="step-body">
        Premi <strong>COPIA</strong> — l'indirizzo FLC verrà copiato negli appunti:
      </div>
    </div>

  </section>

  <!-- ── PREVIEW IMMAGINI ────────────────────────────────────── -->
  <div class="preview-grid">
    <div class="preview-card">
      <img src="01.png" alt="Step 4 – PORTAFOGLI">
      <div class="caption">4 · Portafogli</div>
    </div>
    <div class="preview-card">
      <img src="02.png" alt="Step 5 – CASSAFORTE">
      <div class="caption">5 · Cassaforte</div>
    </div>
    <div class="preview-card">
      <img src="03.png" alt="Step 6 – TAP PER QR-CODE">
      <div class="caption">6 · QR-Code</div>
    </div>
    <div class="preview-card">
      <img src="04.png" alt="Step 7 – COPIA">
      <div class="caption">7 · Copia</div>
    </div>
  </div>

  <!-- ── STEP 8 + FORM FLC ───────────────────────────────────── -->
  <section class="flc-section">
    <h2>8 · Incolla e scarica il calendario</h2>

    <form method="POST" action="">
      <label for="flc_key">
        Incolla qui il tuo indirizzo <strong>Friulcoin (FLC)</strong> copiato al passo 7:
      </label>
      <textarea
        id="flc_key"
        name="flc_key"
        placeholder="Es. FxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxXX"
        autocomplete="off"
        autocorrect="off"
        spellcheck="false"
      ><?php echo htmlspecialchars($_POST['flc_key'] ?? ''); ?></textarea>

      <br>
      <button type="submit" class="btn-submit">✓ Verifica e Scarica Calendario</button>
    </form>

    <?php if ($flcError): ?>
      <div class="msg-error">⚠ <?php echo htmlspecialchars($flcError); ?></div>
    <?php endif; ?>

    <?php if ($flcSuccess): ?>
      <div class="msg-success">
        ✅ Chiave FLC valida! Il file ZIP verrà scaricato automaticamente.<br>
        Se il download non parte, contatta l'amministratore.
      </div>
    <?php endif; ?>
  </section>

  <!-- ── GOOGLE CALENDAR ────────────────────────────────────── -->
  <section class="gcal-section">
    <h2>Come importare il calendario su Google Calendar</h2>
    <ul class="gcal-steps">
      <li>Estrai (tasto destro sul file appena scaricato) il file <strong>.ics</strong></li>
      <li>Su Google Calendar (da computer): apri <strong>calendar.google.com</strong></li>
      <li>In alto a destra clicca sull'icona a forma di <strong>ingranaggio → Impostazioni</strong></li>
      <li>Dal menu a sinistra seleziona <strong>Importazione ed esportazione</strong></li>
      <li>Clicca su <strong>Seleziona il file dal computer</strong> e carica il file <em>.ics</em></li>
      <li>Scegli il calendario in cui aggiungere gli eventi e clicca su <strong>Importa</strong></li>
    </ul>
  </section>

  <!-- ── DIVISORE ───────────────────────────────────────────── -->
  <hr class="divider">

  <!-- ── ZANGI ──────────────────────────────────────────────── -->
  <div class="zangi-box">
    <p>
      <strong>Vuoi il file ICS Google Calendar per altre squadre?</strong><br>
      Scarica l'app <strong>ZANGI</strong> e fai richiesta in <strong>CHAT</strong> al numero:
    </p>
    <div class="zangi-num">10-6320-9323</div>
  </div>

</div><!-- /page-wrap -->
</body>
</html>
