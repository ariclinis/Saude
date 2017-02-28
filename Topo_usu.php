<?php 
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
session_start();
$cod=$_SESSION['cod'];

if($cod>0){

}
else{ 
    echo '<script type = "text/javascript">
location.href="./index.php";
</script>';           
}

if(isset($_GET['sair'])){
    session_destroy(); 
       echo '<script type = "text/javascript">
location.href="./index.php";
</script>';   
}
?>
<div class="navbar-inner">
                <div class="container-fluid">
                    <!--BEGIN SIDEBAR TOGGLE-->
                    <div class="sidebar-toggle-box hidden-phone">
                        <div class="icon-reorder"></div>
                    </div>
                    <!--END SIDEBAR TOGGLE-->
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="Pagina_Inicial.php">
                        <img src="img/Log_diggitus.PNG" alt="DIGGITUS SAÚDE" />
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->

                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN SUPPORT -->
                            <!---
                            <li class="dropdown mtop5">

                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                                    <i class="icon-comments-alt"></i>
                                </a>
                            </li>
                            --->
                            <li class="dropdown mtop5">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="?sair" data-original-title="Sair">
                                    <i class="icon-key"></i>
                                </a>
                            </li>
                            <!-- END SUPPORT -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/avatar-mini.png" alt="">
                                    <span class="username"><?php echo utf8_encode ($_SESSION['nome']); ?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                <li><a href="Utilizador_Senha.php"><i class="icon-user"></i> Alterar Senha</a></li>
                                <li><a href="?sair"><i class="icon-key"></i> Terminar Sessão</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>