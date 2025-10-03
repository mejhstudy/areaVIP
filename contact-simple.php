<?php
session_start();
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name)) $errors[] = 'Nome é obrigatório';
    if (empty($email)) $errors[] = 'Email é obrigatório';
    if (empty($message)) $errors[] = 'Mensagem é obrigatória';
    
    if (empty($errors)) {
        $success = true;
    }
}
?>
<!doctype html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contacto</title>
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
        <a href="login.php">Login</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <div class="hero">
      <h2>Entre em contacto</h2>
      <p>Tem sugestões, dúvidas ou quer partilhar algo sobre jogos? Envie-nos uma mensagem!</p>
    </div>

    <div class="form-card">
      <?php if ($success): ?>
        <div class="message success">
          ✅ Mensagem enviada com sucesso!
        </div>
        <p><a href="contact.php">Enviar nova mensagem</a> | <a href="index.html">Voltar ao início</a></p>
      <?php else: ?>
        <?php if (!empty($errors)): ?>
          <div class="message error">
            ❌ Erros encontrados:
            <ul><?php foreach($errors as $e) echo '<li>'.$e.'</li>'; ?></ul>
          </div>
        <?php endif; ?>

        <form method="post" action="contact.php">
          <div class="form-group">
            <label for="name">Nome</label>
            <input id="name" name="name" type="text" required value="<?=htmlspecialchars($_POST['name'] ?? '')?>">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required value="<?=htmlspecialchars($_POST['email'] ?? '')?>">
          </div>

          <div class="form-group">
            <label for="message">Mensagem</label>
            <textarea id="message" name="message" rows="5" required><?=htmlspecialchars($_POST['message'] ?? '')?></textarea>
          </div>

          <button type="submit">Enviar mensagem</button>
        </form>
      <?php endif; ?>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>Contacto — Projeto sobre jogos</small>
    </div>
  </footer>
</body>
</html>