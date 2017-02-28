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
    $pessoa->setCod_pessoa(filter_input(INPUT_POST, 'cod_pessoa'));
    $pessoa->setNome(filter_input(INPUT_POST, 'nome'));
    $pessoa->setNome_pai(filter_input(INPUT_POST, 'nomepai'));
    $pessoa->setNome_mae(filter_input(INPUT_POST, 'nomemae'));
    $pessoa->setN_bi(filter_input(INPUT_POST, 'bi'));
    $pessoa->setData_nasc(filter_input(INPUT_POST, 'datanasc'));
    $ano = filter_input(INPUT_POST, 'datanasc');
    $pessoa->setIdade(2016 - substr("$ano", 0, 4));
    $pessoa->setGenero(filter_input(INPUT_POST, 'genero'));
    $pessoa->setAltura(' ');
    $pessoa->setNacionalidade(filter_input(INPUT_POST, 'nacionalidade'));
    $pessoa->setData_registo(date('Y-m-d'));
    $pessoa->setEstado_civil(filter_input(INPUT_POST, 'estado_civil'));
    //// Contacto 
    $contacto->setCod_Contacto(filter_input(INPUT_POST, 'cod_contactos'));
    $contacto->setEmail(filter_input(INPUT_POST, 'email'));
    $contacto->setFax(filter_input(INPUT_POST, 'fax'));
    $contacto->setTelefone(filter_input(INPUT_POST, 'telefone'));


    /////////////////////////////
    $pessoa->setCod_Bairro(filter_input(INPUT_POST, 'bairro'));
    $pessoa->setProvincia_localidade(filter_input(INPUT_POST,'provincia_localidade'));
    $pessoa->setMunicipio_Localidade(filter_input(INPUT_POST,'municipio_localidade'));

    $paciente->setCod_paciente(filter_input(INPUT_POST, 'cod_paciente'));
    $paciente->setEstado(filter_input(INPUT_POST, 'estado'));
    $paciente->setObs(filter_input(INPUT_POST, 'obs'));
    $paciente->setTipo_Saguino(filter_input(INPUT_POST, 'tiposaguino'));
    
    $pessoa->Actualizar_Pessoa(conexao::Chamar_conexao());
    $contacto->Actualizar_Contacto(conexao::Chamar_conexao());
    $paciente->Actualizar_Pacinte(conexao::Chamar_conexao());
    
    echo 'sucesso';
    
    
    //echo '<script type = "text/javascript">alert("Paciente inserido com sucesso");location.href="../Paciente_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}



