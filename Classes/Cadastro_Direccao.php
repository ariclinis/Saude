<?php
include_once './Conexao.php';
include_once './Direcao.php';
 
$Direccao_Saude = new Direccao_Saude();

try {
    $Direccao_Saude->setDis_Dir(filter_input(INPUT_POST, 'Dis_Dir'));
    $Direccao_Saude->setData_Registo(filter_input(INPUT_POST, 'Data_Registo'));
    // Aqui no Utilizador será pego pe Sessã( ao logar ), pegara o ID o utilizador
    $Direccao_Saude->setCod_Utilizador(1);
    $Direccao_Saude->setProvincia(filter_input(INPUT_POST, 'Provincia'));
    $Direccao_Saude->setMunicipio(filter_input(INPUT_POST, 'Municipio'));
	
    $Direccao_Saude->inserir_Dir(conexao::Chamar_conexao());
	?>
<script type = "text/javascript">window.alert("Direcção de Saúde cadastrado com sucesso!");
window.location.href = "../Direccao_Saude.php";</script>
    <?php
} catch (Exception $exc) {
  
//    <script type="text/javascript">alert("Ocorreu um erro ao Inserir");
//            location.href = "../Funcionario_Cadastro.php";</script>
    
    echo error_log($exc);
}