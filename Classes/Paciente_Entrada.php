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
class Paciente_Entrda {

    //put your code here
    Private $Paciente_Entrda = 'INSERT INTO tbl_paciente_internado_entrada(FolhaN, Papelada_N,Cod_Pessoa,Livro_N,Process_n,Enfermaria,Profissao,Corporacao_Trabalho,Grad_Categoria,Documento_Admi,Deposito_Garatia,Abanada_Hospital,Data_Abanada,Data_Entrada,Hora_Estrada,Estado_Estrada,Ante_Pessoais,Ante_Herodiarios,Sintomas_Actual,Presc_Entrada,Diag_Provisorio,Baixa_d,Medico,Cod_utilizador,Data_Registo,telefone2,Cor)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    private $Cod_Paciente_Inter;
    Private $FolhaN; 
    Private $Papelada_N; 
    private $Cod_Pessoa;
    Private $Livro_N;
    Private $Process_n; 
    Private $Enfermaria;
    private $Profissao;
    private $Corporacao_Trabalho;
    private $Grad_Categoria;
    private $Documento_Admi;
    private $Deposito_Garatia;
    private $Abanada_Hospital;
    private $Data_Abanada;
    private $Data_Entrada;
    private $Hora_Estrada;
    private $Estado_Estrada;
    private $Ante_Pessoais;
    private $Ante_Herodiarios;
    private $Sintomas_Actual;
    private $Presc_Entrada;
    private $Diag_Provisorio;
    private $Baixa_d;
    private $Medico;
    private $Cod_utilizador;
    private $Data_Registo;
    private $telefone2;
    private $Cor;
    


    public function getFolhaN() {
        return $this->FolhaN;
    }

    public function getPapelada_N() {
        return $this->Papelada_N;
    }

    public function setFolhaN($FolhaN) {
        $this->FolhaN = $FolhaN;
        return $this;
    }

    public function setPapelada_N($Papelada_N) {
        $this->Papelada_N = $Papelada_N;
        return $this;
    }
    public function getCod_Paciente_Inter() {
        return $this->Cod_Paciente_Inter;
    }

    public function setCod_Paciente_Inter($Cod_Paciente_Inter) {
        $this->Cod_Paciente_Inter = $Cod_Paciente_Inter;
        return $this;
    }
    public function getCod_Pessoa() {
        return $this->Cod_Pessoa;
    }

    public function setCod_Pessoa($Cod_Pessoa) {
        $this->Cod_Pessoa = $Cod_Pessoa;
        return $this;
    }
    
    public function getLivro_N() {
        return $this->Livro_N;
    }

    public function getProcess_n() {
        return $this->Process_n;
    }

    public function setLivro_N($Livro_N) {
        $this->Livro_N = $Livro_N;
        return $this;
    }

    public function setProcess_n($Process_n) {
        $this->Process_n = $Process_n;
        return $this;
    }
    public function getEnfermaria() {
        return $this->Enfermaria;
    }

    public function setEnfermaria($Enfermaria) {
        $this->Enfermaria = $Enfermaria;
        return $this;
    }
    public function getProfissao() {
        return $this->Profissao;
    }

    public function getCorporacao_Trabalho() {
        return $this->Corporacao_Trabalho;
    }

    public function setProfissao($Profissao) {
        $this->Profissao = $Profissao;
        return $this;
    }

    public function setCorporacao_Trabalho($Corporacao_Trabalho) {
        $this->Corporacao_Trabalho = $Corporacao_Trabalho;
        return $this;
    }

    public function getGrad_Categoria() {
        return $this->Grad_Categoria;
    }

    public function getDocumento_Admi() {
        return $this->Documento_Admi;
    }

    public function getDeposito_Garatia() {
        return $this->Deposito_Garatia;
    }

    public function getAbanada_Hospital() {
        return $this->Abanada_Hospital;
    }

    public function setGrad_Categoria($Grad_Categoria) {
        $this->Grad_Categoria = $Grad_Categoria;
        return $this;
    }

    public function setDocumento_Admi($Documento_Admi) {
        $this->Documento_Admi = $Documento_Admi;
        return $this;
    }

    public function setDeposito_Garatia($Deposito_Garatia) {
        $this->Deposito_Garatia = $Deposito_Garatia;
        return $this;
    }

    public function setAbanada_Hospital($Abanada_Hospital) {
        $this->Abanada_Hospital = $Abanada_Hospital;
        return $this;
    }
    
    public function getData_Abanada() {
        return $this->Data_Abanada;
    }

    public function getData_Entrada() {
        return $this->Data_Entrada;
    }

    public function getHora_Estrada() {
        return $this->Hora_Estrada;
    }

    public function getEstado_Estrada() {
        return $this->Estado_Estrada;
    }

    public function getAnte_Pessoais() {
        return $this->Ante_Pessoais;
    }

    public function getSintomas_Actual() {
        return $this->Sintomas_Actual;
    }

    public function getPresc_Entrada() {
        return $this->Presc_Entrada;
    }

    public function getDiag_Provisorio() {
        return $this->Diag_Provisorio;
    }

    public function getBaixa_d() {
        return $this->Baixa_d;
    }

    public function getMedico() {
        return $this->Medico;
    }

    public function getCod_utilizador() {
        return $this->Cod_utilizador;
    }

    public function getData_Registo() {
        return $this->Data_Registo;
    }

    public function getTelefone2() {
        return $this->telefone2;
    }

    public function setData_Abanada($Data_Abanada) {
        $this->Data_Abanada = $Data_Abanada;
        return $this;
    }

    public function setData_Entrada($Data_Entrada) {
        $this->Data_Entrada = $Data_Entrada;
        return $this;
    }

    public function setHora_Estrada($Hora_Estrada) {
        $this->Hora_Estrada = $Hora_Estrada;
        return $this;
    }

    public function setEstado_Estrada($Estado_Estrada) {
        $this->Estado_Estrada = $Estado_Estrada;
        return $this;
    }

    public function setAnte_Pessoais($Ante_Pessoais) {
        $this->Ante_Pessoais = $Ante_Pessoais;
        return $this;
    }

    public function setSintomas_Actual($Sintomas_Actual) {
        $this->Sintomas_Actual = $Sintomas_Actual;
        return $this;
    }

    public function setPresc_Entrada($Presc_Entrada) {
        $this->Presc_Entrada = $Presc_Entrada;
        return $this;
    }

    public function setDiag_Provisorio($Diag_Provisorio) {
        $this->Diag_Provisorio = $Diag_Provisorio;
        return $this;
    }

    public function setBaixa_d($Baixa_d) {
        $this->Baixa_d = $Baixa_d;
        return $this;
    }

    public function setMedico($Medico) {
        $this->Medico = $Medico;
        return $this;
    }

    public function setCod_utilizador($Cod_utilizador) {
        $this->Cod_utilizador = $Cod_utilizador;
        return $this;
    }

    public function setData_Registo($Data_Registo) {
        $this->Data_Registo = $Data_Registo;
        return $this;
    }

    public function setTelefone2($telefone2) {
        $this->telefone2 = $telefone2;
        return $this;
    }
    public function getAnte_Herodiarios() {
        return $this->Ante_Herodiarios;
    }

    public function setAnte_Herodiarios($Ante_Herodiarios) {
        $this->Ante_Herodiarios = $Ante_Herodiarios;
        return $this;
    }
    
    public function getCor() {
        return $this->Cor;
    }

    public function setCor($Cor) {
        $this->Cor = $Cor;
        return $this;
    }
       
       public function inserir_Paciente_Entrda(PDO $con) {
        $stmt = $con->prepare($this->Paciente_Entrda);
        $stmt->execute(array(
            $this->getFolhaN(),
            $this->getPapelada_N(),
            $this->getCod_Pessoa(),
            $this->getLivro_N(),
            $this->getProcess_n(),
            $this->getEnfermaria(),
            $this->getProfissao(),
            $this->getCorporacao_Trabalho(),
            $this->getGrad_Categoria(),
            $this->getDocumento_Admi(),
            $this->getDeposito_Garatia(),
            $this->getAbanada_Hospital(),
            $this->getData_Abanada(),
            $this->getData_Entrada(),
            $this->getHora_Estrada(),
            $this->getEstado_Estrada(),
            $this->getAnte_Pessoais(),
            $this->getAnte_Herodiarios(),
            $this->getSintomas_Actual(),
            $this->getPresc_Entrada(),
            $this->getDiag_Provisorio(),
            $this->getBaixa_d(),
            $this->getMedico(),
            $this->getCod_utilizador(),
            $this->getData_Registo(),
            $this->getTelefone2(),
            $this->getCor()
        ));
    }

}
