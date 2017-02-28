<?php

include_once './Conexao.php';
include_once './Pessoa.php';
include_once './Funcionario.php';
include_once './Contacto.php';

session_start();
$user = $_SESSION['cod'];

$pessoa = new Pessoa();
$Funcionario = new Funcionario();
$contacto = new Contacto();

$pdo = conexao::Chamar_conexao();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador=$user");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);


$Dir = $Linha['Cod_Dir'];
$Repart = $Linha['Cod_Repart'];
$Sanitaria = $Linha['Unidade_Sant'];
try {
    $Funcionario->setCod_funcionario(filter_input(INPUT_POST, 'Cod_funcionario'));
    $pessoa->setCod_pessoa(filter_input(INPUT_POST, 'cod_pessoa'));
    $contacto->setCod_Contacto(filter_input(INPUT_POST, 'cod_contactos'));
    $nome=filter_input(INPUT_POST, 'nome');
    $pessoa->setNome($nome);
    $pessoa->setNome_pai(filter_input(INPUT_POST, 'nomepai'));
    $pessoa->setNome_mae(filter_input(INPUT_POST, 'nomemae'));
    $pessoa->setN_bi(filter_input(INPUT_POST, 'bi'));
    $pessoa->setData_nasc(filter_input(INPUT_POST, 'datanasc'));
    
    $ano = filter_input(INPUT_POST, 'datanasc');
    $idade=(2017 - substr("$ano", 0, 4));
    $pessoa->setIdade($idade);
    
    $pessoa->setGenero(filter_input(INPUT_POST, 'genero'));
    $pessoa->setAltura(filter_input(INPUT_POST, 'altura'));
    $pessoa->setNacionalidade(filter_input(INPUT_POST, 'nacio'));
    $pessoa->setEstado_civil(filter_input(INPUT_POST, 'ecivil'));
    $pessoa->setCod_provincia_nasc(filter_input(INPUT_POST, 'provnasc'));
    $pessoa->setCod_municipio_nasc(filter_input(INPUT_POST, 'muninasc'));

    $pessoa->setCod_Bairro(filter_input(INPUT_POST, 'morada'));
    $pessoa->setProvincia_localidade(filter_input(INPUT_POST, 'provloca'));
    $pessoa->setMunicipio_Localidade(filter_input(INPUT_POST, 'muniloca'));
    $Funcionario->setEstado(filter_input(INPUT_POST, 'estado_f'));
    $Funcionario->setSitua_Contrato(filter_input(INPUT_POST, 'contrato'));
    $Funcionario->setNivel_Escolar(filter_input(INPUT_POST, 'escolaridade'));
    $Funcionario->setCargos_Funcao(filter_input(INPUT_POST, 'cargo'));
    
//    $dir=filter_input(INPUT_POST, 'direcaop');
//    $rep=filter_input(INPUT_POST, 'reparticaotrabalho');
//    $uni_san=filter_input(INPUT_POST, 'unisan');
    
    $uni_interv=filter_input(INPUT_POST, 'unidinterv');
    $Funcionario->setCod_Categoria(filter_input(INPUT_POST, 'categoria'));
    
    
    $Funcionario->setN_Interno(filter_input(INPUT_POST, 'nip'));
    
    //// Contacto 
    $contacto->setEmail(filter_input(INPUT_POST, 'email'));
    $contacto->setFax(' ');
    $contacto->setTelefone(filter_input(INPUT_POST, 'phone'));
   
    $contacto->Actualizar_Contacto(conexao::Chamar_conexao());
    /////////////////////////////
    $cod_pessoa=$pessoa->Actualizar_Pessoa(conexao::Chamar_conexao());
    $Funcionario->Actualizar_Funcionario(conexao::Chamar_conexao());
    //Validação para ver se o funcionario é Medico para criar uma conta de utilizador automatica
    echo "sucesso";
   // echo '<script type = "text/javascript">alert("Funcionario Cadastrado com sucesso");location.href="../Funcionario_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}



