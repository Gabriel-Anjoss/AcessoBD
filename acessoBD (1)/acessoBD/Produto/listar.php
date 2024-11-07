<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
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
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-voltar {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            color: #fff;
            background-color: #dc3545;
            border: none;
            cursor: pointer;
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
        <h2 class="text-center">Relação de Produtos Cadastrados</h2>

        <?php
        include_once 'Produto.php';
        $p = new Produto();
        $pro_bd = $p->listar();
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estoque</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pro_bd as $pro_mostrar) {
                    ?>
                    <tr>
                        <td><?php echo ($pro_mostrar[0]); ?></td>
                        <td><?php echo ($pro_mostrar[1]); ?></td>
                        <td><?php echo ($pro_mostrar[2]); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <div class="text-center">
            <button class="btn btn-voltar"><a href="menu.html">Voltar</a></button>
        </div>
    </div>
</body>
</html>
