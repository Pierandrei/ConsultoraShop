<meta charset="utf-8">

<?php
include 'session.php';
require_once('Conection.php');

$cliente = mysql_real_escape_string($_POST['cliente']);
$nomeBD = mysql_real_escape_string($_POST['nome']);
$niverBD = mysql_real_escape_string($_POST['nasc']);
$sexoBD = mysql_real_escape_string($_POST['sexoSelect']);
$CPFBD = mysql_real_escape_string($_POST['cpf']);
$FixoBD = mysql_real_escape_string($_POST['fixo']);
$celularBD = mysql_real_escape_string($_POST['celular']);
$EmailBD = mysql_real_escape_string($_POST['email']);

$sexoBD = substr($sexoBD, 0, 1);

$ruaBD = mysql_real_escape_string($_POST['rua']);
$compBD = mysql_real_escape_string($_POST['complemento']);
$numeroBD = mysql_real_escape_string($_POST['numero']);
$bairroBD = mysql_real_escape_string($_POST['bairro']);
$cidadeBD = mysql_real_escape_string($_POST['cidade']);
$estadosBD = mysql_real_escape_string($_POST['estados']);
////Exploda a data para entrar no formato aceito pelo DB.
//$niverBD = explode('/', $niverBD);
//$niverBD = $niverBD[2] . '-' . $niverBD[1] . '-' . $niverBD[0];
$sqlP = "SELECT idCliente, Pessoa_idPessoa FROM cliente JOIN pessoa ON idPessoa = Pessoa_idPessoa 
    WHERE Usuario_idUsuario = $idlogin AND idCliente = $cliente LIMIT 1;";
$query = mysql_query($sqlP);
$arrayBD = mysql_fetch_assoc($query);
$idClienteBD = $arrayBD['idCliente'];
$idPessoaBD = $arrayBD['Pessoa_idPessoa'];

$rs = mysql_query("UPDATE pessoa SET nome='$nomeBD',aniversario='$niverBD',cpf='$CPFBD',sexo='$sexoBD',email='$EmailBD',
    telfixo='$FixoBD',celular='$celularBD' WHERE idPessoa=$idPessoaBD");
$rs = mysql_query("UPDATE cliente SET rua='$ruaBD',numero='$numeroBD',complemento='$compBD',bairro='$bairroBD',
    cidade='$cidadeBD',estado='$estadosBD'  WHERE idCliente=$idClienteBD");
//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;
require_once('./clientes.php'); //mudar qdo tiver a pagina correta
?><script> sweetAlert("", "Dados Alterados com Sucesso!", "success");</script><?php
//echo '<script> sweetAlert("","Usuário Existente, tente outro email.", "error");</script>';
//echo '<script> sweetAlert("", "Dados Alterados com Sucesso!", "success");</script>';
header("Location: ./clientes.php");
 exit;
?>