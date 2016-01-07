<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dados ConsultoraShop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./sweetalert-master/dist/sweetalert.css">
        <script src="./sweetalert-master/dist/sweetalert.min.js"></script>   
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->   
        <script src="js/validadorCPF.js"></script>
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

        <script type="text/javascript">
            function checar_caps_lock1(ev) {
                var e = ev || window.event;
                codigo_tecla = e.keyCode ? e.keyCode : e.which;
                tecla_shift = e.shiftKey ? e.shiftKey : ((codigo_tecla == 16) ? true : false);
                if (((codigo_tecla >= 65 && codigo_tecla <= 90) && !tecla_shift) || ((codigo_tecla >= 97 && codigo_tecla <= 122) && tecla_shift)) {
                    document.getElementById('aviso_caps_lock1').style.visibility = 'visible';
                    document.getElementById('aviso_caps_lock').style.visibility = 'hidden';
                }
                else {
                    document.getElementById('aviso_caps_lock1').style.visibility = 'hidden';
                }
            }
        </script>

    </head><!--/head-->

    <body>
        <header id="header"><!--header-->

            <?php include './divfolder/topmenu.html'; ?>
            <?php include './divfolder/cabecalho.php'; ?>
            <?php include './controleUser/dadosUser.php'; ?>
            <?php include './divfolder/menuView.php'; ?>
        </header><!--/header-->

        <section id="cart_items">
            <div class="container">
                <div class="register-req">
                    <h4>Minha Assinatura</h4>
                    <br><b>Data do Cadastro: </b><?php echo $cadastroBD; ?>
                    <br><b>Status: </b>Ativo
                    <br><b>Pacote atual Expira em: </b><?php echo $idExpiracao; ?>
                </div><!--/register-req-->
                <div class="register-req">
                    <h4>Meus Dados</h4><br>

                    <div class="shopper-informations">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <div class="shopper-info">
                                    <p>Alteração de Conta</p><br>
                                    <form method="post" action="./validacaoPesornal.php">
                                        <input name="newEmail" type="email" placeholder="Informe seu Email"required="required">
                                        <input name="newsenha1" type="password" placeholder="Nova Senha" onkeypress="checar_caps_lock1(event)" maxlength="15" required="required" pattern="[a-zA-Z0-9]+">
                                        <input name="newsenha2" type="password" placeholder="Confirme a Senha" onkeypress="checar_caps_lock1(event)" maxlength="15" required="required" pattern="[a-zA-Z0-9]+">
                                        <div class="warning" align="center" id="aviso_caps_lock1" style="visibility: hidden;color:rgb(255,127,39)"><B> CAPS LOCK ATIVADO</B></div>
                                        <button type="submit" class="btn btn-info">Alterar</button>
                                        <!--<a class="btn btn-primary" style="width: 100px" href="">Alterar</a>-->
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <div class="shopper-info">
                                    <p>Informações Pessoais</p><br>
                                    <!--<div class="form-two">-->
                                    <form method="post" action="./validacaoInsert.php" name="form1">
                                        <input type="text" name="nome" placeholder="Name Completo" value="<?php echo $nomeBD; ?>"/>
                                        <select name="sexoSelect">
                                            <option value="padrao">Selecione o Sexo</option>
                                            <option value="feminino" <?php if ($sexoBD == 'f') { ?>  selected="selected"  <?php } ?> >Feminino</option>
                                            <option value="masculino" <?php if ($sexoBD == 'm') { ?>  selected="selected"  <?php } ?> >Masculino</option>
                                        </select>
                                        <input title="Data de Nascimento" name="nasc" type="date" placeholder="Aniversario" value="<?php echo $niverBD; ?>"/>
                                        <input title="CPF" type="text" name="cpf" id="cpf" value="<?php echo $CPFBD; ?>" onblur="javascript: validarCPF(this.value, this);" onkeypress="javascript: mascara(this, cpf_mask);"  maxlength="14" placeholder="CPF"/>
                                        <input title="Telefone Fixo" name="fixo" type="text" placeholder="Telefone Fixo" value="<?php echo $FixoBD; ?>" onkeyup="javascript:telefone(this, '## ####-####', event)" maxlength="12"/>
                                        <input title="Telefone Celular" name="celular" type="text" placeholder="Telefone Celular" value="<?php echo $celularBD; ?>" onkeyup="javascript:telefone(this, '## #####-####', event)" maxlength="13"/>
                                        <button type="submit" class="btn btn-info">Alterar</button>
                                    </form>
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <?php include './divfolder/footer.php'; ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>