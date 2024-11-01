<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: view/UICliente/index.php");
    exit;
}

require('model/Conexao.class.php');
$pdo = Conexao::get_instance();

$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   
    $sql = "SELECT * FROM Usuario WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
       
        $_SESSION['user_id'] = 1;
        header('Location: view/UICliente/index.php');
        exit();
    } else {
      
        $message = 'Nome de usuário ou senha incorretos';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contratos</title>
</head>
<body>
    <?php if (isset($message)) : ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
   <form method="post">
   <div class="row justify-content-center">
        <div class="col-md-6">
        <h2 class="mt-5">Login</h2>
        <form method="post">
        <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha">
        </div>
       <button type="submit">Logar</button>
    </form>
    <p class="mt-3 text-danger"><?php echo $message; ?></p>
    <p>Não possui uma conta? <a href="view/UICliente/Cadastrar">Cadastrar</a></p>
    <p>Logue como gerente? <a href="LoginGerente.php">Logar</a></p>
</body>
</html>