<meta charset="utf-8">

<?php
include '../divfolder/session.php';
require_once('../Conection.php');


$nomeBD = mysql_real_escape_string($_POST['nome']);
$niverBD = mysql_real_escape_string($_POST['nasc']);
$sexoBD = mysql_real_escape_string($_POST['sexo']);
$CPFBD = mysql_real_escape_string($_POST['cpf']);
$FixoBD = mysql_real_escape_string($_POST['fixo']);
$celularBD = mysql_real_escape_string($_POST['celular']);

$sexoBD = $sexoBD . substr($sexoBD, 0, 1);
//Exploda a data para entrar no formato aceito pelo DB.
$niverBD = explode('/', $niverBD);
$niverBD = $niverBD[2] . '-' . $niverBD[1] . '-' . $niverBD[0];

$rs = mysql_query("UPDATE pessoa SET (nome = '$nomeBD', aniversario=$niverBD, sexo='$sexoBD', 
    cpf='$CPFBD', fixo='$FixoBD', celular='$celularBD') WHERE idPessoa = $idPessoa;");
//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;

require_once('conta.php'); //mudar qdo tiver a pagina correta
echo '<script> swal("", "Dados Alterados com Sucesso!", "success");</script>';
header("Location: ./conta.php");
?>