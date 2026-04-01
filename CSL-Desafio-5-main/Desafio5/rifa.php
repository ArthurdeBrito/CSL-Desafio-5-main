<?php
$campanha = '';
$premio = '';
$valor = '';
$quantidade = '';
$bilhetes = [];
$gerado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $campanha   = htmlspecialchars(trim($_POST['campanha'] ?? ''));
    $premio     = htmlspecialchars(trim($_POST['premio'] ?? ''));
    $valor      = htmlspecialchars(trim($_POST['valor'] ?? ''));
    $quantidade = intval($_POST['quantidade'] ?? 0);

    if ($quantidade > 0 && $quantidade <= 1000) {
        for ($i = 1; $i <= $quantidade; $i++) {
            $bilhetes[] = str_pad($i, 3, "0", STR_PAD_LEFT);
        }
        $gerado = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gerador de Rifas</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
 :root {
  --bg: #eef2ff;
  --card: rgba(255,255,255,0.7);
  --border: rgba(0,0,0,0.08);
  --primary: #4f46e5;
  --primary2: #06b6d4;
  --text: #0f172a;
  --muted: #64748b;
  --success: #16a34a;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'DM Sans', sans-serif;
  background:
    radial-gradient(circle at 20% 20%, #6366f122, transparent 40%),
    radial-gradient(circle at 80% 80%, #06b6d422, transparent 40%),
    var(--bg);
  color: var(--text);
  padding: 40px 20px;
}

/* HEADER */
.page-header {
  text-align: center;
  margin-bottom: 40px;
}

.page-header h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2.5rem, 5vw, 3.5rem);
  background: linear-gradient(90deg, var(--primary), var(--primary2));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.page-header p {
  color: var(--muted);
  margin-top: 8px;
}

/* FORM */
.form-card {
  max-width: 700px;
  margin: auto;
  background: var(--card);
  backdrop-filter: blur(12px);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.08);
}

.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px;
}

.full {
  grid-column: 1 / -1;
}

label {
  font-size: .75rem;
  text-transform: uppercase;
  letter-spacing: .1em;
  color: var(--muted);
  margin-bottom: 4px;
  display: block;
}

input {
  width: 100%;
  padding: 12px;
  border-radius: 8px;
  border: 1px solid var(--border);
  background: #fff;
  font-size: .95rem;
}

input:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px #6366f122;
}

/* BOTÃO */
.btn-gerar {
  margin-top: 20px;
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 10px;
  font-family: 'Playfair Display', serif;
  font-size: 1.1rem;
  background: linear-gradient(90deg, var(--primary), var(--primary2));
  color: white;
  cursor: pointer;
  transition: .2s;
}

.btn-gerar:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px #6366f144;
}

/* RIFA */
.rifa-section {
  max-width: 1100px;
  margin: 50px auto;
}

.rifa-header {
  text-align: center;
  margin-bottom: 30px;
}

.titulo {
  font-family: 'Playfair Display', serif;
  font-size: 2.2rem;
  color: var(--primary);
}

.premio-nome {
  font-size: 1.1rem;
  margin-top: 5px;
}

.valor-info {
  display: inline-block;
  margin-top: 10px;
  background: var(--primary);
  color: white;
  padding: 6px 16px;
  border-radius: 20px;
  font-size: .85rem;
}

/* GRID BILHETES */
.bilhetes-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
  gap: 12px;
}

.bilhete {
  background: white;
  border-radius: 10px;
  border: 1px solid var(--border);
  padding: 12px;
  text-align: center;
  box-shadow: 0 4px 14px rgba(0,0,0,0.06);
  transition: .2s;
}

.bilhete:hover {
  transform: scale(1.05);
  border-color: var(--primary);
}

.bilhete-num {
  font-family: 'Playfair Display', serif;
  font-size: 1.8rem;
  color: var(--primary);
}

.bilhete-campaign {
  font-size: .65rem;
  color: var(--muted);
}

.bilhete-valor {
  font-size: .75rem;
  margin-top: 4px;
  color: var(--success);
}

/* PRINT BUTTON */
.print-bar {
  text-align: center;
  margin-top: 30px;
}

.btn-print {
  padding: 12px 30px;
  border-radius: 30px;
  border: none;
  background: linear-gradient(90deg, var(--primary), var(--primary2));
  color: white;
  font-family: 'Playfair Display', serif;
  font-size: 1rem;
  cursor: pointer;
  transition: .2s;
}

.btn-print:hover {
  transform: scale(1.05);
}

/* PRINT */
@media print {
  body { background: white; }
  .form-card, .print-bar, .page-header { display: none; }
  .bilhete { break-inside: avoid; }
  .bilhetes-grid { grid-template-columns: repeat(5, 1fr); }
}
</style>
</head>
<body>

<header class="page-header">
  <div class="badge">✦ Sistema de Rifas ✦</div>
  <h1>Gerador de Bilhetes</h1>
  <p>Crie sua rifa numerada em segundos</p>
</header>

<div class="form-card">
  <form method="POST" action="">
    <div class="form-grid">
      <div class="full">
        <label for="campanha">🏆 Nome da Campanha / Rifa</label>
        <input type="text" id="campanha" name="campanha" placeholder="Ex: Rifa Beneficente 2025" required value="<?= $campanha ?>">
      </div>
      <div class="full">
        <label for="premio">🎁 Prêmio(s) a Ser(em) Rifado(s)</label>
        <input type="text" id="premio" name="premio" placeholder="Ex: TV 55&quot;, Notebook, Moto 0km" required value="<?= $premio ?>">
      </div>
      <div>
        <label for="valor">💰 Valor do Bilhete (R$)</label>
        <input type="text" id="valor" name="valor" placeholder="Ex: 10,00" required value="<?= $valor ?>">
      </div>
      <div>
        <label for="quantidade">🎟️ Quantidade de Bilhetes</label>
        <input type="number" id="quantidade" name="quantidade" min="1" max="1000" placeholder="Ex: 100" required value="<?= $quantidade ?>">
      </div>
    </div>
    <button type="submit" class="btn-gerar">✦ Gerar Bilhetes ✦</button>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($quantidade <= 0 || $quantidade > 1000)): ?>
      <div class="error">⚠️ Informe uma quantidade entre 1 e 1000 bilhetes.</div>
    <?php endif; ?>
  </form>
</div>

<?php if ($gerado): ?>
<section class="rifa-section" id="bilhetes">

  <div class="rifa-header">
    <div class="titulo"><?= $campanha ?></div>
    <div class="premio-label">Prêmio</div>
    <div class="premio-nome"><?= $premio ?></div>
    <span class="valor-info">Valor do bilhete: R$ <?= $valor ?></span>
  </div>

  <div class="stats-bar">
    <div class="stat"><div class="n"><?= $quantidade ?></div><div class="l">Bilhetes</div></div>
    <div class="stat"><div class="n">001</div><div class="l">Início</div></div>
    <div class="stat"><div class="n"><?= str_pad($quantidade, 3, "0", STR_PAD_LEFT) ?></div><div class="l">Fim</div></div>
  </div>

  <div class="bilhetes-grid">
    <?php foreach ($bilhetes as $num): ?>
    <div class="bilhete" style="animation-delay: <?= (intval($num) * 0.008) ?>s">
      <div class="bilhete-stub"><span>Sorteio</span></div>
      <div class="bilhete-body">
        <div class="bilhete-campaign"><?= mb_strimwidth($campanha, 0, 20, '…') ?></div>
        <div class="bilhete-num"><?= $num ?></div>
        <div class="bilhete-valor">R$ <?= $valor ?></div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="print-bar">
    <button class="btn-print" onclick="window.print()">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/>
      </svg>
      Imprimir Bilhetes
    </button>
  </div>

</section>
<?php endif; ?>

</body>
</html>