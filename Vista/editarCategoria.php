<?php
require_once('../controlador/controladorcategoria.php');
$categoria = $controladorCategoria->buscarcategoria($_REQUEST['idcategoria']);
//var_dump ($categoria);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center>
    <form action="../Controlador/controladorCategoria.php" method="POST">
        <label>Id:</label>
        <input type="number" name="idCategoria" id="idCategoria" value="<?php echo $categoria->getidCategoria(); ?>" />
        <br><br>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $categoria->getnombre(); ?>" />
        <br><br>
        <button type="submit" name="Actualizar">Actualizar</button>
    </form>
    </center>
</body>
</html>