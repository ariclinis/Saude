<?php
include_once './Conexao.php';
include_once './Agendar.php';
session_start();
$user = $_SESSION['cod'];
$doctor_angenda= new Agendar();
$pdo = conexao::Chamar_conexao();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador=$user");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);
$Dir = $Linha['Cod_Dir'];
$Repart=$Linha['Cod_Repart'];
$Sanitaria=$Linha['Unidade_Sant'];
$Unidade_Inter=$Linha['Cod_Unid_Interv'];

try {
    $doctor_angenda->setData_agenda(date('Y-m-d'));
    $doctor_angenda->setHora_fim(date('H:m:s'));
    $doctor_angenda->setHora_inicio(date('H:m:s'));
    $doctor_angenda->setCod_utilizador($user);
    $doctor_angenda->setCod_tipo_consulta(filter_input(INPUT_POST,'tipo_consulta'));
    $doctor_angenda->setCod_funcionario(filter_input(INPUT_POST,'cod_funcionario'));
    $doctor_angenda->setCod_Dir($Dir);
    $doctor_angenda->setCod_Repart($Repart);
    $doctor_angenda->setUnidade_Sant($Sanitaria);
    $doctor_angenda->setCod_Unid_Interv($Unidade_Inter);
    $doctor_angenda->setData_registo(date('Y-m-d'));
    $doctor_angenda->setCod_agenda($doctor_angenda->Inserir_agenda(conexao::Chamar_conexao()));
    if($doctor_angenda->getCod_agenda()>0){
        echo 'sucesso';
    }
    else{
        echo 'erro';
    }
   // echo '<script type = "text/javascript">alert("Agendamento feito com sucesso");location.href="../Consulta_Agendar_listagem.php";</script>';
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
