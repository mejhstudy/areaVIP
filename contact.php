<?php
session_start();

// CSRF protection
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Enhanced contact form validation
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF validation
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        $errors[] = 'Erro de segurança. Recarregue a página e tente novamente.';
    } else {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = $_POST['subject'] ?? 'geral';
        $message = trim($_POST['message'] ?? '');

        // Enhanced validation
        if (strlen($name) < 2) $errors[] = 'O nome deve ter pelo menos 2 caracteres.';
        if (strlen($name) > 100) $errors[] = 'O nome não pode ter mais de 100 caracteres.';
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Formato de email inválido.';
        }
        
        if (strlen($message) < 10) $errors[] = 'A mensagem deve ter pelo menos 10 caracteres.';
        if (strlen($message) > 2000) $errors[] = 'A mensagem não pode ter mais de 2000 caracteres.';

        // Basic spam prevention
        if (preg_match('/https?:\/\//', $message)) {
            $errors[] = 'Links não são permitidos na mensagem.';
        }

        if (empty($errors)) {
            // Here you would send email in production
            // For demonstration, we simulate saving to a log file
            $log_entry = date('Y-m-d H:i:s') . " | $name | $email | $subject | " . substr($message, 0, 50) . "...\n";
            file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
            
            $success = true;
            // Regenerate CSRF token after successful submission
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
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
          ✅ Obrigado! A sua mensagem foi enviada com sucesso. Responderemos brevemente.
        </div>
        <p style="text-align:center;margin-top:1rem">
          <a href="contact.php" style="color:var(--accent)">Enviar nova mensagem</a> | 
          <a href="index.html" style="color:var(--accent)">Voltar ao início</a>
        </p>
      <?php else: ?>
        <?php if (!empty($errors)): ?>
          <div class="message error">
            ❌ Por favor, corrija os seguintes erros:
            <ul style="margin:0.5rem 0 0 1rem">
              <?php foreach($errors as $e) echo '<li>'.htmlspecialchars($e).'</li>'; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form method="post" action="contact.php" novalidate>
          <input type="hidden" name="csrf_token" value="<?=htmlspecialchars($_SESSION['csrf_token'])?>">
          
          <div class="form-group">
            <label for="name">👤 Nome completo</label>
            <input id="name" name="name" type="text" required 
                   maxlength="100" minlength="2"
                   placeholder="O seu nome" 
                   value="<?=htmlspecialchars($_POST['name'] ?? '')?>">
          </div>

          <div class="form-group">
            <label for="email">📧 Endereço de email</label>
            <input id="email" name="email" type="email" required 
                   placeholder="exemplo@email.com" 
                   value="<?=htmlspecialchars($_POST['email'] ?? '')?>">
          </div>

          <div class="form-group">
            <label for="subject">📝 Assunto</label>
            <select id="subject" name="subject" style="width:100%;padding:0.8rem;border:2px solid var(--border);border-radius:8px;background:var(--bg-secondary);color:var(--text-primary)">
              <option value="geral" <?= ($_POST['subject'] ?? '') === 'geral' ? 'selected' : '' ?>>Questão geral</option>
              <option value="sugestao" <?= ($_POST['subject'] ?? '') === 'sugestao' ? 'selected' : '' ?>>Sugestão de conteúdo</option>
              <option value="erro" <?= ($_POST['subject'] ?? '') === 'erro' ? 'selected' : '' ?>>Reportar erro no site</option>
              <option value="parceria" <?= ($_POST['subject'] ?? '') === 'parceria' ? 'selected' : '' ?>>Proposta de parceria</option>
            </select>
          </div>

          <div class="form-group">
            <label for="message">💬 Mensagem</label>
            <textarea id="message" name="message" rows="6" required 
                      maxlength="2000" minlength="10"
                      placeholder="Escreva aqui a sua mensagem (mínimo 10 caracteres, máximo 2000)..."><?=htmlspecialchars($_POST['message'] ?? '')?></textarea>
            <small style="color:var(--text-secondary);font-size:0.85rem">
              <span id="char-count">0</span>/2000 caracteres
            </small>
          </div>

          <button type="submit">📤 Enviar mensagem</button>
        </form>

        <script>
        // Character counter
        const messageInput = document.getElementById('message');
        const charCount = document.getElementById('char-count');
        messageInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
            charCount.style.color = this.value.length > 1800 ? 'var(--warning)' : 'var(--text-secondary)';
        });
        // Initialize counter
        charCount.textContent = messageInput.value.length;
        </script>

        <div style="margin-top:2rem;padding:1rem;background:rgba(0,212,255,0.05);border-radius:8px;border:1px solid rgba(0,212,255,0.1)">
          <h4 style="color:var(--accent);margin-bottom:0.5rem">💡 Outras formas de contacto</h4>
          <p style="color:var(--text-secondary);font-size:0.9rem">
            • Para questões urgentes: admin@jogos-portal.com<br>
            • Siga-nos nas redes sociais para novidades diárias<br>
            • Junte-se à nossa comunidade Discord para discussões
          </p>
        </div>
      <?php endif; ?>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>Contacto — Projeto de exemplo.</small>
    </div>
  </footer>
</body>
</html>
