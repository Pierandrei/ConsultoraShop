<meta charset="utf-8">

<?php
include 'session.php';
//$variavelSessao = $idlogin;
require_once('Conection.php');

if (isset($_GET['mail'])) {
    echo (tractQueryUser($_GET['mail'], $idlogin));
}

function tractQueryUser($get, $variavelSessao) {

    $query = "SELECT nome, cpf, sexo, aniversario, email, telfixo, celular, rua, complemento, numero, bairro, cidade, estado
            FROM cliente JOIN pessoa ON Pessoa_idPessoa = idPessoa WHERE Usuario_idUsuario = $variavelSessao AND email = '$get';
    ";
    return set($query);
}

function set($parameter) {
    $outputHtml = '<h3>Dados</h3>';
    $rs = mysql_query($parameter);
    $query = mysql_fetch_assoc($rs);
    $dataFormatada = trim($query['aniversario']);
    $dataFormatada = date("Y-m-d", strtotime($dataFormatada));
    
    $outputHtml .= '<input type="text" name="nome" placeholder="Name Completo" value="' . $query['nome'] . '" required="required"/>';
    $outputHtml .= '<input title="CPF" type="text" name="cpf" id="cpf" value="' . $query['cpf'] . '" onblur="javascript: validarCPF(this.value, this);" onkeypress="javascript: mascara(this, cpf_mask);"  maxlength="14" placeholder="CPF"/>';
    $outputHtml .= '<select name="sexoSelect">
    <option value="padrao">Selecione o Sexo</option>
    <option value="feminino"';
    if ($query['sexo'] == 'f') {
        $outputHtml .= ' selected="selected"';
    }
    $outputHtml .=' >Feminino</option>';
    $outputHtml .= '<option value="masculino"';
    if ($query['sexo'] == 'm') {
        $outputHtml .=' selected="selected"';
    } $outputHtml .=' >Masculino</option>';
    $outputHtml .='</select>';
    $outputHtml .='<input title="Data de Nascimento" value="' . $dataFormatada . '" name="nasc" type="date" placeholder="Aniversario" />';
    $outputHtml .='<input type="email" name="email" value="' . $query['email'] . '" placeholder="Email" required="required"/>';
    $outputHtml .='<input title="Telefone Fixo" name="fixo" value="' . $query['telfixo'] . '" type="text" placeholder="Telefone Fixo"  onkeyup="javascript:telefone(this, ' . '## #### - ####' . ', event)" maxlength="12"/>';
    $outputHtml .='<Input title="Telefone Celular" name="celular" value="' . $query['celular'] . '" type="text" placeholder="Telefone Celular"  onkeyup="javascript:telefone(this, ' . '## ##### - ####' . ', event)" maxlength="13" required="required"/>';
    return $outputHtml;
}
?>
