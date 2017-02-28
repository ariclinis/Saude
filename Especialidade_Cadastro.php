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
        <title>DIGGITUS SAÚDE ERP | Especialidades</title>
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
                                Configurações »» Regras e Tabelas</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Consultas Médicas<span class="divider">/</span>
                                </li>
                                <li class="active">Regras e Tabelas</li>
                                
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
                                         Cadastro de Especialidades
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
				           <label class="control-label">Código Especialidade:</label>
                                            <div class="controls">
                                                <input type="text" class="span6" placeholder="" name="Cod_Especialidade" id="Cod_Especialidade">
                                                
                                            </div>
					<br>
                                            <label class="control-label">Especialidade:</label>
                                            <div class="controls">
                                                <input type="text" class="span6" placeholder="" name="Descricao_Consulta" id="Descricao_Consulta">
                                                
                                              </div>
                                            </div>
                                             <label class="control-label">Estado:</label>
                                            <div class="controls">

                                                <select class="span6" name="Estado" data-placeholder="Choose a Category" tabindex="1" id="Estado">
                                                    <option value="Activo">Activo</option>
                                                    <option value="Inativo">Inativo</option>
                                                </select>
                                              </div> 
                                         </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success" id="cadastrar" name="cadastrar"> <i class="icon-ok" ></i>Gravar Especialidade</button> 
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Cancelar</button>
                                        </div> 
                            </div>
                                    
                                <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget black">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>  Especialidades Registadas</h4>
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
                                                <th>Nº Ordem</th>
                                                <th>Codigo</th>
                                                <th>Especialidade</th>
                                                <th class="hidden-phone">Estado</th>
                                                  <th class="hidden-phone">Ultima Actualização</th>
                                                <th class="hidden-phone">Utilizador</th>
                                                <th class="hidden-phone"><center>Operações</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($Linha =  $pegar_tipo_consulta->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr class="odd gradeX">
                                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                                 <td><?php echo utf8_encode($Linha['Cod_Tipo_Consulta']); ?></td>
                                                <td><?php echo utf8_encode($Linha['Cod_Especialidade']); ?></td>
                                                <td><?php echo $Linha['Descricao_Consulta']; ?></td>
                                                 <td><?php echo $Linha['Estado']; ?></td>
                                                 <td><?php echo $Linha['Data_Registo']; ?></td>
                                                <td><?php echo $Linha['Estado']; ?></td>
                                                <td class="hidden-phone"><a href="Paciente_Correcao.php?Paciente=<?php echo $Linha['cod_paciente']; ?>" class="btn btn-small btn-primary"><i class="icon-pencil icon-white"></i> Corrigir Registos</a>
                                                <a target="_blank" class="btn btn-small btn-inverse" href="Relatorios/paciente_ficha.php?cod_paciente=<?php echo base64_encode($Linha['cod_paciente']); ?>"><i class="icon-suitcase">  </i>Imprimir Ficha</a>
                                                </td>
                                            </tr>
                                      <?php } ?>
                                    </tbody>
                                    </table><p></p>
                                    <button type="submit" name="lista" value="lista" class="btn btn-success"><i class="icon-ok"></i> Imprimir Lista</button>
                                 </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
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
        $('#cadastrar').click(function(e) {
    
        e.preventDefault();
        
        var Cod_Especialidade= jQuery('#Cod_Especialidade').val();
        var Descricao_Consulta = jQuery('#Descricao_Consulta').val();
        var Estado = jQuery('#Estado').val();
        
        // var foto = jQuery('#foto').val();


       // $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Cadastrar_Especialidade.php",
            data: {Cod_Especialidade: Cod_Especialidade, Descricao_Consulta:Descricao_Consulta, Estado:Estado},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontaal input").val() != ""){
                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong>Especialidade Cadastrado com Sucesso</div>').show(300).delay(5000).hide(300);
                    $(".form-horizontal input").val(""); //limpa todos inputs do formulário

return false;
                } else {
                    jQuery('#msg').html('<div class="alert alert-error"><button data-dismiss="alert" class="close">×</button><strong>Erro!</strong> Ocorreu um erro ao Cadastrar Especialidade</div>').show(300).delay(5000).hide(300);
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