<!DOCTYPE html>
 <html lang="en"> 
<?php
session_start();
include_once './Classes/Conexao.php';
$usu=$_SESSION['cod'];

$pdo = conexao::Chamar_conexao();
$Pegar_func=$pdo->prepare("SELECT * From tbl_funcionario WHERE Cod_Utilizador = '$usu'");
$Pegar_func->execute();
$funci=$Pegar_func->fetch(PDO::FETCH_ASSOC);

$Pegar_func=$pdo->prepare("SELECT * From tbl_utilizador WHERE cod_utilizador = '$usu'");
$Pegar_func->execute();
$funci_user=$Pegar_func->fetch(PDO::FETCH_ASSOC);

$cod_f_user=$funci_user['Cod_funci'];
$Pegar_agenda=$pdo->prepare("SELECT * From meus_pacientes_v WHERE (tbl_utilizador_cod_utilizador = '$usu' OR Cod_Funcionario='$cod_f_user') AND Estado_Fila='Aguarda Atedimento'");
$Pegar_agenda->execute();

?>
   <head>
   <meta charset="utf-8" />
   <title>DIGGITUS SAÚDE ERP | Meus Pacientes</title>
   <link rel="icon" type="image/png" href="./img/log_.png" />
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
            <?php include './Topo_usu.php'; ?>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">
<?php require('Menu.php'); ?>
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
                               Meus Pacientes
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Atedimentos</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                   Meus Pacientes 	
                                </li>
                                <li class="pull-right search-wrap">
                                    
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
                                    <h4><i class="icon-reorder"></i>  Fila de Espera</h4>
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
                                                <th>Nº Ordem</th>
                                                <th>Nome Paciente</th>
                                                  <th>Data Consulta</th>
                                                <th>Hora de Entrada</th> 
                                                <th class="hidden-phone">Estado Fila</th>
                                                <th class="hidden-phone">Operador</th>
<!--                                                <th class="hidden-phone">Doctor</th>-->
                                                <th class="hidden-phone"><center>Operação</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $c=0; while ($Linha = $Pegar_agenda->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr class="odd gradeX">
                                            
                                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                <td><?php  echo $c+=1 ; ?></td>
                                                <td><?php echo ($Linha['nome']); ?></td>
                                                <td><?php echo $Linha['Data_Consult']; ?></td>
                                                <td><?php echo $Linha['Hora_Inicio']; ?></td>                    
                                                <td class="hidden-phone"><span class="label label-success"><?php echo $Linha['Estado_Fila']; ?></span></td>
                                                <td class="center hidden-phone">
                                                 

                                                <?php echo utf8_encode($Linha['Nome_User']);?></td>

<!--                                                <td class="center hidden-phone">
                                                <?php $cod_fu=$Linha["Cod_Funcionario"];
$Pegar_func=$pdo->prepare("SELECT * From funcionario_v WHERE cod_funcionario = '$cod_fu'");
$Pegar_func->execute();
$funci=$Pegar_func->fetch(PDO::FETCH_ASSOC);
echo $funci['nome'];
?>
  
</td>-->
                                                
                                                <td class="hidden-phone">
                                                    
                                                        <a href="Atedimento_Paciente.php?Estado_consulta=Em+Atendimento&Cod_Paciente=<?php echo $Linha['cod_paciente'];?>&Nome_Paciente=<?php echo $Linha['nome'];?>&cod_consulta=<?php echo $Linha['cod_consulta'];?>" class="btn btn-small btn-primary"> Atender Paciente<a/>
                                                   
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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