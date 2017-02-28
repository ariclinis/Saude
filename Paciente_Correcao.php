<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="pt-pt"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
    $cod_paciente= base64_decode($_GET['Paciente']);
    $cod_contactos= base64_decode($_GET['Contacto']);
    $cod_pessoa= base64_decode($_GET['Pessoa']);
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();

    $Pegar_P_atedindos1 = $pdo->prepare("SELECT * From tbl_provincia");
    $Pegar_P_atedindos1->execute();

     $Pegar_P_atedindos_ = $pdo->prepare("SELECT * From tbl_provincia where Cod_Provincia='NA'");
    $Pegar_P_atedindos_->execute();

    $Pegar_P_atedindos2 = $pdo->prepare("SELECT * From tbl_municipio");
    $Pegar_P_atedindos2->execute();

    $Pegar_P_atedindos3 = $pdo->prepare("SELECT * From tbl_municipio where Cod_Provincia='NA'");
    $Pegar_P_atedindos3->execute();

    $Pegar_P_atedindos4 = $pdo->prepare("SELECT * From tbl_bairro");
    $Pegar_P_atedindos4->execute();

    $Pegar_paciente=$pdo->prepare("SELECT * From paciente_v where cod_paciente= '$cod_paciente'");
    $Pegar_paciente->execute();
    $Linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC);

    ?>
    <head>
        <meta charset="utf-8" />
        <title>DIGGITUS SAÚDE ERP | Pacientes Cadastro</title>
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
                                    <span class="text">Corr:</span>
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
                                Cadastro de pacientes
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Gestão de Pacientes<span class="divider">/</span>
                                </li>
                                <li class="active">Cadastrar Pacientes</li>
                                
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
                                        <i class="icon-reorder"></i> Cadastro de Pacientes</span>
                                    </h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div id="msg" name="msg"></div>
                                
                                <div class="widget-body">
                                    <form class="form-horizontal" method="POST">
                                        <div id="tabsleft" class="tabbable tabs-left" >
                                            <ul>
                                                <li><a href="#tabsleft-tab1" data-toggle="tab"><span class="strong">Dados Pessoais</span></a></li>
                                                <li><a href="#tabsleft-tab2" data-toggle="tab"><span class="strong">Informações Médicas</span> </a></li>
                                                <li><a href="#tabsleft-tab3" data-toggle="tab"><span class="strong">Contactos</span></a></li>

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
                                                        <input type="hidden" name="cod_paciente" id="cod_paciente" value="<?php echo $cod_paciente ;?>">
                                                        <input type="hidden" name="cod_pessoa" id="cod_pessoa" value="<?php echo $cod_pessoa ;?>">
                                                        <input type="hidden" name="cod_contactos" id="cod_contactos" value="<?php echo $cod_contactos ;?>">
                                                            <input type="text" name="nome" id="nome" class="span6" value="<?php echo ($Linha['nome']); ?>" required> 
                                                        </div>
                                                    </div>
                                                  <div class="control-group">
                                                        <label class="control-label">Nome do Pai</label>
                                                        <div class="controls">
                                                            <input type="text" class="span6" id="nome_pai" name="nome_pai" value="<?php echo ($Linha['nome_pai']); ?>" required> 
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nome da Mãe</label>
                                                        <div class="controls">
                                                            <input type="text" name="nome_mae" id="nome_mae" value="<?php echo ($Linha['nome_mae']); ?>" class="span6" required> 
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Bilhete de Identidade</label>
                                                        <div class="controls">
                                                            <input type="text" name="bi" id="bi" value="<?php echo utf8_encode($Linha['n_bi']); ?>"  class="span6" > 
                                                        </div>
                                                    </div>
                                                   <div class="control-group">
                                                        <label class="control-label">Estado Civil</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="estado_civil" name="estado_civil" id="estado_civil" quired tabindex="1">
                                                                <option><?php echo utf8_encode($Linha['estado_civil']); ?></option>
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
                                                            <select class="span6 " required data-placeholder="Provincia" name="prov_nasc" id="prov_nasc" tabindex="1">
                                                               
                                                                <?php while ($linha2 = $Pegar_P_atedindos1->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo utf8_encode($linha2['Cod_Provincia']); ?>"><?php echo utf8_encode($linha2['Des_Provincia']); ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Municipio</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="Municipio_nasc" name="munic_nasc" id="munic_nasc" tabindex="1">
                                                                <option value=""> </option>
                                                                //<?php while ($linha4 = $Pegar_P_atedindos2->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="//<?php echo utf8_encode($linha4['Cod_Municipio']); ?>"><?php echo utf8_encode($linha4['Discricao_Municipio']); ?></option>
                                                                //<?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Data de Nascimento</label>
                                                        <div class="controls">   
                                                            <div class="input-append date" id="dpYears" data-date="12-02-1975" data-date-format="dd-mm-yyyy" data-date-viewmode="years" id="clockface_1" >
                                                                <input type="Date" class="mini" data-format="hh:mm A"  id="Data_nasc" name="clockface_1" value="<?php echo utf8_encode($Linha['data_nasc']); ?>" Enabled>
                                                            </div>
                                                            <!--<input placeholder="Altura" class="span2" pattern="[1-4]{1}.[0-9]{2}" name="altura" class="input-mini" type="text" id="altura">-->
                                                        </div>
                                                        <br>
                                                        <div class="control-group">
                                                            <label class="control-label">Sexo</label>
                                                            <div class="controls"> 
                                                                <select class="span6" data-placeholder="Gênero" id="genero" name="genero" tabindex="1">
                                                            <?php if ($Linha['genero']=="Masculino") { ?>
                                                                <option value="Masculino">Masculino</option>
                                                                <option value="Femenino">Femenino</option>
                                                           <?php }else{ ?>
                                                        <option value="Femenino">Femenino</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Nacionalidade</label>
                                                            <div class="controls"> 
                                                                <select class="span6 " data-placeholder="nacionalidade" name="nacionalidade"  id="nacionalidade" tabindex="1">
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
                                                        <label class="control-label">Estado</label>
                                                        <div class="controls">
                                                            <select  class="span4 " data-placeholder="estado" id="estado" name="estado" tabindex="1">
                                                            <?php if ($Linha['estado']=="Activo") { ?>
                                                                <option value="Activo">Activo</option>
                                                                <option value="Inactivo">Inativo</option>
                                                                <?php }else{ ?>
                                                                <option value="Inactivo">Inativo</option>
                                                                <option value="Activo">Activo</option>
                                                                <?php } ?>
                                                            </select> 
                                                        </div>
                                                    </div>    
                                                    <div class="control-group">
                                                        <label class="control-label" >Observação</label>
                                                        <div class="controls">
                                                            <textarea style="width: 525px; height: 121px;" name="obs" id="obs" class="input-xxlarge" rows="4" ><?php echo utf8_encode($Linha['obs']); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tabsleft-tab3">
                                                    <h3></h3>

                                                  <div class="control-group">
                                                        <label class="control-label">Provincia</label>
                                                        <div class="controls">
                                                            <select class="span6 " required data-placeholder="provincia_localidade" name="provincia_localidade" id="provincia_localidade" value="<?php echo utf8_encode($Linha['Provincia_localidade']); ?>" tabindex="1">
                                                                <option><?php echo ($Linha['Provincia_localidade']); ?></option>
                                                                <?php while ($linha_ = $Pegar_P_atedindos_->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo ($linha2['Des_Provincia']); ?>"><?php echo utf8_encode($linha_['Des_Provincia']); ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label">Municipio</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="municipio_localidade" name="municipio_localidade" id="municipio_localidade" tabindex="1">
                                                                <option><?php echo ($Linha['Municipio_Localidade']); ?></option>
                                                                <?php while ($linha5 = $Pegar_P_atedindos3->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo ($linha5['Discricao_Municipio']); ?>"><?php echo ($linha5['Discricao_Municipio']); ?></option>
                                                                <?php } ?>
                                                            </select> <button class="btn btn-success"><i class="icon-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Bairro</label>
                                                        <div class="controls">
                                                            <select class="span6 " data-placeholder="" name="bairro" tabindex="1" id="bairro">
                                                               
                                                                <option><?php echo ($Linha['Discricao_Bairro']); ?></option>
                                                                
                                                                <?php while ($linha6 = $Pegar_P_atedindos4->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo utf8_encode($linha6['Cod_Bairro']); ?>"><?php echo ($linha6['Discricao_Bairro']); ?></option>
                                                                <?php } ?>
                                                            </select> <button class="btn btn-success"><i class="icon-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nº de Telefone</label>
                                                        <div class="controls">
                                                            <input  data-mask="(999)999-999" class="span6" type="text" name="telefone" id="telefone" value="<?php echo utf8_encode($Linha['Telefone']); ?>" >
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
<!--                                                    <div class="control-group">
                                                        <label class="control-label">Fax</label>
                                                        <div class="controls">
                                                            <input   data-mask="(999)999-999" class="span6" type="text" name="fax" id="fax">
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>-->
<!--                                                    <label class="control-label">Ocupação/Profissão</label>
                                                    <div class="controls">
                                                        <select class="span6 " data-placeholder="Ocup_Prof" name="ocup_Prof" id="ocup_Prof" tabindex="1">
                                                            <option value=""> </option>
                                                            <option value="Funcionário(a) Publico">Funcionário(a) Publico</option>
                                                            <option value="Estudante">Estudante</option>
                                                            <option value="Funcionário(a) por Outrem">Funcionário(a) por Outrem</option>
                                                            <option value="Comerciante">Comerciante</option>
                                                        </select> <p></p>                                                           
                                                    </div>-->
                                                    <div class="control-group">
                                                        <label class="control-label">Correio Electronico</label>
                                                        <div class="controls">
                                                            <input type="email" id="email" value="<?php echo utf8_encode($Linha['Email']); ?>" name="email" class="span6">
                                                            <span class="help-inline"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <ul class="pager wizard">

                                                <li class="previous"><a href="javascript:;">Voltar</a></li>
                                                <li class="next"><a href="javascript:;">Proximo</a></li>
                                                <input class="next finish btn btn-success" type="submit" id="Cadastrar" name="Cadastrar" style="display:none; float:right;" value="Actualizar"/>
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
       <script type="text/javascript">
   
    $('#tabsleft .finish').click(function(e) {
    
        e.preventDefault();

         var cod_paciente = jQuery('#cod_paciente').val();
        var cod_pessoa = jQuery('#cod_pessoa').val();
        var cod_contactos = jQuery('#cod_contactos').val();

        var nome = jQuery('#nome').val();
        var nomemae = jQuery('#nome_mae').val();
        var nomepai = jQuery('#nome_pai').val();
        var bi = jQuery('#bi').val();
        var datanasc = jQuery('#Data_nasc').val();
        var genero = jQuery('#genero').val();
        var ecivil = jQuery('#estado_civil').val();
        var nacionalidade = jQuery('#nacionalidade').val();
        var provnasc = jQuery('#prov_nasc').val();
        var muninasc = jQuery('#munic_nasc').val();
      //  var altura= jQuery('#altura').val();
        
        var estado = jQuery('#estado').val();
        var tiposaguino = jQuery('#tipo_saguino').val();
        var obs = jQuery('#obs').val();

        var provincia_localidade = jQuery('#provincia_localidade').val();
        var municipio_localidade = jQuery('#municipio_localidade').val();
        var bairro = jQuery('#bairro').val();
        var telefone = jQuery('#telefone').val();
        var fax = jQuery('#fax').val();
        //var ocupacao = jQuery('#ocup').val();
        var email = jQuery('#email').val();
        // var foto = jQuery('#foto').val();
        $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Actualizar_paciente.php",
            data: {nome: nome, nomepai:nomepai, nomemae:nomemae, bi: bi, datanasc:datanasc, genero: genero, nacionalidade: nacionalidade, estado: estado, tiposaguino:tiposaguino, obs:obs, provincia_localidade:provincia_localidade, municipio_localidade:municipio_localidade, bairro: bairro, telefone:telefone, ecivil:ecivil, fax:fax, email:email, provnasc:provnasc, muninasc:muninasc, cod_pessoa:cod_pessoa, cod_paciente:cod_paciente, cod_contactos:cod_contactos},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontal input").val() != ""){
                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong> Actualização do Paciente efectuado com sucesso.</div>').show(300).delay(5000).hide(300);
                    //$(".form-horizontal input").val(""); //limpa todos inputs do formulário
                   function eperar () {
          window.location = 'Paciente_Listagem.php';
                         }  
                     setTimeout(eperar,4000);
return false;
                } else {
                     jQuery('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close">×</button><strong>Problema!</strong>Ocorreu um erro ao Actualização o Paciente.</div>').show(300).delay(5000).hide(300);
                   
return false;
                }
            }
                else{
                    jQuery('#msg').html('<div class="alert"><button data-dismiss="alert" class="close">×</button><strong>Irregularidade!</strong> Porfavor verifique se os campos estão devidamente preenchidos.</div>').show(300).delay(5000).hide(300);
                }
            }
        });
  
    });
</script>
        


        <!-- END JAVASCRIPTS -->
        


        <!--script for this page-->
        <script src="js/form-component.js"></script>   
    </body>
    <!-- END BODY -->
</html>