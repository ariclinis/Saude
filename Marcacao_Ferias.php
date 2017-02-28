<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();

    $pegar_tipo_consulta = $pdo->prepare("SELECT * From tbl_especialidade");
    $pegar_tipo_consulta->execute();

    $cod_func = filter_input(INPUT_GET, 'cod_funcionario');
    $Pegar_Funcionario = $pdo->prepare("SELECT * From funcionario_v where cod_funcionario='$cod_func'");
    $Pegar_Funcionario->execute();

    $Pegar_Funcionario1 = $pdo->prepare("SELECT * From funcionario_v where cod_funcionario='$cod_func'");
    $Pegar_Funcionario1->execute();
    
    $pegar_periodos = $pdo->prepare("SELECT * From tbl_periodos");
    $pegar_periodos->execute();
    
    $Pegar_Funcionario2 = $pdo->prepare("SELECT * From funcionario_v where cod_funcionario='$cod_func'");
    $Pegar_Funcionario2->execute(); 
    
    ?>

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
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

        <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
        <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
        <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />


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
            <?php include_once('menu.php'); ?>
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
                                Marcação de Férias</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Plano de Férias<span class="divider">/</span>
                                </li>
                                <li class="active">Marcação de Férias</li>
                               
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->

                    <!-- BEGIN PAGE CONTENT-->

                    <!-- END PAGE CONTENT-->

                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget black">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>
                                        Marcação de Férias 
                                    </h4>
                                    <span class="tools">
                                        <a class="icon-chevron-down" href="javascript:;"></a>
                                        <a class="icon-remove" href="javascript:;"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                    <form class="form-horizontal" method="POST" action="Classes/Cadastrar_Marcar_Ferias.php">

                                        <div class="control-group">
                                            <label class="control-label">Nº Interno:</label>
                                            <div class="controls">
                                                <select class="span6" name="N_Interno" data-placeholder="Choose a Category" tabindex="1">
                                                    <?php
                                                    header('Content-Type: text/html; charset=utf-8');
                                                    while ($linha = $Pegar_Funcionario->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $linha['N_Interno'] ?>"><?php echo utf8_encode($linha['N_Interno']); ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                            <br>
                                            <label class="control-label">Nome Completo:</label>
                                            <div class="controls">

                                                <select class="span6" name="Nome" data-placeholder="Choose a Category" tabindex="1">
                                                    <?php
                                                    header('Content-Type: text/html; charset=utf-8');
                                                    while ($linha = $Pegar_Funcionario1->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $linha['nome'] ?>"><?php echo utf8_encode($linha['nome']); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">  
                                            <label class="control-label">Data Inicio</label>
                                            <div class="controls">
                                                <input type="date" class=" small" name="data_inicial" value="<?php echo date('d-m-Y'); ?>" id="clockface_1">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Data Fim</label>     
                                            <div class="controls">
                                                <input type="date" class=" small" name="data_final" value="<?php echo date('d-m-Y'); ?>" id="clockface_1">
                                            </div>
                                        </div>

                                        <label class="control-label">Mês</label>   
                                        <div class="controls">

                                                <select class="span6" name="periodo" data-placeholder="Choose a Category" tabindex="1">
                                                    <?php
                                                    header('Content-Type: text/html; charset=utf-8');
                                                    while ($linha = $pegar_periodos->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $linha['Cod_Periodo'] ?>"><?php echo utf8_encode($linha['Desc_Mes']); ?></option>
                                                    <?php }?>
                                                </select>
                                        </div><p></p>
                                        <label visible="False" class="control-label">Centro de Custo : </label>
                                            <div class="controls">

                                                <select class="span6" name="Centro_Custo" data-placeholder="Choose a Category" tabindex="1" visible="False">
                                                    <?php
                                                    header('Content-Type: text/html; charset=utf-8');
                                                    while ($linha = $Pegar_Funcionario2->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option  Enabled value="<?php echo $linha['unidade_sant_Trabalho'] ?>"><?php echo utf8_encode($linha['unidade_sant_Trabalho']); ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <div class="control-group">
                                            <label class="control-label" type="hidden" ></label>
                                            <div class="controls">
                                                <input type="hidden" name="user" value="<?php echo utf8_encode($_SESSION['cod']); ?>" class="span6" required disabled visible="False"> 
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Marcar</button>
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <div id="footer">
            2016 &copy; Diggitus Saúde
        </div>
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
        <script src="js/jquery.blockui.js"></script>
        <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
        <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>


        <!--common script for all pages-->
        <script src="js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="js/form-component.js"></script>
        <!-- END JAVASCRIPTS -->

    </body>
    <!-- END BODY -->
</html>