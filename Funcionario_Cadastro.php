

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
    include_once './Classes/Conexao.php';
    //include_once './Classes/sessoes.php';
    $pdo = conexao::Chamar_conexao();
    $Pegar_direcao = $pdo->prepare("SELECT * From tbl_dir");
    $Pegar_direcao->execute();

    $Pegar_repart = $pdo->prepare("SELECT * From tbl_repaticao");
    $Pegar_repart->execute();

    $Pegar_unidade_saude = $pdo->prepare("SELECT * From tbl_uni_san");
    $Pegar_unidade_saude->execute();

    $Pegar_Unidade_interv = $pdo->prepare("Select * from tbl_unid_interv");
    $Pegar_Unidade_interv->execute();

    $Pegar_Cat = $pdo->prepare("Select * From tbl_categorias");
    $Pegar_Cat->execute();

    $Pegar_P = $pdo->prepare("SELECT * From tbl_provincia");
    $Pegar_P->execute();
    $Pegar_localidade = $pdo->prepare("SELECT * From tbl_provincia");
    $Pegar_localidade->execute();


    $Pegar_P_atedindos4 = $pdo->prepare("SELECT * From tbl_bairro");
    $Pegar_P_atedindos4->execute();

    $Pegar_Municipio = $pdo->prepare("SELECT * From tbl_municipio");
    $Pegar_Municipio->execute();
    $Pegar_Municipio2 = $pdo->prepare("SELECT * From tbl_municipio");
    $Pegar_Municipio2->execute();
    $pegar_especial=$pdo->prepare("SELECT * From tbl_especialidade");
    $pegar_especial->execute();
    ?>
    <head>
        <meta charset="utf-8" />
        <title>DIGGITUS SAÚDE ERP | Funcionário</title>
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
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <?php include('Topo_usu.php'); ?>
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <?php include('Menu.php'); ?>
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
                                Cadastro de Funcionários</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Recursos Humanos<a href="#"></a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">Cadastro de Funcionario</li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="widget black">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i>    Cadastro de Funcionário</span>
                            </h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div id="msg"></div>
                        <div class="widget-body">
                            <form class="form-horizontal" method="POST" action="Classes/Cadastrar_Funcionario.php">
                                <div id="tabsleft" class="tabbable tabs-left" >
                                    <ul>
                                        <li><a href="#tabsleft-tab1" data-toggle="tab"><span class="strong">Dados Pessoais</span></a></li>
                                        <li><a href="#tabsleft-tab2" data-toggle="tab"><span class="strong">Dados Profissinais</span></a></li>
                                        <li><a href="#tabsleft-tab3" data-toggle="tab"><span class="strong">Centro de Custo</span></a></li>

                                    </ul>
                                    <div class="progress progress-info progress-striped">
                                        <div class="bar"></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tabsleft-tab1">
                                            <h3></h3>
                                            <div class="control-group">
                                                <label class="control-label">Nome</label>
                                                <div class="controls">
                                                    <input type="text" name="nome" id="nome" class="span6"> 
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label"  >Nome do Pai</label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="nomepai" id="nomepai"> 
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Nome da Mãe</label>
                                                <div class="controls">
                                                    <input type="text" name="nomemae" id="nomemae" class="span6"> 
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Bilhete de Identidade</label>
                                                <div class="controls">
                                                    <input type="text" name="bi" id="bi" class="span6"> 
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Estado Civil</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Estado_civil" name="estado_civil" id="estado_civil" tabindex="1">
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
                                                    <select class="span6 " required data-placeholder="Provincia" name="provnasc" id="provnasc" tabindex="1">
                                                         <option value=""> </option>
                                                        <?php while ($linha2 = $Pegar_P->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo utf8_encode($linha2['Cod_Provincia']); ?>"><?php echo utf8_encode($linha2['Des_Provincia']); ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Municipio</label>
                                                <div class="controls">
                                                    <select class="span6 " required data-placeholder="Municipio_nasc" name="muninasc" id="muninasc" tabindex="1">
                                                         <option value=""> </option>
                                                        <?php while ($linha4 = $Pegar_Municipio->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo utf8_encode($linha4['Cod_Municipio']); ?>"><?php echo utf8_encode($linha4['Discricao_Municipio']); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Data de Nascimento</label>
                                                <div class="controls">   
                                                    <div class="input-append date" id="dpYears" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                        <input name="datanasc" id="datanasc" class="m-ctrl-medium" size="16" value="12-02-2012" type="date">
                                                        <span class="add-on"><i class="icon-calendar"></i></span>

                                                    </div>
                                                    <input placeholder="Altura" pattern="[1-4]{1}.[0-9]{2}" name="altura" id="altura" class="input-small" type="text">
                                                </div>
                                                <br>
                                                <div class="control-group">
                                                    <label class="control-label">Sexo</label>
                                                    <div class="controls"> 
                                                        <select class="span6 " data-placeholder="Gênero" name="genero" id="genero" tabindex="1">
                                                             <option value=""> </option>
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Nacionalidade</label>
                                                    <div class="controls"> 
                                                        <select class="span6 " data-placeholder="Nacionalidade" name="nacio" id="nacio" tabindex="1">
                                                            <option value="Angolana">Angolana</option>
                                                            <option value="Estrangeiro">Estrangeiro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabsleft-tab2">
                                            <h3></h3>

                                            <div class="control-group">
                                                <label class="control-label">Categoria:</label>
                                                <div class="controls">
                                                    <select class="span6" name="categoria" id="categoria" data-placeholder="Choose a Category" tabindex="1">
                                                         <option value=""> </option>
                                                        <?php
                                                        header('Content-Type: text/html; charset=utf-8');
                                                        while ($linha = $Pegar_Cat->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $linha['cod_especialidade'] ?>"><?php echo utf8_encode($linha['descricao']);
                                                            ?></option>
                                                        <?php } ?>
                                                    </select>  
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Nivel de Escolalidade:</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Nvel_Escolaridade" name="escolaridade" id="escolaridade" tabindex="1">
                                                        <option value=""> </option>
                                                        <option value=" Técnico Basico"> Técnico Basico</option>
                                                        <option value="Técnico Médio"> Técnico Médio</option>
                                                        <option value="Técnico Superior">Técnico Superior</option>
                                                        <option value="Doctorado">Doctorado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Situação Contratual:</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="contrato" name="contrato" id="contrato" tabindex="1">
                                                         <option value=""> </option>
                                                        <option value="Tempo Indeterminado"> Tempo Indeterminado</option>
                                                        <option value="Aprazo">Aprazo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label">Especialidade:</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Cargo" name="cargo" id="cargo" tabindex="1">
                                                        <option value=""> </option>
                                                        <?php
                                                    header('Content-Type: text/html; charset=utf-8');
                                                    while ($linha = $pegar_especial->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $linha['Descricao_Consulta'] ?>"><?php echo utf8_encode($linha['Descricao_Consulta']); ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabsleft-tab3">
                                            <h3></h3>
                                            <div class="control-group">
                                                <label class="control-label">Nº de Agente </label>
                                                <div class="controls">
                                                    <input type="text" class="span3" name="nip" id="nip"> 
                                                </div>
                                            </div>
<!--                                            <div class="control-group">
                                                <label class="control-label">Direção Provincial</label>
                                                <div class="controls">
                                                    <select class="span6" name="direcaop" id="direcaop" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value=""> </option>
                                                        <?php
                                                        header('Content-Type: text/html; charset=utf-8');
                                                        while ($linha = $Pegar_direcao->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $linha['cod_dir'] ?>"><?php echo utf8_encode($linha['descricao']);
                                                            ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Repartição</label>
                                                <div class="controls">
                                                    <select class="span6" name="reparticaotrabalho" id="reparticaotrabalho" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value=""> </option>
                                                        <?php
                                                        header('Content-Type: text/html; charset=utf-8');
                                                        while ($linha = $Pegar_repart->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $linha['cod_reparticao'] ?>"><?php echo utf8_encode($linha['descricao_repart']);
                                                            ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>-->
<!--                                            <div class="control-group">
                                                <label class="control-label">Unidade Sanitária</label>
                                                <div class="controls">
                                                    <select class="span6" name="unisan" id="unisan" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value=""> </option>
                                                        <?php
                                                        header('Content-Type: text/html; charset=utf-8');
                                                        while ($linha = $Pegar_unidade_saude->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $linha['Cod_Un_San'] ?>"><?php echo utf8_encode($linha['Desc_Unidade_San']);
                                                            ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>-->
                                            <div class="control-group">
                                                <label class="control-label">Área de trabalho:</label>
                                                <div class="controls">
                                                    <select class="span6" name="unidinterv" id="unidinterv" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value=""> </option>
                                                        <?php
                                                        header('Content-Type: text/html; charset=utf-8');
                                                        while ($linha = $Pegar_Unidade_interv->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $linha['Cod_Unid_Interv'] ?>"><?php echo utf8_encode($linha['Descr_Unid_Interv']);
                                                            ?></option>
                                                        <?php } ?>
                                                    </select>  
                                                </div>
                                            </div>
<!--                                            <div class="control-group">
                                                <label class="control-label">Estado:</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Estado" name="Estado" tabindex="1">
                                                        <option value="Activo">Activo</option>
                                                        <option value="Inactivo">Inactivo</option> 
                                                    </select>
                                                </div>
                                            </div>-->

                                            <label class="icon-print">   CONTACTOS </label><br></br>    

                                            <div class="control-group">
                                                <label class="control-label">Provincia</label>
                                                <div class="controls">
                                                    <select class="span6 " required data-placeholder="Provincia" name="provloca" id="provloca" tabindex="1">
                                                         <option value=""> </option>
                                                        <?php while ($linha2 = $Pegar_localidade->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo utf8_encode($linha2['Des_Provincia']); ?>"><?php echo utf8_encode($linha2['Des_Provincia']); ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Bairro</label>
                                                <div class="controls">
                                                    <select class="span6 " required data-placeholder="Bairro" name="bairro" id="bairro" tabindex="1">
                                                         <option value=""> </option>
                                                        <?php while ($linha2 = $Pegar_P_atedindos4->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo utf8_encode($linha2['Cod_Bairro']); ?>"><?php echo utf8_encode($linha2['Discricao_Bairro']); ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Municipio</label>
                                                <div class="controls">
                                                    <select class="span6 " required data-placeholder="Municipio" name="muniloca" tabindex="1">
                                                         <option value=""> </option>
                                                        <?php while ($linha2 = $Pegar_Municipio2->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo utf8_encode($linha2['Discricao_Municipio']); ?>"><?php echo utf8_encode($linha2['Discricao_Municipio']); ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Telefone</label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="phone" id="phone">
                                                </div>
                                            </div>
<!--                                            <div class="control-group">
                                                <label class="control-label">Fax</label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="fax" id="fax">
                                                </div>
                                            </div>-->
                                            <div class="control-group">
                                                <label class="control-label">Email</label>
                                                <div class="controls">
                                                    <input type="text" class="span6" name="email" id="email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="pager wizard">
                                        <li class="previous"><a href="javascript:;">Voltar</a></li>
                                        <li class="next"><a href="javascript:;">Proximo</a></li>
                                        <input class="next finish btn btn-success" type="submit" style="display:none; float:right;" value="Cadastrar"/></ul></div></form>
                        </div>
                    </div>
                    <div class="row-fluid"></div>
                    <div class="row-fluid"></div>
                    <div class="row-fluid"></div>

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

        <script type="text/javascript">
   
    $('#tabsleft .finish').click(function(e) {
    
        e.preventDefault();
        
        var nome = jQuery('#nome').val();
        var nomemae = jQuery('#nomemae').val();
        var nomepai = jQuery('#nomepai').val();
        var bi = jQuery('#bi').val();
        var datanasc = jQuery('#datanasc').val();
        var genero = jQuery('#genero').val();
        var ecivil = jQuery('#estado_civil').val();
        var nacio = jQuery('#nacio').val();
        var provnasc = jQuery('#provnasc').val();
        var muninasc = jQuery('#muninasc').val();
        var altura= jQuery('#altura').val();
        
        var estado = jQuery('#estado').val();
        var categoria = jQuery('#categoria').val();
        var escolaridade = jQuery('#escolaridade').val();
        var contrato = jQuery('#contrato').val();
        var cargo = jQuery('#cargo').val();
        var direcaop = jQuery('#direcaop').val();
        var nip = jQuery('#nip').val();
        var unisan = jQuery('#unisan').val();
        var unidinterv = jQuery('#unidinterv').val();
        var reparticaotrabalho = jQuery('#reparticaotrabalho').val();


        var provloca = jQuery('#provloca').val();
        var muniloca = jQuery('#muniloca').val();
        var morada = jQuery('#bairro').val();
        var phone = jQuery('#phone').val();
        var fax = jQuery('#fax').val();
        
        var email = jQuery('#email').val();
        // var foto = jQuery('#foto').val();


        $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Cadastrar_Funcionario.php",
            data: {nome: nome, nomemae:nomemae, nomepai:nomepai, bi: bi, datanasc:datanasc, genero: genero, ecivil: ecivil, altura:altura, nacio: nacio, provnasc: provnasc, muninasc: muninasc, estado: estado, categoria:categoria, escolaridade:escolaridade, contrato:contrato, cargo:cargo, direcaop:direcaop, nip:nip, unidinterv:unidinterv, unisan:unisan, reparticaotrabalho:reparticaotrabalho, provloca:provloca, muniloca:muniloca, morada: morada, phone: phone, fax:fax, email: email},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontal input").val() != ""){


                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong> Cadastro do Funcionário efectuado com sucesso.</div>').show(300).delay(5000).hide(300);
                    $(".form-horizontal input").val(""); //limpa todos inputs do formulário

return false;
                } else {
                    alert("ocorreu um erro");

                    return false;
                }
            }
            else{
                jQuery('#msg').html('<div class="alert"><button data-dismiss="alert" class="close">×</button><strong>Irregularidade!</strong> Porfavor verifique se os campos estão devidamente preenchidos.</div>').show(300).delay(5000).hide(300);
            }
            }


        });
    });
    $(function () {
        $(" input[type=radio], input[type=checkbox]").uniform();
    });




        </script>
        


        <!-- END JAVASCRIPTS -->
        


        <!--script for this page-->
        <script src="js/form-component.js"></script>   
    </body>
    <!-- END BODY -->
</html>