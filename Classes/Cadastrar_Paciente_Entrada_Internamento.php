<?php

include_once './Conexao.php';
include_once './Pessoa.php';
include_once './Paciente_Entrada.php';
include_once './Contacto.php';
session_start();
$user = $_SESSION['cod'];
$pessoa = new Pessoa();
$paciente_Internado = new Paciente_Entrda();
$contacto = new Contacto();


$pdo = conexao::Chamar_conexao();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador=$user");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);
$Dir = $Linha['Cod_Dir'];
$Repart=$Linha['Cod_Repart'];
$Sanitaria=$Linha['Unidade_Sant'];
try {
    
    $pessoa->setNome(filter_input(INPUT_POST, 'Nome'));
    $pessoa->setNome_pai(filter_input(INPUT_POST, 'Nome_pai'));
    $pessoa->setNome_mae(filter_input(INPUT_POST, 'Nome_mae'));
    $pessoa->setN_bi(filter_input(INPUT_POST, 'Bi'));
    $pessoa->setData_nasc(filter_input(INPUT_POST, 'Data_nasc'));
    $ano = filter_input(INPUT_POST, 'Data_nasc');
    $pessoa->setIdade(2016 - substr("$ano", 0, 4));
    $pessoa->setGenero(filter_input(INPUT_POST, 'Genero'));
    $pessoa->setNacionalidade(filter_input(INPUT_POST, 'Nacionalidade'));
    $pessoa->setData_registo(date('Y-m-d'));
    $pessoa->setEstado_civil(filter_input(INPUT_POST, 'Estado_civil'));
    $pessoa->setCod_provincia_nasc(filter_input(INPUT_POST, 'Provincia_nasc'));
    $pessoa->setCod_municipio_nasc(filter_input(INPUT_POST, 'Discricao_Municipio'));

    $pessoa->setCod_Dir($Dir);
    $pessoa->setCod_Repart($Repart);
    $pessoa->setCod_Sanitaria($Sanitaria);
    
    ///Paciente_Entrada
    $paciente_Internado->setProcess_n(filter_input(INPUT_POST,'Process_N'));
//    //$paciente_Internado->setTelefone2($telefone2);
//    $paciente_Internado->setTelefone2(filter_input(INPUNT_POST,'Telefone2'));
   
    $paciente_Internado->setFolhaN(filter_input(INPUT_POST,'Folha'));
    $paciente_Internado->setLivro_N(filter_input(INPUT_POST,'Livro_N'));
    $paciente_Internado->setPapelada_N(filter_input(INPUT_POST,'Papelada'));
    $paciente_Internado->setData_Entrada(filter_input(INPUT_POST,'Data_Entrada'));
    $paciente_Internado->setHora_Estrada(filter_input(INPUT_POST,'hora_entrada'));
    $paciente_Internado->setEnfermaria(filter_input(INPUT_POST,'Enf'));
    $paciente_Internado->setDocumento_Admi(filter_input(INPUT_POST,'doc_admi'));
    $paciente_Internado->setDeposito_Garatia(filter_input(INPUT_POST,'DG'));
    $paciente_Internado->setAbanada_Hospital(filter_input(INPUT_POST,'PAbonada'));
    $paciente_Internado->setData_Abanada(filter_input(INPUT_POST,'Data_Abana'));  
    $paciente_Internado->setCorporacao_Trabalho(filter_input(INPUT_POST,'corporacao'));
    $paciente_Internado->setProfissao(filter_input(INPUT_POST,'profissao'));
    $paciente_Internado->setGrad_Categoria(filter_input(INPUT_POST,'categoria'));
    $paciente_Internado->setEstado_Estrada(filter_input(INPUT_POST,'Estado_Entrada'));
    $paciente_Internado->setAnte_Pessoais(filter_input(INPUT_POST,'Ante_Pessoais')); 
    $paciente_Internado->setAnte_Herodiarios(filter_input(INPUT_POST,'Ante_Herodiarios'));
    $paciente_Internado->setSintomas_Actual(filter_input(INPUT_POST,'Sintomas_Actual'));
    $paciente_Internado->setPresc_Entrada(filter_input(INPUT_POST,'Presc_Entrada'));
    $paciente_Internado->setDiag_Provisorio(filter_input(INPUT_POST,'Diag_Provisorio'));
    $paciente_Internado->setBaixa_d(filter_input(INPUT_POST,'Diag_Provisorio'));
    $paciente_Internado->setMedico(filter_input(INPUT_POST,'Medico'));
    $paciente_Internado->setData_Registo(date('Y-m-d'));
    $paciente_Internado->setCod_utilizador($user);
    $paciente_Internado->setTelefone2(filter_input(INPUT_POST,'Telefone2'));
    $paciente_Internado->setCor(filter_input(INPUT_POST,'cor'));
            
            
            
   
    
     //// Contacto 
    $contacto->setFax(filter_input(INPUT_POST, 'fax'));
    $contacto->setTelefone(filter_input(INPUT_POST, 'telefone'));
    


    /////////////////////////////
    $pessoa->setCod_Bairro(filter_input(INPUT_POST, 'Bairro'));
    
    $pessoa->setProvincia_localidade(filter_input(INPUT_POST,'Provincia_Morada'));
    $pessoa->setMunicipio_Localidade(filter_input(INPUT_POST,'Municipio_Morada'));
    
    $pessoa->setCod_Contacto($contacto->inserir_contacto(conexao::Chamar_conexao()));
    $paciente_Internado->setCod_Pessoa($pessoa->inserir_pessoa(conexao::Chamar_conexao()));
    $paciente_Internado->inserir_Paciente_Entrda(conexao::Chamar_conexao());
    echo '<script type = "text/javascript">
alert("Paciente inserido com sucesso para o Internamento");
location.href="../Paciente_Listagem_Internados.php";
</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}



