<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author Anas Tadeu
 */
class Funcionario {

    //put your code here
    Private $pegar_Fucionario = 'INSERT INTO tbl_funcionario(Estado,Data_Registo,Situa_Contrato,Nivel_Escolar,Cargos_Funcao,Cod_Dir,Cod_uni_san,Cod_uni_interv,Cod_Repart,Cod_Utilizador,Cod_Categoria,cod_pessoa,N_Interno)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)';
    private $Estado;
    private $Data_Registo;
    private $Situa_Contrato;
    private $Nivel_Escolar;
    private $Cargos_Funcao;
    private $Cod_Dir;
    private $Cod_uni_san;
    private $Cod_uni_interv;
    private $Cod_Repart;
    private $Cod_Utilizador;
    private $Cod_Categoria;
    private $cod_pessoa;
    private $N_Interno;
    private $Cod_funcionario;


    public function getCod_funcionario() {
        return $this->Cod_funcionario;
    }
    public function setCod_funcionario($Cod_funcionario) {
        $this->Cod_funcionario = $Cod_funcionario;
        return $this;
    }
    public function getEstado() {
        return $this->Estado;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
        return $this;
    }

    public function getData_Registo() {
        return $this->Data_Registo;
    }

    public function getNivel_Escolar() {
        return $this->Nivel_Escolar;
    }

    public function setData_Registo($Data_Registo) {
        $this->Data_Registo = $Data_Registo;
        return $this;
    }

    public function setNivel_Escolar($Nivel_Escolar) {
        $this->Nivel_Escolar = $Nivel_Escolar;
        return $this;
    }

    public function getSitua_Contrato() {
        return $this->Situa_Contrato;
    }

    public function setSitua_Contrato($Situa_Contrato) {
        $this->Situa_Contrato = $Situa_Contrato;
        return $this;
    }

    public function getCargos_Funcao() {
        return $this->Cargos_Funcao;
    }

    public function getCod_Dir() {
        return $this->Cod_Dir;
    }

    public function getCod_uni_san() {
        return $this->Cod_uni_san;
    }
    public function getCod_Utilizador() {
        return $this->Cod_Utilizador;
    }

    public function setCod_Utilizador($Cod_Utilizador) {
        $this->Cod_Utilizador = $Cod_Utilizador;
        return $this;
    }

        public function getCod_uni_interv() {
        return $this->Cod_uni_interv;
    }
    public function setCargos_Funcao($Cargos_Funcao) {
        $this->Cargos_Funcao = $Cargos_Funcao;
        return $this;
    }
    public function setCod_Dir($Cod_Dir) {
        $this->Cod_Dir = $Cod_Dir;
        return $this;
    }
    public function setCod_uni_san($Cod_uni_san) {
        $this->Cod_uni_san = $Cod_uni_san;
        return $this;
    }
    public function setCod_uni_interv($Cod_uni_interv) {
        $this->Cod_uni_interv = $Cod_uni_interv;
        return $this;
    }

    public function getCod_Repart() {
        return $this->Cod_Repart;
    }

    public function setCod_Repart($Cod_Repart) {
        $this->Cod_Repart = $Cod_Repart;
        return $this;
    }
    public function getCod_Categoria() {
        return $this->Cod_Categoria;
    }

    public function setCod_Categoria($Cod_Categoria) {
        $this->Cod_Categoria = $Cod_Categoria;
        return $this;
    }
    public function getCod_pessoa() {
        return $this->cod_pessoa;
    }

    public function setCod_pessoa($cod_pessoa) {
        $this->cod_pessoa = $cod_pessoa;
        return $this;
    }
    public function getN_Interno() {
        return $this->N_Interno;
    }

    public function setN_Interno($N_Interno) {
        $this->N_Interno = $N_Interno;
        return $this;
    }
    

    public function inserir_Funcionario(PDO $con) {
        $stmt = $con->prepare($this->pegar_Fucionario);
        $stmt->execute(array(
            $this->getEstado(),
            $this->getData_Registo(),
            $this->getSitua_Contrato(),
            $this->getNivel_Escolar(),
            $this->getCargos_Funcao(),
            $this->getCod_Dir(),
            $this->getCod_uni_san(),
            $this->getCod_uni_interv(),
            $this->getCod_Repart(),
            $this->getCod_Utilizador(),
            $this->getCod_Categoria(),
            $this->getCod_pessoa(),
            $this->getN_Interno()
        ));
        return $con->lastInsertId();
    }
    public function Actualizar_Funcionario(PDO $con) {
        $stmt = $con->prepare("UPDATE tbl_funcionario SET N_Interno=?, Estado=?, Nivel_Escolar=?, Situa_Contrato=?, Cod_Categoria=?, Cargos_Funcao=? WHERE cod_funcionario= ?");
        $stmt->execute(array(
            $this->getN_Interno(),
            $this->getEstado(),
            $this->getNivel_Escolar(),
            $this->getSitua_Contrato(),
            $this->getCod_Categoria(),
            $this->getCargos_Funcao(),
            $this->getCod_funcionario()
        ));
    }

}
