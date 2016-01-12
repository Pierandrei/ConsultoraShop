<meta charset="utf-8">

<?php
include 'session.php';
require_once('Conection.php');


$nomeBD = mysql_real_escape_string($_POST['nome']);
$niverBD = mysql_real_escape_string($_POST['nasc']);
$sexoBD = mysql_real_escape_string($_POST['sexoSelect']);
$CPFBD = mysql_real_escape_string($_POST['cpf']);
$FixoBD = mysql_real_escape_string($_POST['fixo']);
$celularBD = mysql_real_escape_string($_POST['celular']);
$EmailBD = mysql_real_escape_string($_POST['email']);

$sexoBD = substr($sexoBD, 0, 1);
////Exploda a data para entrar no formato aceito pelo DB.
//$niverBD = explode('/', $niverBD);
//$niverBD = $niverBD[2] . '-' . $niverBD[1] . '-' . $niverBD[0];

$ruaBD = mysql_real_escape_string($_POST['rua']);
$compBD = mysql_real_escape_string($_POST['complemento']);
$numeroBD = mysql_real_escape_string($_POST['numero']);
$bairroBD = mysql_real_escape_string($_POST['bairro']);
$cidadeBD = mysql_real_escape_string($_POST['cidade']);
$estadosBD = mysql_real_escape_string($_POST['estados']);

$sqlP = "SELECT * FROM pessoa JOIN cliente ON Pessoa_idPessoa = idPessoa
        WHERE Usuario_idUsuario = '" . $idlogin . "' AND email= '" . $EmailBD . "' LIMIT 1;";
$query = mysql_query($sqlP);
if (mysql_num_rows($query) == 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    require_once('./clientes.php');
    ?><script> sweetAlert("", "Cliente Existente.", "error");</script><?php
    header("Location: ./clientes.php");
    exit;
} else {
    $rs = mysql_query("INSERT INTO pessoa(nome, aniversario, cpf, sexo, email, telfixo, celular) 
                        VALUES ('$nomeBD','$niverBD','$CPFBD','$sexoBD','$EmailBD','$FixoBD','$celularBD');");
    $idPessoaBD = mysql_insert_id();
    $sql = "INSERT INTO cliente(Usuario_idUsuario, Pessoa_idPessoa, tipo, rua, numero, complemento, bairro, cidade, estado) 
                            VALUES ($idlogin,$idPessoaBD,0,'$ruaBD','$numeroBD','$compBD','$bairroBD','$cidadeBD','$estadosBD');";
    $rs2 = mysql_query($sql);
//            or fatal_error('MySQL Error: ' . mysql_errno());

    $idPessoaBD = mysql_insert_id();
    echo "<script>alert('$idPessoaBD');</script>";
    require_once('./clientes.php'); //mudar qdo tiver a pagina correta
    ?><script> sweetAlert("", "Novo Cliente cadastrado(a) com Sucesso.", "success");</script><?php
    header("Location: ./clientes.php");
    exit;
}
?>
