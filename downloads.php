<?php
session_start();

// Check if user is logged in
if (empty($_SESSION['logged'])) {
    header('Location: login.php');
    exit;
}

// Sample download handler (in production, you'd serve actual files)
$file = $_GET['file'] ?? '';
$allowed_files = [
    'cyberpunk-wallpapers.zip',
    'elden-ring-landscapes.zip',
    'horizon-pack.zip',
    'god-of-war-bundle.zip'
];

if (!in_array($file, $allowed_files)) {
    header('HTTP/1.0 404 Not Found');
    exit('Arquivo não encontrado.');
}

// In a real application, you would serve the actual file
// For this demo, we'll just show a download page
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Download - <?=htmlspecialchars($file)?></title>
    <link rel="stylesheet" href="css/styles.css">
    <meta http-equiv="refresh" content="3;url=private.php">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Portal de Jogos</h1>
            <nav>
                <a href="index.html">Início</a>
                <a href="games.html">Conteúdos</a>
                <a href="contact.php">Contacto</a>
                <a href="private.php">Área VIP</a>
                <a href="logout.php">Sair</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="hero">
            <h2>📥 Download iniciado</h2>
            <p>O arquivo <strong><?=htmlspecialchars($file)?></strong> seria descarregado agora.</p>
            <p style="font-size:0.9rem;color:var(--text-secondary);margin-top:1rem">
                (Esta é uma simulação - em produção o ficheiro real seria servido)<br>
                Será redirecionado de volta à área VIP em 3 segundos...
            </p>
        </div>
    </main>
</body>
</html>