<?php

class Gravar_Especialidade {
    private $pegar_dados="INSERT INTO tbl_especialidade (Cod_Especialidade, Descricao_Consulta, Data_Registo, Estado, Cod_Dir, Cod_Repart, Unidade_Sanitaria, Cod_Utilizador)VALUES(?,?,?,?,?,?,?,?)";
    private $Cod_Tipo_Consulta;
    private $Cod_Especialidade;
    private $Descricao_Consulta;
    private $Data_Registo;
    private $Estado;
    private $Cod_Dir;
    private $Cod_Repart;
    private $Unidade_Sanitaria;
    private $Cod_Utilizador;
    
    
    public function getCod_Tipo_Consulta() {
        return $this->Cod_Tipo_Consulta;
    }

    public function setCod_Tipo_Consulta($Cod_Tipo_Consulta) {
        $this->Cod_Tipo_Consulta = $Cod_Tipo_Consulta;
        return $this;
    }

        public function getCod_Especialidade() {
        return $this->Cod_Especialidade;
    }

    public function getDescricao_Consulta() {
        return $this->Descricao_Consulta;
    }

    public function getData_Registo() {
        return $this->Data_Registo;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function getCod_Dir() {
        return $this->Cod_Dir;
    }

    public function getUnidade_Sanitaria() {
        return $this->Unidade_Sanitaria;
    }

    public function getCod_Utilizador() {
        return $this->Cod_Utilizador;
    }

    public function setCod_Especialidade($Cod_Especialidade) {
        $this->Cod_Especialidade = $Cod_Especialidade;
        return $this;
    }

    public function setDescricao_Consulta($Descricao_Consulta) {
        $this->Descricao_Consulta = $Descricao_Consulta;
        return $this;
    }

    public function setData_Registo($Data_Registo) {
        $this->Data_Registo = $Data_Registo;
        return $this;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
        return $this;
    }

    public function setCod_Dir($Cod_Dir) {
        $this->Cod_Dir = $Cod_Dir;
        return $this;
    }

    public function setUnidade_Sanitaria($Unidade_Sanitaria) {
        $this->Unidade_Sanitaria = $Unidade_Sanitaria;
        return $this;
    }

    public function setCod_Utilizador($Cod_Utilizador) {
        $this->Cod_Utilizador = $Cod_Utilizador;
        return $this;
    }
    public function getCod_Repart() {
        return $this->Cod_Repart;
    }

    public function setCod_Repart($Cod_Repart) {
        $this->Cod_Repart = $Cod_Repart;
        return $this;
    }

        	

        public function Inserir_Especilidade(PDO $con){
        $strm=$con->prepare($this->pegar_dados);
        $strm->execute(array(
        $this->getCod_Especialidade(),
        $this->getDescricao_Consulta(),
        $this->getData_Registo(),
        $this->getEstado(),
        $this->getCod_Dir(),
        $this->getCod_Repart(),
        $this->getUnidade_Sanitaria(),
        $this->getCod_Utilizador()
        ));
        return $con->lastInsertId();
    }
    //put your code here
}
