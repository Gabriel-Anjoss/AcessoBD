<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Autoria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            max-width: 500px; 
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        input[type="text"],
        input[type="password"] {
            margin: 10px 0;
            border-radius: 5px;
        }
        .btn-login, .btn-clear {
            width: 100%;
            border-radius: 5px;
            padding: 12px;
            cursor: pointer;
        }
        .btn-login {
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .btn-clear {
            background-color: #dc3545;
            color: #fff;
            border: none;
            margin-top: 10px;
        }
        .btn-clear:hover {
            background-color: #c82333;
        }
        .message {
            margin-top: 20px;
            color: green;
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
    <script>
        function blockletras(keypress) {
            // Campo senha - bloqueia letras
            return (keypress >= 48 && keypress <= 57);
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form name="Logando" method="POST" action="">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Usuário" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Senha" onkeypress="return blockletras(event.keyCode)" required>
            </div>
            <button type="submit" class="btn btn-login" name="btnlogar">Entrar</button>
            <button type="reset" class="btn btn-clear">Limpar</button>
        </form>

        <?php
        if (isset($_POST['btnlogar'])) {
            include_once 'usuario.php';
            $u = new Usuario();
            $u->setUsuario($_POST['username']);
            $u->setSenha($_POST['password']);

            $autoria_bd = $u->logar();

            $existe = false;
            foreach ($autoria_bd as $autoria_mostrar) {
                $existe = true;
                echo "<div class='message'>Bem Vindo! Usuário: " . htmlspecialchars($autoria_mostrar[0]) . "</div>";
                echo "<div class='text-center'><a href='menu.html'>Entrar</a></div>";
            }
            if (!$existe) {
                echo "<div class='error'>Usuário ou senha inválidos.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
