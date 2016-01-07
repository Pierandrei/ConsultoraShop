<meta charset="utf-8">

<?php
$sqlP = "SELECT dataCadastro,sexo, nome, aniversario, sexo, cpf, email, telfixo, celular FROM usuario JOIN pessoa ON idpessoa = Pessoa_idPessoa WHERE ativo=1 AND idUsuario=$idlogin;";
$query = mysql_query($sqlP);

$resultado = mysql_fetch_assoc($query);

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

$cadastroBD = strftime("%d de %B de %Y", strtotime($resultado['dataCadastro']));
$nomeBD = $resultado['nome'];
$dataFormatada = trim($resultado['aniversario']);
$dataFormatada = date("Y-m-d", strtotime($dataFormatada));
$niverBD = $dataFormatada;//$resultado['aniversario'];
$sexoBD = $resultado['sexo'];
$CPFBD = $resultado['cpf'];
$EmailBD = $resultado['email'];
$FixoBD = $resultado['telfixo'];
$celularBD = $resultado['celular'];
?>
