<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="PT-PT"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $Pegar_paciente = $pdo->prepare("SELECT * From funcionario_v");
    $Pegar_paciente->execute();
    $pegar_tipo_consulta=$pdo->prepare("SELECT * From tbl_especialidade");
    $pegar_tipo_consulta->execute();
    ?>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>DIGGITUS SAÚDE ERP | Alterar dados de Acessos</title>
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
                                Alterar dados de Acesso</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Segurança<span class="divider">/</span>
                                </li>
                                <li class="active">Ateração da Senha</li>
                                
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
                                         Alterar Senha
                                    </h4>
                                    <span class="tools">
                                        <a class="icon-chevron-down" href="javascript:;"></a>
                                        <a class="icon-remove" href="javascript:;"></a>
                                    </span>
                                </div>
                                <div id="msg"></div>
                                <div class="widget-body form">
                                    <form class="form-horizontal" method="POST" action="">
                                        
                                        <div class="control-group">
				           <label class="control-label">Senha Actual:</label>
                                            <div class="controls">
                                                <input type="password" class="span6" placeholder="" name="Antiga" id="Antiga">
                                                
                                            </div>
					<br>
                                            <label class="control-label">Nova Senha:</label>
                                            <div class="controls">
                                                <input type="password" class="span6" placeholder="" name="Nova" id="Nova">
                                                
                                              </div>
                                            </div>
                                             <label class="control-label">Confirmar Nova Senha:</label>
                                            <div class="controls">

                                                <input type="password" class="span6" placeholder="" name="Nova_copia" id="Nova_copia">
                                              </div> 
                                         </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success" id="Alterar_senha" name="Alterar_senha"> <i class="icon-ok" ></i>Alterar Senha</button> 
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Cancelar</button>
                                        </div> 
                            </div>
                                
                    </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
<!-- Rodape -->
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
        
    <script type="text/javascript">
        $('#Alterar_senha').click(function(e) {
    
        e.preventDefault();
        
        var Antiga= jQuery('#Antiga').val();
        var Nova_copia = jQuery('#Nova_copia').val();
        var Nova = jQuery('#Nova').val();
        
        // var foto = jQuery('#foto').val();


       // $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Actualizar_SenhaU.php",
            data: {Antiga: Antiga, Nova_copia:Nova_copia, Nova:Nova},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontaal input").val() != ""){
                if(Nova_copia!=Nova){
                    jQuery('#msg').html('<div class="alert"><button data-dismiss="alert" class="close">×</button><strong>Diferença!</strong> As duas senhas não conscidem.</div>').show(300).delay(5000).hide(300);
                }else{
                    if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong>Senha Alterada com sucesso</div>').show(300).delay(5000).hide(300);
                    $(".form-horizontal input").val(""); //limpa todos inputs do formulário

return false;
                } else {
                    jQuery('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close">×</button><strong>Erro!</strong>A Senha digitada não corresponde com a Actual</div>').show(300).delay(5000).hide(300);
                    return false;
                }
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