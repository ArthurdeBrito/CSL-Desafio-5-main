# 🎮 Projetos Web em PHP  
### Jo-Ken-Pô & Gerador de Rifas

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-blue?style=for-the-badge&logo=php">
  <img src="https://img.shields.io/badge/HTML5-Structure-orange?style=for-the-badge&logo=html5">
  <img src="https://img.shields.io/badge/CSS3-Style-blue?style=for-the-badge&logo=css3">
  <img src="https://img.shields.io/badge/JavaScript-Interactive-yellow?style=for-the-badge&logo=javascript">
</p>

<p align="center">
  <b>Dois projetos completos com foco em prática, interface moderna e lógica de programação</b>
</p>

---

# 📌 Sobre o Repositório

Este repositório contém dois sistemas desenvolvidos com tecnologias web:

- 🎮 **Jogo Jo-Ken-Pô (Pedra, Papel e Tesoura)**
- 🎟️ **Sistema Gerador de Rifas**

Ambos foram criados com foco em:
- Aprendizado de PHP
- Estrutura de projetos web
- Interface moderna (UI/UX)
- Interatividade com JavaScript

---

# 📁 Estrutura do Projeto


projetos/
│
├── jokenpo/
│ ├── index.php
│ ├── style.css
│ └── script.js
│
├── rifa/
│ ├── index.php
│ └── style.css
│
└── README.md


---

# 🎮 Projeto 1 — Jo-Ken-Pô

## 🧠 Descrição

Jogo clássico contra o computador com interface moderna e sistema de pontuação persistente.

---

## ⚙️ Funcionalidades

- Escolha entre Pedra 🪨, Papel 📄 ou Tesoura ✂️  
- Jogada aleatória do computador  
- Resultado em tempo real  
- Sistema de pontuação:
  - 🏆 Vitória  
  - 💀 Derrota  
  - 🤝 Empate  
- Armazenamento do placar com `localStorage`  
- Interface animada e responsiva  

---

## 💡 Lógica do Jogo

| Jogada | Vence de |
|-------|---------|
| Pedra | Tesoura |
| Papel | Pedra |
| Tesoura | Papel |

---

## 💾 Persistência de dados

```javascript
localStorage

O placar é salvo no navegador, permitindo continuidade mesmo após recarregar a página.

▶️ Como executar
# Clone o repositório
git clone https://github.com/seu-usuario/seu-repo.git
Coloque a pasta jokenpo em:
htdocs (XAMPP)
www (WAMP)
Inicie o servidor Apache
Acesse:
http://localhost/jokenpo
🎟️ Projeto 2 — Gerador de Rifas
🧠 Descrição

Sistema para criação automática de bilhetes de rifa numerados, com layout pronto para impressão.

⚙️ Funcionalidades
Cadastro de campanha
Definição de prêmio
Valor do bilhete
Quantidade de bilhetes (até 1000)
Numeração automática
Layout organizado em grade
Botão de impressão
Estilo otimizado para papel
🔢 Numeração dos Bilhetes

Formato automático:

001
002
003
...

Implementação:

str_pad($i, 3, "0", STR_PAD_LEFT);
🖨️ Impressão

Utiliza CSS específico:

@media print

Oculta elementos desnecessários e mostra apenas os bilhetes.

▶️ Como executar
Coloque a pasta rifa no servidor local
Inicie o Apache
Acesse:
http://localhost/rifa
🛠️ Tecnologias Utilizadas
Tecnologia	Função
PHP	Lógica backend
HTML5	Estrutura
CSS3	Estilização
JavaScript	Interatividade
localStorage	Persistência
Google Fonts	Tipografia
🚀 Melhorias Futuras
🎮 Jo-Ken-Pô
 Sistema de ranking
 Modo difícil (IA)
 Multiplayer
 Sons e efeitos
 Animação "3, 2, 1, JÁ"
 Sistema de login
🎟️ Rifas
 Cadastro de compradores
 Controle de bilhetes vendidos
 Sorteio automático
 Geração de número vencedor
 Exportação em PDF
 QR Code nos bilhetes
 Integração com banco de dados (MySQL)
 Área administrativa
🧠 Aprendizados

Este projeto envolve conceitos importantes como:

Estruturação de aplicações web
Manipulação de formulários em PHP
Separação de responsabilidades (HTML, CSS, JS)
Persistência de dados no navegador
Design de interfaces modernas
Lógica de programação
👨‍💻 Autor

Desenvolvido para fins de estudo e prática em desenvolvimento web.
