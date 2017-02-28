
<!DOCTYPE html>
 <html lang="en"> 
<?php
include_once './Classes/Conexao.php';
$pdo = conexao::Chamar_conexao();
$Pegar_user=$pdo->prepare("SELECT * From tbl_utilizador");
$Pegar_user->execute();

if(isset($_GET['reset'])){
        $cod_user=$_GET['reset'];
        $Mudar_Estado= $pdo->prepare("UPDATE tbl_utilizador SET Senha ='m2g123' WHERE cod_utilizador='$cod_user'");
        $Mudar_Estado->execute();
    }

?>
    <head>
        <meta charset="utf-8" />
        <title>DIGGITUS SAÚDE ERP | Utilizadores</title>
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
          <?php include_once('Topo_usu.php'); ?>
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
                                    <span class="text">Cor:</span>
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
                                Registos de Utilizadores
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Gestão de Utilizadores</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Listagem de Utilizadores 
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
                            <div class="widget black">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>  Utilizador Registados</h4>
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
                                                <th>Nome Utilizador</th>
                                                <th>Nome Login</th>
                                                <th class="hidden-phone">Estado</th>
                                                <th class="hidden-phone">Nivel</th>
                                        <th class="hidden-phone"><center>Operações</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
  
                                            <?php while ($Linha = $Pegar_user->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                <td><?php echo utf8_encode($Linha['Nome_User']); ?></td>
                                                <td><?php echo $Linha['Nome_Login']; ?></td>
                                                <td class="hidden-phone"><span class="label label-success">
                                                      <?php echo $Linha['estado']; ?>
                                                </span>
                                                </td>
                                                <td class="hidden-phone"><?php echo UTF8_ENCODE($Linha['Perfil_Acesso']); ?></td>
                                                <td class="hidden-phone"><a href="Utilizador_Permissao.php?user=<?php echo $Linha['cod_utilizador']; ?>" class="btn btn-small btn-primary"><i class="icon-pencil icon-white"></i>Atribuir Permissão</a>
                                                <a target="_blank" class="btn btn-small btn-inverse" href="Relatorios/paciente_ficha.php?cod_paciente=<?php echo $Linha['']; ?>"><i class="icon-suitcase">  </i>Corrigir Registo</a>
                                                <a class="btn btn-small btn-danger" href="?reset=<?php echo $Linha['cod_utilizador']; ?>"><i class="icon-suitcase">  </i>Resetar Senha</a>
                                                </td> 
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                    </table><p></p>
                                    
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