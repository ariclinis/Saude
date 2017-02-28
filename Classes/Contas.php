<?php


class Contas {
    public $pegar_Conta="INSERT INTO `tbl_login`(hora_acesso, data_acesso, nome, senha, previlegio) VALUES (?,?,?,?,?)";
    private $Hora_acesso;
    private $Data_acesso;
    private $Nome;
    private $Senha;
    private $previlegio;
    
    function getHora_acesso() {
        return $this->Hora_acesso;
    }

    function getData_acesso() {
        return $this->Data_acesso;
    }

    function getNome() {
        return $this->Nome;
    }

    function getSenha() {
        return $this->Senha;
    }

    function getPrevilegio() {
        return $this->previlegio;
    }

    function setHora_acesso($Hora_acesso) {
        $this->Hora_acesso = $Hora_acesso;
    }

    function setData_acesso($Data_acesso) {
        $this->Data_acesso = $Data_acesso;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setSenha($Senha) {
        $this->Senha = $Senha;
    }

    function setPrevilegio($previlegio) {
        $this->previlegio = $previlegio;
    }

    function Inserir_Conta(PDO $con){
        $stmt= $con->prepare($this->pegar_Conta);
        $stmt->execute(array(
        $this->getHora_acesso(),
        $this->getData_acesso(),
        $this->getNome(),
        $this->getSenha(),
        $this->getPrevilegio()
        ));
        return $con->lastInsertId();
    }
    
}
