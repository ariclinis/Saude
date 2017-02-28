<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author Anas Tadeu0
 */
class Marcar_Consulta {

    //put your code here
    Private $pegar_paciente_marcar = 'INSERT INTO tbl_marcar_consulta ( cod_paciente, Cod_Funcionario, Situa, Hora_Inicio, Data_Consult, Data_Registo, Estado_Consulta, tbl_utilizador_cod_utilizador, Cod_Un_San, Cod_Dir, Cod_Repart, Cod_Unid_Interv, Tipo_Consulta)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)';
private $Cod_Consulta;

private $cod_paciente;
private $Situa;
private $Hora_Inicio;
private $Data_Consult;
private $Data_Registo;
private $Estado_Consulta;
private $Cod_Funcionario;
private $Cod_utilizador;
private $Cod_Un_San;
private $Cod_Dir;   
private $Cod_Repart;
private $Cod_Unid_Interv;
private $Tipo_Consulta;

    public function getCod_Consulta(){
        return $this->Cod_Consulta;

    }

    public function setCod_Consulta($Cod_Consulta){
        $this->Cod_Consulta =$Cod_Consulta;
        return $this;
    }

    public function getCod_Funcionario() {
        return $this->Cod_Funcionario;
    }
    public function getTipo_Consulta() {
        return $this->Tipo_Consulta;
    }

    public function setTipo_Consulta($Tipo_Consulta) {
        $this->Tipo_Consulta = $Tipo_Consulta;
        return $this;
    }

        public function setCod_Funcionario($Cod_Funcionario) {
        $this->Cod_Funcionario = $Cod_Funcionario;
        return $this;
    }

    public function getCod_paciente() {
        return $this->cod_paciente;
    }

    public function getSitua() {
        return $this->Situa;
    }


    public function setCod_paciente($cod_paciente) {
        $this->cod_paciente = $cod_paciente;
        return $this;
    }

        public function setSitua($Situa) {
        $this->Situa = $Situa;
        return $this;
    }
    public function getCod_Un_San() {
        return $this->Cod_Un_San;
    }

    public function getCod_Dir() {
        return $this->Cod_Dir;
    }

    public function getCod_Repart() {
        return $this->Cod_Repart;
    }

    public function getCod_Unid_Interv() {
        return $this->Cod_Unid_Interv;
    }

    public function setCod_Un_San($Cod_Un_San) {
        $this->Cod_Un_San = $Cod_Un_San;
        return $this;
    }

    public function setCod_Dir($Cod_Dir) {
        $this->Cod_Dir = $Cod_Dir;
        return $this;
    }

    public function setCod_Repart($Cod_Repart) {
        $this->Cod_Repart = $Cod_Repart;
        return $this;
    }

    public function setCod_Unid_Interv($Cod_Unid_Interv) {
        $this->Cod_Unid_Interv = $Cod_Unid_Interv;
        return $this;
    }

        public function getHora_Inicio() {
        return $this->Hora_Inicio;
    }

    public function getData_Consult() {
        return $this->Data_Consult;
    }

    public function getData_Registo() {
        return $this->Data_Registo;
    }

    public function getEstado_Consulta() {
        return $this->Estado_Consulta;
    }

    public function getCod_utilizador() {
        return $this->Cod_utilizador;
    }

    public function setHora_Inicio($Hora_Inicio) {
        $this->Hora_Inicio = $Hora_Inicio;
        return $this;
    }

    public function setData_Consult($Data_Consult) {
        $this->Data_Consult = $Data_Consult;
        return $this;
    }

    public function setData_Registo($Data_Registo) {
        $this->Data_Registo = $Data_Registo;
        return $this;
    }

    public function setEstado_Consulta($Estado_Consulta) {
        $this->Estado_Consulta = $Estado_Consulta;
        return $this;
    }

    public function setCod_utilizador($Cod_utilizador) {
        $this->Cod_utilizador = $Cod_utilizador;
        return $this;
    }

    public function inserir_consulta(PDO $con) {
        $stmt = $con->prepare($this->pegar_paciente_marcar);
        $stmt->execute(array(
            $this->getcod_paciente(),
            $this->getCod_Funcionario(),
            $this->getSitua(),
            $this->getHora_Inicio(),
            $this->getData_Consult(),
            $this->getData_Registo(),
            $this->getEstado_Consulta(),
            $this->getCod_utilizador(),
            $this->getCod_Un_San(),
            $this->getCod_Dir(),
            $this->getCod_Repart(),
            $this->getCod_Unid_Interv(),
            $this->getTipo_Consulta()
        
        ));
        return $con->lastInsertId();
    }
     public function actualizar_consulta(PDO $con) {

        $stmt = $con->prepare("UPDATE tbl_marcar_consulta SET cod_paciente= ? ,Cod_Funcionario= ? ,Tipo_Consulta=? ,Situa=? ,Hora_Inicio=? ,Data_Consult=? ,Estado_Consulta=? WHERE Cod_Consulta= ?");
        $stmt->execute(array(
            $this->getcod_paciente(),
            $this->getCod_Funcionario(),
            $this->getTipo_Consulta(),
            $this->getSitua(),
            $this->getHora_Inicio(),
            $this->getData_Consult(),
            $this->getEstado_Consulta(),
            $this->getCod_Consulta()
        ));
    }

}
