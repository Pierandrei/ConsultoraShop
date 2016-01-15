<meta charset="utf-8">

<?php
include 'session.php';
require_once('Conection.php');

if (isset($_GET['id'])) {
    echo (tractQueryUser($_GET['id'], $idlogin));
}

function tractQueryUser($get, $variavelSessao) {

    $query = "SELECT idProduto, codigo, produto, preco, estoque 
            FROM produto WHERE Usuario_idUsuario = $variavelSessao AND codigo = '$get';
    ";
    return set($query);
}

function set($parameter) {
    $variavelMascara = "return (MascaraMoeda(this, '.', ',', event))";
    $outputHtml = '<h3>Produto</h3>';
    $rs = mysql_query($parameter);
    $query = mysql_fetch_assoc($rs);
    $PrecoFormatado = "R$ " . $query['preco'];
    $PrecoFormatado = str_replace(".", ",", $PrecoFormatado);

    $outputHtml .='<div class="col-sm-8">';
    $outputHtml .= '<input type="text" name="idProduto" style="display: none" value="' . $query['idProduto'] . '" />';
    $outputHtml .='<p><input type="text" value="' . $query['codigo'] . '" name="codigo" maxlength="10" placeholder="Codigo do Produto" required="required"/></p>';
    $outputHtml .='<p><input type="text" value="' . $query['produto'] . '" name="produto" placeholder="Descrição do Produto" required="required"/></p>';
    $outputHtml .='<p><input type="text" value="' . $PrecoFormatado . '"  name="preco"  placeholder="Preço do Produto" onKeyPress="' . $variavelMascara . '" maxlength="8" required="required"/></p>';
    $outputHtml .='<p><input type="text" value="' . $query['estoque'] . '" name="qtd" maxlength="3" placeholder="Quantidade do Produto" onKeyPress="return Enum(event)" required="required"/></p>';
    $outputHtml .='</div>';
    return $outputHtml;
}
?>
