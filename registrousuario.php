<!DOCTYPE html>
<html>
<head>
    <!-- METADADOS -->
    <meta charset="UTF-8">

    <!-- TITULO -->
    <title>Cadastro de Usuário</title>

    <!-- FOLHA DE ESTILO -->
    <link rel="stylesheet" href="./css/registrousuario.css">
</head>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Conecta ao banco de dados
    $conexao = new PDO('mysql:host=localhost;dbname=curriculos', 'root', '');

    // Verifica se o e-mail já está cadastrado
    $stmt = $conexao->prepare('SELECT COUNT(*) FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $result = $stmt->fetchColumn();

    if ($result > 0) {
        // Caso o e-mail já esteja cadastrado, mostra um alerta e não realiza o cadastro
        echo "<script>alert('Usuário já cadastrado no sistema.')</script>";
    } else {
        // Caso contrário, insere os dados do usuário na tabela
        $stmt = $conexao->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
        $stmt->execute([$nome, $email, $senha]);

        // Define uma variável de sessão para indicar o sucesso do cadastro
        session_start();
        $_SESSION['cadastro_sucesso'] = true;

        // Redireciona para a página de login
        header('Location: login.php');
        exit;
    }
}
?>
<body>
    <div class="container">
        <div class="left-container"></div>
        <div class="right-container">
            <div class="box-container">
                <img src="./img/gep_logo1.png" alt="logo" class="logo">
                <h1>Registrar</h1>
                <form action="registrousuario.php" method="post">
                    <input type="text" id="nome" name="nome" placeholder="Nome" required>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                    <input type="submit" value="Cadastrar">
                </form>
                <p>já tem acesso? <a href="login.php">faça seu login.</a></p>
            </div>
        </div>
    </div>
</body>
</html>