<!DOCTYPE html>
<html lang="en">

<head>

    <!-- META DADOS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO -->
    <title>Curriculo</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <!-- FOLHA DE ESTILO -->
    <link rel="stylesheet" href="./css/index.css">
</head>

<?php
session_start();

if(isset($_SESSION['username']) && $_SESSION['username'] != null)  {
	header('Location: login.php');
	exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
?>
<body>
    Olá! <?php echo $username; ?>, seja bem-vindo!


    <h1>GERADOR DE CURRICULOS</h1>

    <div class="wrapper">
        <div class="box1"><a href="cadastrar.php"><img src="img/register.png"></a></div>
        <div class="box2"><a href="pesquisar.php"><img src="img/search.png"></a></div>
    </div>
</body>
<a href="logout.php">Sair</a>
</html> 