<?php

class Marcar_Ferias {
    private $pegar_dados_ferias="INSERT INTO tbl_ferias(Nome_Funcionario,N_Interno,Data_Inicio,Data_Fim,Dias_Gozar,Cod_Periodo,Estado_Ferias,Cod_Utilizador,Data_registo,unidade_sant_Trabalho,Por_Marcar)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    private $Nome_Funcionario;
    private $N_Interno;
    private $Data_Inicio;
    private $Data_Fim;
    private $Dias_Gozar;
    private $Cod_Periodo;
    Private $Estado_Ferias;
    private $Cod_Utilizador;
    private $Data_registo;
    private $unidade_sant_Trabalho;
    private $Por_Marcar;
    
    
    public function getNome_Funcionario() {
        return $this->Nome_Funcionario;
    }

    public function getN_Interno() {
        return $this->N_Interno;
    }
//
    public function getData_Inicio() {
        return $this->Data_Inicio;
    }
//
    public function getData_Fim() {
        return $this->Data_Fim;
    }
//

    public function getDias_Gozar() {
        return $this->Dias_Gozar;
    }

    public function setNome_Funcionario($Nome_Funcionario) {
        $this->Nome_Funcionario = $Nome_Funcionario;
        return $this;
    }

    public function setN_Interno($N_Interno) {
        $this->N_Interno = $N_Interno;
        return $this;
    }
//
    public function setData_Inicio($Data_Inicio) {
        $this->Data_Inicio = $Data_Inicio;
        return $this;
    }
//
    public function setData_Fim($Data_Fim) {
        $this->Data_Fim = $Data_Fim;
        return $this;
    }

    public function getEstado_Ferias() {
        return $this->Estado_Ferias;
    }

    public function setEstado_Ferias($Estado_Ferias) {
        $this->Estado_Ferias = $Estado_Ferias;
        return $this;
    }


    public function setDias_Gozar($Dias_Gozar) {
        $this->Dias_Gozar = $Dias_Gozar;
        return $this;
    }
    public function getCod_Periodo() {
        return $this->Cod_Periodo;
    }

    public function setCod_Periodo($Cod_Periodo) {
        $this->Cod_Periodo = $Cod_Periodo;
        return $this;
    }
    public function getCod_Utilizador() {
        return $this->Cod_Utilizador;
    }

    public function getData_registo() {
        return $this->Data_registo;
    }

    public function setCod_Utilizador($Cod_Utilizador) {
        $this->Cod_Utilizador = $Cod_Utilizador;
        return $this;
    }

    public function setData_registo($Data_registo) {
        $this->Data_registo = $Data_registo;
        return $this;
    }
    public function getUnidade_sant_Trabalho() {
        return $this->unidade_sant_Trabalho;
    }

    public function setUnidade_sant_Trabalho($unidade_sant_Trabalho) {
        $this->unidade_sant_Trabalho = $unidade_sant_Trabalho;
        return $this;
    }

    public function getPor_Marcar() {
        return $this->Por_Marcar;
    }

    public function setPor_Marcar($Por_Marcar) {
        $this->Por_Marcar = $Por_Marcar;
        return $this;
    }

    
    public function Inserir_Ferias(PDO $con){
        $strm=$con->prepare($this->pegar_dados_ferias);
        $strm->execute(array(
        $this->getNome_Funcionario(),
        $this->getN_Interno(),
        $this->getData_Inicio(),
        $this->getData_Fim(),
        $this->getDias_Gozar(),
        $this->getCod_Periodo(),
        $this->getEstado_Ferias(),
        $this->getCod_Utilizador(),
        $this->getData_registo(),
        $this->getUnidade_sant_Trabalho(),
        $this->getPor_Marcar()
            
        ));
    }
    //put your code here
}
