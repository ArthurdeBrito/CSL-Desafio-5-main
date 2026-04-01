# 🎟️ Projetos PHP — Rifa & Jo-Ken-Pô

Dois projetos desenvolvidos em PHP puro como atividades práticas de programação web. Cada projeto explora conceitos fundamentais como formulários, lógica condicional, laços de repetição e estilização com CSS.

---

## 📁 Estrutura de Arquivos

```
/
├── rifa.php        # Gerador de bilhetes de rifa numerados
├── jokempo.php     # Jogo de Pedra, Papel e Tesoura
└── README.md       # Este arquivo
```

---

## 🎟️ Atividade 1 — Gerador de Rifas

### Descrição

Sistema web para geração automática de bilhetes de rifa numerados. O usuário preenche as informações da campanha e o sistema gera todos os bilhetes formatados, prontos para visualização ou impressão.

### Funcionalidades

- ✅ Formulário com campos para campanha, prêmio(s), valor e quantidade de bilhetes
- ✅ Geração de bilhetes numerados com 3 dígitos e zeros à esquerda (`001`, `002` ... `999`)
- ✅ Limite de 1 a 1.000 bilhetes por geração
- ✅ Design de bilhete realista com canhoto lateral destacável
- ✅ Animação escalonada na exibição dos bilhetes
- ✅ Painel de resumo com total de bilhetes, numeração inicial e final
- ✅ Botão de impressão com estilos dedicados para `@media print`
- ✅ Validação básica dos campos do formulário
- ✅ Proteção contra XSS com `htmlspecialchars()`

### Conceitos PHP Utilizados

| Recurso | Uso no projeto |
|---|---|
| `$_POST` | Captura dos dados do formulário |
| `$_SERVER['REQUEST_METHOD']` | Verificação do envio do formulário |
| `str_pad()` | Formatação dos números com zeros à esquerda |
| `for` | Laço de geração dos bilhetes |
| `htmlspecialchars()` | Sanitização das entradas do usuário |
| `intval()` | Conversão segura da quantidade para inteiro |

### Como Usar

1. Abra `rifa.php` no navegador (requer servidor PHP)
2. Preencha os campos:
   - **Nome da Campanha** — ex: `Rifa Beneficente 2025`
   - **Prêmio(s)** — ex: `TV 55", Notebook, Moto 0km`
   - **Valor do Bilhete** — ex: `10,00`
   - **Quantidade de Bilhetes** — ex: `100`
3. Clique em **Gerar Bilhetes**
4. Visualize os bilhetes gerados e clique em **Imprimir Bilhetes** quando desejar

### Captura de Tela

```
┌─────────────────────────────────────────┐
│         🏆 GERADOR DE BILHETES          │
│  Campanha: Rifa Beneficente 2025        │
│  Prêmio: TV 55"  |  Valor: R$ 10,00    │
├──────────────────────────────────────────┤
│ ▐001▌  ▐002▌  ▐003▌  ▐004▌  ▐005▌     │
│ ▐006▌  ▐007▌  ▐008▌  ▐009▌  ▐010▌     │
│              ...                         │
│         [ 🖨️ Imprimir Bilhetes ]        │
└──────────────────────────────────────────┘
```

---

## ✊📄✂️ Atividade 2 — Jo-Ken-Pô

### Descrição

Jogo interativo de Pedra, Papel e Tesoura contra o computador. O jogador escolhe sua jogada via botões, o computador sorteia aleatoriamente e o sistema exibe o resultado com animações e placar acumulado.

### Funcionalidades

- ✅ Três botões de escolha estilizados: Pedra 🪨, Papel 📄 e Tesoura ✂️
- ✅ Jogada do computador gerada aleatoriamente com `rand(1, 3)`
- ✅ Arena visual com os dois lados (Jogador vs Computador)
- ✅ GIFs animados para cada opção escolhida
- ✅ Banner animado de resultado: 🏆 Venceu / 💀 Perdeu / 🤝 Empate
- ✅ Placar persistente por sessão via `localStorage`
- ✅ Botão para reiniciar o placar
- ✅ Indicadores visuais de vitória/derrota com brilho colorido nas bordas

### Lógica das Combinações

| Jogador | Computador | Resultado |
|---|---|---|
| 🪨 Pedra | ✂️ Tesoura | ✅ Jogador vence |
| 🪨 Pedra | 📄 Papel | ❌ Computador vence |
| 📄 Papel | 🪨 Pedra | ✅ Jogador vence |
| 📄 Papel | ✂️ Tesoura | ❌ Computador vence |
| ✂️ Tesoura | 📄 Papel | ✅ Jogador vence |
| ✂️ Tesoura | 🪨 Pedra | ❌ Computador vence |
| Qualquer | Mesmo | 🤝 Empate |

### Conceitos PHP Utilizados

| Recurso | Uso no projeto |
|---|---|
| `$_POST` | Captura da jogada do jogador |
| `rand(1, 3)` | Geração da jogada aleatória do computador |
| `function comparar()` | Função que encapsula a lógica do jogo |
| `switch` / `if-else` | Determinação do resultado da partida |
| `$_SERVER['REQUEST_METHOD']` | Verificação do envio do formulário |
| `isset()` | Checagem da presença da jogada no POST |

### Conceitos JavaScript/CSS Utilizados

| Recurso | Uso no projeto |
|---|---|
| `localStorage` | Persistência do placar entre rodadas |
| `@keyframes` | Animação de entrada do banner de resultado |
| `CSS :hover` | Efeitos visuais nos botões de escolha |
| GIFs externos | Ilustração animada das jogadas |

### Como Usar

1. Abra `jokempo.php` no navegador (requer servidor PHP)
2. Clique em **Pedra**, **Papel** ou **Tesoura**
3. Veja o resultado na arena e acompanhe o placar no topo
4. Continue jogando — o placar é mantido entre rodadas
5. Clique em **Reiniciar Placar** para zerar a contagem

---

## ⚙️ Como Executar os Projetos

### Pré-requisitos

- PHP 7.4 ou superior instalado na máquina
- Navegador web moderno (Chrome, Firefox, Edge, Safari)

### Opção 1 — Servidor embutido do PHP (mais simples)

```bash
# Navegue até a pasta dos arquivos
cd caminho/para/os/arquivos

# Inicie o servidor local
php -S localhost:8000

# Acesse no navegador
# http://localhost:8000/rifa.php
# http://localhost:8000/jokempo.php
```

### Opção 2 — XAMPP / Laragon / WAMP

1. Coloque os arquivos na pasta `htdocs` (XAMPP) ou `www` (Laragon/WAMP)
2. Inicie o Apache pelo painel de controle
3. Acesse `http://localhost/rifa.php` ou `http://localhost/jokempo.php`

---

## 🛠️ Tecnologias Utilizadas

- **PHP** — lógica do servidor, processamento de formulários e geração de conteúdo dinâmico
- **HTML5** — estrutura das páginas
- **CSS3** — estilização, animações e responsividade
- **JavaScript** — placar persistente via `localStorage` (Jo-Ken-Pô)
- **Google Fonts** — tipografia (`Playfair Display`, `DM Sans`, `Bebas Neue`, `Nunito`)

---

## 👨‍💻 Autor - Gabriel Bandasz

Desenvolvido como atividade prática da disciplina de **Desenvolvimento Web com PHP**.

---

> 💡 **Dica:** Para melhorar os projetos futuramente, considere adicionar banco de dados para persistir rifas e histórico de partidas, autenticação de usuários e suporte a múltiplos idiomas.
