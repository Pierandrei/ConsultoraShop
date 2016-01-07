<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login | E-Shopper</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <!--framework para alertas  -->  
        <link rel="stylesheet" type="text/css" href="./sweetalert-master/dist/sweetalert.css">
        <script src="./sweetalert-master/dist/sweetalert.min.js"></script>   
        <!-- framework de notificação -->
        <script src="../notificar/alertify.min.js"></script>
        <!-- include the style -->
        <link rel="stylesheet" href="../notificar/css/alertify.min.css" />
        <!-- include a theme -->
        <link rel="stylesheet" href="../notificar/css/themes/default.min.css" />  

        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

        <script type="text/javascript">
            function checar_caps_lock(ev) {
                var e = ev || window.event;
                codigo_tecla = e.keyCode ? e.keyCode : e.which;
                tecla_shift = e.shiftKey ? e.shiftKey : ((codigo_tecla == 16) ? true : false);
                if (((codigo_tecla >= 65 && codigo_tecla <= 90) && !tecla_shift) || ((codigo_tecla >= 97 && codigo_tecla <= 122) && tecla_shift)) {
                    document.getElementById('aviso_caps_lock').style.visibility = 'visible';
                    document.getElementById('aviso_caps_lock1').style.visibility = 'hidden';
                }
                else {
                    document.getElementById('aviso_caps_lock').style.visibility = 'hidden';
                }
            }
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

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="index.php"><img src="images/home/logo_reduzido.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->
        </header><!--/header-->

        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Acesso ConsultoraShop</h2>
                            <form method="post" action="./controleUser/validacao.php">
                                <input name="txmail" type="email" placeholder="Endereço de Email" required="required"/>
                                <input name="txSenha" type="password" placeholder="Senha" onkeypress="checar_caps_lock(event)" maxlength="15" required="required" pattern="[a-zA-Z0-9]+" />
                                <div class="warning" align="center" id="aviso_caps_lock" style="visibility: hidden;color:rgb(255,127,39)"><B> CAPS LOCK ATIVADO</B></div>
                                <button type="submit" value="Entrar" name="btconsultora" class="btn btn-default">Login</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OU</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>Nova ConsultoraShop</h2>
                            <form method="post" action="./controleUser/validacao2.php">
                                <input name="txNomeNew" type="text" placeholder="Nome" required="required"/>
                                <input name="txmailNew" type="email" placeholder="Endereço de Email" required="required"/>
                                <input name="txSenhaNew" type="password" placeholder="Senha" onkeypress="checar_caps_lock1(event)" maxlength="15" required="required" pattern="[a-zA-Z0-9]+"/>
                                <div class="warning" align="center" id="aviso_caps_lock1" style="visibility: hidden;color:rgb(255,127,39)"><B> CAPS LOCK ATIVADO</B></div>
                                <button type="submit" value="EntrarNew" name="btconsultoranew" class="btn btn-default">Cadastrar</button>
                            </form>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->

        <?php include './divfolder/footer.php'; ?>

        <script src="js/jquery.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>