<?php
session_start();
if(isset($_SESSION['manager_id'])) {
    header("Location: view/UIGerente/index.php");
    exit;
}

require('model/Conexao.class.php');
$pdo = Conexao::get_instance();

$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM Gerente WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['manager_id'] = 1;
        header('Location: view/UIGerente/');
        exit();
    } else {
        $message = 'Nome de usuário incorreto ou senha';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php if (!empty($message)) : ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-5">Login</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">email:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <button type="submit">Logar</button>
            </form>
            <p>Não possui uma conta? <a href="view/UIGerente/Cadastrar.php">Cadastrar</a></p>
            <p>Logue como usuario? <a href="index.php">logar</a></p>
        </div>
    </div>
</body>
</html>
