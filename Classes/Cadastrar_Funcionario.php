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
    $pessoa->setData_registo(date('Y-m-d'));
    $pessoa->setEstado_civil(filter_input(INPUT_POST, 'ecivil'));
    $pessoa->setCod_provincia_nasc(filter_input(INPUT_POST, 'provnasc'));
    $pessoa->setCod_municipio_nasc(filter_input(INPUT_POST, 'muninasc'));

    $pessoa->setCod_Bairro(filter_input(INPUT_POST, 'morada'));
    $pessoa->setProvincia_localidade(filter_input(INPUT_POST, 'provloca'));
    $pessoa->setMunicipio_Localidade(filter_input(INPUT_POST, 'muniloca'));
    $pessoa->setCod_Dir($Dir);
    $pessoa->setCod_Repart($Repart);
    $pessoa->setCod_Sanitaria($Sanitaria);

    $Funcionario->setEstado('Activo');
    $Funcionario->setData_Registo(date('Y-m-d, h:m:s'));
    $Funcionario->setSitua_Contrato(filter_input(INPUT_POST, 'contrato'));
    $Funcionario->setNivel_Escolar(filter_input(INPUT_POST, 'escolaridade'));
    $Funcionario->setCargos_Funcao(filter_input(INPUT_POST, 'cargo'));
    
//    $dir=filter_input(INPUT_POST, 'direcaop');
//    $rep=filter_input(INPUT_POST, 'reparticaotrabalho');
//    $uni_san=filter_input(INPUT_POST, 'unisan');
    
    $uni_interv=filter_input(INPUT_POST, 'unidinterv');
    $Funcionario->setCod_Dir($Dir);
    $Funcionario->setCod_Repart($Repart);
    $Funcionario->setCod_uni_san($Sanitaria);
    $Funcionario->setCod_uni_interv($uni_interv);
    $Funcionario->setCod_Utilizador($user);
    $Funcionario->setCod_Categoria(filter_input(INPUT_POST, 'categoria'));
    $cod_cat=filter_input(INPUT_POST, 'categoria');
    
    
    $Funcionario->setN_Interno(filter_input(INPUT_POST, 'nip'));
    
    //// Contacto 
    $contacto->setEmail(filter_input(INPUT_POST, 'email'));
    $contacto->setFax(' ');
    $contacto->setTelefone(filter_input(INPUT_POST, 'phone'));


    $pessoa->setCod_Contacto($contacto->inserir_contacto(conexao::Chamar_conexao()));
    /////////////////////////////
    $cod_pessoa=$pessoa->inserir_pessoa(conexao::Chamar_conexao());
    $Funcionario->setCod_pessoa($cod_pessoa);
    
    $Cod_funci=$Funcionario->inserir_Funcionario(conexao::Chamar_conexao());
    //Validação para ver se o funcionario é Medico para criar uma conta de utilizador automatica
    if($cod_cat==2){
    $Cadastro_utilizador = $pdo->prepare("INSERT INTO tbl_utilizador(estado, data_registo, Nome_User, Nome_Login, Senha, Perfil_Acesso, Cod_Dir, Cod_Repart, Unidade_Sant, Cod_Unid_Interv, Cod_funci) VALUES ('activo','19/02/2017','$nome','$nome','Hospital','utilizador','$dir','$rep','$uni_san','$uni_interv','$Cod_funci')");
    $Cadastro_utilizador->execute();
    }
   echo "sucesso";

   // echo '<script type = "text/javascript">alert("Funcionario Cadastrado com sucesso");location.href="../Funcionario_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}



