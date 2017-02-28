
<!DOCTYPE html>
<html lang="en"> 
    <?php
    include_once './Classes/Conexao.php';
    $pdo = conexao::Chamar_conexao();
    if(isset($_GET['Remarcar'])){
        $cod_consulta=$_GET['Remarcar'];
        $Mudar_Estado= $pdo->prepare("UPDATE meus_pacientes_v SET Estado_Consulta ='Agendado' WHERE cod_consulta='$cod_consulta'");
        $Mudar_Estado->execute();
    }
     if(isset($_GET['Cancelado'])){
        $cod_consulta=$_GET['Cancelado'];
        $Mudar_Estado= $pdo->prepare("UPDATE meus_pacientes_v SET Estado_Consulta ='Cancelado' WHERE cod_consulta='$cod_consulta'");
        $Mudar_Estado->execute();
    }
    $Pegar_paciente = $pdo->prepare("SELECT * From meus_pacientes_v");
    $Pegar_paciente->execute();

    /*
    $funci=$Pegar_paciente->fetch(PDO::FETCH_ASSOC);
    $cod_f=$funci['Cod_Funcionario'];
    */


    $pegar_funcionario = $pdo->prepare("Select distinct cod_funcionario,Nome_funcionario from agendar_v");
    $pegar_funcionario->execute();
    $Pegar_Consulta_Agenda = $pdo->prepare("Select distinct cod_tipo_consulta,Descricao_Consulta From agendar_v  ");
    $Pegar_Consulta_Agenda->execute();
    
    ?>
    <head>
        <meta http-equiv="content-type"  content="text/html; Charset=utf-8" >
        <title>DIGGITUS SAÚDE ERP | Consultas</title>
        <link rel="icon" type="image/png" href="./img/log_.png" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author"/>
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

    <body class="fixed-top">

        <div id="header" class="navbar navbar-inverse navbar-fixed-top">

            <?php include_once('Topo_usu.php'); ?>
        </div>

        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">
                <?php include('Menu.php'); ?>
            </div>

            <div id="main-content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                        <h3 class="page-title">Listagem das Consultas Marcadas</h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Inicio</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Consultas Médicas</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Listagem de Consultas
                                </li>
                                <li class="pull-right search-wrap">
                                   
                                </li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12">

                            <div class="widget black">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Listagem de Consultas</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th style="width:8px"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />   </th>
                                                <th>Nº</th>
                                                <th>Nome Paciente</th>
                                                <th>Genero</th>
                                                <th>Médico(a)/Enfermeiro(a)</th>
                                                <th>Tipo de Consulta</th>
                                                <th class="hidden-phone">Data Consulta</th>
                                               <!-- <th class="hidden-phone">Hora Inicio</th>-->
                                               <!--  <th class="hidden-phone">Situação</th>-->
                                                <th class="hidden-phone">Estado da Consulta</th>
                                                <th class="hidden-phone"><center>Operações</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($Linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC)) { ?>
                                      
                                            <tr>
                                            <th class="odd grade">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            </th>
                                                <th><?php echo $cont+=1; ?></th>
                                                <th><?php echo ($Linha['nome']); ?></th>
                                                <th><?php echo $Linha['genero']; ?></th>
                                                <th>
                                                    <?php $cod_fu=$Linha["Cod_Funcionario"];
                                                        $Pegar_func=$pdo->prepare("SELECT * From funcionario_v WHERE cod_funcionario = '$cod_fu'");
                                                        $Pegar_func->execute();
                                                        $funci=$Pegar_func->fetch(PDO::FETCH_ASSOC);
                                                        echo $funci['nome'];
                                                    ?>
                                                 </th>
                                                <th><?php echo($Linha['Descricao_Consulta']); ?></th>
                                                <th class="hidden-phone"><?php echo $Linha['Data_Consult']; ?></th>
                                                <!--<th class="hidden-phone"><?php //echo $Linha['Hora_Inicio']; ?></th>-->
                                                 <!--<th class="hidden-phone"><?php // echo utf8_encode($Linha['Situa']); ?></th>-->
                                                <th class="hidden-phone"><span class="label label-success">

                                                <?php echo $Linha['Estado_Consulta']; ?>
                                                </span>
                                                </th>
                                                <td class="hidden-phone">
                                                <a href="?Remarcar=<?php echo $Linha['cod_consulta']; ?>" class="btn btn-small btn-primary">
                                                <i class="icon-pencil icon-white"></i> Remarcar</a>
                                                <a href="Consulta_Actualizar.php?Cod_Consulta=<?php echo base64_encode($Linha['cod_consulta']); ?>" class="btn btn-small btn-secundary">
                                                <i class="icon-pencil icon-white"></i>Actualizar</a>
                                                <a href="?Cancelado=<?php echo $Linha['cod_consulta']; ?>" class="btn btn-small btn-danger">
                                                <i class="icon-pencil icon-white"></i>Cancelar</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <p></p>
                                    
                                     <div class="form-actions">
                                     <p></p>
                                        <form  name="frm_Relatorio" action="Relatorios/Listagem_Consultas_Marcadas.php" target="_blank" method="POST">
                                            <h4><i class="icon-print"> Opções de Pequisas</i></h4><p></p>
                                            <label>Datas de Registo</label><input type="date" name="data_inicio" class="span2"> 
                                            <input type="text" name="texto" class="span1"> 
                                            <input type="date" name="data_fim" class="span2" /><p></p>
                                    <label>Data da Consulta</label>
                                    <input type="date" name="data" class="span2" /> 
                                    <select class="span3"  data-placeholder="funcionario" name="funcionario" tabindex="1">
                                           <option value="">Selecione o Nome do Doctor</option>
                                           <option value="Mariano Tomas ">Mariano Tomas</option>
                                          <?php
                                            header('Content-Type: text/html; charset=utf-8');
                                            while ($linha = $pegar_funcionario->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo utf8_decode($linha['Nome_funcionario']) ?>"><?php echo utf8_encode($linha['Nome_funcionario']); ?></option>
                                            <?php } ?>
                                             </select> 
                                  <select class="span3"  data-placeholder="Consulta" name="Consulta" tabindex="1">
                                           <option value="">Selecione o Tipo de Consulta</option>
                                          <?php
                                            header('Content-Type: text/html; charset=utf-8');
                                            while ($linha = $Pegar_Consulta_Agenda->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?php echo ($linha['Descricao_Consulta']); ?>"><?php echo ($linha['Descricao_Consulta']); ?></option>
                                            <?php } ?>
                                  </select>
                                   <select class="span3"  data-placeholder="Estado" name="Estado" tabindex="1">
                                           <option value="">Selecione o Estado da Consulta</option>
                                           <option value="Concluido">Concluido</option>
                                           <option value="Agendada">Agendado</option>
                                           <option value="Cancelada">Cancelado</option>
                                  </select>
                                  <p></p>
                                  <button type="submit" class="btn btn-success"><i class="icon-ok"></i>    Imprimir   </button>
                                  </form>
                            </div>
                            </div>
                            </div>
                         </div>
                         </div>
                         </div>
                         </div>
                         </div>
                    

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