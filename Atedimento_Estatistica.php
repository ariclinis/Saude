
<!DOCTYPE html>
<html lang="en"> 

    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    $Pegar_P_atedindos = $pdo->prepare("SELECT * From atedimento_v");
    $Pegar_P_atedindos->execute();
    $linha = $Pegar_P_atedindos->fetch(PDO::FETCH_ASSOC);
    ?>
    <table>
        <tr>teste</tr>
        
    </table> 
   
    <head>
        <meta http-equiv="content-type"  content="text/html; Charset=utf-8" >
        <title>DIGGITUS SAÚDE ERP</title>
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

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <?php include_once('Topo_usu.php') ?>
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER-->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">
                <?php include('Menu.php') ?>
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
                            <h3 class="page-title">Estatísticas de Pacientes Atedindos</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Atedimento</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Estatísticas de Pacientes Atedindos
                                </li>
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
                    <!-- BEGIN ADVANCED TABLE widget-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget black">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>  Estatísticas de Pacientes Atedindos</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                 </table><p></p>
                                    <div class="form-actions">
                                      <form  name="frm_Relatorio" action="Relatorios/Atedimento_Estatistica_impresao.php" method="GET">
                                          <h4><i class="icon-print"> Opções de Pequisas</h4></i><p></p><br></br>
                                    <label>Datas</label><input type="date" name="data_inicio" class="span2"> <input type="text" name="texto" class="span1"> <input type="date" name="data_fim" class="span2"> 
                                    </select> 
                                    <select class="span3"  data-placeholder="Nome" name="Nome" tabindex="1">
                                       <?php
                                                        header('Content-Type: text/html; charset=utf-8');
                                                        while ($Linha = $Pegar_P_atedindos->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <option value="<?php echo $Linha['Cod_Ated'] ?>"><?php echo utf8_encode($Linha['Nome']);?></option>
                                                            
                                                        <?php } ?>
                                                        
                                    </select><p></p><br></br>
                                        <button type="submit" class="btn btn-success"><i class="icon-ok"></i>   Imprimir     </button>
                      <a class="btn  btn-inverse"><i class="icon-suitcase">  </i>    Limpar    </a>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
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

    </body>
    <!-- END BODY -->
</html>