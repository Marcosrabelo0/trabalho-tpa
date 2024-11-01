<?php

include '../model/Conexao.class.php';
include '../model/Manager.class.php';

$manager = new Manager();

if(!empty($_POST)){
    $manager->insert_client($_POST);
    header("Location: ../view/UIGerente/index.php?cod=1");
}

?>