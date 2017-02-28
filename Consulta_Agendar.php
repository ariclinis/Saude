<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $Pegar_paciente = $pdo->prepare("SELECT * From funcionario_v where Cod_Categoria='2' And Cod_Categoria='3'");
    $Pegar_paciente->execute();
    $pegar_tipo_consulta=$pdo->prepare("SELECT * From tbl_especialidade");
    $pegar_tipo_consulta->execute();
    ?>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>DIGGITUS SAÚDE ERP | Agendamento Consulta</title>
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
            <?php include_once('Menu.php'); ?>
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
                                 Agendar Consulta Médica</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Agendar Consulta<span class="divider">/</span>
                                </li>
                                <li class="active">Agendamento de Consulta</li>
                                
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
                                          Agendamento de Consulta-Médico
                                    </h4>
                                    <span class="tools">
                                        <a class="icon-chevron-down" href="javascript:;"></a>
                                        <a class="icon-remove" href="javascript:;"></a>
                                    </span>
                                </div>
                                <div id="msg"></div>
                                <div class="widget-body form">
                                    <form class="form-horizontal" method="POST" id="agendamento" name="agendamento" >
                                        
                                        <div class="control-group">
				           <label class="control-label">Tipo da Especialidade:</label>
                                            <div class="controls">
                                                <select class="span6" name="tipo_consulta" id="tipo_consulta" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="">Selectione a consulta</option>
                                                    <option value=""></option>
                                                    <?php
                                                    header('Content-Type: text/html; charset=utf-8');
                                                    while ($linha = $pegar_tipo_consulta->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $linha['Cod_Tipo_Consulta'] ?>"><?php echo utf8_encode($linha['Descricao_Consulta']); ?></option>
                                                    <?php } ?>
                                                </select>
                                                
                                            </div>
											<br>
                                            <label class="control-label">Médico(a)/Enfermeiro(a)</label>
                                            <div class="controls">

                                                <select class="span6" name="cod_funcionario" id="cod_funcionario" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="">Selectione o doctor</option>
                                                    <option value=""></option>
                                                    <?php
                                                    header('Content-Type: text/html; charset=utf-8');
                                                    while ($linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?php echo $linha['cod_funcionario'] ?>"><?php echo utf8_encode($linha['nome']); ?></option>
                                                    <?php } ?>
                                                </select>
                                              </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Hora</label>

                                            <div class="controls">
                                                <input type="text" class="small" data-format="hh:mm A" name="hora_actual" value="<?php echo date('H:i:s'); ?>" id="clockface_1">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Data actual</label>

                                            <div class="controls">
                                                <input type="text" class="small" data-format="hh:mm A" name="data_actual" value="<?php echo date('Y-m-d'); ?>" id="clockface_1">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" type="hidden" ></label>
                                            <div class="controls">
                                                <input type="hidden" name="user" id="user" value="<?php echo utf8_encode ($_SESSION['cod']); ?>" class="span6" required disabled visible="False"> 
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success" id="agendar"><i class="icon-ok"></i> Agendar</button>
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
<script type="text/javascript">
        $('#agendar').click(function(e) {
    
        e.preventDefault();
        
        var tipo_consulta = jQuery('#tipo_consulta').val();
        var cod_funcionario = jQuery('#cod_funcionario').val();
        var hora_actual = jQuery("input[type=text][name=hora_actual]").val()
        var data_actual = jQuery("input[type=text][name=data_actual]").val();
        var user = jQuery('#user').val();
        
        // var foto = jQuery('#foto').val();


       // $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Cadastrar_Agenda.php",
            data: {tipo_consulta: tipo_consulta, cod_funcionario:cod_funcionario, hora_actual:hora_actual, data_actual: data_actual, user:user},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontaal input").val() != ""){

                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong> Agenda do Especialista fito com sucesso</div>').show(300).delay(5000).hide(300);
                    $(".form-horizontal input").val(""); //limpa todos inputs do formulário

return false;
                } else {
                    jQuery('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close">×</button><strong>Erro!</strong> Ocorreu um erro ao fazer o agendamento.</div>').show(300).delay(5000).hide(300);
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
    </body>
    <!-- END BODY -->
</html>