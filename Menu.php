<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
session_start();
$cod=$_SESSION['cod'];

include_once './Classes/Conexao.php';
$pdo = conexao::Chamar_conexao();
$pegar_user = $pdo->prepare("SELECT * FROM tbl_acesso_menu WHERE Cod_Utilizador='$cod'");
$pegar_user->execute();
?>
<div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
           <!-- <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search" />
            </form> -->
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="sub-menu active">
                        <i class="icon-h-sign"></i>
                        <span> DIGGITUS ERP V1.2.3</span>
            </li>
            <?php while ($Result = $pegar_user->fetch(PDO::FETCH_ASSOC)) { ?>
            <?php if ($Result['Cod_Menu'] == '1' && $Result['Visivel'] == 'Sim') { ?>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-male"></i>
                                <span>Gestão de Pacientes</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                            <li><a class="" href="Paciente_Cadastro.php">Cadastrar Pacientes</a></li>
                            <li><a class="" href="Paciente_Listagem.php">Listar Pacientes</a></li> 
                            <li><a class="" href="Relatorios/paciente_estatistica.php">Estatistica Pacientes</a></li> 
                               
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($Result['Cod_Menu'] == '2' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-user-md"></i>
                            <span>Atendimentos</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Meus_Pacientes.php">Meus  Pacientes</a></li>
                            <li><a class="" href="Listagem_Atedimento.php">Lista de Atedimento </a></li>
                            <li><a class="" href="Meus_Pacientes_Aguarda_Pedido.php"> Meus Pacie-Pedidos </a></li>
 </ul>
                    </li>
                <?php } ?>
                <?php if ($Result['Cod_Menu'] == '3' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>Consultas Médicas</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Consulta_Agendar.php">Agendar Consulta</a></li>
                            <li><a class="" href="Consulta_Agendar_listagem.php">Consultas Agendadas</a></li> 
                            <li><a class="" href="Marcar_Consulta.php">Marcar consulta</a></li>
                            <li><a class="" href="Consulta_Listagem.php">Listar Consultas</a></li> 
                            <li><a class="" href="Controlo_Atedimento.php">Controlo Atedimento </a></li> 
                         </ul>
                    </li>
                <?php } ?>
                   
                <!--//-Banco de Urgencia Hospitar-->
                <!--
                /*<?php if ($Result['Cod_Menu'] == '4' && $Result['Visivel'] == 'Sim') { ?>*/
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-ambulance"></i>
                            <span>Banco de Urgência</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            
                            <li><a class="" href="Atedimento_Paciente_Normal.php">Atedimento Normal</a></li>
                            <li><a class="" href="Controlo_Diario_P_Internados.php">Controlo Diário</a></li>
                            <li><a class="" href="#"> <> Tratamentos</a></li>
                            <li><a class="" href="#">Operações</a></li>
                            <li><a class="" href="#">Análises</a></li>
                            <li><a class="" href="#">Raios X</a></li>
                            <li><a class="" href="#">Outros Exames</a></li> 
                        </ul>
                    </li>
                <?php } ?>
                -->
                <!--Modulo de Internamento-->
                <!--
                <?php if ($Result['Cod_Menu'] == '5' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-hospital"></i>
                            <span>Internamento</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Paciente_Internado_Entrada.php">Entrada de Paciente</a></li>
                            <li><a class="" href="Paciente_Listagem_Internados.php">Lista de Internados</a></li>
                            <li><a class="" href="Adicionar_Paciente_Sala.php">Adicinar na Sala</a></li>
                            <li><a class="" href="Paciente_Internado_Saida.php">Lista de Saida</a></li>
                            <li><a class="" href="#">Transferência</a></li>
                            <li><a class="" href="#">Pacientes Internados</a></li>
                            <li><a class="" href="#">Regras e Tabelas </a></li>
                        </ul>
                    </li>
                <?php } ?>
                -->
                
          
                <?php if ($Result['Cod_Menu'] == '6' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-user"></i>
                            <span>Recursos Humanos</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                           <!-- <li><a class="">|«»| Operações</a></li>-->
                            <li><a class="" href="Funcionario_Cadastro.php">Cadastrar Funcionário</a></li>
                            <!--<li><a class="" href="Funcionario_Cadastro.php">Actualizar Registos</a></li>-->
                            <li><a class="" href="Plano_Ferias.php">Plano de Férias</a></li>
                            <!--<li><a class="" href="">Emitir Guias de Férias</a></li>
<!--                            <li><a class="" href="">Recolha de Movimento</a></li>-->
                           <!-- <li><a class="" href="">|| Consulta e Listagem</a></li>-->
                            <li><a class="" href="Funcionario_Listagem.php">Lista dos Funcionário</a></li>
                            <li><a class="" href="Listagem_Ferias.php">Mapa de Férias</a></li>
<!--                        <li><a class="" href="Listagem_Ferias.php">Imprimir Guias</a></li>
                            <li><a class="" href="Funcionario_Cadastro.php">L. de Efectividades</a></li>
                            <li><a class="" href="Funcionario_Listagem.php">Mapa de Efectividade</a></li>-->
                            <li><a class="" href="Funcionario_Listagem.php">Estatistica Funcionário</a></li>
                            <!--<li><a class="" href="#">Regras e Tabelas </a></li>-->
                        </ul>
                    </li>
                <?php } ?>
                 
                    <!--Modulo de Gestão de Finanças-->
                <!--
                <?php if ($Result['Cod_Menu'] == '7' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-money"></i>
                            <span>Gestão de Finanças</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Consulta_Listagem.php">despensas</a></li> 
                            <li><a class="" href="Banco_Urgencia_Listagem.php">deesm</a></li>
                            <li><a class="" href="Utilizador_Listagem.php">hbns</a></li> 
                            <li><a class="" href="Funcionario_Listagem.php">vh</a></li>
                            <li><a class="" href="Unidade_Sanitaria_Listagem.php">vg</a></li>
                            <li><a class="" href="#">Regras e Tabelas </a></li>
                        </ul>
                    </li>
                <?php } ?>
                -->
                <!--Modulo de Gestão Estatistica-->
                <!--
                <?php if ($Result['Cod_Menu'] == '8' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-bar-chart"></i>
                            <span>Gestão de Estatisca</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Atedimento_Estatistica.php">Atedimento</a></li> 
                            <li><a class="" href="Relatorios_Estatisticos.php">Relatórios Diários</a></li> 
                            <li><a class="" href="Relatorios_Estatisticos.php">Relatórios</a></li> 
                            <li><a class="" href="Relatorios/Grafico_Patologia.html">Gráfico Patologias</a></li> 
                            <li><a class="" href="Banco_Urgencia_Listagem.php">Banco de urgência</a></li>
                            <li><a class="" href="Utilizador_Listagem.php">Utilizadores</a></li> 
                            <li><a class="" href="Funcionario_Listagem.php">Funcionários</a></li>
                            <li><a class="" href="Unidade_Sanitaria_Listagem.php">Unidades Sanitarias</a></li>
                        </ul>
                    </li>
                <?php } ?>
                -->
                
                <!--Gestão de Historico-->
                
                <!--
                <?php if ($Result['Cod_Menu'] == '9' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-folder-open"></i>
                            <span>Histórico Pacientes</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Consulta_Listagem.php">Consultas</a></li> 
                            <li><a class="" href="Banco_Urgencia_Listagem.php">Banco de urgência</a></li>
                            <li><a class="" href="Utilizador_Listagem.php">Utilizadores</a></li> 
                            <li><a class="" href="Funcionario_Listagem.php">Funcionários</a></li>
                            <li><a class="" href="Unidade_Sanitaria_Listagem.php">Unidades Sanitarias</a></li>
                        </ul>
                    </li>
                <?php } ?>
                -->
                
                <!--
                     <?php // if ($Result['Cod_Menu'] == '10' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-cogs"></i>
                            <span>Portária Hospitalar</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Utilizador_Cadastro.php">Contas de Utilizadores</a></li>
                            <li><a class="" href="Unidade_Sanitaria_Cadastro.php">Atribuir Permissões</a></li>
                            <li><a class="" href="Unidade_Sanitaria_Cadastro.php">Direcção de Saúde</a></li>
                            <li><a class="" href="Unidade_Sanitaria_Cadastro.php">Unidades Sanitarias</a></li>
                            <li><a class="" href="Unidade_Sanitaria_Cadastro.php">Unidade Intervenção</a></li>
                            <li><a class="" href="#">Controlo de Periodos</a></li> 
                            <li><a class="" href="#">Recuperar</a></li>
                            <li><a class="" href="#">Restaurar</a></li>
                        </ul>
                    </li>
                <?php //} ?>
                    -->
                     <?php if ($Result['Cod_Menu'] == '11' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-th"></i>
                            <span>Regras e Tabelas</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="Especialidade_Cadastro.php">Especialidades</a></li>
                            <li><a class="" href="#">Direcção de Saúde</a></li>
                            <li><a class="" href="#">Unidades Sanitarias</a></li>
                            <li><a class="" href="#">Unidade Intervenção</a></li>
                            <li><a class="" href="#">Controlo de Periodos</a></li> 
                            <li><a class="" href="#">Recuperar</a></li>
                            <li><a class="" href="#">Restaurar</a></li>
                        </ul>
                    </li>
                <?php } ?>
                    
                <?php if ($Result['Cod_Menu'] == '12' && $Result['Visivel'] == 'Sim') { ?>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-cogs"></i>
                            <span>Administração</span>
                            <span class="arrow"></span>
                        </a>

                        <ul class="sub">
                            <li><a class="" href="Utilizador_Cadastro.php">Contas de Utilizadores</a></li>
                            <li><a class="" href="Utilizador_Listagem.php">Atribuir Permissões</a></li>
<!--                            <li><a class="" href="#">Recuperar</a></li>
                            <li><a class="" href="#">Restaurar</a></li>-->
                        </ul>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>