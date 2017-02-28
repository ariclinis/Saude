<?php
include_once './Conexao.php';
include_once './Utilizador.php';

$Utilizador= new Utilizador();

try {

    $Utilizador->setEstado(filter_input(INPUT_POST, 'estado'));
    $Utilizador->setData_registo(date('Y-m-d'));
    $Utilizador->setNome_User(filter_input(INPUT_POST, 'nome_user'));
    $Utilizador->setNome_Login(filter_input(INPUT_POST, 'nome_login'));
    $Utilizador->setSenha(filter_input(INPUT_POST, 'senha'));
    $Utilizador->setPerfil_Acesso(filter_input(INPUT_POST, 'acesso'));
    $Utilizador->setCod_Dir(filter_input(INPUT_POST, 'cod_dir'));
    $Utilizador->setCod_Repart(filter_input(INPUT_POST, 'cod_repart'));
    $Utilizador->setUnidade_Sant(filter_input(INPUT_POST, 'cod_unid_san'));
    $Utilizador->setCod_Unid_Interv(filter_input(INPUT_POST, 'cod_unid_interv'));
    $cod_usu=$Utilizador->Inserir_usu(conexao::Chamar_conexao());
//  <script type = "text/javascript">alert("Inserido com sucesso");
//location.href = "../Funcionario_Cadastro.php";</script>
  if($cod_usu>0){
    echo 'sucesso';
  }
  else{
    echo 'erro';
  }
    
} catch (Exception $exc) {
  
//    <script type="text/javascript">alert("Ocorreu um erro ao Inserir");
//            location.href = "../Funcionario_Cadastro.php";</script>
    
    echo error_log($exc);
}
