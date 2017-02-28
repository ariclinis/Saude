<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $data_actual= date('Y-m-d');
    $Pegar_paciente = $pdo->prepare("SELECT * From paciente_v");
    $Pegar_paciente->execute();
    $Pegar_Consulta_Agenda = $pdo->prepare("Select distinct cod_tipo_consulta,Descricao_Consulta From agendar_v Where Data_Agenda='$data_actual'");
    $Pegar_Consulta_Agenda->execute();
    $pegar_funcionario = $pdo->prepare("Select distinct cod_funcionario,nome from agendar_v Where Data_Agenda='$data_actual'");
    $pegar_funcionario->execute();
    ?>
    <script type="text/javascript">
        function openVentana() {
            $(".Modal").slideDown("slow");
        }
        function closeVentana() {
            $(".Modal").slideUp("fast");
        }
    </script>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>DIGGITUS SAÚDE ERP | Consulta Marcar</title>
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
                                Marcar Consultas</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Consultas Médicas<span class="divider">/</span>
                                </li>
                                <li class="active">Marcar Consultas</li>
                                
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->

                    <!-- BEGIN PAGE CONTENT-->

                    <!-- END PAGE CONTENT-->

                    <!-- BEGIN PAGE CONTENT-->
                    <div class="widget black">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>  Marcar consulta</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div id="msg"></div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form  method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Nome do Paciente</label>
                                    <div class="controls">
                                        <select class="span6 chzn-select" name="Cod_Paciente" id="Cod_Paciente" data-placeholder="Selecione o paciente" tabindex="1">
                                            <?php while ($linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC)) { ?> 
                                                <option value="<?php echo $linha['cod_paciente']; ?>"> <?php echo ($linha['nome']); ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tipo de Consulta</label>
                                    <div class="controls">

                                        <select class="span6" name="Tipo_Consulta" id="Tipo_Consulta" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="">Selectione a Consulta</option>
                                            <?php
                                            header('Content-Type: text/html; charset=utf-8');
                                            while ($linha = $Pegar_Consulta_Agenda->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $linha['Cod_Tipo_Consulta']; ?>"><?php echo utf8_encode($linha['Descricao_Consulta']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Médico(a)/Enfermeiro(a)</label>
                                    <div class="controls">
                                        <select class="span6" name="Cod_Funcionario" id="Cod_Funcionario" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="">Selectione o doctor</option>
                                            <?php
                                            header('Content-Type: text/html; charset=utf-8');
                                            while ($linha = $pegar_funcionario->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo $linha['cod_funcionario'] ?>"><?php echo utf8_encode($linha['nome']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
<!--                                <div class="control-group">
                                    <label class="control-label">Hora</label>
                                    <div class="controls">
                                        <input type="text" class=" small" data-format="hh:mm A" name="hora_actual" value="<?php echo date('h:i:s'); ?>" id="clockface_1" Enabled >
                                    </div>
                                </div>-->
                                <div class="control-group">
                                    <label class="control-label">Data da Consulta</label>
                                    <div class="controls">
                                        <input type="text" name="data_actual">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Situação:</label>
                                    <div class="controls">
                                        <select class="span6" name="Estado_consulta" id="Estado_consulta" data-placeholder="Choose a Category">
                                            <option value="Nova consulta">Nova consulta</option>
                                            <option value="Retorno">Retorno</option>
                                            <option value="Emergeçia">Emergeçia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" id="Marcar_Consulta"><i class="icon-ok"></i> Marcar Consulta</button>
                                    <button type="button" class="btn"><i class=" icon-remove"></i> Cancelar</button>
                                </div>
                            </form>
                            <!-- END FORM-->
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
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
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

        <script type="text/javascript">
        $('#Marcar_Consulta').click(function(e) {
    
        e.preventDefault();
        
        var Cod_Paciente = jQuery('#Cod_Paciente').val();
        var Tipo_Consulta = jQuery('#Tipo_Consulta').val();
        var Cod_Funcionario = jQuery('#Cod_Funcionario').val();
        
        var hora_actual = jQuery("input[type=text][name=hora_actual]").val();
        var data_actual = jQuery("input[type=text][name=data_actual]").val();
        var Estado_consulta = jQuery('#Estado_consulta').val();
        
        // var foto = jQuery('#foto').val();


       // $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Cadastrar_Consulta_Paciente.php",
            data: {Cod_Paciente: Cod_Paciente, Tipo_Consulta:Tipo_Consulta, Cod_Funcionario:Cod_Funcionario, hora_actual:hora_actual, data_actual: data_actual, Estado_consulta:Estado_consulta},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontaal input").val() != ""){

                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong>Consulta marcada com sucesso</div>').show(300).delay(5000).hide(300);
                    $(".form-horizontal input").val(""); //limpa todos inputs do formulário

return false;
                } else {
                    jQuery('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close">×</button><strong>Erro!</strong> Ocorreu um erro ao Marcar a Consulta.</div>').show(300).delay(5000).hide(300);
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


        <!--script for this page-->
        <script src="js/form-component.js"></script>
        <!-- END JAVASCRIPTS -->



    </body>
    <!-- END BODY -->
</html>