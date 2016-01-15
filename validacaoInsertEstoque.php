<meta charset="utf-8">

<?php
include 'session.php';
require_once('Conection.php');


$codBD = mysql_real_escape_string($_POST['codigo']);
$idProdutoBD = mysql_real_escape_string($_POST['idProduto']);
$produtoBD = mysql_real_escape_string($_POST['produto']);
$precoBD = mysql_real_escape_string($_POST['preco']);
$quantidadeBD = mysql_real_escape_string($_POST['qtd']);

$precoBD = str_replace("R$ ", "", $precoBD);
$precoBD = str_replace(".", "", $precoBD);
$precoBD = str_replace(",", ".", $precoBD);

//echo "UPDATE produto SET codigo='$codBD',produto='$produtoBD',preco=$precoBD,estoque=$quantidadeBD WHERE Usuario_idUsuario = $idlogin AND idProduto= $idProdutoBD ;";

$rs = mysql_query("UPDATE produto SET codigo='$codBD',produto='$produtoBD',preco=$precoBD,estoque=$quantidadeBD WHERE Usuario_idUsuario = $idlogin AND idProduto= $idProdutoBD ;");
//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;
require_once('./estoque.php'); //mudar qdo tiver a pagina correta
?><script> sweetAlert("", "Dados Alterados com Sucesso!", "success");</script><?php
//echo '<script> sweetAlert("","Usuário Existente, tente outro email.", "error");</script>';
//echo '<script> sweetAlert("", "Dados Alterados com Sucesso!", "success");</script>';
header("Location: ./estoque.php");
 exit;
?>