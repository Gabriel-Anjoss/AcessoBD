<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autoria</title>
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
        <h2>Cadastrar Autoria</h2>
        <form name="autoria" method="POST" action="">
            <div class="form-group">
                <label for="Codigo">Código Autor</label>
                <input type="text" class="form-control" id="Codigo" placeholder="Informe o código do autor" name="txtCodigo" required>
            </div>

            <div class="form-group">
                <label for="CodigoLivro">Código Livro</label>
                <input type="text" class="form-control" id="CodigoLivro" placeholder="Informe o código do livro" name="txtCodigoLivro" required>
            </div>

            <div class="form-group">
                <label for="DataLancamento">Data Lançamento</label>
                <input type="date" class="form-control" id="DataLancamento" placeholder="Informe a data de lançamento" name="txtDataLancamento" required>
            </div>

            <div class="form-group">
                <label for="Editora">Editora</label>
                <input type="text" class="form-control" id="Editora" placeholder="Informe a editora" name="txtEditora" required>
            </div>

            <button type="submit" class="btn-cadastrar" name="btnenviar">Cadastrar</button>
        </form>
        <br>
        <a href="cadastrar.html" class="btn-voltar">Voltar</a>
        <div class="resultado">
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnenviar)) {
                include_once 'Autoria.php';
                $autoria = new Autoria();
                $autoria->setCodigo($txtCodigo);
                $autoria->setCodigoLivro($txtCodigoLivro);
                $autoria->setDataLancamento($txtDataLancamento);
                $autoria->setEditora($txtEditora);

                echo "<h3>" . $autoria->salvar() . "</h3>"; 
            }
            ?>
        </div>
    </div>
</body>
</html>
