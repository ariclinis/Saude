
<!DOCTYPE html>
 <html lang="en"> 
<?php
include_once './Classes/Conexao.php';
$pdo = conexao::Chamar_conexao();
$Pegar_menu=$pdo->prepare("SELECT * From tbl_menus");
$Pegar_menu->execute();

$utilizador= filter_input(INPUT_GET, 'user');

$Pegar_user=$pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador = '$utilizador'");
$Pegar_user->execute();
$dado= $Pegar_user->fetch(PDO::FETCH_ASSOC);
?>
    <head>
        <meta charset="utf-8" />
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
                                Registos de Pacientes
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Administração-Utilizadores</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Atribuição de Permissões
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Utilizador:: <string><?php echo $dado['Nome_User']; ?></string>
                                </li>
                             </ul>
                           <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN ADVANCED TABLE widget-->
                    <div class="row-fluid">
                        <div class="span6">
                    <!--BEGIN LABEL & BADGE PORTLET-->
                    <div class="widget black">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Módulos do Sistema</h4>
                  <span class="tools">
                  <a class="icon-chevron-down" href="javascript:;"></a>
                  <a class="icon-remove" href="javascript:;"></a>
                  </span>
                    <div id="msg" name="msg"></div>
                        </div>
                        <div class="widget-body">
                        
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Modúlo</th>
                                    <th>Acesso</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" value="<?php echo $dado['cod_utilizador']; ?>" id="user" name="user">
                                <?php while ($linha=$Pegar_menu->fetch(PDO::FETCH_ASSOC)) { ?>
                                  
                               
                                <tr>
                                    <td>
                                       <?php echo utf8_encode($linha['Desc_Menu']); ?>
                                    </td>
                                    <td>
                                        <span class="badge"><input type="checkbox" value="<?php echo $linha['ID']; ?>" name="activo[]" id="activo[]"></span>
                                    </td>
                                    <td>
                                        <a class="btn btn-mini btn-primary">Editar</a>
                                       <a class="btn btn-mini btn-sucess">Actualizar</a>
                                     
                                    </td>
                                </tr>
                                 <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                       <td> <button class="btn-small btn-sucess" href="#" id="inserir_permissao" name="inserir_permissao">Atribuir Permissao</button></td>
                                        <td></td>
                                        <td><button class=" btn-danger" href="#" id="inserir_permissao" name="inserir_permissao">Cancelar</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!--END LABEL & BADGE PORTLET-->
                </div>





                <div class="span6">
                    <!--BEGIN LABEL & BADGE PORTLET-->
                    <div class="widget black">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Acessos do Utilizador - <?php echo $dado['Nome_User']; ?></h4>
                  <span class="tools">
                  <a class="icon-chevron-down" href="javascript:;"></a>
                  <a class="icon-remove" href="javascript:;"></a>
                  </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Modúlo</th>
                                    <th>Acesso</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        Default
                                    </td>
                                    <td>
                                        <span class="badge">1</span>
                                    </td>
                                    <td>
                                       <a class="btn btn-mini btn-primary">Remover Acesso</a>
                                     </td>
                                </tr>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--END LABEL & BADGE PORTLET-->
                </div>
                    </div>
                    <!-- END ADVANCED TABLE widget-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        
        <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->
   <script src="js/dynamic-table.js"></script>


   <script type="text/javascript">
        $('#inserir_permissao').click(function(e) {
    
        e.preventDefault();

        var u = jQuery('#user').val();



        var activo = new Array();
$("input[name='activo[]']:checked").each(function ()
{
   // valores inteiros usa-se parseInt
   activo.push(parseInt($(this).val()));
   // Para pegar string
  // activo.push($(this).val());
});

        $.ajax({
            type: "POST",
            url: "./Classes/Utilizador_permissao.php",
            data: {activo: activo, u:u},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($(".form-horizontal input").val() != ""){
                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close">×</button><strong>Êxito!</strong> Permisões Atribuidas.</div>').show(300).delay(5000).hide(300);
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
</html>