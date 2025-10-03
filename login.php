<?php
session_start();
$error = '';

// Credentials defined in code (exercise requirement)
define('AUTH_USER','aluno');
define('AUTH_PASS','senha123');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user'] ?? '');
    $pass = $_POST['pass'] ?? '';
    
    if (empty($user) || empty($pass)) {
        $error = 'Por favor, preencha todos os campos.';
    } elseif ($user === AUTH_USER && $pass === AUTH_PASS) {
        // Successful login
        $_SESSION['logged'] = true;
        $_SESSION['login_time'] = time();
        $_SESSION['user'] = $user;
        
        // Redirect to private page
        header('Location: private.php');
        exit;
    } else {
        $error = 'Utilizador ou palavra-passe incorretos.';
    }
}
?>
<!doctype html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header class="site-header">
    <div class="container">
      <h1>Portal de Jogos</h1>
      <nav>
        <a href="index.html">Início</a>
        <a href="games.html">Conteúdos</a>
        <a href="contact.php">Contacto</a>
        <a href="login.php" class="active">Login</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <div class="hero">
      <h2>🔐 Área reservada</h2>
      <p>Aceda ao conteúdo exclusivo: wallpapers, downloads premium e recursos especiais</p>
    </div>

    <div class="form-card">
      <?php if (isset($_GET['logout'])): ?>
        <div class="message success">
          ✅ Sessão terminada com sucesso. Obrigado pela visita!
        </div>
      <?php elseif (isset($_GET['timeout'])): ?>
        <div class="message error">
          ⏰ A sua sessão expirou por inatividade. Por favor, faça login novamente.
        </div>
      <?php elseif ($error): ?>
        <div class="message error">
          ❌ <?=htmlspecialchars($error)?>
        </div>
      <?php endif; ?>
      
      <form method="post" action="login.php">
        <div class="form-group">
          <label for="user">👤 Nome de utilizador</label>
          <input id="user" name="user" type="text" required 
                 placeholder="Introduza o seu nome de utilizador">
        </div>

        <div class="form-group">
          <label for="pass">🔑 Palavra-passe</label>
          <input id="pass" name="pass" type="password" required 
                 placeholder="Introduza a sua palavra-passe">
        </div>

        <button type="submit">🚀 Aceder à área reservada</button>
      </form>

      <div style="margin-top:2rem;padding:1rem;background:rgba(168,85,247,0.05);border-radius:8px;border:1px solid rgba(168,85,247,0.2)">
        <h4 style="color:#a855f7;margin-bottom:0.5rem">🎮 Credenciais de demonstração</h4>
        <p style="color:var(--text-secondary);font-size:0.95rem">
          <strong>Utilizador:</strong> aluno<br>
          <strong>Palavra-passe:</strong> senha123
        </p>
        <p style="color:var(--text-secondary);font-size:0.85rem;margin-top:0.5rem">
          Estas são as credenciais definidas no código para demonstração do projeto.
        </p>
      </div>

      <div style="margin-top:1.5rem;text-align:center">
        <p style="color:var(--text-secondary);font-size:0.9rem">
          Não tem conta? Em produção aqui estaria o link para registo.
        </p>
      </div>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>Login — Projeto.</small>
    </div>
  </footer>
</body>
</html>
