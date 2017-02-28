<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilizador
 *
 * @author Anas Tadeu
 */
class Utilizador {
    //put your code here
    private $Pegar_usu = "INSERT INTO tbl_utilizador(estado, data_registo, Nome_User, Nome_Login, Senha, Perfil_Acesso, Cod_Dir, Cod_Repart, Unidade_Sant, Cod_Unid_Interv) VALUES (?,?,?,?,?,?,?,?,?,?)";
    private $Estado;
    private $Data_registo;
    private $Nome_User;
    private $Nome_Login;
    private $Senha;
    private $Perfil_Acesso;
    private $Cod_Dir;
    private $Cod_Repart;
    private $Unidade_Sant;
    private $Cod_Unid_Interv;
    private $Cod_funci;
    private $Cod_user;
    
     function getCod_user() {
        return $this->Cod_user;
    }

    function setCod_user($Cod_user) {
        $this->Cod_user = $Cod_user;
    }

    function getEstado() {
        return $this->Estado;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }
    function getData_registo() {
        return $this->Data_registo;
    }

    function setData_registo($Data_registo) {
        $this->Data_registo = $Data_registo;
    }

        function getNome_User() {
        return $this->Nome_User;
    }

    function setNome_User($Nome_User) {
        $this->Nome_User = $Nome_User;
    }
        function getNome_Login() {
        return $this->Nome_Login;
    }

    function setNome_Login($Nome_Login) {
        $this->Nome_Login = $Nome_Login;
    }

        function getSenha() {
        return $this->Senha;
    }

    function setSenha($Senha) {
        $this->Senha = $Senha;
    }
    function getPerfil_Acesso() {
        return $this->Perfil_Acesso;
    }

    function setPerfil_Acesso($Perfil_Acesso) {
        $this->Perfil_Acesso = $Perfil_Acesso;
    }
        function getCod_Dir() {
        return $this->Cod_Dir;
    }

    function setCod_Dir($Cod_Dir) {
        $this->Cod_Dir = $Cod_Dir;
    }

        function getCod_Repart() {
        return $this->Cod_Repart;
    }

    function setCod_Repart($Cod_Repart) {
        $this->Cod_Repart = $Cod_Repart;
    }

        function getUnidade_Sant() {
        return $this->Unidade_Sant;
    }

    function setUnidade_Sant($Unidade_Sant) {
        $this->Unidade_Sant = $Unidade_Sant;
    }

        function getCod_Unid_Interv() {
        return $this->Cod_Unid_Interv;
    }

    function setCod_Unid_Interv($Cod_Unid_Interv) {
        $this->Cod_Unid_Interv = $Cod_Unid_Interv;
    }
        function getCod_funci() {
        return $this->Cod_funci;
    }

    function setCod_funci($Cod_funci) {
        $this->Cod_funci = $Cod_funci;
    }

   
    public function Inserir_usu(PDO $con) {
        $stmt = $con->prepare($this->Pegar_usu);
        $stmt->execute(array(
            $this->getEstado(),
            $this->getData_registo(),
            $this->getNome_User(),
            $this->getNome_Login(),
            $this->getSenha(),
            $this->getPerfil_Acesso(),
            $this->getCod_Dir(),
            $this->getCod_Repart(),
            $this->getUnidade_Sant(),
            $this->getCod_Unid_Interv()
        ));
    
       return $con->lastInsertId();
    }
    public function Alterar_Senha(PDO $con) {
        $stmt = $con->prepare("UPDATE tbl_utilizador SET Senha=? WHERE cod_utilizador=?");
        $stmt->execute(array(
            $this->getSenha(),
            $this->getCod_user()
        ));
    
    }
}
