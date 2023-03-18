<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <title>Pesquisa de curriculos</title>
  <style>
body {
  font-family: 'Roboto', sans-serif;
}

th{   background-color: #4CAF50;
    color: white;

} 
td {

    border-bottom: 1px solid #ddd;
    text-align: center;
}
.btn {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 20px;
  margin: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
} 
    </style>
  
</head>
<body>

<center>
<h2> Lista de Curriculos Cadastrados </h2>
<br> 
<a href="index.php"><button class="btn" name="voltar" >Voltar</button></a>
<div class ="card">
<table class="table">
  <thead class="thead-light">
  <tr>
  <th width="50" >Id</th>
  <th width="200" >Nome</th>
  <th width="200" >Email</th>
  <th width="300" >Formação</th>
  <th width="80" >Pesquisar</th>
  <th width="80" >Editar</th>
  <th width="80" >Excluir</th>
  </tr>
  </thead>
  <tbody>
     
<?php

include("conexao.php");
$sql = "SELECT * FROM perfil";
$res = mysqli_query($conect, $sql);      

 while ($r = mysqli_fetch_array($res)) {

    $emailperfil = $r['email'];

echo '<tbody>
<tr>
<td width="50">'.$r['id'].'</td>
 <td width="200">'.$r['nome'].'</td>
  <td width="200">'.$r['email'].'</td>
  <td width="300">'.$r['curso'].'</td>
  <td width="80" > 
 <a href="curriculo.php?up='.$emailperfil.'" ><img src="img/search-line.png" width="18" height="16" > </a> 
  </td>
  <td width="80" > 
 <a href="editar.php?up='.$emailperfil.'" ><img src="img/file-edit-line.png" width="17" height="16" > </a> 
  </td>
  <td width="80" ><a href=excluir.php?ex='.$emailperfil.'><img src="img/close-circle-line.png" width="17" height="16" > </a>  
  </td>
 </tr>';

}


?>

</body>
</html>
