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
class Paciente {

    //put your code here
    Private $pegar_paciente = 'INSERT INTO tbl_paciente(estado, obs, cod_pessoa, Tipo_Saguino, cod_utilizador)VALUES(?,?,?,?,?)';
    private $cod_paciente;
    private $estado;
    private $obs;
    private $cod_pessoa;
    private $Tipo_Saguino;
    private $cod_utilizador;
    
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

        public function getCod_paciente() {
        return $this->cod_paciente;
    }
    public function getObs() {
        return $this->obs;
    }

    public function getCod_pessoa() {
        return $this->cod_pessoa;
    }

    public function getTipo_Saguino() {
        return $this->Tipo_Saguino;
    }
    public function getCod_utilizador() {
        return $this->cod_utilizador;
    }

    public function setCod_paciente($cod_paciente) {
        $this->cod_paciente = $cod_paciente;
        return $this;
    }
    public function setObs($obs) {
        $this->obs = $obs;
        return $this;
    }

    public function setCod_pessoa($cod_pessoa) {
        $this->cod_pessoa = $cod_pessoa;
        return $this;
    }

    public function setTipo_Saguino($Tipo_Saguino) {
        $this->Tipo_Saguino = $Tipo_Saguino;
        return $this;
    }

    public function setCod_utilizador($cod_utilizador) {
        $this->cod_utilizador = $cod_utilizador;
        return $this; 
    }
        
    public function inserir_Paciente(PDO $con) {
        $stmt = $con->prepare($this->pegar_paciente);
        $stmt->execute(array(
            $this->getEstado(),
            $this->getObs(),
            $this->getCod_pessoa(),
            $this->getTipo_Saguino(),
            $this->getCod_utilizador()
        ));
     return $con->lastInsertId();
    }
    public function Actualizar_Pacinte(PDO $con){
        $stmt = $con->prepare("UPDATE tbl_paciente SET estado=?,obs=?,Tipo_Saguino=?,Ocup_Prof=? WHERE cod_paciente= ?");
        $stmt->execute(array(
            $this->getEstado(),
            $this->getObs(),
            $this->getTipo_Saguino(),
            $this->getCod_utilizador(),
            $this->getCod_paciente()
        ));

    }

}
