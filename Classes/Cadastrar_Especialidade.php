<?php
include_once './Conexao.php';
include_once './Gravar_Especialidade.php';
session_start();
$user = $_SESSION['cod'];
$Especialidade= new Gravar_Especialidade();
$pdo = conexao::Chamar_conexao();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador=$user");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);
$Dir = $Linha['Cod_Dir'];
$Repart=$Linha['Cod_Repart'];
$Sanitaria=$Linha['Unidade_Sant'];

try {
    $Especialidade->setCod_Especialidade(filter_input(INPUT_POST,'Cod_Especialidade'));
    $Especialidade->setDescricao_Consulta(filter_input(INPUT_POST,'Descricao_Consulta'));
    $Especialidade->setEstado(filter_input(INPUT_POST,'Estado'));
    $Especialidade->setData_Registo(date('Y-m-d'));
    $Especialidade->setCod_Dir($Dir);
    $Especialidade->setCod_Repart($Repart);
    $Especialidade->setUnidade_Sanitaria($Sanitaria);
    $Especialidade->setCod_Utilizador($user);
   
    $Especialidade->setCod_Tipo_Consulta($Especialidade->Inserir_Especilidade(conexao::Chamar_conexao()));
    if($Especialidade->getCod_Tipo_Consulta()>0){
        echo 'sucesso';
    }
    else{
        echo 'erro';
    }
   // echo '<script type = "text/javascript">alert("Agendamento feito com sucesso");location.href="../Consulta_Agendar_listagem.php";</script>';
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
