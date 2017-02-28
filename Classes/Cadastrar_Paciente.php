<?php

include_once './Conexao.php';
include_once './Pessoa.php';
include_once './Paciente.php';
include_once './Contacto.php';
session_start();

$user = $_SESSION['cod'];
$pessoa = new Pessoa();
$paciente = new Paciente();
$contacto = new Contacto();

$pdo = conexao::Chamar_conexao();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador=$user");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);
$Dir = $Linha['Cod_Dir'];
$Repart=$Linha['Cod_Repart'];
$Sanitaria=$Linha['Unidade_Sant'];
try {
    
    $pessoa->setNome(filter_input(INPUT_POST, 'nome'));
    $pessoa->setNome_pai(filter_input(INPUT_POST, 'nomepai'));
    $pessoa->setNome_mae(filter_input(INPUT_POST, 'nomemae'));
    $pessoa->setN_bi(filter_input(INPUT_POST, 'bi'));
    $pessoa->setData_nasc(filter_input(INPUT_POST, 'datanasc'));
    $ano = filter_input(INPUT_POST, 'datanasc');
    $pessoa->setIdade(2017 - substr("$ano", 0, 4));
    $pessoa->setGenero(filter_input(INPUT_POST, 'genero'));
    $pessoa->setAltura(' ');
    $pessoa->setNacionalidade(filter_input(INPUT_POST, 'nacio'));
    $pessoa->setData_registo(date('Y-m-d'));
    $pessoa->setEstado_civil(' ');
    $pessoa->setCod_provincia_nasc(' ');
    $pessoa->setCod_municipio_nasc(' ');
    $pessoa->setCod_Dir($Dir);
    $pessoa->setCod_Repart($Repart);
    $pessoa->setCod_Sanitaria($Sanitaria);
    //// Contacto 
    $contacto->setEmail(' ');
    $contacto->setFax(' ');
    $contacto->setTelefone(filter_input(INPUT_POST, 'phone'));


    /////////////////////////////
    $pessoa->setCod_Bairro(filter_input(INPUT_POST, 'morada'));
    $pessoa->setProvincia_localidade(filter_input(INPUT_POST,'provloca'));
    $pessoa->setMunicipio_Localidade(filter_input(INPUT_POST,'muniloca'));

    $paciente->setEstado(filter_input(INPUT_POST, 'estado'));
    $paciente->setObs(filter_input(INPUT_POST, 'obs'));
    $paciente->setTipo_Saguino(filter_input(INPUT_POST, 'tiposaguino'));
    $paciente->setCod_utilizador($user);


    
    $pessoa->setCod_Contacto($contacto->inserir_contacto(conexao::Chamar_conexao()));
    $paciente->setCod_pessoa($pessoa->inserir_pessoa(conexao::Chamar_conexao()));
    $paciente->setCod_paciente($paciente->inserir_Paciente(conexao::Chamar_conexao()));
    if($paciente->getCod_paciente()>0){
        echo 'sucesso';
    }
    
    //echo '<script type = "text/javascript">alert("Paciente inserido com sucesso");location.href="../Paciente_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}



