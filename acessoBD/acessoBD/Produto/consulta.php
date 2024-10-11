<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Produtos Cadastrados</title>
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
        .btn-consultar, .btn-limpar, .btn-voltar {
            margin-top: 10px;
        }
        .btn-consultar {
            background-color: #007bff;
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
        .resultado {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #e9ecef;
            max-height: 300px; 
            overflow-y: auto; 
        }
        .alert {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Consulta de Produtos Cadastrados</h2>
        <form id="consultaForm" method="POST" action="">
            <div class="form-group">
                <label for="produto">Informe o produto que deseja:</label>
                <input type="text" class="form-control" id="produto" placeholder="Nome do produto" name="produto" required>
            </div>
            <button type="submit" class="btn btn-consultar" name="btnConsultar">Consultar</button>
            <button type="reset" class="btn btn-limpar">Limpar</button>
        </form>
        <div class="resultado">
    <?php
if (isset($_POST['btnConsultar'])) {
    include_once 'Produto.php';
    $produto = $_POST['produto'];
    $p = new Produto();
    $p->setNome($produto . '%');
    $pro_bd = $p->consultar();

    if ($pro_bd) {
        foreach ($pro_bd as $pro_mostrar) {
            echo "<div>
                    <p>ID: " . $pro_mostrar[0] . "</p>
                    <p>Nome: " . $pro_mostrar[1] . "</p>
                    <p>Estoque: " . $pro_mostrar[2] . "</p>
                    <hr>
                  </div>";
        }
    } else {
        echo "<p>Nenhum produto encontrado.</p>";
    }
}
?>

</div>
        <button class="btn btn-voltar"><a href="index.html">Voltar</a></button>
    </div>
</body>
</html>
