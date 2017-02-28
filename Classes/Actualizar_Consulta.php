<?php

session_start();
include_once './Conexao.php';
include_once './Marcar_Consulta.php';
$inicio=$_SESSION['cod'];

$pdo = conexao::Chamar_conexao();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador=$inicio");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);
$Dir = $Linha['Cod_Dir'];
$Repart=$Linha['Cod_Repart'];
$Sanitaria=$Linha['Unidade_Sant'];
$Unidade_Inter=$Linha['Cod_Unid_Interv'];

$Marcar_Consulta = new Marcar_Consulta();
try {

    
    $Marcar_Consulta->setCod_Consulta(filter_input(INPUT_POST,'Cod_Consulta'));
    $Marcar_Consulta->setCod_Paciente(filter_input(INPUT_POST,'Cod_Paciente'));
    $Marcar_Consulta->setSitua(filter_input(INPUT_POST, 'Situa'));
    $Marcar_Consulta->setHora_Inicio(date('h:i:s'));
    $Marcar_Consulta->setCod_Funcionario(filter_input(INPUT_POST,'Cod_Funcionario'));
    $Marcar_Consulta->setData_Consult(filter_input(INPUT_POST,'data_actual'));
    $Marcar_Consulta->setEstado_Consulta(filter_input(INPUT_POST, 'Estado_consulta'));
    $Marcar_Consulta->setTipo_Consulta(filter_input(INPUT_POST,'Tipo_Consulta'));
    $Marcar_Consulta->actualizar_consulta(conexao::Chamar_conexao());

        echo 'sucesso';

    
    //echo '<script type = "text/javascript">alert("Consulta Marcada com sucesso");location.href="../Consulta_Listagem.php";</script>';
     
} catch (Exception $exc) {
    echo error_log($exc);
}



