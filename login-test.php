<?php
echo "<h1>Teste de Login.php</h1>";
echo "<p>PHP está funcionando!</p>";
echo "<p>Sessões: " . (session_status() === PHP_SESSION_ACTIVE ? 'Ativas' : 'Inativas') . "</p>";
session_start();
echo "<p>Session ID: " . session_id() . "</p>";
echo "<hr>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teste Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Formulário de Login Teste</h2>
    <form method="POST">
        <input type="text" name="user" placeholder="Usuário" value="aluno">
        <input type="password" name="pass" placeholder="Senha" value="senha123">
        <button type="submit">Login Teste</button>
    </form>
    
    <?php
    if ($_POST) {
        echo "<p>POST recebido: ";
        print_r($_POST);
        echo "</p>";
        
        if ($_POST['user'] === 'aluno' && $_POST['pass'] === 'senha123') {
            echo "<p style='color:green'>✅ Login funcionaria!</p>";
        } else {
            echo "<p style='color:red'>❌ Credenciais incorretas</p>";
        }
    }
    ?>
    
    <p><a href="index.html">Voltar ao início</a></p>
</body>
</html>