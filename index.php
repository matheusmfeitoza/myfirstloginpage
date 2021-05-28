<?php
session_start();

/* USer not authenticated yet detection */
//if(!isset($_SESSION['usuario']))
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DevFinnace</title>
</head>
<body>
    <main class="main">
        <div class="container">
            <div>
                <h1>Welcome to my first Login Page</h1>
            </div>
                <div class="login-square">
                    <form method="POST" action="index.php" class="formulario">
                    <label for="user">User</label>
                    <input type="text" name="user"  id="user">
                    <label for="passwd">Password</label>
                    <input type="password" name="passwd"  id="passwd">
                    <input type="submit" name="enviar" value="enviar" class="btn-enviar">
                    </form>
                </div>
        </div>
        <?php
            if (isset($_SESSION['error'])) {
                    echo "<div><strong>" . $_SESSION['error'] . "</strong></div>";
                }
         ?>

    </main>
    <footer>
        <p>Desenvolvido por Inovação Tech</p>
    </footer>
</body>
</html>

<?php
} else {
    /* formulário enviado, verificar usuário/senha */
    $login = @$_REQUEST['user'];
    $senha = @$_REQUEST['passwd'];
    $enviar = @$_REQUEST['enviar'];

    $user1 = 'matheus';
    $pass1 = '123456';

    if ($enviar) {
        if ($login == $user1 && $senha == $pass1) {
            $_SESSION['usuario'] = $login;
            $_SESSION['senha'] = $senha;
            unset($_SESSION['error']);
            header("Location: teste.php");
        } else {
            $_SESSION['error'] = "Usuário ou senha inválidos!";
            header("Location: index.php");
        }
    }

}
