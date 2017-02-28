<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $Pegar_P_atedindos = $pdo->prepare("SELECT * From tbl_provincia");
    $Pegar_P_atedindos->execute();

    $Pegar_P_atedindos1 = $pdo->prepare("SELECT * From tbl_provincia");
    $Pegar_P_atedindos1->execute();

    $Pegar_P_atedindos2 = $pdo->prepare("SELECT * From tbl_municipio");
    $Pegar_P_atedindos2->execute();

    $Pegar_P_atedindos3 = $pdo->prepare("SELECT * From tbl_municipio");
    $Pegar_P_atedindos3->execute();

    $Pegar_P_atedindos4 = $pdo->prepare("SELECT * From tbl_bairro");
    $Pegar_P_atedindos4->execute();
    
    $Pegar_P = $pdo->prepare("SELECT * From tbl_provincia");
    $Pegar_P->execute();

    $Pegar_M= $pdo->prepare("SELECT * From tbl_municipio");
    $Pegar_M->execute();

    
    ?>
    <head>
        <meta charset="utf-8" />
        <title>DIGGITUS SAÚDE ERP | Internamento</title>
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
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER-->
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
                               Cadastro de Entrada do Paciente
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Internamento<span class="divider">/</span>
                                </li>
                                <li class="active">Cadastro de Entrada do Paciente</li>
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

                    <!-- BEGIN PAGE CONTENT-->

                    <!-- END PAGE CONTENT-->

                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget box black">
                                <div class="widget-title">
                                    <h4>
                                        <i class="icon-reorder"></i> Cadastro de Entrada do Paciente</span>
                                    </h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <form class="form-horizontal" method="POST" action="Classes/Cadastrar_Paciente_Entrada_Internamento.php">
                                        <div id="tabsleft" class="tabbable tabs-left" >
                                            <ul>
                                                <li><a href="#tabsleft-tab1" data-toggle="tab"><span class="strong">Dados Pessoais</span></a></li>
                                                <li><a href="#tabsleft-tab2" data-toggle="tab"><span class="strong">Dados de Entrada</span> </a></li>
                                                <li><a href="#tabsleft-tab3" data-toggle="tab"><span class="strong">Boletim Clinico</span></a></li>

                                            </ul>
                                            <div class="progress progress-info progress-striped">
                                                <div class="bar"></div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="tabsleft-tab1">
                                                    <h3></h3>
                                                    <div class="control-group">
                                                        <label class="control-label">Nº do Processo</label>
                                                        <div class="controls">
                                                            <input type="text" name="Process_N" class="span3" required> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Nome</label>
                                                        <div class="controls">
                                                            <input type="text" name="Nome" class="span6" required> <button class="btn btn-info"><i class="icon-search"></i></button> 
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nome do Pai</label>
                                                        <div class="controls">
                                                            <input type="text" class="span6" name="Nome_pai"> 
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nome da Mãe</label>
                                                        <div class="controls">
                                                            <input type="text" name="Nome_mae" class="span6"> 
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Bilhete\Cédula</label>
                                                        <div class="controls">
                                                            <input type="text" name="Bi" class="span6" required> 
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Estado Civil</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="Estado Civil" name="Estado_civil" tabindex="1">
                                                                 <option value=""> </option>
                                                                <option value="Solteiro(a)">Solteiro(a)</option>
                                                                <option value="Casado(a)">Casado(a)</option>
                                                                <option value="Divorciado(a)">Divorciado(a)</option>
                                                                <option value="União de Facto">União de Facto</option>
                                                                <option value="Viúvo(a)">Viúvo(a)</option>
                                                                <option value="N/A">N/A</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Provincia</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="Provincia" name="Provincia_nasc" tabindex="1">
                                                                 <option value=""> </option>
                                                                <?php while ($linha2 = $Pegar_P_atedindos->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo utf8_encode($linha2['Cod_Provincia']); ?>"><?php echo utf8_encode($linha2['Des_Provincia']); ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Municipio</label>
                                                        <div class="controls">
                                                            <select class="span6 "  data-placeholder="Municipio_nasc" name="Discricao_Municipio" tabindex="1">
                                                                 <option value=""> </option>
                                                                <?php while ($linha4 = $Pegar_P_atedindos2->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo utf8_encode($linha4['Cod_Municipio']); ?>"><?php echo utf8_encode($linha4['Discricao_Municipio']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Data de Nascimento</label>
                                                        <div class="controls">   
                                                            <div class="input-append date" id="dpYears" data-date="12-02-1975" data-date-format="dd-mm-yyyy" data-date-viewmode="years" id="clockface_1" class="span3" >
                                                                <input type="Date" class=" mini" data-format="hh:mm A"  id="clockface_1" name="Data_nasc" Enabled>
                                                            </div>
                                                             <select class="span2" data-placeholder="cor" name="cor" tabindex="1" >
                                                                    <option value=""></option>
                                                                    <option value="Negra">Negra</option>
                                                                    <option value="Branca">Branca</option>
                                                                   
                                                                </select>
                                                        </div>
                                                        <br>
                                                        <div class="control-group">
                                                            <label class="control-label">Sexo</label>
                                                            <div class="controls"> 
                                                                <select class="span6" required data-placeholder="Gênero" name="Genero" tabindex="1">
                                                                    <option value=""> </option>
                                                                    <option value="Masculino">Masculino</option>
                                                                    <option value="Femenino">Femenino</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Nacionalidade</label>
                                                            <div class="controls"> 
                                                                <select class="span6 " data-placeholder="Nacionalidade" name="Nacionalidade" tabindex="1">
                                                                    <option value="Angolana">Angolana</option>
                                                                    <option value="Estrangeiro">Estrangeiro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                     <label class="control-label">Profissão</label>
                                                    <div class="controls">
                                                        <select class="span6 " data-placeholder="" name="profissao" tabindex="1">
                                                            <option value=""> </option>
                                                            <option value="Funcionário(a) Publico">Carpindeiro</option>
                                                            <option value="Estudante">Informático</option>
                                                            <option value="Funcionário(a) por Outrem">Pedreiro</option>
                                                            <option value="Comerciante">Comerciante</option>
                                                        </select> <p></p>                                                           
                                                    </div>
                                                     <div class="control-group">
                                                        <label class="control-label">Corporação</label>
                                                        <div class="controls">
                                                            <input type="text" name="corporacao" class="span6"> 
                                                        </div>
                                                    </div>
                                                     <div class="control-group">
                                                        <label class="control-label">Graduação ou Categoria</label>
                                                        <div class="controls">
                                                            <input type="text" name="categoria" class="span6"> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tabsleft-tab2">
                                                    <h3></h3>
                                                    <div class="control-group">
                                                        <div class="control-group">
                                                         <label class="control-label">Folha Nº</label>
                                                        <div class="controls">
                                                            <input type="text" name="Folha" class="span3">  
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                           <label class="control-label"> Nº da Papelada</label>
                                                           <div class="controls">
                                                           <input type="text" class="span3" name="Papelada" >
                                                           </div>
                                                       </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Nº do Livro</label>
                                                            <div class="controls">
                                                         <input type="text" class="span3" name="Livro_N" > 
                                                           </div>  
                                                       </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Data da Entrada</label>
                                                        <div class="controls">   
                                                            <div class="input-append date" id="dpYears" data-date="12-02-1975" data-date-format="dd-mm-yyyy" data-date-viewmode="years" id="clockface_1" class="span6">
                                                                <input type="Date" class=" mini" data-format="hh:mm A"  id="clockface_1" name="Data_Entrada"  Enabled>  <input type="time" name="hora_entrada" class="span6" placeholder="Hora Entrada"> 
                                                            </div>
                                                    </div>
                                                </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Enfermária</label>
                                                        <div class="controls">
                                                            <input type="text" name="Enf" class="span6"> 
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Documento de Admissão</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="" name="doc_admi" required tabindex="1">
                                                                <option value=""> </option>
                                                                <option value="BI">BI</option>
                                                                <option value="Cédula">Cédula</option> </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Depósito de Garantia</label>
                                                        <div class="controls">
                                                            <input type="text" name="DG" class="span6"> 
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="control-group">
                                                        <label class="control-label">Abonada para o Hospital</label>
                                                        <div class="controls">
                                                            <input type="text" name="PAbonada" class="span6"> 
                                                        </div>
                                                    </div>
                                                        
                                                        <div class="control-group">
                                                        <label class="control-label">Data Abonada para o Hospital </label>
                                                        <div class="controls">   
                                                            <div class="input-append date" id="dpYears" data-date="12-02-1975" data-date-format="dd-mm-yyyy" data-date-viewmode="years" id="clockface_1" class="span6">
                                                                <input type="Date" class=" mini" data-format="hh:mm A"  id="clockface_1" name="Data_Abana"  Enabled>
                                                            </div>
                                                    </div>
                                                </div>
                                                    
                                                        <label class="icon-barcode"><strong> CONTACTOS</strong></label><br></br> 
                                                        <div class="control-group">
                                                        <label class="control-label">Provincia</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="Provincia_Morada" name="Provincia_Morada" tabindex="1">
                                                                 <option value=""> </option>
                                                                <?php while ($linha7 = $Pegar_P->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo utf8_encode($linha7['Des_Provincia']); ?>"><?php echo utf8_encode($linha7['Des_Provincia']); ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Municipio</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="Municipio_Morada" name="Municipio_Morada" tabindex="1">
                                                                 <option value=""> </option>
                                                                <?php while ($linha6 = $Pegar_M->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo utf8_encode($linha6['Discricao_Municipio']); ?>"><?php echo utf8_encode($linha6['Discricao_Municipio']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                     
                                                    <div class="control-group">
                                                        <label class="control-label">Bairro</label>
                                                        <div class="controls">
                                                            <select class="span6 " required="" data-placeholder="Cod_Bairro" name="Bairro" tabindex="1">
                                                                 <option value=""> </option>
                                                                <?php while ($linha6 = $Pegar_P_atedindos4->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo utf8_encode($linha6['Cod_Bairro']); ?>"><?php echo utf8_encode($linha6['Discricao_Bairro']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nº de Telefone</label>
                                                        <div class="controls">
                                                            <input  data-mask="(999)999-999" class="span6" type="text" name="telefone" >
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                     <div class="control-group">
                                                        <label class="control-label">Nº Telef. Familia</label>
                                                        <div class="controls">
                                                            <input  data-mask="(999)999-999" class="span6" type="text" name="Telefone2" >
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Fax</label>
                                                        <div class="controls">
                                                            <input   data-mask="(999)999-999" class="span6" type="text" name="fax" >
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="tab-pane" id="tabsleft-tab3">
                                                    <h3></h3>
                                                    <div class="control-group">
                                                        <label class="control-label">Estado da Entrada Uregente</label>
                                                        <div class="controls">
                                                            <select class="span6 " required data-placeholder="Estado_Entrada" name="Estado_Entrada" tabindex="1">
                                                                 <option value=""> </option>
                                                                 <option value="Sim">Sim</option>
                                                                 <option value=" Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Antecedentes Pessoais</label>
                                                        <div class="controls">
                                                            <input type="text" name="Ante_Pessoais" class="span6"> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Antecedentes Hereditarios</label>
                                                        <div class="controls">
                                                            <input type="text" name="Ante_Herodiarios" class="span6"> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Sintomas Actuais</label>
                                                        <div class="controls">
                                                            <input type="text" name="Sintomas_Actual" class="span6"> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Prescrição de Entrada</label>
                                                        <div class="controls">
                                                            <input type="text" name="Presc_Entrada" class="span6"> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Diagnostico Provisório</label>
                                                        <div class="controls">
                                                            <input type="text" name="Diag_Provisorio" class="span6"> 
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Baixa_d</label>
                                                        <div class="controls">
                                                            <input type="text" name="Baixa_d" class="span6"> 
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Médico</label>
                                                        <div class="controls">
                                                            <input type="text" name="Medico" class="span6"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            <ul class="pager wizard">

                                                <li class="previous"><a href="javascript:;">Voltar</a></li>
                                                <li class="next"><a href="javascript:;">Proximo</a></li>
                                                <input class="next finish btn btn-success" type="submit" style="display:none; float:right;" value="Cadastrar"/>
                                            </ul>
                                        </div>

                                    </form>
                                    <imag src="" />
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
    <!-- END PAGE -->  
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