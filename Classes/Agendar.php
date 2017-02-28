<?php

class Agendar {
    private $pegar_agenda="INSERT INTO agendar_consulta (Data_Agenda, Hora_Inicio, Hora_Fim, cod_funcionario, cod_utilizador, cod_tipo_consulta, Cod_Dir, Cod_Repart, Unidade_Sant, Cod_Unid_Interv, data_registo)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    private $cod_agenda;
    private $Data_agenda;
    private $hora_inicio;
    private $hora_fim;
    private $cod_funcionario;
    private $cod_utilizador;
    private $cod_tipo_consulta;
    private $Cod_Dir;
    private $Cod_Repart;
    private $Unidade_Sant;
    private $Cod_Unid_Interv;
    private $data_registo;
          
     
    public function getCod_agenda() {
        return $this->cod_agenda;
    }

    public function getData_agenda() {
        return $this->Data_agenda;
    }

    public function getHora_inicio() {
        return $this->hora_inicio;
    }

    public function getHora_fim() {
        return $this->hora_fim;
    }

    public function getCod_funcionario() {
        return $this->cod_funcionario;
    }

    public function getCod_utilizador() {
        return $this->cod_utilizador;
    }


    public function getCod_tipo_consulta() {
        return $this->cod_tipo_consulta;
    }

    public function setCod_agenda($cod_agenda) {
        $this->cod_agenda = $cod_agenda;
        return $this;
    }

    public function setData_agenda($Data_agenda) {
        $this->Data_agenda = $Data_agenda;
        return $this;
    }

    public function setHora_inicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
        return $this;
    }

    public function setHora_fim($hora_fim) {
        $this->hora_fim = $hora_fim;
        return $this;
    }

    public function setCod_funcionario($cod_funcionario) {
        $this->cod_funcionario = $cod_funcionario;
        return $this;
    }

    public function setCod_utilizador($cod_utilizador) {
        $this->cod_utilizador = $cod_utilizador;
        return $this;
    }


    public function setCod_tipo_consulta($cod_tipo_consulta) {
        $this->cod_tipo_consulta = $cod_tipo_consulta;
        return $this;
    }
    public function getCod_Dir() {
        return $this->Cod_Dir;
    }

    public function getCod_Repart() {
        return $this->Cod_Repart;
    }

    public function getUnidade_Sant() {
        return $this->Unidade_Sant;
    }

    public function getCod_Unid_Interv() {
        return $this->Cod_Unid_Interv;
    }

    public function setCod_Dir($Cod_Dir) {
        $this->Cod_Dir = $Cod_Dir;
        return $this;
    }

    public function setCod_Repart($Cod_Repart) {
        $this->Cod_Repart = $Cod_Repart;
        return $this;
    }

    public function setUnidade_Sant($Unidade_Sant) {
        $this->Unidade_Sant = $Unidade_Sant;
        return $this;
    }

    public function setCod_Unid_Interv($Cod_Unid_Interv) {
        $this->Cod_Unid_Interv = $Cod_Unid_Interv;
        return $this;
    }
    
    public function getData_registo() {
        return $this->data_registo;
    }

    public function setData_registo($data_registo) {
        $this->data_registo = $data_registo;
        return $this;
    }

            public function Inserir_agenda(PDO $con){
        $strm=$con->prepare($this->pegar_agenda);
        $strm->execute(array(
        $this->getData_agenda(),
        $this->getHora_inicio(),
        $this->getHora_fim(),
        $this->getCod_funcionario(),
        $this->getCod_utilizador(),
        $this->getCod_tipo_consulta(),
        $this->getCod_Dir(),
        $this->getCod_Repart(),
        $this->getUnidade_Sant(),
        $this->getCod_Unid_Interv(),
        $this->getData_registo()
        ));
        return $con->lastInsertId();
    }
    //put your code here
}
