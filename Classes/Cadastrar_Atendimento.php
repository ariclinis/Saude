<?php
include_once './Conexao.php';
include_once './Atendimento.php';
include_once './Gravar_Receita.php';
include_once './Gravar_Pedido.php';
session_start();

$user = $_SESSION['cod'];
$Gravar_Receita_Medica= new Gravar_Receita_Medica();
$Gravar_pedido= new Gravar_pedido();

$pdo = conexao::Chamar_conexao();
$Pegar_utilizador = $pdo->prepare("SELECT * From tbl_utilizador where cod_utilizador='$user'");
$Pegar_utilizador->execute();
$Linha = $Pegar_utilizador->fetch(PDO::FETCH_ASSOC);
$unidade_sanitaria=$Linha['Unidade_Sant'];
$Unida_Interv=$Linha['Cod_Unid_Interv'];
$Atendimento = new atendimento();
try {
    //$pessoa->setNome(filter_input(INPUT_POST, 'Nome'));

    //Dados do atendimento 

    $Atendimento->setCod_paciente(filter_input(INPUT_POST, 'Cod_paciente'));
    $paciente_co=filter_input(INPUT_POST, 'Cod_paciente');
    
    $Atendimento->setCod_Diag(filter_input(INPUT_POST, 'Cod_Diag'));
    $Atendimento->setIndicacoes(filter_input(INPUT_POST, 'Indicacoes'));
    $Atendimento->setDose(filter_input(INPUT_POST, 'Dose'));
    $Atendimento->setN_dias(filter_input(INPUT_POST, 'N_dias'));
    $Atendimento->setObs(filter_input(INPUT_POST, 'obs'));
    $Atendimento->setQuantidade(filter_input(INPUT_POST, 'Quantidade'));
    $Atendimento->setCod_Analise(filter_input(INPUT_POST, 'Cod_Analise'));
    $Atendimento->setResultado_Analise(filter_input(INPUT_POST, 'Resultado'));
    $Atendimento->setgenero(filter_input(INPUT_POST, 'genero'));
    $Atendimento->setHora_Fim_Atend(date("H:m:s"));
    $Atendimento->setHora_Inicio_Atend("11:11:11");
    $Atendimento->setData_Atend(date("Y-m-d"));
    $Atendimento->setCod_utilizador($user);
    $Atendimento->setIdade(filter_input(INPUT_POST,'idade'));
    $Atendimento->setCod_Pat(filter_input(INPUT_POST,'Cod_Pat'));
    $Atendimento->setUnidade_Sant($unidade_sanitaria);
    $Atendimento->setUnidade_Interv($Unida_Interv);
    $Atendimento->setCod_consulta(filter_input(INPUT_POST, 'cod_consulta'));
    //Dados da receita ou pedido 
    if(filter_input(INPUT_POST,'tipo_receita')!=""){
    $Gravar_Receita_Medica->setTipo(filter_input(INPUT_POST,'tipo_receita'));
    $Gravar_Receita_Medica->setInstrucoes(filter_input(INPUT_POST,'Indicacoes_receita'));
    $Gravar_Receita_Medica->setCod_utilizador($user);
    $Gravar_Receita_Medica->setCod_consulta($Atendimento->atender(conexao::Chamar_conexao()));
    $Gravar_Receita_Medica->setCod_receita($Gravar_Receita_Medica->Inserir_Receita(conexao::Chamar_conexao()));
    $Atendimento->actualizar_receita(conexao::Chamar_conexao());
    if($Gravar_Receita_Medica->getCod_receita()>0){
        echo 'sucesso';
    }
    else{
        echo 'erro';
    }

    }
    if(filter_input(INPUT_POST,'tipo_pedido')!=""){
        $Gravar_pedido->setTipo(filter_input(INPUT_POST,'tipo_pedido'));
        $Gravar_pedido->setInstrucoes(filter_input(INPUT_POST,'Indicacoes_pedido'));
        $Gravar_pedido->setCod_utilizador($user);
        
        $Gravar_pedido->setCod_consulta($Atendimento->atender(conexao::Chamar_conexao()));
        $Gravar_pedido->setCod_pedido($Gravar_pedido->Inserir_pedido(conexao::Chamar_conexao()));
        $Atendimento->actualizar_pedido(conexao::Chamar_conexao());
//        $cod_p=$Atendimento->setCod_paciente(filter_input(INPUT_POST,'Cod_paciente'));
        $Actualizar_Estado=$pdo->prepare("UPDATE meus_pacientes_v  set Estado_Fila='Emitido Pedido' where cod_paciente='$paciente_co'");
       
        if($Gravar_pedido->getCod_pedido()>0){
        echo 'sucessop';
        
       }
        else{
        echo 'erro';
        }
    }
   

    

} catch (Exception $exc) {
    echo error_log($exc);
}


  
   // echo '<script type = "text/javascript">alert("Agendamento feito com sucesso");location.href="../Consulta_Agendar_listagem.php";</script>';
