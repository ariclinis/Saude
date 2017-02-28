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
    Private $pegar_paciente_marcar = 'INSERT INTO tbl_adicionar_paciente_sala( Cod_Pac_internado, Cod_Area_Inter, Cod_Sala, N_Cama, Estado_Add, Cod_Utilizador, Cod_Especialidade, OBS, Cod_Un_San, Cod_Dir,Data_Registo)VALUES(?,?,?,?,?,?,?,?,?,?)';

private $Cod_Pac_internado;
private $Cod_Area_Inter;
private $Cod_Sala;
private $N_Cama;
private $Estado_Add;
private $Cod_Especialidade;
private $OBS;
private $Cod_Un_San;
private $Cod_Dir;   
private $Cod_Repart;
private $Data_Registo;
private $Cod_Utilizador;


    public function inserir_sala(PDO $con) {
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
    }

}
