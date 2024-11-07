<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autor</title>
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
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .btn-cadastrar {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            color: #fff;
            border: none;
            cursor: pointer;
            background-color: #007bff;
            text-decoration: none;
        }
        .btn-cadastrar:hover {
            background-color: #0056b3;
        }
        .btn-voltar {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            color: #fff;
            border: none;
            background-color: #dc3545;
            text-decoration: none;
        }
        .btn-voltar:hover {
            background-color: #c82333;
        }
        .resultado {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #e9ecef;
            max-height: 300px; 
            overflow-y: auto; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Autor</h2>
        <form name="autores" method="POST" action="">
            <div class="form-group">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" id="Nome" placeholder="Informe o nome do autor" name="txtNome" required>
            </div>

            <div class="form-group">
                <label for="Sobrenome">Sobrenome</label>
                <input type="text" class="form-control" id="Sobrenome" placeholder="Informe o sobrenome do autor" name="txtSobrenome" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Informe o Email do autor" name="txtEmail" required>
            </div>

            <div class="form-group">
                <label for="Nascimento">Nascimento</label>
                <input type="date" class="form-control" id="Nascimento" placeholder="Informe a data de nascimento do autor" name="txtNasc" required>
            </div>

            <button type="submit" class="btn-cadastrar" name="btnenviar">Cadastrar</button>
        </form>
        <br>
        <a href="cadastrar.html" class="btn-voltar">Voltar</a>
        <div class="resultado">
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if(isset($btnenviar)){
                include_once 'Autor.php';
                $autorr = new autor();
                $autorr->setNome($txtNome);
                $autorr->setSobrenome($txtSobrenome);
                $autorr->setEmail($txtEmail);
                $autorr->setNasc($txtNasc);

                echo "<h3>" . $autorr->salvar() . "</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
