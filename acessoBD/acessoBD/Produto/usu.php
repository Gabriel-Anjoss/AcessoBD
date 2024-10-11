<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script language=javascript>
    function blockletras (keypress)
    {
        // campo senha - bloqueia letras
        if(keypress>=48 && keypress<=57)
            {
                 return true;
            }
        else
        {
            return false;
        }
    }
</script>
</head>
<style>

</style>

<body>
    <?php
    extract ($_POST, EXTR_OVERWRITE);
    if(isset($btnconsultar))
    {
        include_once 'usuario.php';
        $u = new Usuario ();
        $u->setUsu ($txtnome);
        $u->setSenha($txtSenha);
        $pro_bd=$u->logar();

        $existe = false;
        foreach($pro)
    }
    ?>
</body>
</html>