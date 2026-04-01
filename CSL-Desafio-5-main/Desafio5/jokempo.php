<?php
$opcoes = [1 => 'Pedra', 2 => 'Papel', 3 => 'Tesoura'];
$emojis = [1 => '🪨', 2 => '📄', 3 => '✂️'];
$gifs   = [
    1 => 'https://media.giphy.com/media/3o7TKSjRrfIPjeiVyM/giphy.gif', // rock
    2 => 'https://media.giphy.com/media/26FLdmIp6wJr91JAI/giphy.gif', // paper
    3 => 'https://media.giphy.com/media/3o6Mb4Dj6CCGKX6eKs/giphy.gif', // scissors
];

$resultado     = null;
$jogador_id    = null;
$computador_id = null;
$msg           = '';
$classe_res    = '';

function comparar(int $j, int $c): string {
    if ($j === $c) return 'empate';
    $vitorias = [1 => 3, 2 => 1, 3 => 2]; // Pedra bate Tesoura, Papel bate Pedra, Tesoura bate Papel
    return ($vitorias[$j] === $c) ? 'vitoria' : 'derrota';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jogada'])) {
    $jogador_id    = intval($_POST['jogada']);
    $computador_id = rand(1, 3);

    if (isset($opcoes[$jogador_id])) {
        $resultado  = comparar($jogador_id, $computador_id);
        switch ($resultado) {
            case 'vitoria':
                $msg = '🏆 Você Venceu!';
                $classe_res = 'vitoria';
                break;
            case 'derrota':
                $msg = '💀 Você Perdeu!';
                $classe_res = 'derrota';
                break;
            default:
                $msg = '🤝 Empate!';
                $classe_res = 'empate';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jo-Ken-Pô</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
<style>
  :root {
  --bg1: #0f172a;
  --bg2: #020617;
  --glass: rgba(255, 255, 255, 0.05);
  --border: rgba(255, 255, 255, 0.08);
  --neon1: #00f5ff;
  --neon2: #8b5cf6;
  --win: #22c55e;
  --lose: #ef4444;
  --tie: #f59e0b;
  --text: #e5e7eb;
  --muted: #94a3b8;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  min-height: 100vh;
  font-family: 'Nunito', sans-serif;
  color: var(--text);
  background:
    radial-gradient(circle at 20% 20%, #8b5cf633, transparent 40%),
    radial-gradient(circle at 80% 80%, #00f5ff33, transparent 40%),
    linear-gradient(160deg, var(--bg1), var(--bg2));
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 30px 15px 60px;
}

/* TITULO */
.titulo-jogo {
  font-family: 'Bebas Neue', cursive;
  font-size: clamp(3rem, 9vw, 5rem);
  letter-spacing: .15em;
  background: linear-gradient(90deg, var(--neon1), var(--neon2));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-bottom: 5px;
  text-shadow: 0 0 30px #8b5cf655;
}

.sub {
  color: var(--muted);
  font-size: .8rem;
  letter-spacing: .2em;
  margin-bottom: 30px;
}

/* PLACAR */
.score-bar {
  display: flex;
  gap: 25px;
  margin-bottom: 30px;
  background: var(--glass);
  border: 1px solid var(--border);
  backdrop-filter: blur(10px);
  border-radius: 40px;
  padding: 10px 30px;
}

.score-bar .s {
  font-family: 'Bebas Neue', cursive;
  font-size: 1.8rem;
}

.w { color: var(--win); }
.l { color: var(--lose); }
.t { color: var(--tie); }

.divider {
  opacity: .3;
}

/* ARENA */
.arena {
  width: 100%;
  max-width: 650px;
  background: var(--glass);
  border: 1px solid var(--border);
  backdrop-filter: blur(14px);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 0 40px #00000088;
  margin-bottom: 25px;
}

.arena-top {
  display: grid;
  grid-template-columns: 1fr auto 1fr;
  min-height: 220px;
}

.fighter {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.fighter-label {
  font-size: .7rem;
  letter-spacing: .2em;
  color: var(--muted);
}

/* AVATAR */
.gif-wrap {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  overflow: hidden;
  border: 2px solid var(--border);
  background: #020617;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5rem;
  transition: .3s;
}

.gif-wrap.player-win {
  border-color: var(--win);
  box-shadow: 0 0 25px var(--win);
}

.gif-wrap.cpu-win {
  border-color: var(--lose);
  box-shadow: 0 0 25px var(--lose);
}

.gif-wrap.tie-both {
  border-color: var(--tie);
  box-shadow: 0 0 25px var(--tie);
}

/* VS */
.vs {
  font-family: 'Bebas Neue', cursive;
  font-size: 2.5rem;
  opacity: .2;
}

/* RESULTADO */
.result-banner {
  padding: 18px;
  text-align: center;
  font-family: 'Bebas Neue', cursive;
  font-size: 2rem;
  letter-spacing: .1em;
  animation: zoom .3s ease;
}

@keyframes zoom {
  from { transform: scale(.7); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}

.result-banner.vitoria { color: var(--win); }
.result-banner.derrota { color: var(--lose); }
.result-banner.empate  { color: var(--tie); }

.detail-row {
  display: flex;
  justify-content: center;
  gap: 10px;
  padding: 10px;
  color: var(--muted);
  font-size: .8rem;
  border-top: 1px solid var(--border);
}

.chip {
  background: #020617;
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 4px 14px;
}

/* BOTÕES */
.escolha-section {
  text-align: center;
}

.escolha-section h2 {
  font-family: 'Bebas Neue', cursive;
  letter-spacing: .15em;
  color: var(--muted);
  margin-bottom: 15px;
}

.opcoes {
  display: flex;
  gap: 15px;
  justify-content: center;
  flex-wrap: wrap;
}

/* BOTÕES OPÇÃO */
.btn-opcao {
  background: var(--glass);
  border: 1px solid var(--border);
  backdrop-filter: blur(10px);
  color: white;
  font-weight: 700;
  padding: 18px 26px;
  border-radius: 14px;
  cursor: pointer;
  transition: .25s;
  min-width: 120px;
}

.btn-opcao:hover {
  transform: translateY(-5px) scale(1.05);
  border-color: var(--neon1);
  box-shadow: 0 0 20px var(--neon1);
}

.btn-opcao .icone {
  font-size: 2.2rem;
}

/* BOTÃO REINICIAR */
.btn-novo {
  margin-top: 10px;
  display: inline-block;
  padding: 12px 35px;
  border-radius: 30px;
  border: none;
  background: linear-gradient(90deg, var(--neon1), var(--neon2));
  color: white;
  font-family: 'Bebas Neue', cursive;
  font-size: 1.2rem;
  letter-spacing: .1em;
  cursor: pointer;
  transition: .3s;
}

.btn-novo:hover {
  transform: scale(1.07);
  box-shadow: 0 0 25px var(--neon2);
}

/* REGRAS */
.rules {
  margin-top: 30px;
  font-size: .75rem;
  color: #64748b;
  text-align: center;
}
</style>
</head>
<body>

<div class="titulo-jogo">JO-KEN-PÔ</div>
<div class="sub">Pedra · Papel · Tesoura — vs Computador</div>

<!-- PLACAR (session simples via hidden fields acumulado no PHP não persiste,
     então usamos localStorage via JS para manter pontuação) -->
<div class="score-bar">
  <div><span class="l">V</span> <span class="s w" id="sc-v">0</span></div>
  <div class="divider">|</div>
  <div><span class="l">E</span> <span class="s t" id="sc-e">0</span></div>
  <div class="divider">|</div>
  <div><span class="l">D</span> <span class="s l" id="sc-d">0</span></div>
</div>

<!-- ARENA -->
<div class="arena">
  <div class="arena-top">
    <!-- PLAYER -->
    <div class="fighter player">
      <div class="fighter-label">Você</div>
      <div class="gif-wrap <?= $resultado === 'vitoria' ? 'player-win' : ($resultado === 'empate' ? 'tie-both' : ($resultado === 'derrota' ? 'cpu-win' : '')) ?>" id="gif-player">
        <?php if ($jogador_id && isset($gifs[$jogador_id])): ?>
          <img src="<?= $gifs[$jogador_id] ?>" alt="<?= $opcoes[$jogador_id] ?>">
        <?php else: ?>
          🤔
        <?php endif; ?>
      </div>
      <div class="fighter-name"><?= $jogador_id ? $emojis[$jogador_id] . ' ' . $opcoes[$jogador_id] : '???' ?></div>
    </div>
    <!-- VS -->
    <div class="vs-col"><div class="vs">VS</div></div>
    <!-- CPU -->
    <div class="fighter cpu">
      <div class="fighter-label">Computador</div>
      <div class="gif-wrap <?= $resultado === 'derrota' ? 'player-win' : ($resultado === 'empate' ? 'tie-both' : ($resultado === 'vitoria' ? 'cpu-win' : '')) ?>" id="gif-cpu">
        <?php if ($computador_id && isset($gifs[$computador_id])): ?>
          <img src="<?= $gifs[$computador_id] ?>" alt="<?= $opcoes[$computador_id] ?>">
        <?php else: ?>
          🤖
        <?php endif; ?>
      </div>
      <div class="fighter-name"><?= $computador_id ? $emojis[$computador_id] . ' ' . $opcoes[$computador_id] : '???' ?></div>
    </div>
  </div>

  <?php if ($resultado): ?>
    <div class="result-banner <?= $classe_res ?>"><?= $msg ?></div>
    <div class="detail-row">
      <span class="chip">Você: <?= $opcoes[$jogador_id] ?></span>
      <span>⚡</span>
      <span class="chip">CPU: <?= $opcoes[$computador_id] ?></span>
    </div>
  <?php else: ?>
    <div class="waiting">
      <div class="dots"><span>✊</span><span>🖐</span><span>✌️</span></div>
      <span>Escolha sua jogada abaixo!</span>
    </div>
  <?php endif; ?>
</div>

<!-- BOTÕES DE ESCOLHA -->
<div class="escolha-section">
  <?php if ($resultado): ?>
    <h2>Jogar Novamente?</h2>
  <?php else: ?>
    <h2>Escolha sua Jogada</h2>
  <?php endif; ?>

  <div class="opcoes">
    <!-- Pedra -->
    <form method="POST" class="opcao-form">
      <input type="hidden" name="jogada" value="1">
      <button type="submit" class="btn-opcao pedra">
        <span class="icone">🪨</span>
        <span>Pedra</span>
      </button>
    </form>
    <!-- Papel -->
    <form method="POST" class="opcao-form">
      <input type="hidden" name="jogada" value="2">
      <button type="submit" class="btn-opcao papel">
        <span class="icone">📄</span>
        <span>Papel</span>
      </button>
    </form>
    <!-- Tesoura -->
    <form method="POST" class="opcao-form">
      <input type="hidden" name="jogada" value="3">
      <button type="submit" class="btn-opcao tesoura">
        <span class="icone">✂️</span>
        <span>Tesoura</span>
      </button>
    </form>
  </div>

  <?php if ($resultado): ?>
    <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn-novo">↺ Reiniciar Placar</a>
  <?php endif; ?>
</div>

<div class="rules">
  🪨 Pedra quebra Tesoura &nbsp;·&nbsp; 📄 Papel cobre Pedra &nbsp;·&nbsp; ✂️ Tesoura corta Papel
</div>

<script>
// Placar via localStorage
const key = 'jkp_score';
let sc = JSON.parse(localStorage.getItem(key) || '{"v":0,"e":0,"d":0}');

// resultado vindo do PHP
const res = '<?= $resultado ?? '' ?>';
if (res === 'vitoria') sc.v++;
else if (res === 'empate') sc.e++;
else if (res === 'derrota') sc.d++;
if (res) localStorage.setItem(key, JSON.stringify(sc));

// Resetar se clicou em "Reiniciar"
document.querySelector('.btn-novo')?.addEventListener('click', () => {
  localStorage.removeItem(key);
});

document.getElementById('sc-v').textContent = sc.v;
document.getElementById('sc-e').textContent = sc.e;
document.getElementById('sc-d').textContent = sc.d;
</script>
</body>
</html>