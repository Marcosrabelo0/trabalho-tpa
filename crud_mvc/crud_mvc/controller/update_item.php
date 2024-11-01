<?php

include '../model/Conexao.class.php';
include '../model/Item.class.php';

$item = new Item();
var_dump($_POST);
if(!empty($_POST)){
    $item->update_item($_POST);
    header("Location: ../view/UICliente/index.php?cod=3");
}

?>