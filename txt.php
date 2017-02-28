<?php
include_once './Classes/Conexao.php';


function txtx(PDO $con) {
    $a = $con->prepare('insert into tbl_pessoa(nome) values ('.'asdasdasdasda'.')');
    $a->execute();
    
}

txtx(conexao::Chamar_conexao());
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

