<meta charset="utf-8">

<?php
include 'session.php';
require_once('Conection.php');

$emailnew = mysql_real_escape_string($_POST['newEmail']);
$senha1 = mysql_real_escape_string($_POST['newsenha1']);
$senha2 = mysql_real_escape_string($_POST['newsenha2']);

if ($senha1 <> $senha2) {
    require_once('./conta.php');
    ?><script> sweetAlert("","Senhas informadas são diferentes uma da outra.", "error");</script><?php
    header("Location: ./conta.php");
    //sweetAlert("","Usuário Existente, tente outro email.", "error");
    exit;
}

$rs = mysql_query("UPDATE usuario SET login = '$emailnew', senha='" . sha1($senha1) . "' WHERE idUsuario = $idlogin;");
//echo mysql_error();
$rs = mysql_query("UPDATE pessoa SET email = '$emailnew' WHERE idPessoa = $idloginPessoa;");
//echo mysql_error();
//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;
require_once('conta.php'); //mudar qdo tiver a pagina correta
?><script> sweetAlert("", "Dados Alterados com Sucesso!", "success");</script><?php
//echo '<script> sweetAlert("","Usuário Existente, tente outro email.", "error");</script>';
//echo '<script> sweetAlert("", "Dados Alterados com Sucesso!", "success");</script>';
header("Location: ./conta.php");
 exit;
?>