<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Livro</title>
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
        <h1>Alteração de Livros Cadastrados</h1>

        <?php
            $txtid = $_POST["txtID"];
            include_once 'Livro.php';
            $livro = new Livro();
            $livro->setCodigo($txtid);
            $livro_bd = $livro-> alterar();
        ?>

        <form name="alterar2" method="POST" action="">
            <?php foreach ($livro_bd as $livro_mostrar): ?>  
                <fieldset class="border p-3">
                    
                    <input type="hidden" name="txtid" value="<?php echo $livro_mostrar[0]; ?>">
                    <div class="form-group">
                        <label>ID:</label>
                        <b><?php echo $livro_mostrar[0]; ?></b>
                    </div>
                    <div class="form-group">
                        <label>Titulo:</label>
                        <input type="text" name="txttit" class="form-control" value="<?php echo $livro_mostrar[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Categoria:</label>
                        <input type="text" name="txtcat" class="form-control" value="<?php echo $livro_mostrar[2]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>ISBN:</label>
                        <input type="text" name="txtisbn" class="form-control" value="<?php echo $livro_mostrar[3]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Idioma:</label>
                        <input type="text" name="txtidioma" class="form-control" value="<?php echo $livro_mostrar[4]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Paginas:</label>
                        <input type="text" name="txtpag" class="form-control" value="<?php echo $livro_mostrar[5]; ?>" required>
                    </div>
                    <div class="text-center">
                        <button name="btnalterar" type="submit" class="btn btn-primary btn-custom">Alterar</button>
                    </div>
                </fieldset>
            <?php endforeach; ?>

            <?php
               if (isset($_POST['btnalterar'])) {
                    $txtid = $_POST["txtID"];
                    include_once 'Livro.php';
                    $livro = new Livro();
                    $livro->setTitulo($_POST['txttit']);
                    $livro->setCategoria($_POST['txtcat']);
                    $livro->setISBN($_POST['txtisbn']);
                    $livro->setIdioma($_POST['txtidioma']);
                    $livro->setPaginas($_POST['txtpag']);
                    $livro->setCodigo($_POST['txtid']);
                    echo "<br><br><h3 class='text-center'>" . $livro->alterar2() . "</h3>";
                    header("Location: alt_livro1.php");
                }
            ?>
        </form>

        <a href="index.html" class="btn btn-danger btn-voltar">Voltar</a>
    </div>
</body>
</html>