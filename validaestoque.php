<meta charset="utf-8">

<?php
include 'session.php';
require_once('Conection.php');


$codBD = mysql_real_escape_string($_POST['codigo']);
$produtoBD = mysql_real_escape_string($_POST['produto']);
$precoBD = mysql_real_escape_string($_POST['preco']);
$quantidadeBD = mysql_real_escape_string($_POST['qtd']);

$precoBD = str_replace("R$ ", "", $precoBD);
$precoBD = str_replace(".", "", $precoBD);
$precoBD = str_replace(",", ".", $precoBD);

$sqlP = "SELECT * FROM  produto  WHERE Usuario_idUsuario = '" . $idlogin . "' AND codigo='$codBD' LIMIT 1;";
$query = mysql_query($sqlP);

if (mysql_num_rows($query) == 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    require_once('./estoque.php');
    ?><script> sweetAlert("Produto já Cadastrado", "Caso tenha que alterar a quantidade, apenas edite o produto.", "error");</script><?php
    header("Location: ./estoque.php");
    exit;
} else {
    try {
        $rs = mysql_query("INSERT INTO produto(Usuario_idUsuario,codigo, produto, preco, estoque) VALUES ($idlogin,'$codBD','$produtoBD',$precoBD,$quantidadeBD);");
        require_once('./estoque.php'); //mudar qdo tiver a pagina correta
        ?><script> sweetAlert("", "Novo Produto cadastrado com Sucesso.", "success");</script><?php
        header("Location: ./estoque.php");
        exit;
    } catch (Exception $exc) {
        $erroVariavel = $exc->getTraceAsString();
        require_once('./estoque.php'); //mudar qdo tiver a pagina correta
        ?><script> sweetAlert("ERRO ao cadastrar", "", "error");</script><?php
        header("Location: ./estoque.php");
    }
}
?>
