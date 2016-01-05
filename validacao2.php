<meta charset="utf-8">

<?php
require_once('./Conection.php');

        if (!empty($_POST) AND (empty($_POST['txNomeNew']) OR empty($_POST['txmailNew'])OR empty($_POST['txSenhaNew']))) {
             header("Location: ./login.html");  exit;
        }
        $nome = mysql_real_escape_string($_POST['txNomeNew']);
        $senha = mysql_real_escape_string($_POST['txSenhaNew']);
        $mail = mysql_real_escape_string($_POST['txmailNew']);
        
        $sqlP = "SELECT * FROM usuario WHERE login = '". $mail ."' LIMIT 1;";
        $query = mysql_query($sqlP);
         if (mysql_num_rows($query) == 1) {
            // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
            require_once('./login.html');
              echo  '<script> sweetAlert("","Usuário Existente, tente outro email.", "error");</script>';
                header("Location: ./login.html"); 
            exit;
        } else {
            $rs=mysql_query("INSERT INTO pessoa (nome, email) values ('".$nome."','".$mail."');");
            $idPessoa = mysql_insert_id();
            if ($rs ){
                 $rs2=mysql_query("INSERT INTO usuario (Pessoa_idPessoa, dataCadastro, login, senha, ativo, dataExpiracao)
                     values ($idPessoa,NOW(),'".$mail."', '". sha1($senha) ."', 1, DATE_ADD(NOW(), INTERVAL 30 DAY));");
            }
             require_once('./login.html');//mudar qdo tiver a pagina correta
              echo  '<script> swal("Cadastrado(a) com Sucesso!", "Bem vindo(a) a ConsultoraShop!", "success");</script>';
                header("Location: ./login.html"); //mudar qdo tiver a pagina correta
            exit;

        }
?>
