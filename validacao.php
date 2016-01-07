<meta charset="utf-8">

<?php
require_once('./Conection.php');

    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['txmail']) OR empty($_POST['txSenha']))) {
            header("Location: ./login.php"); exit;
    }
    $usuario = mysql_real_escape_string($_POST['txmail']);
    $senha = mysql_real_escape_string($_POST['txSenha']);
    // Validação do usuário/senha digitados para cadastro pedente de aprovação
    //SELECT idUsuario, nome FROM  `usuario` JOIN pessoa ON idpessoa =  `Pessoa_idPessoa` 
    $sqlP = "SELECT idUsuario, nome, dataExpiracao, Pessoa_idPessoa FROM usuario JOIN pessoa ON idpessoa = Pessoa_idPessoa WHERE ativo=1 and senha = '". sha1($senha) ."' and login = '". $usuario ."' LIMIT 1;";
    $query = mysql_query($sqlP);
    
    if (mysql_num_rows($query) != 1) {
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	require_once('./login.php');
	  ?><script> sweetAlert("","Usuário ou Senha inválido!", "error");</script><?php
          header("Location: ./login.php"); 
	exit;
    } else {
        //para niveis de acesso
        
//       require_once('./login.html');//mudar qdo tiver a pagina correta
//              
//                header("Location: ./login.html"); //mudar qdo tiver a pagina correta
//                exit;
        
	// Salva os dados encontados na variável $resultado
	$resultado = mysql_fetch_assoc($query);

	// Se a sessão não existir, inicia uma
	if (!isset($_SESSION)) session_start();

	// Salva os dados encontrados na sessão
	$_SESSION['UsuarioID'] = $resultado['idUsuario'];
        $_SESSION['Usuario'] = $resultado['nome'];
        $_SESSION['PessoaID'] = $resultado['Pessoa_idPessoa'];
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
	date_default_timezone_set('America/Sao_Paulo');
        $_SESSION['Expiracao'] = strftime("%d de %B de %Y", strtotime( $resultado['dataExpiracao'] ));//strftime('%d de %B de %Y', $resultado['dataExpiracao']);
//	$_SESSION['UsuarioNivel'] = $resultado['nivelacesso'];
//	$idlog = $resultado['idlog'];

//     mysql_query("UPDATE login SET data_ultimo_login = now() WHERE idlog ='{$idlog}'");

	// Redireciona o visitante
//	if ($_SESSION['UsuarioNivel'] == 1) 
       // echo  '<script> swal("", "Login com Sucesso!", "success");</script>';
	header("Location: ./agenda.php"); 
//	
//		if ($_SESSION['UsuarioNivel'] == 2) 
//	header("Location: ../pagina_prof/prof.php"); 
//	
//		if ($_SESSION['UsuarioNivel'] == 4) 
//	header("Location: ../pagina_coord/coord.php"); 
//	
//		if ($_SESSION['UsuarioNivel'] == 3) 
//	header("Location: ../pagina_adm/adm.php"); 
	 exit;
    }
    

?>
