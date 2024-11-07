<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autoria</title>
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
        <h1>Alteração de Autoria Cadastrados</h1>

        <?php
            $txtAutor = $_POST["txtautor"];
            $txtLivro = $_POST["txtlivro"];
            include_once 'Autoria.php';
            $autoria = new Autoria();
            $autoria->setCodigo($txtAutor);
            $autoria->setCodigoLivro($txtLivro);
            $autoria_bd = $autoria-> alterar();
        ?>

        <form name="alterar2" method="POST" action="">
            <?php foreach ($autoria_bd as $autoria_mostrar): ?>  
                <fieldset class="border p-3">

                    <div class="form-group">
                        <label>ID do Autor:</label>
                        <input type="text" name="txtAutor" class="form-control" value="<?php echo $autoria_mostrar[0]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>ID do Livro:</label>
                        <input type="text" name="txtLivro" class="form-control" value="<?php echo $autoria_mostrar[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Data de Lançamento:</label>
                        <input type="text" name="txtdt" class="form-control" value="<?php echo $autoria_mostrar[2]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Editora:</label>
                        <input type="text" name="txteditora" class="form-control" value="<?php echo $autoria_mostrar[3]; ?>" required>
                    </div>
                    <div class="text-center">
                        <button name="btnalterar" type="submit" class="btn btn-primary btn-custom">Alterar</button>
                    </div>

                </fieldset>
            <?php endforeach; ?>

            <?php
               if (isset($_POST['btnalterar'])) {
                    $txtAutor = $_POST["txtAutor"];
                    $txtLivro = $_POST["txtLivro"];
                    $txtdt = $_POST["txtdt"];
                    $txteditora = $_POST["txteditora"];
                    include_once 'Autoria.php';
                    $autoria = new Autoria();
                    $autoria->setCodigo($txtAutor);
                    $autoria->setCodigoLivro($txtLivro);
                    $autoria->setDataLancamento($txtdt);
                    $autoria->setEditora($txteditora);
                    echo "<br><br><h3 class='text-center'>" . $autoria->alterar2() . "</h3>";
                    header("Location: alt_autoria1.php");
                }
            ?>
        </form>
        <a href="index.html" class="btn btn-danger btn-voltar">Voltar</a>
    </div>
</body>
</html>