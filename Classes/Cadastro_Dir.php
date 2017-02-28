<?php
include_once './Conexao.php';
include_once './Utilizador.php';

$Direccao_Saude=new Direccao_Saude();
$Utilizador= new Utilizador();

try {
    $Direccao_Saude->setDisc_Dir(filter_input(INPUT_POST, 'Disc_Dir'));
    $Direccao_Saude->setData_Registo(filter_input(INPUT_POST, 'Data_Registo'));
    $Direccao_Saude->setCod_Utilizador(filter_input(INPUT_POST, 'Cod_Utilizador'));
    $Direccao_Saude->setProvincia(filter_input(INPUT_POST, 'Provincia'));
    $Direccao_Saude->setMunicipio(filter_input(INPUT_POST, 'Municipio'));
	
    $Utilizador->inserir_Utilizador(conexao::Chamar_conexao());
//  <script type = "text/javascript">alert("Inserido com sucesso");
//location.href = "../Funcionario_Cadastro.php";</script>
    header("location: ../Direccao_Saude.php");
    
} catch (Exception $exc) {
  
//    <script type="text/javascript">alert("Ocorreu um erro ao Inserir");
//            location.href = "../Funcionario_Cadastro.php";</script>
    
    echo error_log($exc);
}