<?php

include '../../model/Conexao.class.php';
include '../../model/Item.class.php';


$item = new Item();
$id = $_POST['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Udemy</title>

    <link rel="shortcut icon" href="../resources/favicon.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

    <style type="text/css">
        body{
            margin: 20px;
            background-color: #ffffff;
        }

        *{
            font-family:'Open Sans' , sans-serif;
        }

        h2{
            font-family:'Open Sans' , sans-serif;
        }

        .thead{
            background-color: #f7f7f7;
        }

    </style>
</head>

<body>

    <div class="container">

    <h2 class="py-5 text-center"> Atualizar contratos </i> </h2>

    <form method="POST" action="../../controller/update_item.php"> 
        <div class="row g-3">
        <?php foreach ($item->list_item_by_id($id) as $data) :?>

        <div class="col-md-6">
        <label for="nome" class="form-label"> Nome <i class="bi bi-person"></i> </label> 
        <input type="text" class="form-control" name="nome" value="<?= $data['Nome'] ?>" required autofocus>
        </div>
        <div class="col-md-6">
        <label for="quantidade" class="form-label"> Quantidade <i class="bi bi-envelope"></i> </label> 
        <input type="number" class="form-control" name="quantidade" value="<?= $data['Quantidade'] ?>" required>
        </div>
        <div class="col-md-4">
        <label for="tipo" class="form-label"> Tipo <i class="bi bi-credit-card-2-front"></i></label> 
        <input type="text" class="form-control" name="tipo" value="<?= $data['Tipo'] ?>" required>
        </div>
        <div class="col-md-4">
        <label for="precototal" class="form-label"> Valor do Contrato <i class="bi bi-calendar"></i> </label> 
        <input type="decimal" class="form-control" name="precototal" value="<?= $data['PrecoTotal'] ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $data['idEquipamento'] ?>"> 
        <?php endforeach; ?>
        <hr class="my-4">

        <div class="col-md-12 text-end">
        <button class="btn btn-primary btn-lg"
        type="submit">Atualizar</button>
        <a class="btn btn-success btn-lg" href="index.php"> Cancelar </a> 
        </div>








        </div> 
    </form>


    
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>

</html>