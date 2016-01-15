<meta charset="utf-8">

<?php
include 'session.php';
//$variavelSessao = $idlogin;
require_once('Conection.php');

if (isset($_GET['mail'])) {
    echo (tractQueryUser($_GET['mail'], $idlogin));
}

function tractQueryUser($get, $variavelSessao) {

    $query = "SELECT idCliente, nome, cpf, sexo, aniversario, email, telfixo, celular, rua, complemento, numero, bairro, cidade, estado
            FROM cliente JOIN pessoa ON Pessoa_idPessoa = idPessoa WHERE Usuario_idUsuario = $variavelSessao AND email = '$get';
    ";
    return set($query);
}

function set($parameter) {
    $outputHtml = '<h3>Cliente</h3>';
    $rs = mysql_query($parameter);
    $query = mysql_fetch_assoc($rs);
    $dataFormatada = trim($query['aniversario']);
    $dataFormatada = date("Y-m-d", strtotime($dataFormatada));

    $outputHtml .='<div class="col-sm-6">';
    $outputHtml .='<form name="formPersonal" method="post" >';
    $outputHtml .='<h4>Dados Pessoais</h4>';
    $outputHtml .= '<input type="text" name="cliente" style="display: none" value="' . $query['idCliente'] . '" />';
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
    $outputHtml .='</form>';
    $outputHtml .='</div>';

    $outputHtml .='<div class="col-sm-6">';
    $outputHtml .='<h4>Endereço</h4>';
    $outputHtml .='<input type="text" name="rua" placeholder="Rua" value="' . $query['rua'] . '"/>';
    $outputHtml .='<input type="text" name="complemento" placeholder="Complemento" value="' . $query['complemento'] . '"/>';
    $outputHtml .='<input type="text" name="numero" placeholder="Número" value="' . $query['numero'] . '"/>';
    $outputHtml .='<input type="text" name="bairro" placeholder="Bairro" value="' . $query['bairro'] . '"/>';
    $outputHtml .='<input type="text" name="cidade" placeholder="Cidade" value="' . $query['cidade'] . '"/>';
    $outputHtml .='<select name="estados">
        <option value="padrao">Selecione o Estado</option>';

    $uf = array("AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA",
        "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO");
    $estados = array("Acre (AC)", "Alagoas (AL)", "Amapá (AP)", "Amazonas (AM)", "Bahia (BA)", "Ceará (CE)",
        "Distrito Federal (DF)", "Espírito Santo (ES)", "Goiás (GO)", "Maranhão (MA)", "Mato Grosso (MT)", "Mato Grosso do Sul (MS)",
        "Minas Gerais (MG)", "Pará (PA)", "Paraíba (PB)", "Paraná (PR)", "Pernambuco (PE)", "Piauí (PI)", "Rio de Janeiro (RJ)",
        "Rio Grande do Norte (RN)", "Rio Grande do Sul (RS)", "Rondônia (RO)", "Roraima (RR)", "Santa Catarina (SC)",
        "São Paulo (SP)", "Sergipe (SE)", "Tocantins (TO)");
    $estadoBD = $query['estado'];
    for ($i = 1; $i < count($estados); $i++) {
        $outputHtml .='<option value="' . $uf[$i] . '"';
        if ($estadoBD == $uf[$i]) {
            $outputHtml .=' selected="selected"';
        }
        $outputHtml .=' >' . $estados[$i] . '</option>';
    }
    $outputHtml .='</select>';
    $outputHtml .='</div>';
    return $outputHtml;
}
?>
