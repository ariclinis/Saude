<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
include_once './Classes/Conexao.php';
$pdo = conexao::Chamar_conexao();
$paciente= $pdo->prepare("SELECT * FROM tipo_analises");
$paciente->execute();
   ?>
    <head>
        <meta charset="utf-8" />
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
            <?php include './Topo_usu.php'; ?>
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
                            <h3 class="page-title">Atendimento Médico-Banco de Emergêcia</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Atendimento <span class="divider">/</span>
                                </li>
                                <li class="active">Atendimento Médico-Banco de Emergêcia</li>
                                <li class="pull-right search-wrap">
                                    
                                </li>
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
                            <div class="widget box black">
                                <div class="widget-title">
                                    <h4>
                                        <i class="icon-reorder"></i> Atendimento  Médico >> Banco de Emergêcia</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <form class="form-horizontal" method="POST" action="Classes/Cadastrar_Atendimento.php">
                                        <div id="tabsleft" class="tabbable tabs-left" >
                                            <ul>
                                                <li><a href="#tabsleft-tab1" data-toggle="tab"><span class="strong">Informações Médicas</span></a></li>
                                                <li><a href="#tabsleft-tab2" data-toggle="tab"><span class="strong">Indicações Médicas</span> </a></li>
                                            </ul>
                                            <div class="progress progress-info progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="tabsleft-tab1">
                                                    <h3></h3>
                                                    <div class="control-group">
                                                        <label class="control-label">Nome do Paciente</label>
                                                        <div class="controls">
                                                        <input type="text" name="Nome_pac" class="span6"> <button class="btn btn-danger"><i class="icon-download"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Sexo</label>
                                                        <div class="controls">
                                                          <select class="span3 " required data-placeholder="genero" name="genero" tabindex="1">
                                                            
                                                                <option value=""> </option>
                                                                <option value="Masculino">Masculino</option>
                                                                <option value="Femenino">Femenino</option>
                                                             
                                                          </select>  <input type="text" name="idade" value="" class="span3" placeholder="Idade" > 
                                                          </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Diagnostico</label>
                                                        <div class="controls">
                                                            <select class="span6" data-placeholder="diagnostico" name="Cod_Diag" tabindex="1">
                                                       
                                                            </select>
                                                        </div><p></p>
                                                       <label class="control-label">Patológia</label>
                                                        <div class="controls">
                                                            <select class="span6" data-placeholder="Patológia" name="Cod_Pat" tabindex="1">
                                                                    
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="control-group">
                                                            <label class="control-label">Tipo de Analise</label>
                                                            <div class="controls"> 
                                                                <select class="span6" data-placeholder="Gênero" name="Cod_Analise" tabindex="1">
                                                                    <?php while ($linha=$paciente->fetch(PDO::FETCH_ASSOC)){ ?>
                                                                    <option value="<?php echo $linha['Cod_Analise']; ?>"><?php echo $linha['Disc_Analise']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Resultado</label>
                                                            <div class="controls"> 
                                                                <select class="span6" data-placeholder="Resultado" name="Resultado" tabindex="1">
                                                                    <option value="Positivo">Positivo</option>
                                                                    <option value="Negativo">Negativo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tabsleft-tab2">
                                                    <h3></h3>
                                                    <div class="control-group">
                                                        <div class="control-group">
                                                            <label class="control-label">Indicações</label>
                                                            <div class="controls">
                                                                <input type="text" name="Indicacoes" class="span9"> 
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Dosagem</label>
                                                            <div class="controls">
                                                                <input type="text" name="Dose" class="span9"> 
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label">Numero de Dias</label>
                                                            <div class="controls">
                                                                <input type="text" name="N_dias" class="span5"> 
                                                                <input  placeholder="Quantidade" name="Quantidade" class="span4" type="text">                                                        </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" >Observação:</label>
                                                            <div class="controls">
                                                                <textarea style="width: 524px; height: 130px;" name="obs" class="input-xxlarge" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous"><a href="javascript:;">Voltar</a></li>
                                                <li class="next"><a href="javascript:;">Proximo</a></li>
                                        
                                                <input class="next finish btn  btn-warning" type="submit" style="display:none; float:center; margin-right: 10px; " value="Emitir Receita" href=""/>
                                                <input class="next finish btn  btn-success" type="submit" style="display:none; float:center;" value="Enviar Para Internamento" href=""/>
                                                <input class="next finish btn  btn-danger" type="submit" style="display:none; float:center;" value="Enviar Para Morgan "/>
                                            </ul>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->


        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->  1
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div id="footer">
    2016 &copy; Diggitus Saúde
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/chart-master/Chart.js"></script>


<!--script for this page only-->


<script src="js/sparkline-chart.js"></script>
<script src="js/home-page-calender.js"></script>
<script src="js/chartjs.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>

<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->



<script src="js/easy-pie-chart.js"></script>
<script src="js/sparkline-chart.js"></script>
<script src="js/home-page-calender.js"></script>
<script src="js/chartjs.js"></script>

<!-- END JAVASCRIPTS -->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="js/jquery.blockui.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
<!--script for this page-->
<script src="js/form-wizard.js"></script>


<!-- END JAVASCRIPTS -->
<script>
    $(function () {
        $(" input[type=radio], input[type=checkbox]").uniform();
    });



</script>


<!--script for this page-->
<script src="js/form-component.js"></script>   
</body>
<!-- END BODY -->
</html>