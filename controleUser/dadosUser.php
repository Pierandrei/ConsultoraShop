<meta charset="utf-8">

<?php
include '../divfolder/session.php';

require_once('./Conection.php');

$sqlP = "SELECT dataCadastro,sexo, nome, DATE_FORMAT(aniversario, '%dd/%mm/%YY') AS data_nas, sexo, cpf, email, fixo, celular FROM usuario JOIN pessoa ON idpessoa = Pessoa_idPessoa WHERE ativo=1 AND idUsuario=$idlogin;";
$query = mysql_query($sqlP);

$resultado = mysql_fetch_assoc($query);

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

$cadastroBD = strftime("%d de %B de %Y", strtotime($resultado['dataCadastro']));
$nomeBD = $resultado['nome'];
$niverBD = $resultado['data_nas'];
$sexoBD = $resultado['sexo'];
$CPFBD = $resultado['cpf'];
$EmailBD = $resultado['email'];
$FixoBD = $resultado['fixo'];
$celularBD = $resultado['celular'];
?>
