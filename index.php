<!DOCTYPE html>
<html>
<head>
    <!-- METADADOS -->
    <meta charset="UTF-8">

    <!-- TITULO -->
    <title>GEP</title>

    <!-- FOLHA DE ESTILO -->
    <link rel="stylesheet" href="./css/style.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #0080AC;
            padding: 20px;
            text-align: right;
            color: #fff;
        }

        h1 {
           margin-top: 0;
           text-align: center;
        }
        
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        
        nav {
            background-color: #666;
            padding: 10px;
        }
        
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
        
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        
        nav ul li a:hover {
            background-color: #999;
        }
        
        section {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
        }
        
        .title1 h2 {
            color: black;
        }

        .wrapper {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Duas colunas com largura igual */
            gap: 20px; /* Espaçamento entre as caixas */
        }

        .box1, .box2, .box3, .box4, .box5, .box6 {
            text-align: center;
        }

        .box1 img, .box2 img {
            max-width: 100%;
        }


        footer {
            background-color: #0080AC;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-right: 10px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .search-form {
            flex-grow: 1;
            margin-left: 10px;
        }

        .search-input {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-right: 10px;
        }

        .dropdown {
            position: relative;
            display: block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        } 

        .logo {
            width: 92%;
            height: 60px;
            margin-right: 10px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }     

    </style>
</head>
<?php
session_start();

if(isset($_SESSION['Username']) && $_SESSION['Password'] != "")  {
	header('Location: login.php');
	exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
?>
<body>
    <header>
        <div class="header-content">
            <div>
                <img src="./img/gep_logo1.png" alt="Logo da Empresa" class="logo">              
            </div>
            <div>
                Olá! <?php echo $username; ?>
                <?php
                    // Verifique se o usuário está logado
                    $usuarioLogado = true; // Altere para a lógica de verificação do usuário logado

                    if ($usuarioLogado) {
                        // Exiba a imagem do avatar
                        echo '<img src="./img/User.png" alt="Avatar" class="avatar">';
                    }
                ?>
            </div>
            <form class="search-form" action="#" method="post">
                <input type="text" name="search" class="search-input" placeholder="Buscar">
                <div class="dropdown">
                    <button class="dropdown-btn">Menu</button>
                    <div class="dropdown-content">
                        <a href="logout.php">Sair</a>
                    </div>
                </div>
            </form>
        </div>
    </header>

    <section class="title1">
        <h2>O que é o Sistema de Gerenciamento de Empregabilidade Profissional?</h2>
        <p>
            O Sistema de Gerenciamento de Empregabilidade Profissional é uma plataforma que visa ajudar profissionais a gerenciar sua carreira e encontrar oportunidades de emprego. 
            Ele oferece recursos como cadastro de currículos, busca por vagas, acompanhamento de processos seletivos e muito mais.
        </p>
    </section>

    <section class="title1">
        <h2>Painel de Recursos</h2>
        <div class="wrapper">
            <div class="box1"><a href="cadastrar.php"><img src="img/register.png"></a></div>
            <div class="box2"><a href="pesquisar.php"><img src="img/search.png"></a></div>
            <div class="box3"><a href="pesquisar.php"><img src="img/search.png"></a></div>
            <div class="box4"><a href="pesquisar.php"><img src="img/search.png"></a></div>
            <div class="box5"><a href="pesquisar.php"><img src="img/search.png"></a></div>
            <div class="box6"><a href="pesquisar.php"><img src="img/search.png"></a></div>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 GEP - Todos os direitos reservados.</p>
    </footer>
</body>
</html>