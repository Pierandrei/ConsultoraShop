<?php
include('Conection.php');
$variavelPercenteTotal = 7;
$variavelCont = 0;

$sqlP = "SELECT nome, aniversario, sexo, cpf, email, telfixo, celular FROM usuario JOIN pessoa ON idpessoa = Pessoa_idPessoa WHERE ativo=1 AND idUsuario=$idlogin;";
$query = mysql_query($sqlP);

$resultado = mysql_fetch_row($query);
for ($j = 0; $j < 7; $j++) {
    if ($resultado[$j] <> null) {
        $variavelCont++;
    }
}
$total = number_format($variavelCont / $variavelPercenteTotal * 100, 0);
if ($total < 100) {
    ?>
    <li><a href="../conta.php"><i class="fa fa-list-alt"></i> <?php echo "Seu perfil está " . $total . "% completo"; ?></a></li>
        <?php
    }
    ?>



