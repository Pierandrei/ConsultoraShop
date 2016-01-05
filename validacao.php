<meta charset="utf-8">

<?php
require_once('./Conection.php');

//verifica qual botao chamou, de login ou novo cadastro
if (isset($_POST['btconsultora'])) {
    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['txmail']) OR empty($_POST['txSenha']))) {
            header("Location: login.php"); exit;
    }
    $usuario = mysql_real_escape_string($_POST['txmail']);
    $senha = mysql_real_escape_string($_POST['txSenha']);
    // Validação do usuário/senha digitados para cadastro pedente de aprovação
    $sqlP = "SELECT * FROM usuario WHERE ativo=1 and senha = '". sha1($senha) ."' and login = '". $usuario ."' LIMIT 1;";
    $query = mysql_query($sqlP);
    
    if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	require_once('./login.html');
	  echo  '<script> sweetAlert("","Usuário ou Senha inválido!", "error");</script>';
	exit;
    } else {
        //para niveis de acesso
        
//	// Salva os dados encontados na variável $resultado
//	$resultado = mysql_fetch_assoc($query);
//
//	// Se a sessão não existir, inicia uma
//	if (!isset($_SESSION)) session_start();
//
//	// Salva os dados encontrados na sessão
//	$_SESSION['UsuarioID'] = $resultado['idlog'];
//	$_SESSION['UsuarioNivel'] = $resultado['nivelacesso'];
//	$idlog = $resultado['idlog'];
//
//     mysql_query("UPDATE login SET data_ultimo_login = now() WHERE idlog ='{$idlog}'");
//
//	// Redireciona o visitante
//	if ($_SESSION['UsuarioNivel'] == 1) 
//	header("Location: ../pagina_projeto/projeto.php"); 
//	
//		if ($_SESSION['UsuarioNivel'] == 2) 
//	header("Location: ../pagina_prof/prof.php"); 
//	
//		if ($_SESSION['UsuarioNivel'] == 4) 
//	header("Location: ../pagina_coord/coord.php"); 
//	
//		if ($_SESSION['UsuarioNivel'] == 3) 
//	header("Location: ../pagina_adm/adm.php"); 
//	 exit;
    }
    
}
else{
    if (isset($_POST['btconsultoranew'])) {
        if (!empty($_POST) AND (empty($_POST['txNomeNew']) OR empty($_POST['txmailNew'])OR empty($_POST['txSenhaNew']))) {
            header("Location: login.php"); exit;
        }
        $nome = mysql_real_escape_string($_POST['txNomeNew']);
        $senha = mysql_real_escape_string($_POST['txSenhaNew']);
        $mail = mysql_real_escape_string($_POST['txmailNew']);
        
        $rs=mysql_query("INSERT INTO pessoa (nome, email) values ('".$nome."','".$mail."');");
        $idPessoa = mysql_insert_id();
        if ($rs ){
             $rs2=mysql_query("INSERT INTO usuario (Pessoa_idPessoa, dataCadastro, login, senha, ativo, dataExpiracao)
                 values ($idPessoa,'NOW()','".$mail."', '". sha1($senha) ."', 1, 'DATE_ADD(NOW(), INTERVAL 30 DAY)');");
        }
        echo '<script>sweetAlert({ title: "Cadastrado com sucesso!",   timer: 1700, type: "success", showConfirmButton: false });';
//mandar para a pagina princiapal
//        header("Location: ../pagina_adm/adm.php"); 
        
    }
}







?>
