<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $direcao = $pdo->prepare("SELECT * FROM tbl_dir");
    $direcao->execute();
    $reparticao=$pdo->prepare("SELECT * From tbl_repaticao");
    $reparticao->execute();
    $unidsan=$pdo->prepare("SELECT * From tbl_uni_san");
    $unidsan->execute();
    $unidinterv=$pdo->prepare("SELECT * From tbl_unid_interv");
    $unidinterv->execute();
    ?>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>DIGGITUS SAÚDE ERP | Utilizadores</title>
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

          <link href="css/style_modal.css" />

    </head>
    <!-- END HEAD -->

    <body class="fixed-top">
        <!-- BEGIN HEADER -->

        <script type="text/javascript">
function abripermissao(){
    $("#modalpermissao").slideDown("slow");
    }
function fechapermissao(){
    $("#modalpermissao").slideUp("fast");
    }
</script>
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
                                 Contas de Utilizadores</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Cadastrar Utilizadores<span class="divider">/</span>
                                </li>
                                <li class="active"> Contas de Utilizadores</li>
                               
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
                                          Contas de Utilizadores
                                    </h4>
                                    <span class="tools">
                                        <a class="icon-chevron-down" href="javascript:;"></a>
                                        <a class="icon-remove" href="javascript:;"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                <div id="msg"></div>
                                    <form class="form-horizontal" style="width: 1000px;" method="POST" id="utilizador" name="utilizador" action="">
                                        <a class="btn btn-primary" href="#" ><i class="icon-user"> Informações de Acesso </i></a><p></p>
                                        
                                        <div class="control-group">
                                                <label class="control-label">Nome</label>
                                                <div class="controls">
                                                    <input type="text" name="nome_user" id="nome_user" class="span6"> 
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label class="control-label">Nome de Login</label>
                                                <div class="controls">
                                                    <input type="text" name="nome_login" id="nome_login" class="span6"> 
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Palavra passe</label>
                                                <div class="controls">
                                                    <input type="password" name="senha" id="senha" class="span6"> 
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Estado</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Estado" name="estado" id="estado" tabindex="1">
                                                            <option value=""></option>
                                                            <option value="Actvo">Actvo</option>
                                                            <option value="Inactivo">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                         
                                            <div class="control-group">
                                                <label class="control-label">Nivel de Acesso</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Prioridades" name="acesso" id="acesso" tabindex="1">
                                                            <option value=""></option>
                                                            <option value="Administrador">Administrador</option>
                                                            <option value="Enfermeiro">Enfermeiro</option>
                                                            <option value="Doctor">Doctor</option>
                                                        </select>
                                                </div><p></p> 
                                                
                                                <a class="btn btn-primary" href="#" ><i class="icon-home"> Local de Trabalho </i></a>
                                        </div>
                                        <div class="control-group">
                                                <label class="control-label">Direção</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Prioridades" name="cod_dir" id="cod_dir" tabindex="1">
                                                            <option value=""></option>
                                                            <?php while ($linha= $direcao->fetch(PDO::FETCH_ASSOC)) { ?>
                                                               
                                                                <option value="<?php echo $linha['cod_dir']; ?>"><?php echo utf8_encode($linha['descricao']); ?></option>

                                                           <?php } ?>
                                                            
                                                           
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="control-group">
                                                <label class="control-label">Reparição</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Prioridades" name="cod_repart" id="cod_repart" tabindex="1">
                                                            <option value=""></option>
                                                            <?php while ($linha=$reparticao->fetch(PDO::FETCH_ASSOC)) { ?>
                                                             
                                                                  <option value="<?php echo $linha['cod_reparticao']; ?>"><?php echo utf8_encode($linha['descricao_repart']); ?></option>
                                                            <?php } ?>
                                                          
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Unidade Sanitária</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Prioridades" name="cod_unid_san" id="cod_unid_san" tabindex="1">
                                                            <option value=""></option>
                                                            <?php while ($linha=$unidsan->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                  <option value="<?php echo $linha['Cod_Un_San']; ?>"><?php echo utf8_encode($linha['Desc_Unidade_San']); ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="control-group">
                                                <label class="control-label">Unidade de Intervenção</label>
                                                <div class="controls">
                                                    <select class="span6 " data-placeholder="Prioridades" name="cod_unid_interv" id="cod_unid_interv" tabindex="1">
                                                            <option value=""></option>
                                                            <?php while ($linha=$unidinterv->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                  <option value="<?php echo $linha['Cod_Unid_Interv']; ?>"><?php echo utf8_encode($linha['Descr_Unid_Interv']); ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                       <div class="form-actions">
                                                         <a  ref="#" class="btn btn-success" id="Cadastrar_usu" name="Cadastrar_usu"> <i class="icon-ok"></i> Cadastrar Utilizador </a>
<!--                                                         <a type="submit" class="btn btn-success" id="permissao" name="permissao" href="javascript:abripermissao();"><i class="icon-ok"></i>Atribuir Permisões</a>-->
                                                         <button type="button" class="btn"><i class=" icon-remove"></i> Cancelar</button>
                                        </div>
                                    </form>
                                </div>



                            <!-- END FORM-->
                        </div>

                    </div>
                            </div>
                            <div class="Modal" name="modalpermissao" id="modalpermissao">

<div class="formu" style="margin-left: -300px;">

<div class="formulario2" >
 <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder" Enabled></i>Atribuir Permisões</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->

                            <form novalidate="novalidate" class="cmxform form-horizontal" id="permissao" method="POST" action="#">
                            <div id="msgP"></div>
                                <div class="control-group ">
                                <label for="cname" class="control-label" style="color: black;">Gestão de pacientes</label>
                                    <div class="controls">
                                        <input class="span1 " id="activo[]" name="activo[]" required="" value="1" type="checkbox" >
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="cemail" class="control-label" style="color: black;">Atendimento</label>
                                    <div class="controls">
                                        <input class="span1 " id="activo[]" name="activo[]" required="" value="2" type="checkbox">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="curl" class="control-label" style="color: black;" >Consultas Médicas</label>
                                    <div class="controls">
                                        <input class="span1 " id="activo[]" name="activo[]" type="checkbox" value="3">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="ccomment" class="control-label" style="color: black;" >Recursos Humanos</label>
                                    <div class="controls"> 
                                    <input class="span1" id="curl" name="activo[]" id="activo[]" value="6" type="checkbox">
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="ccomment" class="control-label" style="color: black;" >Regras e Tabelas</label>
                                    <div class="controls"> 
                                    <input class="span1" id="curl" name="activo[]" id="activo[]" value="11" type="checkbox">
                                    </div> 
                                </div>
                                <div class="control-group ">
                                    <label for="ccomment" class="control-label" style="color: black;" >Administração</label>
                                    <div class="controls"> 
                                    <input class="span1" id="curl" name="activo[]" id="activo[]" value="12" type="checkbox">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a class="btn btn-success" name="inserir_permissao" Enabled>Atribuir permissão</a>
                                    <a class="btn" href="javascript:fechapermissao();">Cancelar</a>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
</div>


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
        $('.form-horizontal #Cadastrar_usu').click(function(e) {
    
        e.preventDefault();
        
        var nome_login = jQuery('#nome_login').val();
        var nome_user = jQuery('#nome_user').val();
        var senha = jQuery('#senha').val();
        var estado = jQuery('#estado').val();
        var acesso = jQuery('#acesso').val();
        var cod_dir = jQuery('#cod_dir').val();
        var cod_repart = jQuery('#cod_repart').val();
        var cod_unid_san = jQuery('#cod_unid_san').val();
        var cod_unid_interv = jQuery('#cod_unid_interv').val();
        
       
        // var foto = jQuery('#foto').val();


       // $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Cadastrar_Utilizador.php",
            data: {nome_login: nome_login, nome_user:nome_user, senha:senha, estado: estado, acesso:acesso, cod_dir: cod_dir, cod_repart: cod_repart, cod_unid_san:cod_unid_san, cod_unid_interv: cod_unid_interv},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontal input").val() != ""){


                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong> Cadastro do Utilizador efectuado com sucesso.</div>').show(300).delay(5000).hide(300);
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

</script>






    </body>
    <!-- END BODY -->
</html>