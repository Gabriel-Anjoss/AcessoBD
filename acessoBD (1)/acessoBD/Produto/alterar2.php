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
            include_once 'Produto.php';
            $p = new Produto();
            $p->setId($txtid);
            $pro_bd = $p->alterar();
        ?>

        <form name="cliente2" method="POST" action="">
            <?php foreach ($pro_bd as $pro_mostrar): ?>  
                <fieldset class="border p-3">
                    
                    <input type="hidden" name="txtid" value="<?php echo $pro_mostrar[0]; ?>">
                    <div class="form-group">
                        <label>ID:</label>
                        <b><?php echo $pro_mostrar[0]; ?></b>
                    </div>
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="txtnome" class="form-control" value="<?php echo $pro_mostrar[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Estoque:</label>
                        <input type="text" name="txtestoq" class="form-control" value="<?php echo $pro_mostrar[2]; ?>" required>
                    </div>
                    <div class="text-center">
                        <button name="btnalterar" type="submit" class="btn btn-primary btn-custom">Alterar</button>
                    </div>
                </fieldset>
            <?php endforeach; ?>

            <?php
                if (isset($_POST['btnalterar'])) {
                    include_once 'Produto.php';
                    $pro = new Produto();
                    $pro->setNome($_POST['txtnome']);
                    $pro->setEstoque($_POST['txtestoq']);
                    $pro->setId($_POST['txtid']);
                    echo "<br><br><h3 class='text-center'>" . $pro->alterar2() . "</h3>";
                    header("Location: alterar1.php");
                }
            ?>
        </form>

        <a href="index.html" class="btn btn-danger btn-voltar">Voltar</a>
    </div>
</body>
</html>