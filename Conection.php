<?php

$servidor='localhost';
$bd='consultorashop';
$usuario='root';
$senha='';


//conecta com o servidor de BD
$conexao = mysql_connect($servidor,$usuario,$senha);

//testa se houve a conexao com o servidor de BD
if (!$conexao) {
   
    die('Não conectou-se ao localhost: ' . mysql_error());
}

//conecta com o BD
$banco = mysql_select_db($bd);

//testa se houve a conexao com o BD
if (!$banco) {
 
    die ('Nao pode carregar o BD : ' . mysql_error());
}



//tirar todos os erros
error_reporting(0);
ini_set(“display_errors”, 0 );


?>

