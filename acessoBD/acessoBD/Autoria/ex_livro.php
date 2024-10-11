<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
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
        .btn-excluir, .btn-limpar, .btn-voltar {
            margin-top: 10px;
        }
        .btn-excluir {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-limpar {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-voltar {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-voltar a {
            color: #fff;
            text-decoration: none;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Excluir Livro</h2>
        <form id="excluirForm" method="POST" action="">
            <div class="form-group">
                <label for="autor">Informe o ID do Livro que deseja excluir:</label>
                
                <input type="text" class="form-control"  placeholder="ID do Livro" name="tLivro"  required>
            </div>
            <button type="submit" class="btn btn-excluir" name="btnExcluir">Excluir</button>
            <button type="reset" class="btn btn-limpar">Limpar</button>
        </form>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnExcluir)) {
            include_once 'Livro.php';
            $livro = new Livro();
            $livro->setCodigo($tLivro);
            echo "<h3><br><br>" . $livro->exclusao() . "</h3>";
        }
        ?>

        <div class="text-center">
            <button class="btn btn-voltar"><a href="index.html">Voltar</a></button>
        </div>
    </div>
</body>
</html>
