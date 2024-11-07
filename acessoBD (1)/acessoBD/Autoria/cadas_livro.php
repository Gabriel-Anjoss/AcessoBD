<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
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
        <h2>Cadastrar Livro</h2>
        <form name="Livro" method="POST" action="">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" placeholder="Informe o Título do livro" name="txttitulo" required>
            </div>

            <div class="form-group">
                <label for="Categoria">Categoria</label>
                <input type="text" class="form-control" id="Categoria" placeholder="Informe a Categoria do livro" name="txtcategoria" required>
            </div>

            <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" class="form-control" id="ISBN" placeholder="Informe o ISBN" name="txtisbn" required>
            </div>

            <div class="form-group">
                <label for="Idioma">Idioma</label>
                <input type="text" class="form-control" id="Idioma" placeholder="Informe o Idioma do livro" name="txtidioma" required>
            </div>

            <div class="form-group">
                <label for="QtdPaginas">Qtd Páginas</label>
                <input type="number" class="form-control" id="QtdPaginas" placeholder="Informe a quantidade de páginas do livro" name="txtpaginas" required>
            </div>

            <button type="submit" class="btn-cadastrar" name="btnenviar">Cadastrar</button>
        </form>
        <br>
        <a href="cadastrar.html" class="btn-voltar">Voltar</a>
        <div class="resultado">
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnenviar)) {
                include_once 'Livro.php';
                $livro = new Livro();
                $livro->setTitulo($txttitulo);
                $livro->setCategoria($txtcategoria);
                $livro->setISBN($txtisbn);
                $livro->setIdioma($txtidioma);
                $livro->setPaginas($txtpaginas);
                echo "<h3>" . $livro->salvar() . "</h3>"; 
            }
            ?>
        </div>
    </div>
</body>
</html>
