<?php

class Atendimento {

    private $pegar_atendimento = "INSERT INTO tbl_atedimento(Cod_Paciente,Cod_Diag, Indicacoes, Dose, N_dias, Quantidade, Obs, Data_Atend, Hora_Inicio_Atend, Hora_fim_Atend, tbl_utilizador_cod_utilizador, Cod_Analise, Resultado_Analise, genero, Idade,Cod_Pat,Unidade_Sant,Unidade_Interv) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    private $Cod_paciente;
    private $Cod_Diag;
    private $Indicacoes;
    private $Dose;
    private $N_dias;
    private $Quantidade;
    private $Obs;
    private $Hora;
    private $Data_Atend;
    private $Hora_Inicio_Atend;
    private $Hora_Fim_Atend;
    private $Cod_utilizador;
    private $Cod_Analise;
    private $Resultado_Analise;
    private $Cod_consulta;
    private $genero;
    private $Idade;
    private $Cod_Pat;
    private $Unidade_Sant;
    private $Unidade_Interv;
    
    public function getCod_paciente() {
        return $this->Cod_paciente;
    }
    public function getIndicacoes() {
        return $this->Indicacoes;
    }

    public function getDose() {
        return $this->Dose;
    }

    public function getN_dias() {
        return $this->N_dias;
    }

    public function getQuantidade() {
        return $this->Quantidade;
    }

    public function getObs() {
        return $this->Obs;
    }

    public function getHora() {
        return $this->Hora;
    }

    public function getData_Atend() {
        return $this->Data_Atend;
    }

    public function getHora_Inicio_Atend() {
        return $this->Hora_Inicio_Atend;
    }

    public function getHora_Fim_Atend() {
        return $this->Hora_Fim_Atend;
    }

    public function getCod_utilizador() {
        return $this->Cod_utilizador;
    }

    public function getCod_Analise() {
        return $this->Cod_Analise;
    }

    public function getResultado_Analise() {
        return $this->Resultado_Analise;
    }

    public function getCod_consulta() {
        return $this->Cod_consulta;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getIdade() {
        return $this->Idade;
    }

    public function setCod_paciente($Cod_paciente) {
        $this->Cod_paciente = $Cod_paciente;
        return $this;
    }


    public function setIndicacoes($Indicacoes) {
        $this->Indicacoes = $Indicacoes;
        return $this;
    }

    public function setDose($Dose) {
        $this->Dose = $Dose;
        return $this;
    }

    public function setN_dias($N_dias) {
        $this->N_dias = $N_dias;
        return $this;
    }

    public function setQuantidade($Quantidade) {
        $this->Quantidade = $Quantidade;
        return $this;
    }

    public function setObs($Obs) {
        $this->Obs = $Obs;
        return $this;
    }

    public function setHora($Hora) {
        $this->Hora = $Hora;
        return $this;
    }

    public function setData_Atend($Data_Atend) {
        $this->Data_Atend = $Data_Atend;
        return $this;
    }

    public function setHora_Inicio_Atend($Hora_Inicio_Atend) {
        $this->Hora_Inicio_Atend = $Hora_Inicio_Atend;
        return $this;
    }

    public function setHora_Fim_Atend($Hora_Fim_Atend) {
        $this->Hora_Fim_Atend = $Hora_Fim_Atend;
        return $this;
    }

    public function setCod_utilizador($Cod_utilizador) {
        $this->Cod_utilizador = $Cod_utilizador;
        return $this;
    }

    public function setCod_Analise($Cod_Analise) {
        $this->Cod_Analise = $Cod_Analise;
        return $this;
    }

    public function setResultado_Analise($Resultado_Analise) {
        $this->Resultado_Analise = $Resultado_Analise;
        return $this;
    }

    public function setCod_consulta($Cod_consulta) {
        $this->Cod_consulta = $Cod_consulta;
        return $this;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
        return $this;
    }

    public function setIdade($Idade) {
        $this->Idade = $Idade;
        return $this;
    }
    public function getCod_Diag() {
        return $this->Cod_Diag;
    }

    public function setCod_Diag($Cod_Diag) {
        $this->Cod_Diag = $Cod_Diag;
        return $this;
    }
    
    public function getCod_Pat() {
        return $this->Cod_Pat;
    }

    public function setCod_Pat($Cod_Pat) {
        $this->Cod_Pat = $Cod_Pat;
        return $this;
    }
    public function getUnidade_Sant() {
        return $this->Unidade_Sant;
    }

    public function getUnidade_Interv() {
        return $this->Unidade_Interv;
    }

    public function setUnidade_Sant($Unidade_Sant) {
        $this->Unidade_Sant = $Unidade_Sant;
        return $this;
    }

    public function setUnidade_Interv($Unidade_Interv) {
        $this->Unidade_Interv = $Unidade_Interv;
        return $this;
    }

        
    public function atender(PDO $con) {
        $stmt = $con->prepare($this->pegar_atendimento);
        $stmt->execute(array(
            $this->getCod_paciente(),
            $this->getCod_Diag(),
            $this->getIndicacoes(),
            $this->getDose(),
            $this->getN_dias(),
            $this->getQuantidade(),
            $this->getObs(),
            $this->getData_Atend(),
            $this->getHora_Inicio_Atend(),
            $this->getHora_Fim_Atend(),
            $this->getCod_utilizador(),
            $this->getCod_Analise(),
            $this->getResultado_Analise(),
            $this->getGenero(),
            $this->getIdade(),
            $this->getCod_Pat(),
            $this->getUnidade_Sant(),
            $this->getUnidade_Interv()
        ));
       
        return $con->lastInsertId();
        
    }
    public function actualizar_receita(PDO $con){
     
        $actualiza = $con->prepare("UPDATE tbl_marcar_consulta SET Estado_Consulta='Concluido',Estado_Fila='Atendido' WHERE cod_consulta=?");
        $actualiza->execute(array($this->getCod_consulta())
        );
        return $this->getCod_consulta();
    }
    public function actualizar_pedido(PDO $con){
     
        $actualiza = $con->prepare("UPDATE tbl_marcar_consulta SET Estado_Consulta='Agendada',Estado_Fila='Emitido Pedido' WHERE cod_consulta=?");
        $actualiza->execute(array($this->getCod_consulta())
        );
        return $this->getCod_consulta();
    }
}
