<?php

class Direccao_Saude {
    //put your code here
    private $Pegar_Dir = "INSERT INTO tbl_dir(Dis_Dir,Data_Registo,Cod_Utilizador,Provincia,Municipio)VALUES(?,?,?,?,?)";
    private $Cod_Dir;
    private $Dis_Dir;
    private $Data_Registo;
    private $Cod_Utilizador;
    private $Provincia;
	private $Municipio;

        function getCod_Dir() {
            return $this->Cod_Dir;
        }

        function getDis_Dir() {
            return $this->Dis_Dir;
        }

        function getData_Registo() {
            return $this->Data_Registo;
        }

        function getCod_Utilizador() {
            return $this->Cod_Utilizador;
        }

        function getProvincia() {
            return $this->Provincia;
        }

        function getMunicipio() {
            return $this->Municipio;
        }

        function setCod_Dir($Cod_Dir) {
            $this->Cod_Dir = $Cod_Dir;
        }

        function setDis_Dir($Dis_Dir) {
            $this->Dis_Dir = $Dis_Dir;
        }

        function setData_Registo($Data_Registo) {
            $this->Data_Registo = $Data_Registo;
        }

        function setCod_Utilizador($Cod_Utilizador) {
            $this->Cod_Utilizador = $Cod_Utilizador;
        }

        function setProvincia($Provincia) {
            $this->Provincia = $Provincia;
        }

        function setMunicipio($Municipio) {
            $this->Municipio = $Municipio;
        }

        
    public function inserir_Dir(PDO $con) {
        $stmt = $con->prepare($this->Pegar_Dir);
        $stmt->execute(array(
            $this->getDis_Dir(),
            $this->getData_Registo(),
            $this->getCod_Utilizador(),
            $this->getProvincia(),
	$this->getMunicipio()
        ));
   $con->exec($this->Pegar_Dir);
        
    }

}
