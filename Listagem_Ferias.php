
<!DOCTYPE html>
<html lang="en"> 
    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $Pegar_Funcionario = $pdo->prepare("SELECT * From funcionario_v");
    $Pegar_Funcionario->execute();
    
    $Mapa_Ferias = $pdo->prepare("SELECT * From plano_ferias_v");
    $Mapa_Ferias->execute();
    
    $Pegar_MÊS_FERIAS = $pdo->prepare("Select * From tbl_periodos");
    $Pegar_MÊS_FERIAS->execute();
    
    $Pegar_unidade_saude = $pdo->prepare("SELECT * From tbl_uni_san");
    $Pegar_unidade_saude->execute();
    ?>
    <head>
        <meta charset="utf-8" />
        <title>DIGGITUS SAÚDE ERP | Plano Férias</title>
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
                                Registos de Funcionarios
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Recursos Humanos</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Mapa de Férias
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
                                    <h4><i class="icon-reorder"></i> Lista dos Funcionários com Férias Marcadas</h4>
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
                                                <th class="hidden-phone">NIP</th>
                                                <th>Nome</th>
                                                <th class="hidden-phone">Data Inicio</th>
                                                <th class="hidden-phone">Data Fim</th>
                                                <th class="hidden-phone">Dias Direto</th>
                                                <th class="hidden-phone">Dias Marcados</th>
                                                <th class="hidden-phone">Dias por Marcar</th>
                                                <th class="hidden-phone">Estado Férias</th>
                                               
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($Linha = $Mapa_Ferias->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr class="odd gradeX">
                                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                    <td class="hidden-phone"><?php echo $Linha['N_Interno']; ?></td>
                                                    <td><?php echo utf8_encode($Linha['Nome_Funcionario']); ?></td>
                                                    <td class="center hidden-phone"><?php echo utf8_encode($Linha['Data_Inicio']); ?></td>
                                                    <td class="center hidden-phone"><?php echo utf8_encode($Linha['Data_Fim']); ?></td>
                                                    <td class="hidden-phone"><?php echo $Linha['Directo']; ?></td>
                                                    <td class="hidden-phone"><?php echo $Linha['Dias_Gozar']; ?></td>
                                                    <td class="hidden-phone"><?php echo "0"; ?></td>
                                                    
                                                    <td class="hidden-phone"><span class="label label-success"><?php echo utf8_encode($Linha['Estado_Ferias']); ?></span></td>
                                                    </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table><p></p>
                                    <div class="form-actions"><p></p>
                                        <form  name="frm_Relatorio" action="Relatorios/Mapa_Ferias.php" target="_blank" method="POST">
                                            <h4><i class="icon-print"> Opções de Pequisas</h4><p></p></i><p></p><br></br>

                                            <select class="span3"  data-placeholder="MES_FERIAS" name="MES_FERIAS" tabindex="1">
                                                <option value=""> Selecione o mês da Féria</option>
                                                <option value=""> </option>
                                                <?php
                                                header('Content-Type: text/html; charset=utf-8');
                                                while ($linha = $Pegar_MÊS_FERIAS->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo utf8_encode($linha['Desc_Mes']) ?>"><?php echo utf8_encode($linha['Desc_Mes']); ?></option>
                                                <?php } ?>
                                            </select> <select class="span3"  data-placeholder="Trabalho_local" name="Trabalho_local" tabindex="1">
                                                <option value="">Local Trabalho</option>
                                                <option value=""> </option>
                                                <?php
                                                header('Content-Type: text/html; charset=utf-8');
                                                while ($linha = $Pegar_unidade_saude->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo utf8_encode($linha['Desc_Unidade_San']) ?>"><?php echo utf8_encode($linha['Desc_Unidade_San']); ?></option>
                                                <?php } ?>
                                            </select><p></p>

                                            <button type="submit" name="lista" value="lista" class="btn btn-success"><i class="icon-ok"></i> Imprimir Lista</button>
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