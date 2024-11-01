<?php

include '../model/Conexao.class.php';
include '../model/Item.class.php';

$item = new Item();

$id = $_POST['id'];

if(isset($id) && !empty($id)){
    $item->delete_item($id);

    header("Location: ../view/UICliente/index.php?cod=2");
}

?>