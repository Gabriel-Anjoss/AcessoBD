<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produtos</title>
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
        <h1>Alteração de Produtos Cadastrados</h1>

        <?php
            $txtid = $_POST["txtID"];
            include_once 'Autor.php';
            $au = new Autor();
            $au->setCodigo($txtid);
            $a_bd = $au-> alterar();
        ?>

        <form name="alterar2" method="POST" action="">
            <?php foreach ($a_bd as $a_mostrar): ?>  
                <fieldset class="border p-3">
                    
                    <input type="hidden" name="txtid" value="<?php echo $a_mostrar[0]; ?>">
                    <div class="form-group">
                        <label>ID:</label>
                        <b><?php echo $a_mostrar[0]; ?></b>
                    </div>
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="txtnome" class="form-control" value="<?php echo $a_mostrar[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Sobrenome:</label>
                        <input type="text" name="txtsobre" class="form-control" value="<?php echo $a_mostrar[2]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="txtemail" class="form-control" value="<?php echo $a_mostrar[3]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nascimento:</label>
                        <input type="text" name="txtnasc" class="form-control" value="<?php echo $a_mostrar[4]; ?>" required>
                    </div>
                    <div class="text-center">
                        <button name="btnalterar" type="submit" class="btn btn-primary btn-custom">Alterar</button>
                    </div>
                </fieldset>
            <?php endforeach; ?>

            <?php
                if (isset($_POST['btnalterar'])) {
                    include_once 'Autor.php';
                    $a = new Autor();
                    $a ->setNome($_POST['txtnome']);
                    $a->setSobrenome($_POST['txtsobre']);
                    $a->setEmail($_POST['txtemail']);
                    $a->setNasc($_POST['txtnasc']);
                    $a->setCodigo($_POST['txtid']);
                    echo "<br><br><h3 class='text-center'>" . $a ->alterar2() . "</h3>";
                    header("Location: alt_autor1.php");
                }
            ?>
        </form>

        <a href="index.html" class="btn btn-danger btn-voltar">Voltar</a>
    </div>
</body>
</html>