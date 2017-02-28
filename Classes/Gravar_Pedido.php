<?php

class Gravar_pedido{

    public $Gravar_p ="INSERT INTO tbl_pedido(tipo, Cod_Ated, Cod_utilizador, Instrucoes) VALUES (?,?,?,?)";
    
    private $tipo;
    private $Instrucoes;
    private $Cod_utilizador;
    private $Cod_Ated;
    private $Cod_receita;



    public function getCod_pedido() {
        return $this->Cod_pedido;
    }

    public function setCod_pedido($Cod_pedido) {
        $this->Cod_pedido = $Cod_pedido;
        return $this;
    }
    public function getTipo() {
        return $this->tipo;
    }

    public function getInstrucoes() {
        return $this->Instrucoes;
    }

    public function getCod_utilizador() {
        return $this->Cod_utilizador;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    public function setInstrucoes($Instrucoes) {
        $this->Instrucoes = $Instrucoes;
        return $this;
    }

    public function setCod_utilizador($Cod_utilizador) {
        $this->Cod_utilizador = $Cod_utilizador;
        return $this;
    }

    public function getCod_consulta() {
        return $this->Cod_consulta;
    }

    public function setCod_consulta($Cod_consulta) {
        $this->Cod_consulta = $Cod_consulta;
        return $this;
    }

    public function Inserir_pedido(PDO $con) {
        $stmt = $con->prepare($this->Gravar_p);
        $stmt->execute(array(
        $this->getTipo(),
        $this->getCod_consulta(),
        $this->getCod_utilizador(),
        $this->getInstrucoes()
        
        ));
       return $con->lastInsertId();
    }
    
  
        
}
