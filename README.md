🎮 Projetos PHP – Jo-Ken-Pô + Gerador de Rifas

Este repositório contém dois projetos desenvolvidos em PHP, HTML, CSS e JavaScript:

🎮 Jogo Jo-Ken-Pô (Pedra, Papel e Tesoura)
🎟️ Sistema Gerador de Rifas

Ambos os projetos foram desenvolvidos com foco em interface moderna, lógica em PHP e uso de localStorage no navegador.

📁 Estrutura dos Projetos
projetos/
│
├── jokenpo/
│   ├── index.php
│   ├── style.css
│   └── script.js
│
├── rifa/
│   ├── index.php
│   ├── style.css
│
└── README.md
🎮 Projeto 1 — Jo-Ken-Pô
📌 Descrição

Jogo de Pedra, Papel e Tesoura contra o computador, com placar salvo no navegador e interface moderna com animações e GIFs.

🧠 Lógica do jogo
Jogada	Vence de
Pedra	Tesoura
Papel	Pedra
Tesoura	Papel

O computador escolhe uma jogada aleatória e o sistema compara com a jogada do jogador.

⚙️ Funcionalidades
Escolha entre Pedra, Papel ou Tesoura
Computador joga aleatoriamente
Exibição de GIF conforme a jogada
Resultado da partida (Vitória / Derrota / Empate)
Placar salvo com localStorage
Botão para reiniciar placar
Interface moderna com animações
💾 Placar salvo no navegador

O placar é salvo usando:

localStorage

Assim, mesmo atualizando a página, o placar continua.

▶️ Como executar
Coloque a pasta jokenpo dentro do htdocs (XAMPP) ou www (WAMP)
Inicie o Apache
Acesse:
http://localhost/jokenpo
🎟️ Projeto 2 — Gerador de Rifas
📌 Descrição

Sistema que gera bilhetes numerados para rifas, pronto para impressão.

⚙️ Funcionalidades
Nome da campanha
Nome do prêmio
Valor do bilhete
Quantidade de bilhetes
Geração automática dos números
Layout pronto para impressão
Botão "Imprimir"
Numeração automática (001 até o número escolhido)
🔢 Numeração dos bilhetes

Os bilhetes são gerados com 3 dígitos:

001
002
003
...
100
...
999

Usando PHP:

str_pad($i, 3, "0", STR_PAD_LEFT);
🖨️ Impressão

O sistema possui CSS especial para impressão:

@media print

Assim, ao clicar em Imprimir, apenas os bilhetes aparecem.

▶️ Como executar
Coloque a pasta rifa dentro do htdocs
Inicie o Apache
Acesse:
http://localhost/rifa
🛠️ Tecnologias Utilizadas
Tecnologia	Uso
PHP	Lógica do sistema
HTML	Estrutura
CSS	Estilização
JavaScript	Placar e interações
localStorage	Salvar placar
Google Fonts	Tipografia
🚀 Melhorias Futuras
Jo-Ken-Pô
 Sistema de ranking
 Modo difícil (IA)
 Multiplayer
 Sons
 Animação 3, 2, 1, JÁ
 Login de jogador
Rifas
 Nome do comprador
 Marcar bilhete como vendido
 Sorteio automático
 Gerar número vencedor
 Exportar PDF
 QR Code no bilhete
 Banco de dados
 Área administrativa
👨‍💻 Autor

Projeto desenvolvido para estudo de:

PHP
HTML
CSS
JavaScript
Lógica de programação
Desenvolvimento Web
📜 Licença

Este projeto é livre para uso e modificação para fins de estudo.
