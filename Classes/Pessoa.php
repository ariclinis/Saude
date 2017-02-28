<?php

/**
 * 
 *
 * @author Ariclene Chimbili
 */
class Pessoa {

    //put your code here
    public $pegar_pessoa = "INSERT INTO tbl_pessoa(nome, nome_pai, nome_mae, n_bi, data_nasc, genero, altura, nacionalidade, data_registo, estado_civil, Cod_provincia_nasc, Cod_municipio_nasc, Idade, Cod_Dir, Cod_Repart, Cod_Sanitaria, Cod_Contacto, Cod_Bairro, Provincia_localidade, Municipio_Localidade)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    private $Cod_pessoa;
    private $Nome;
    private $Nome_pai;
    private $Nome_mae;
    private $N_bi;
    private $Data_nasc;
    private $Genero;
    private $Altura;
    private $Nacionalidade;
    private $Data_registo;
    private $Estado_civil;
    private $Cod_provincia_nasc;
    private $Cod_municipio_nasc	;
    private $idade;
    private $Cod_Dir;
    private $Cod_Repart;
    private $Cod_Sanitaria;
    private $Cod_Contacto;
    private $Cod_Bairro;
    private $Provincia_localidade;
    Private $Municipio_Localidade;
    

    public function getIdade() {
        return $this->idade;
    }
    public function getCod_Dir() {
        return $this->Cod_Dir;
    }

    public function setCod_Dir($Cod_Dir) {
        $this->Cod_Dir = $Cod_Dir;
        return $this;
    }
    public function getCod_Repart() {
        return $this->Cod_Repart;
    }

    public function getCod_Sanitaria() {
        return $this->Cod_Sanitaria;
    }

    public function setCod_Repart($Cod_Repart) {
        $this->Cod_Repart = $Cod_Repart;
        return $this;
    }

    public function setCod_Sanitaria($Cod_Sanitaria) {
        $this->Cod_Sanitaria = $Cod_Sanitaria;
        return $this;
    }
     public function setIdade($idade) {
        $this->idade = $idade;
        return $this;
    }

    function getCod_pessoa() {
        return $this->Cod_pessoa;
    }

    function getNome() {
        return $this->Nome;
    }

    function getNome_pai() {
        return $this->Nome_pai;
    }

    function getNome_mae() {
        return $this->Nome_mae;
    }

    function getN_bi() {
        return $this->N_bi;
    }

    function getData_nasc() {
        return $this->Data_nasc;
    }

    function getGenero() {
        return $this->Genero;
    }

    function getAltura() {
        return $this->Altura;
    }

    function getNacionalidade() {
        return $this->Nacionalidade;
    }

    function getData_registo() {
        return $this->Data_registo;
    }

    function getEstado_civil() {
        return $this->Estado_civil;
    }

    function setCod_pessoa($Cod_pesoa) {
        $this->Cod_pessoa = $Cod_pesoa;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setNome_pai($Nome_pai) {
        $this->Nome_pai = $Nome_pai;
    }

    function setNome_mae($Nome_mae) {
        $this->Nome_mae = $Nome_mae;
    }

    function setN_bi($N_bi) {
        $this->N_bi = $N_bi;
    }

    function setData_nasc($Data_nasc) {
        $this->Data_nasc = $Data_nasc;
    }

    function setGenero($Genero) {
        $this->Genero = $Genero;
    }

    function setAltura($Altura) {
        $this->Altura = $Altura;
    }

    function setNacionalidade($Nacionalidade) {
        $this->Nacionalidade = $Nacionalidade;
    }

    function setData_registo($Data_registo) {
        $this->Data_registo = $Data_registo;
    }

    function setEstado_civil($Estado_civil) {
        $this->Estado_civil = $Estado_civil;
    }
    public function getCod_provincia_nasc() {
        return $this->Cod_provincia_nasc;
    }

    public function getCod_municipio_nasc() {
        return $this->Cod_municipio_nasc;
    }

    public function setCod_provincia_nasc($Cod_provincia_nasc) {
        $this->Cod_provincia_nasc = $Cod_provincia_nasc;
        return $this;
    }

    public function setCod_municipio_nasc($Cod_municipio_nasc) {
        $this->Cod_municipio_nasc = $Cod_municipio_nasc;
        return $this;
    }
    public function getCod_Contacto() {
        return $this->Cod_Contacto;
    }

    public function getCod_Bairro() {
        return $this->Cod_Bairro;
    }

    public function setCod_Contacto($Cod_Contacto) {
        $this->Cod_Contacto = $Cod_Contacto;
        return $this;
    }

    public function setCod_Bairro($Cod_Bairro) {
        $this->Cod_Bairro = $Cod_Bairro;
        return $this;
    }
    public function getProvincia_localidade() {
        return $this->Provincia_localidade;
    }

    public function getMunicipio_Localidade() {
        return $this->Municipio_Localidade;
    }

    public function setProvincia_localidade($Provincia_localidade) {
        $this->Provincia_localidade = $Provincia_localidade;
        return $this;
    }

    public function setMunicipio_Localidade($Municipio_Localidade) {
        $this->Municipio_Localidade = $Municipio_Localidade;
        return $this;
    }

    
        public function inserir_pessoa(PDO $con) {
        $stmt = $con->prepare($this->pegar_pessoa);
        $stmt->execute(array(
            $this->getNome(),
            $this->getNome_pai(),
            $this->getNome_mae(),
            $this->getN_bi(),
            $this->getData_nasc(),
            $this->getGenero(),
            $this->getAltura(),
            $this->getNacionalidade(),
            $this->getData_registo(),
            $this->getEstado_civil(),
            $this->getCod_provincia_nasc(),
            $this->getCod_municipio_nasc(),
            $this->getIdade(),
            $this->getCod_Dir(),
            $this->getCod_Repart(),
            $this->getCod_Sanitaria(),
            $this->getCod_Contacto(),
            $this->getCod_Bairro(),
            $this->getProvincia_localidade(),
            $this->getMunicipio_Localidade()
        ));
        return $con->lastInsertId();
    }

    public function Actualizar_Pessoa(PDO $con) {
        $stmt = $con->prepare("UPDATE `tbl_pessoa` SET `nome`=?,`nome_pai`=?,`nome_mae`=?,`n_bi`=?,`data_nasc`=?,`genero`=?,`altura`=?,`nacionalidade`=?,`estado_civil`=?,`Cod_provincia_nasc`=?,`Cod_municipio_nasc`=?,`Idade`=?,`Cod_Bairro`=?,`Provincia_localidade`=?,`Municipio_Localidade`=? WHERE cod_pessoa= ?");
        $stmt->execute(array(
            $this->getNome(),
            $this->getNome_pai(),
            $this->getNome_mae(),
            $this->getN_bi(),
            $this->getData_nasc(),
            $this->getGenero(),
            $this->getAltura(),
            $this->getNacionalidade(),
            $this->getEstado_civil(),
            $this->getCod_provincia_nasc(),
            $this->getCod_municipio_nasc(),
            $this->getIdade(),
            $this->getCod_Bairro(),
            $this->getProvincia_localidade(),
            $this->getMunicipio_Localidade(),
            $this->getCod_pessoa()
        ));
        
    }


}
