<?php
echo "<h1>Teste de Contact.php</h1>";
echo "<p>PHP está funcionando!</p>";
echo "<p>Arquivo: " . __FILE__ . "</p>";
echo "<p>Diretório: " . __DIR__ . "</p>";
echo "<hr>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teste Contact</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Formulário de Teste</h2>
    <form method="POST">
        <input type="text" name="teste" placeholder="Digite algo">
        <button type="submit">Testar</button>
    </form>
    
    <?php
    if ($_POST) {
        echo "<p>POST recebido: ";
        print_r($_POST);
        echo "</p>";
    }
    ?>
    
    <p><a href="index.html">Voltar ao início</a></p>
</body>
</html>