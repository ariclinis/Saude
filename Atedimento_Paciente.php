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
if(isset($_GET['Cod_Paciente'])){
$cod_p=$_GET['Cod_Paciente'];
}
if(isset($_GET['Nome_Paciente'])){
$nome_p=$_GET['Nome_Paciente'];
}
if(isset($_GET['cod_consulta'])){
 $cod_consulta=$_GET['cod_consulta'];
}
if(isset($_GET['genero'])){
    $genero_p=$_GET['genero'];
}
  
    
   

    $Consulta=$pdo->prepare("UPDATE tbl_marcar_consulta  set Estado_Fila='Em Atedimento' where cod_consulta='$cod_consulta'");
    $Consulta->execute();
    $Pegar_paciente=$pdo->prepare("SELECT * FROM tbl_paciente where cod_paciente='$cod_p'");
    $Pegar_paciente->execute();
    $Pegar_Diagnostico=$pdo->prepare("SELECT * FROM tbl_diagnostico");
    $Pegar_Diagnostico->execute();
    $Pegar_Patologia=$pdo->prepare("SELECT * FROM tbl_patologias");
    $Pegar_Patologia->execute();
    $paciente_pegar=$Pegar_paciente->fetch(PDO::FETCH_ASSOC);
    $cod_pessoa=$paciente_pegar['cod_pessoa'];
    $Pegar_pessoa=$pdo->prepare("SELECT * FROM tbl_pessoa where cod_pessoa='$cod_pessoa'");
    $Pegar_pessoa->execute();
   
   $Genero=$Pegar_pessoa->fetch(PDO::FETCH_ASSOC);
   $ano_nasc=$Genero['data_nasc']; 
   $idade=2017-substr("$ano_nasc",0,4);
   ?>
    <head>
        <meta charset="utf-8" />
        <title>DIGGITUS SAÚDE ERP | Atendimento</title>
        <link rel="icon" type="image/png" href="./img/log_.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    
    <link href="css/style_modal.css" />

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
<script type="text/javascript">

function abriReceita(){
    $("#modalreceita").slideDown("slow");
    }
function fechaReceita(){
    $("#modalreceita").slideUp("fast");
    }

function abriPedido(){
    $("#modalpedido").slideDown("slow");
    }
function fechaPedido(){
    $("#modalpedido").slideUp("fast");
    }
function Gravar_receita(){
    $("#terminar_atendimento").prop("disabled", false);
    $('#emitir_receita').prop("disabled", true);
    $("#modalreceita").slideUp("fast");
    
    
    }
function Gravar_pedido(){

    $("#modalpedido").slideUp("fast");
    $('#emitir_pedido').prop("disabled", true);
    $("#terminar_atendimento").prop("disabled", false);
    
    }


</script>
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
                            <h3 class="page-title">Atendimento Médico</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>Atendimento <span class="divider">/</span>
                                </li>
                                <li class="active">Atendimento Médico</li>
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
                                        <i class="icon-reorder"></i> Atendimento  Médico</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <form class="form-horizontal" method="POST" action="#">
                                    <div id="msg_" name="msg_"></div>
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
                                                        <label class="control-label">Nome do Paciente:</label>
                                                        <div class="controls">
                                                            <input type="text" name="Nome" value="<?php echo $nome_p; ?>" class="span6" required>
                                                            <input type="hidden" name="Cod_paciente" id="Cod_paciente" value="<?php echo $cod_p; ?>" class="span9" required> 
                                                            <input type="hidden" name="cod_consulta" id="cod_consulta" value="<?php echo $cod_consulta; ?>" class="span9" required>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Sexo:</label>
                                                        <div class="controls">
                                                          <select class="span4 " required data-placeholder="genero" name="genero" id="genero" tabindex="1">
                                                              <option value="<?php echo $Genero['genero']; ?>">
                                                                <?php 
                                                                   echo $Genero['genero'];
                                                                   ?>
                                                              </option>
                                                          </select>  <input type="text" name="idade" id="idade" value="<?php echo $idade; ?>" placehorder="Idade" class="span2" required> 
                                                          </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Diagnostico</label>
                                                        <div class="controls">
                                                            <option value=""></option>
                                                            <select class="span6" data-placeholder="diagnostico" id="Cod_Diag" name="Cod_Diag" tabindex="1">
                                                                    <?php while ($linha=$Pegar_Diagnostico->fetch(PDO::FETCH_ASSOC)){ ?>
                                                                    <option value="<?php echo $linha['Cod_Diag']; ?>"><?php echo utf8_encode($linha['Des_Diag']); ?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div><p></p>
                                                       <label class="control-label">Patológia</label>
                                                        <div class="controls">
                                                            <select class="span6" data-placeholder="Patológia" id="Cod_Pat" name="Cod_Pat" tabindex="1">
                                                                 <option value=""></option>
                                                                    <?php while ($linha=$Pegar_Patologia->fetch(PDO::FETCH_ASSOC)){ ?>
                                                                    <option value="<?php echo $linha['Cod_Pat']; ?>"><?php echo utf8_encode($linha['Des_Patologias']); ?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="control-group">
                                                            <label class="control-label">Tipo de Analise</label>
                                                            <div class="controls"> 
                                                                <select class="span6" data-placeholder="Gênero" id="Cod_Analise" name="Cod_Analise" tabindex="1">
                                                                     <option value=""></option>
                                                                    <?php while ($linha=$paciente->fetch(PDO::FETCH_ASSOC)){ ?>
                                                                    <option value="<?php echo $linha['Cod_Analise']; ?>"><?php echo $linha['Disc_Analise']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Resultado</label>
                                                            <div class="controls"> 
                                                                <select class="span6" data-placeholder="Resultado" name="Resultado" id="Resultado" tabindex="1">
                                                                    <option value=""></option>
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
                                                                <input type="text" name="Indicacoes" id="Indicacoes" class="span9"> 
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Dosagem</label>
                                                            <div class="controls">
                                                                <input type="text" name="Dose" id="Dose" class="span9"> 
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label">Numero de Dias</label>
                                                            <div class="controls">
                                                                <input type="text" name="N_dias" id="N_dias" class="span5"> 
                                                                <input  placeholder="Quantidade" name="Quantidade" id="Quantidade" class="span4" type="text">                                                        </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" >Observação:</label>
                                                            <div class="controls">
                                                                <textarea style="width: 524px; height: 130px;" name="obs" id="obs" class="input-xxlarge" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous"><a href="javascript:;">Voltar</a></li>
                                                <li class="next"><a href="javascript:;">Proximo</a></li>
                                                <a class="next finish btn btn-inverse" style="display:none; float:center;" href="javascript:abriReceita();"> Emitir Receita</a>
                                                
                                                <!--<input class="next finish btn  btn-success" type="submit" style="display:none; float:center;" value="Env. Banco de Urgência" href=""/>-->
                                              
                                                <a class="next finish btn  btn-warning"style="display:none; float:center;"  href="javascript:abriPedido();"> Emitir Pedido</a>
                                                <button class="next finish btn btn-inverse" id="terminar_atendimento" name="terminar_atendimento" style="display:none; float:center;" disabled>Terminar Atendimento</button> 
                                            </ul>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="Modal" name="modalreceita" id="modalreceita">
<div class="formu" style="margin-left: -300px">
<div class="formulario2" >
 <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Emitir Receita</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                            <div id="msg" name="msg"></div>
                            <form novalidate="novalidate" class="cmxform form-horizontal" id="Receita" method="get" action="#">
                                <div class="control-group ">
                                <label for="cname" class="control-label" style="color: black;">Tipo de Receita</label>
                                    <div class="controls">
                                        <select class="span6" data-placeholder="Tipo" name="tipo_receita" id="tipo_receita" tabindex="1">
                                        <option value=""></option>
                                        <option value="Receita simples">Receita Simples</option>
                                        <option value="Receita de Controle Especial">Receita de Controle Especial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label for="cemail" class="control-label" style="color: black;">Instruções</label>
                                    <div class="controls">
                                        <textarea type="textarea"  class="span6 " name="instrucoes_r" id="instrucoes_r"></textarea> 
                                    </div>
                                </div>
                                
                         
                                <div class="form-actions">
                                    <a class="btn btn-success" id="emitir_receita" href="javascript:Gravar_receita();" name="emitir_receita">Gravar Receita</a>
                                    <a class="btn" href="javascript:fechaReceita();">Cancelar</a>
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

<!----- MOdal para Emitir Pedido -------->
<div class="Modal" name="modalpedido" id="modalpedido">
<div class="formu" style="margin-left: -300px">
<div class="formulario2" >
 <div class="span12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Emitir Pedido</h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->

                            <form novalidate="novalidate" class="cmxform form-horizontal" id="Pedido" method="get" action="#">
                                <div class="control-group ">
                                <label for="cname" class="control-label" style="color: black;">Tipo de pedido</label>
                                    <div class="controls">
                                        <select class="span6" data-placeholder="Tipo" name="tipo_pedido" id="tipo_pedido" tabindex="1">
                                        <option value=""></option>
                                        <option value="Analise de Sangue">Analise de Sangue</option>
                                        </select>
                                    </div>
                                </div>
                               <div class="control-group ">
                                    <label for="cemail" class="control-label" style="color: black;">Instruções</label>
                                    <div class="controls">
                                        <textarea type="textarea"  class="span6 " name="instrucoes_p" id="instrucoes_p"></textarea> 
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a class="btn btn-success" id="emitir_pedido" href="javascript:Gravar_pedido();">Emitir Pedido</a>
                                    <a class="btn" href="javascript:fechaPedido();">Cancelar</a>
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
            <!-- END PAGE CONTENT-->
                
        </div><
        <!-- END PAGE CONTAINER-->
 
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

<script type="text/javascript">


/*
    $('#emitir_receita').click(function(){
        //if($('#tipo_receita').val()!="" || $('#instrucoes_r').val() !="" ){

        
        $("#modalreceita").slideUp("fast");
        
       
        //}
        
        
    });

    $('#emitir_pedido').click(function(){
        if($('#tipo_pedido').val()!="" || $('#instrucoes_p').val() !="" ){

        
        $("#modalpedido").slideUp("fast");
        $('#emitir_pedido').prop("disabled", true);
        $("#terminar_atendimento").prop("disabled", false);
       
        }
        
        
    });*/
    $('#terminar_atendimento').click(function(e) {
    
        e.preventDefault();

        var Cod_paciente = jQuery('#Cod_paciente').val();
        var tipo_receita = jQuery('#tipo_receita').val();
        var tipo_pedido = jQuery('#tipo_pedido').val();
        var instrucoes = jQuery('#instrucoes').val();
        var cod_consulta = jQuery('#cod_consulta').val();
        var Cod_Diag = jQuery('#Cod_Diag').val();
        var Cod_Pat =jQuery('#Cod_Pat').val();
        var Cod_Analise = jQuery('#Cod_Analise').val();
        var Resultado =jQuery('#Resultado').val();
        var Indicacoes_r =jQuery('#instrucoes_r').val();
        var Indicacoes_p =jQuery('#instrucoes_p').val();
        var Dose = jQuery('#Dose').val();
        var N_dias = jQuery('#N_dias').val();
        var obs = jQuery('#obs').val();
        var Quantidade = jQuery('#Quantidade').val();
        var idade = jQuery('#idade').val();
        var genero = jQuery('#genero').val();
        
        $.ajax({
            type: "POST",
            url: "./Classes/Cadastrar_Atendimento.php",
            data: {Cod_paciente:Cod_paciente, tipo_receita:tipo_receita,tipo_pedido:tipo_pedido, instrucoes:instrucoes, cod_consulta: cod_consulta, Cod_Diag:Cod_Diag, Cod_Pat:Cod_Pat, N_dias:N_dias, Cod_Analise:Cod_Analise, Resultado:Resultado, Indicacoes_receita:Indicacoes_r,Indicacoes_pedido:Indicacoes_p, Dose:Dose, obs:obs, Quantidade:Quantidade, idade:idade, genero:genero},
                
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontal input").val() != ""){
                if (data.toString() == 'sucesso') {

                    jQuery('#msg_').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong>Atendimento feito com sucesso.</div>').show(300).delay(5000).hide(300);
                    function eperar () {
           window.location = 'Meus_Pacientes.php';
                           }  
                     setTimeout(eperar,3000);
                   // $(".form-horizontal input").val(""); //limpa todos inputs do formulário
return false;

                }if (data.toString() == 'sucessop') {

                    jQuery('#msg_').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong>Atendimento feito com sucesso. Aguardando pelo resultado do Pedido</div>').show(300).delay(5000).hide(300);
                      function eperar () {
           window.location = 'Meus_Pacientes.php';
                           }  
                     setTimeout(eperar,3000);
                   // $(".form-horizontal input").val(""); //limpa todos inputs do formulário
return false;

                }



                 else {
                     jQuery('#msg_').html('<div class="alert alert-error"><button data-dismiss="alert" class="close">×</button><strong>Problema!</strong>Ocorreu um erro ao fazer o Atendimento.</div>').show(300).delay(5000).hide(300);

                   // $(".form-horizontal input").val(""); //limpa todos inputs do formulário
return false;
                }
            }
                else{
                    jQuery('#msg_').html('<div class="alert"><button data-dismiss="alert" class="close">×</button><strong>Irregularidade!</strong> Porfavor verifique se os campos estão devidamente preenchidos.</div>').show(300).delay(5000).hide(300);
                }
            }
        });
  
    });
</script>
<!--script for this page-->
<script src="js/form-component.js"></script>   
</body>
<!-- END BODY -->
</html>