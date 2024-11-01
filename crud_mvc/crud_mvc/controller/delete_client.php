<?php

include '../model/Conexao.class.php';
include '../model/Manager.class.php';

$manager = new Manager();

$id = $_POST['id'];

if(isset($id) && !empty($id)){
    $manager->delete_client($id);

    header("Location: ../view/UIGerente/index.php?cod=2");
}

?>