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
        <title>Estoque | ConsultoraShop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./sweetalert-master/dist/sweetalert.css">
        <script src="./sweetalert-master/dist/sweetalert.min.js"></script>   
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <script src="js/validadorCPF.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>


        <!--<link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet" />-->
        <link href="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.css" rel="stylesheet" />
        <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="css/bootstrap-modal.css" rel="stylesheet" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>
        <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap.js"></script>
        <script src="js/bootstrap-modalmanager.js"></script>
        <script src="js/bootstrap-modal.js"></script>
        <script type="text/javascript">
            $(function() {
                $.fn.modalmanager.defaults.resize = true;
                $('[data-source]').each(function() {
                    var $this = $(this),
                            $source = $($this.data('source'));
                    var text = [];
                    $source.each(function() {
                        var $s = $(this);
                        if ($s.attr('type') == 'text/javascript') {
                            text.push($s.html().replace(/(\n)*/, ''));
                        } else {
                            text.push($s.clone().wrap('<div>').parent().html());
                        }
                    });
                    $this.text(text.join('\n\n').replace(/\t/g, '    '));
                });
                prettyPrint();
            });
        </script>

        <link rel="stylesheet" type="text/css" href="Tabela/css/jquery.dataTables.css">
        <script type="text/javascript" language="javascript" src="Tabela/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="Tabela/js/jquery.dataTables.js"></script>
        <script type="text/javascript" language="javascript" class="init">

            $(document).ready(function() {
                $('#example').dataTable({
                    "aProcessing": true,
                    "aServerSide": true,
                    "ajax": "Tabela/server-response_estoque.php",
                });
            });

        </script>
    </head>

    <body>
        <header id="header">
            <?php include './divfolder/topmenu.html'; ?>
            <?php include './divfolder/cabecalho.php'; ?>
            <?php include './divfolder/menuView.php'; ?>
        </header>

        <section >

            <div class="container">

                <div class="col-sm-10">      
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Qtd</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="col-sm-2">

                    <div class="responsive">
                        <div class="text-center">
                            <button class="demo btn btn-info btn-large" data-toggle="modal" href="#responsive">Novo Cliente</button>
                        </div>
                    </div>


                    <div id="responsive" class="modal hide fade" tabindex="-1" data-width="760">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3>Novo Cliente</h3>
                        </div>
                        <form method="post"  name="formButton" action="./validacaoCliente.php">
                            <div class="modal-body">
                                <div class="row-fluid">
                                    <div class="col-sm-6">
                                        <!--<form name="formPersonal" method="post" >-->
                                        <h4>Dados Pessoais</h4>
                                        <p><input type="text" name="nome" placeholder="Name Completo" required="required"/></p>
                                        <p><input title="CPF" type="text" name="cpf" id="cpf"  onblur="javascript: validarCPF(this.value, this);" onkeypress="javascript: mascara(this, cpf_mask);"  maxlength="14" placeholder="CPF"/></p>
                                        <select name="sexoSelect">
                                            <option value="padrao">Selecione o Sexo</option>
                                            <option value="feminino" >Feminino</option>
                                            <option value="masculino">Masculino</option>
                                        </select>
                                        <p><input title="Data de Nascimento" name="nasc" type="date" placeholder="Aniversario" /></p>
                                        <p><input type="email" name="email" placeholder="Email" required="required"/></p>
                                        <p><input title="Telefone Fixo" name="fixo" type="text" placeholder="Telefone Fixo"  onkeyup="javascript:telefone(this, '## ####-####', event)" maxlength="12"/></p>
                                        <p><input title="Telefone Celular" name="celular" type="text" placeholder="Telefone Celular"  onkeyup="javascript:telefone(this, '## #####-####', event)" maxlength="13" required="required"/></p>
                                        <!--</form>-->
                                    </div>
                                    <div class="col-sm-6">
                                        <!--<form name="formEnd" method="post" >-->
                                        <h4>Endereço</h4>
                                        <p><input type="text" name="rua" placeholder="Rua" /></p>
                                        <p><input type="text" name="complemento" placeholder="Complemento" /></p>
                                        <p><input type="text" name="numero" placeholder="Número" /></p>
                                        <p><input type="text" name="bairro" placeholder="Bairro" /></p>
                                        <p><input type="text" name="cidade" placeholder="Cidade"/></p>
                                        <select name="estados">
                                            <option value="padrao">Selecione o Estado</option>
                                            <option value="AC">Acre (AC)</option>
                                            <option value="AL">Alagoas (AL)</option>
                                            <option value="AP">Amapá (AP)</option>
                                            <option value="AM">Amazonas (AM)</option>
                                            <option value="BA">Bahia (BA)</option>
                                            <option value="CE">Ceará (CE)</option>
                                            <option value="DF">Distrito Federal (DF)</option>
                                            <option value="ES">Espírito Santo (ES)</option>
                                            <option value="GO">Goiás (GO)</option>
                                            <option value="MA">Maranhão (MA)</option>
                                            <option value="MT">Mato Grosso (MT)</option>
                                            <option value="MS">Mato Grosso do Sul (MS)</option>
                                            <option value="MG">Minas Gerais (MG)</option>
                                            <option value="PA">Pará (PA) </option>
                                            <option value="PB">Paraíba (PB)</option>
                                            <option value="PR">Paraná (PR)</option>
                                            <option value="PE">Pernambuco (PE)</option>
                                            <option value="PI">Piauí (PI)</option>
                                            <option value="RJ">Rio de Janeiro (RJ)</option>
                                            <option value="RN">Rio Grande do Norte (RN)</option>
                                            <option value="RS">Rio Grande do Sul (RS)</option>
                                            <option value="RO">Rondônia (RO)</option>
                                            <option value="RR">Roraima (RR)</option>
                                            <option value="SC">Santa Catarina (SC)</option>
                                            <option value="SP">São Paulo (SP)</option>
                                            <option value="SE">Sergipe (SE)</option>
                                            <option value="TO">Tocantins (TO)</option>
                                        </select>
                                        <!--</form>-->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
                                <button type="submit" class="btn btn-info">Novo Cliente</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section><!--/form-->


        <?php include './divfolder/footer.php'; ?>


    </body>
</html>