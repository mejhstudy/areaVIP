<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user'] ?? '');
    $pass = $_POST['pass'] ?? '';
    
    if ($user === 'aluno' && $pass === 'senha123') {
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $user;
        header('Location: private.php');
        exit;
    } else {
        $error = 'Usuário ou senha incorretos';
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
      <h2>🔐 Login</h2>
      <p>Aceda ao conteúdo exclusivo</p>
    </div>

    <div class="form-card">
      <?php if ($error): ?>
        <div class="message error">❌ <?=$error?></div>
      <?php endif; ?>
      
      <form method="post" action="login.php">
        <div class="form-group">
          <label for="user">Utilizador</label>
          <input id="user" name="user" type="text" required>
        </div>

        <div class="form-group">
          <label for="pass">Palavra-passe</label>
          <input id="pass" name="pass" type="password" required>
        </div>

        <button type="submit">Entrar</button>
      </form>

      <div style="margin-top:1rem;padding:1rem;background:rgba(0,212,255,0.1);border-radius:6px">
        <p><strong>Teste:</strong> aluno / senha123</p>
      </div>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>Login — Projeto sobre jogos</small>
    </div>
  </footer>
</body>
</html>