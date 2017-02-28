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
    $Marcar_Consulta->setCod_Paciente(filter_input(INPUT_POST,'Cod_Paciente'));
    $Marcar_Consulta->setSitua(filter_input(INPUT_POST, 'Estado_consulta'));
    $Marcar_Consulta->setHora_Inicio(filter_input(INPUT_POST,'hora_actual'));
    $Marcar_Consulta->setCod_Funcionario(filter_input(INPUT_POST,'Cod_Funcionario'));
    $Marcar_Consulta->setData_Consult(date('Y-m-d'));
    $Marcar_Consulta->setData_Registo(date('Y-m-d'));
    $Marcar_Consulta->setEstado_Consulta('Agendado');
    $Marcar_Consulta->setCod_utilizador($inicio);
    $Marcar_Consulta->setCod_Un_San($Sanitaria);
    $Marcar_Consulta->setCod_Dir($Dir);
    $Marcar_Consulta->setCod_Repart($Repart);
    $Marcar_Consulta->setCod_Unid_Interv($Unidade_Inter);
    $Marcar_Consulta->setTipo_Consulta(filter_input(INPUT_POST,'Tipo_Consulta'));
    $Marcar_Consulta->inserir_consulta(conexao::Chamar_conexao());
    echo '<script type = "text/javascript">
alert("Consulta Marcada com sucesso");
location.href="../Consulta_Listagem.php";
</script>';
     
} catch (Exception $exc) {
    echo error_log($exc);
}



