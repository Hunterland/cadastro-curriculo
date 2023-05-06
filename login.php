<!DOCTYPE html>
<html>
<head>
    <!-- TITULO -->
	<title>Login de Usuário</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    
    <!-- FOLHA DE ESTILO -->
	<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<!-- VERIFICA SE O USUÁRIO JÁ ESTÁ LOGADO -->
<?php
 session_start();

    if(isset($_SESSION['username']) && $_SESSION['username'] != null) {
        header('Location: index.php');
        exit;
    }
    
    // VERIFICA SE O USUÁRIO FOI CADASTRADO COM SUCESSO!
    if (isset($_SESSION['cadastro_sucesso']) && $_SESSION['cadastro_sucesso']) {
        echo "<script type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
        unset($_SESSION['cadastro_sucesso']); 
        // Limpa a variável de sessão após exibir o alerta
    }

?>

<!-- VERIFICAÇÃO DE USUÁRIO -->
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conecta ao banco de dados
    $conexao = new PDO('mysql:host=localhost;dbname=curriculos', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o usuário e senha estão corretos
    $stmt = $conexao->prepare('SELECT * FROM usuarios WHERE nome = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['senha'])) {
        // Usuário e senha corretos
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        // Usuário e/ou senha incorretos
        header('Location: login.php?erro=true');
        exit;
    }
}
?>

<!-- TELA DE LOGIN -->
<body>
    <div class="container">
        <div class="left-container"></div>
        <div class="right-container">
            <div class="box-container">
                <img src="./img/gep_logo1.png" alt="logo" class="logo">
                <h1>Login</h1>        
                <!-- exibe mensagem de erro caso o usuário estiver incorreto ou não exista. -->
                <?php
                    if (isset($_GET['erro']) && $_GET['erro'] == 'true') {
                        echo "<script type='text/javascript'>window.onload = function() { alert('Usuário e/ou senha incorretos. Por favor, tente novamente.'); }</script>";
                    }
                ?>
                <form method="post" action="login.php">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Entrar">
                </form>
                <p>Não possui acesso? <a href="registrousuario.php">Cadastre-se aqui.</a></p>
            </div>
        </div>
    </div>
</body>
</html>

