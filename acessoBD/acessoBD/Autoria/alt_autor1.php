<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
        }
        h1 {
            text-align: center;
            color: black;
        }
        .btn-voltar {
            background-color: #dc3545;
            color: #fff;
            text-align: center;
        }
        .btn-voltar a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alteração de Autores Cadastrados</h1>
        <form name="alterar" method="POST" action="alt_autor2.php">
            <fieldset class="border p-3">
            <label for="autor">Informe o Codigo do Autor que deseja alterar:</label>
            <div class="form-group">
                    <input name="txtID" type="text" class="form-control" id="txtID" placeholder="Codigo do Autor" required>
                </div>
                <div class="text-center">
                    <button name="btnenviar" type="submit" class="btn btn-primary btn-custom">Consultar</button>
                    <button name="limpar" type="reset" class="btn btn-secondary btn-custom">Limpar</button>
                </div>
            </fieldset>
        </form>
        <a href="index.html" class="btn btn-danger btn-voltar">Voltar</a>
    </div>
</body>
</html>
