<?php
include_once './Conexao.php';
session_start();

$pdo = conexao::Chamar_conexao();




try {
  
    $user = filter_input(INPUT_POST, 'u');
$visivel="Sim";
$activo = $_POST['activo'];
$count = count($activo);
for ($i=0;$i<$count;$i++){
    $p=$activo[$i];
     $permissao= $pdo->prepare("INSERT INTO tbl_acesso_menu(Cod_Utilizador, Cod_Menu, Visivel) VALUES (?,?,?)");
       $permissao->execute(array(
        $user,
        $p,
        $visivel
        ));
}

    echo 'sucesso';
} catch (Exception $exc) {
 echo $exc->getTraceAsString();
}
