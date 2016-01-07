<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left" style="padding-top: 10px">
                    <a href="#"><img src="images/home/logo_reduzido.png" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <!--							<ul class="nav navbar-nav">-->
                    <ul class="nav navbar-nav">
                        <li><a href="./conta.php"><i class="fa fa-user"></i> <?php echo $idUsuarioNome; ?></a></li>
                        <li><a href="./conta.php"><i class="fa fa-calendar"></i> <?php echo "Expira em $idExpiracao" ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <!--							<ul class="nav navbar-nav">-->
                    <ul class="nav navbar-nav">
                        <?php include 'percente.php'; ?>
                        <li><a href="./logout.php"><i class="fa fa-sign-out"></i>Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>