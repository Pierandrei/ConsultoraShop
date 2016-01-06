<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {//OR ($_SESSION['Usuario'] != $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: ./index.php"); exit;
}

 $idlogin =  $_SESSION['UsuarioID'];
 $idUsuarioNome = $_SESSION['Usuario'];
 if (strlen($idUsuarioNome) >= 20){
     $idUsuarioNome = strtolower(substr($idUsuarioNome, 0, 20)).'...';
 }
$idExpiracao =$_SESSION['Expiracao']; //date('%d de %B de %Y', $_SESSION['Expiracao']);
?>
