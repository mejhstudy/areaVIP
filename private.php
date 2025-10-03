<?php
session_start();

// Enhanced session validation
if (empty($_SESSION['logged']) || empty($_SESSION['login_time'])) {
    header('Location: login.php');
    exit;
}

// Session timeout (30 minutes)
if (time() - $_SESSION['login_time'] > 1800) {
    session_destroy();
    header('Location: login.php?timeout=1');
    exit;
}

// Update last activity time
$_SESSION['login_time'] = time();
$username = $_SESSION['user'] ?? 'Utilizador';
?>
<!doctype html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Área Privada</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header class="site-header">
    <div class="container">
      <h1>Área Privada</h1>
      <nav>
        <a href="index.html">Início</a>
        <a href="games.html">Conteúdos</a>
        <a href="contact.php">Contacto</a>
        <a href="logout.php">Sair</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <div class="hero">
      <h2>🎉 Bem-vindo à área VIP, <?=htmlspecialchars($username)?>!</h2>
      <p>Conteúdos exclusivos, downloads premium e recursos especiais apenas para membros autorizados</p>
      <p style="font-size:0.9rem;color:var(--text-secondary);margin-top:0.5rem">
        Sessão iniciada em <?=date('d/m/Y H:i', $_SESSION['login_time'] - 1800)?> • 
        <a href="logout.php" style="color:var(--accent)">🚪 Terminar sessão</a>
      </p>
    </div>

    <section class="intro-cards">
      <article>
        <h3>🖼️ Wallpapers 4K</h3>
        <p>Coleção premium de wallpapers em ultra alta definição dos melhores jogos:</p>
        <div class="gallery" style="margin-top:1rem">
          <img src="https://via.placeholder.com/400x250/1a1f2e/00d4ff?text=4K+Cyberpunk" alt="Cyberpunk 4K">
          <img src="https://via.placeholder.com/400x250/1a1f2e/a855f7?text=4K+Elden+Ring" alt="Elden Ring 4K">
          <img src="https://via.placeholder.com/400x250/1a1f2e/10b981?text=4K+Horizon" alt="Horizon 4K">
        </div>
        <ul style="margin-top:1rem">
          <li><a href="downloads.php?file=cyberpunk-wallpapers.zip" style="color:var(--accent)">📥 Cyberpunk 2077 Collection (12 MB)</a></li>
          <li><a href="downloads.php?file=elden-ring-landscapes.zip" style="color:var(--accent)">📥 Elden Ring Landscapes (18 MB)</a></li>
          <li><a href="downloads.php?file=horizon-pack.zip" style="color:var(--accent)">📥 Horizon Zero Dawn Pack (15 MB)</a></li>
          <li><a href="downloads.php?file=god-of-war-bundle.zip" style="color:var(--accent)">📥 God of War Bundle (22 MB)</a></li>
        </ul>
      </article>

      <article>
        <h3>🎮 Recursos de jogo</h3>
        <p>Ferramentas e conteúdos especiais para melhorar a sua experiência:</p>
        <ul style="margin-top:1rem">
          <li><a href="#" style="color:var(--accent)">🗝️ Códigos e cheats exclusivos</a></li>
          <li><a href="#" style="color:var(--accent)">📋 Guias estratégicos avançados</a></li>
          <li><a href="#" style="color:var(--accent)">🎯 Mapas interativos completos</a></li>
          <li><a href="#" style="color:var(--accent)">⚙️ Configurações otimizadas</a></li>
        </ul>
      </article>
    </section>

    <section class="intro-cards">
      <article>
        <h3>🎬 Conteúdo multimédia</h3>
        <p>Vídeos, trailers e documentários exclusivos da indústria dos videojogos.</p>
        <ul style="margin-top:1rem">
          <li><a href="#" style="color:var(--accent)">🎥 Making-of dos grandes sucessos</a></li>
          <li><a href="#" style="color:var(--accent)">🎤 Entrevistas com developers</a></li>
          <li><a href="#" style="color:var(--accent)">🎼 Bandas sonoras em alta qualidade</a></li>
        </ul>
      </article>

      <article>
        <h3>📊 Estatísticas avançadas</h3>
        <p>Dados e análises detalhadas sobre tendências e performance dos jogos:</p>
        <ul style="margin-top:1rem">
          <li><a href="#" style="color:var(--accent)">📈 Relatórios de vendas mensais</a></li>
          <li><a href="#" style="color:var(--accent)">🎯 Análise de público-alvo</a></li>
          <li><a href="#" style="color:var(--accent)">🏆 Rankings e classificações</a></li>
        </ul>
      </article>

      <article>
        <h3>💎 Acesso antecipado</h3>
        <p>Seja o primeiro a conhecer as novidades antes do lançamento oficial:</p>
        <ul style="margin-top:1rem">
          <li><a href="#" style="color:var(--accent)">⏰ Previews de jogos futuros</a></li>
          <li><a href="#" style="color:var(--accent)">🔍 Betas e demonstrações</a></li>
          <li><a href="#" style="color:var(--accent)">📧 Newsletter VIP semanal</a></li>
        </ul>
      </article>
    </section>

    <div style="background:linear-gradient(45deg,rgba(0,212,255,0.1),rgba(168,85,247,0.1));padding:2rem;border-radius:12px;text-align:center;margin:2rem 0">
      <h3 style="color:var(--accent);margin-bottom:1rem">🎁 Benefícios de membro VIP</h3>
      <p style="color:var(--text-secondary)">
        Como membro da área reservada, tem acesso completo a todos os conteúdos premium,
        downloads ilimitados e prioridade no suporte técnico.
      </p>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>Área reservada — acesso autorizado apenas.</small>
    </div>
  </footer>
</body>
</html>
