<?php

include '../model/Conexao.class.php';
include '../model/Item.class.php';

$item = new Item();

if(!empty($_POST)){
    $item->insert_item($_POST);
    header("Location: ../view/UICliente/index.php?cod=1");
}

?>