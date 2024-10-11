<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
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
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .btn-cadastrar, .btn-voltar {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .btn-cadastrar {
            background-color: #007bff;
        }
        .btn-voltar {
            background-color: #dc3545;
            text-decoration: none;
            display: inline-block;
            text-align: center;
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
        .btn-group {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Produto</h2>
        <form name="cliente" method="POST" action="">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome do produto" name="txtnome" size="40" required>
                <small id="nomeHelp" class="form-text text-muted">Digite o nome do produto para registrar.</small>
            </div>
            <div class="form-group">
                <label for="estoque">Estoque</label>
                <input type="text" class="form-control" id="estoque" placeholder="0" name="txtestoq" size="10" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-cadastrar" name="btnenviar">Cadastrar</button>
                <a href="index.html" class="btn btn-voltar">Voltar</a>
            </div>
        </form>

        <div class="resultado">
            <?php
            if (isset($_POST['btnenviar'])) {
                include_once 'Produto.php';
                $pro = new Produto();
                $pro->setNome($_POST['txtnome']);
                $pro->setEstoque($_POST['txtestoq']);
                echo "<h3>" . ($pro->salvar()) . "</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
