<?php

include_once './Conexao.php';
include_once './Marcar_Ferias.php';
session_start();
$user = $_SESSION['cod'];
$Ferias = new Marcar_Ferias();
$pdo = conexao::Chamar_conexao();

try {
    
    $Ferias->setNome_Funcionario(filter_input(INPUT_POST, 'Nome'));
    $Ferias->setN_Interno(filter_input(INPUT_POST, 'N_Interno'));
    //Calcular dias a Gozar
    $Ferias->setData_Inicio(filter_input(INPUT_POST, 'data_inicial'));
    $data_inicial=filter_input(INPUT_POST,'data_inicial');
    
    $Ferias->setData_Fim(filter_input(INPUT_POST, 'data_final'));
    $data_final=filter_input(INPUT_POST,'data_final');
    //Calculo da diferença
    
   
    $diferenca = strtotime($data_final) - strtotime($data_inicial);
    $dias = floor($diferenca / (60 * 60 * 24));
    if($dias<=22){
         $Ferias->setDias_Gozar($dias);
    }
   $Dias_falta=22-$dias;
   $Ferias->setPor_Marcar($Dias_falta);
   
    $Ferias->setEstado_Ferias("Feria Marcada");
    $Ferias->setCod_Periodo(filter_input(INPUT_POST, 'periodo'));
    $Ferias->setCod_Utilizador($user);
    
    $Ferias->setData_registo(date('d-m-Y'));
    $Ferias->setUnidade_sant_Trabalho(filter_input(INPUT_POST, 'Centro_Custo'));
    $Ferias->Inserir_Ferias(conexao::Chamar_conexao());
    echo '<script type = "text/javascript">alert("Féria Marcada com Sucesso");location.href="../Plano_Ferias.php";</script>';
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
