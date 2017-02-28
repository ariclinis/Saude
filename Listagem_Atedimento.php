
<!DOCTYPE html>
<html lang="en"> 

    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $Pegar_P_atedindos = $pdo->prepare("SELECT * From atendimento_v");
    $Pegar_P_atedindos->execute();

    $Pegar_doctor = $pdo->prepare("SELECT distinct Nome_Doctor From atendimento_v");
    $Pegar_doctor->execute();
    $Pegar_diagnostico = $pdo->prepare("SELECT distinct Des_Diag From atendimento_v");
    $Pegar_diagnostico->execute();
    ?>
    <head>
        <meta http-equiv="content-type"  content="text/html; Charset=utf-8" >
        <title>DIGGITUS SAÚDE ERP | Atendimento</title>
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
            <?php include_once('Topo_usu.php') ?>
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER-->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">
                <?php include('Menu.php') ?>
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
                            <h3 class="page-title">Listagem de Atedimentos</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Atedimento</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Listagem de Atedimentos
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
                                    <h4><i class="icon-reorder"></i>  Pacientes Atedindos</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th style="width:8px"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                <th>Nº</th>
                                                <th>Nome Paciente</th>
                                                <th>Diagnostico</th>
                                                <th>Data</th>
                                                <th class="hidden-phone">Patológia</th>
                                                <th class="hidden-phone">Médico(a)/Enfermeiro(a)</th>
                                                <th class="hidden-phone"><center>Operações</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                             while ($Linha = $Pegar_P_atedindos->fetch(PDO::FETCH_ASSOC)) {

                                              ?>
                                                <tr>
                                    
                                                    <th class="odd grade"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                    <th><?php echo $ordem+=1; ?></th>
                                                    <th> <?php echo $Linha['Nome_Paciente']; ?></th>
                                                    <th><?php echo  utf8_encode($Linha['Des_Diag']); ?></th>
                                                    <th><?php echo $Linha['Data_Atend']; ?></th>
                                                    <th class="hidden-phone"><?php echo $Linha['Des_Patologias']; ?></th>
                                                    <th class="hidden-phone"><?php echo utf8_encode($Linha['Nome_Doctor']); ?></th> 
                                                    <td class="hidden-phone"><a href="" class="btn btn-small btn-primary"><i class="icon-pencil icon-white"></i> Corrigir Resgistos</a>
                                                        <a class="btn btn-small btn-inverse" href="Relatorios/ficha_Atedimento.php?cod_atend=<?php echo $Linha['Cod_Ated']; ?>"><i class="icon-pencil icon-white"<i class="icon-suitcase">  </i>Imprimir Ficha</a></td>
                                                </tr>


                                                    <?php } ?>
                                    </tbody>
                                    </table><p></p>
                                    <div class="form-actions"><p></p>
                                        <form  name="frm_Relatorio" action="Relatorios/Listagem_Atedimento.php" method="POST">
                                            <h4><i class="icon-print"> Opções de Pequisas</h4></i><p></p>
                                            <label>Datas</label>De<input type="date" name="data_inicio" class="span2"> <select type="text" name="texto" class="span1">
                                                <option value=""></option>
                                                <option value="Até">Até</option>
                                                <option value="Para">Para</option>
                                            </select>
                                            <input type="date" name="data_fim" class="span2"><p></p>
                                            <select class="span3"  data-placeholder="Diagnostico" name="Diagnostico" tabindex="1">
                                                <option value="">Selecione o Diagnostico</option>
                                                <?php
                                                while ($diagnostico = $Pegar_diagnostico->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo $diagnostico['Des_Diag']; ?>">
                                                    <?php echo $diagnostico['Des_Diag']; ?></option>
                                                <?php } ?>

                                            </select> 
                                            <select class="span3"  data-placeholder="Nome" name="Nome" tabindex="1">
                                                <option value="">Selecione o Doctor(a)</option>
                                                <?php
                                                while ($doctor = $Pegar_doctor->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo $doctor['Nome_Doctor']; ?>"><?php echo $doctor['Nome_Doctor']; ?></option>
                                                <?php } ?>
                                            </select><p></p>
                                            <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Imprimir Lista</button>

                                        </form>
                                    </div>
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