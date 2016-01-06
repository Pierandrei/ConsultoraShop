<?php

require_once('./Conection.php');
$variavelPercenteTotal = 7;
$variavelCont=0;
$sqlP = " SELECT nome, aniversario, sexo, cpf, email, fixo, celular FROM usuario JOIN pessoa ON idpessoa = Pessoa_idPessoa WHERE ativo=1 AND idUsuario=$idlogin;";
$query = mysql_query($sqlP);

while ($row = mysql_fetch_array($query)) {
    for ($j = 0; $j < 7; $j++) {
        if ($row[$j] <> null) {
            $variavelCont++;
        }
    }
}
?>
<li><a href="./conta.php"><i class="fa fa-list-alt"></i> <?php echo "Seu perfil está ".number_format( $variavelCont/$variavelPercenteTotal*100,0) ."% completo"; ?></a></li>

