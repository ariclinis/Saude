<?php
include_once './Conexao.php';
include_once './Gravar_Receita.php';

session_start();
$user = $_SESSION['cod'];
$Gravar_Receita_Medica= new Gravar_Receita_Medica();

$pdo = conexao::Chamar_conexao();

try {
    
    $Gravar_Receita_Medica->setTipo(filter_input(INPUT_POST,'tipo_receita'));
    $Gravar_Receita_Medica->setInstrucoes(filter_input(INPUT_POST,'instrucoes'));
    $Gravar_Receita_Medica->setCod_utilizador($user);
    $Gravar_Receita_Medica->setCod_consulta(filter_input(INPUT_POST, 'cod_consulta'));
	$Gravar_Receita_Medica->setCod_receita($Gravar_Receita_Medica->Inserir_Receita(conexao::Chamar_conexao()));
    if($Gravar_Receita_Medica->getCod_receita()>0){
    	echo 'sucesso';
    }
    else{
    	echo 'erro';
    }
   // echo '<script type = "text/javascript">alert("Agendamento feito com sucesso");location.href="../Consulta_Agendar_listagem.php";</script>';

} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}