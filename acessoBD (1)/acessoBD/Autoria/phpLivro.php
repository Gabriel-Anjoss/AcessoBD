<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
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
            max-width: 900px;
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
            padding: 12px 15px;
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
        <h2 class="text-center">Relação de Livros</h2>

        <?php
        include_once 'Livro.php';
        $a = new Livro();
        $bd = $a->listar();
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código Livro</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>ISBN</th>
                    <th>Idioma</th>
                    <th>Qtd Páginas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($bd as $show) {
                ?>
                    <tr>
                        <td><?php echo $show[0]; ?></td>
                        <td><?php echo $show[1]; ?></td>
                        <td><?php echo $show[2]; ?></td>
                        <td><?php echo $show[3]; ?></td>
                        <td><?php echo $show[4]; ?></td>
                        <td><?php echo $show[5]; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <div class="text-center">
            <button class="btn btn-voltar"><a href="listar.html">Voltar</a></button>
        </div>
    </div>
</body>
</html>
