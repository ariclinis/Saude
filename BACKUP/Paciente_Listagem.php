
<!DOCTYPE html>
 <html lang="en"> 
<?php
include_once './Classes/Conexao.php';
$pdo = conexao::Chamar_conexao();
$Pegar_paciente=$pdo->prepare("SELECT * From paciente_v");
$Pegar_paciente->execute();
?>
    <head>
        <meta charset="utf-8" />
        <title>Sistema Hospitalar</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />

    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!--BEGIN SIDEBAR TOGGLE-->
                    <div class="sidebar-toggle-box hidden-phone">
                        <div class="icon-reorder"></div>
                    </div>
                    <!--END SIDEBAR TOGGLE-->
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="index.html">
                        <img src="img/logo.png" alt="Metro Lab" />
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <div id="top_menu" class="nav notify-row">
                        <!-- BEGIN NOTIFICATION -->
                        <ul class="nav top-menu">
                            <!-- BEGIN SETTINGS -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-tasks"></i>
                                    <span class="badge badge-important">6</span>
                                </a>
                                <ul class="dropdown-menu extended tasks-bar">
                                    <li>
                                        <p>You have 6 pending tasks</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Dashboard v1.3</div>
                                                <div class="percent">44%</div>
                                            </div>
                                            <div class="progress progress-striped active no-margin-bot">
                                                <div class="bar" style="width: 44%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Database Update</div>
                                                <div class="percent">65%</div>
                                            </div>
                                            <div class="progress progress-striped progress-success active no-margin-bot">
                                                <div class="bar" style="width: 65%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Iphone Development</div>
                                                <div class="percent">87%</div>
                                            </div>
                                            <div class="progress progress-striped progress-info active no-margin-bot">
                                                <div class="bar" style="width: 87%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Mobile App</div>
                                                <div class="percent">33%</div>
                                            </div>
                                            <div class="progress progress-striped progress-warning active no-margin-bot">
                                                <div class="bar" style="width: 33%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Dashboard v1.3</div>
                                                <div class="percent">90%</div>
                                            </div>
                                            <div class="progress progress-striped progress-danger active no-margin-bot">
                                                <div class="bar" style="width: 90%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="external">
                                        <a href="#">See All Tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END SETTINGS -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown" id="header_inbox_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-envelope-alt"></i>
                                    <span class="badge badge-important">5</span>
                                </a>
                                <ul class="dropdown-menu extended inbox">
                                    <li>
                                        <p>You have 5 new messages</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jonathan Smith</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is an example msg.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jhon Doe</span>
                                                <span class="time">10 mins</span>
                                            </span>
                                            <span class="message">
                                                Hi, Jhon Doe Bhai how are you ?
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jason Stathum</span>
                                                <span class="time">3 hrs</span>
                                            </span>
                                            <span class="message">
                                                This is awesome dashboard.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jondi Rose</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is metrolab
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all messages</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <li class="dropdown" id="header_notification_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <i class="icon-bell-alt"></i>
                                    <span class="badge badge-warning">7</span>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <li>
                                        <p>You have 7 new notifications</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Server #3 overloaded.
                                            <span class="small italic">34 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-warning"><i class="icon-bell"></i></span>
                                            Server #10 not respoding.
                                            <span class="small italic">1 Hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Database overloaded 24%.
                                            <span class="small italic">4 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-success"><i class="icon-plus"></i></span>
                                            New user registered.
                                            <span class="small italic">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                            Application error.
                                            <span class="small italic">10 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->

                        </ul>
                    </div>
                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN SUPPORT -->
                            <li class="dropdown mtop5">

                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                                    <i class="icon-comments-alt"></i>
                                </a>
                            </li>
                            <li class="dropdown mtop5">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                                    <i class="icon-headphones"></i>
                                </a>
                            </li>
                            <!-- END SUPPORT -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/avatar1_small.jpg" alt="">
                                    <span class="username">Nome Utilizador</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <li><a href="#"><i class="icon-user"></i>Meu perfil</a></li>
                                    <li><a href="#"><i class="icon-cog"></i>Minhas Configurações</a></li>
                                    <li><a href="login.html"><i class="icon-key"></i> Sair</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">
<?php include('Menu.php'); ?>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->  
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->   
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN THEME CUSTOMIZER-->
                            <div id="theme-change" class="hidden-phone">
                                <i class="icon-cogs"></i>
                                <span class="settings">
                                    <span class="text">Theme Color:</span>
                                    <span class="colors">
                                        <span class="color-default" data-style="default"></span>
                                        <span class="color-green" data-style="green"></span>
                                        <span class="color-gray" data-style="gray"></span>
                                        <span class="color-purple" data-style="purple"></span>
                                        <span class="color-red" data-style="red"></span>
                                    </span>
                                </span>
                            </div>
                            <!-- END THEME CUSTOMIZER-->
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                Registo de Pacientes
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Pacintes</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Pacientes
                                </li>
                                <li class="pull-right search-wrap">
                                    <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                                        <div class="input-append search-input-area">
                                            <input class="" id="appendedInputButton" type="text">
                                            <button class="btn" type="button"><i class="icon-search"></i> </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN ADVANCED TABLE widget-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget blue">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Pacientes Registados</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                <th>Nº</th>
                                                <th>Nome</th>
                                                <th>Data Nasc</th>
                                                <th>Idade</th>
                                                <th class="hidden-phone">T.Saguino</th>
                                                <th class="hidden-phone">Nº BI</th>
                                                <th class="hidden-phone">Genero</th>
                                                <th class="hidden-phone">Ocupação/Profissão</th>
                                                <th class="hidden-phone">Provincia</th>
                                                <th class="hidden-phone">Municipio</th>
                                                <th class="hidden-phone">Bairro</th>
                                                <th class="hidden-phone">Estado</th>
                                                 <th class="hidden-phone">Operador</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($Linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                <td><?php echo $Linha['cod_paciente']; ?></td>
                                                <td><?php echo $Linha['nome']; ?></td>
                                                <td><?php echo $Linha['data_nasc']; ?></td>
                                                <td><?php echo $Linha['Idade']; ?></td>
                                                <td><?php echo $Linha['Tipo_Saguino']; ?></td>
                                                <td class="center hidden-phone"><?php echo $Linha['n_bi'];?></td>
                                                <td class="hidden-phone"><?php echo $Linha['genero']; ?></td>
                                                 <td class="hidden-phone"><?php echo $Linha['Ocup_Prof']; ?></td>
                                                <td class="hidden-phone"><?php echo $Linha['provincia']; ?></td>
                                                <td class="hidden-phone"><?php echo $Linha['municipio']; ?></td>
                                                <td class="hidden-phone"><?php echo $Linha['bairro']; ?></td>
                                                <td class="hidden-phone"><span class="label label-success"><?php echo $Linha['estado']; ?></span></td>
                                                <td class="hidden-phone"><?php echo $Linha['Nome_utilizador']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>

                    <!-- END ADVANCED TABLE widget-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        
        <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->
   <script src="js/dynamic-table.js"></script>

    </body>
    <!-- END BODY -->
</html>