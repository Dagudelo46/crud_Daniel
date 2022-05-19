
<?php
require_once('../Controlador/controladorCategoria.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">producto</h1>
    <form action="../Controlador/controladorproducto.php" method="POST">
        <label>categoria</label>
        <select name="idCategoria" id="idCategoria">
            <option value="">seleccione</option>
            <?php
             foreach($listaCategoria as $categoria){
                 echo "<option value=$categoria[idCategoria]>
                 $categoria[nombre]
                 
                 </option>";
             }

            ?>

        </select>
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" />
        <br>
        <label>precio:</label>
        <input type="text" name="precio" id="precio" />
        <br>
        <label>estado:</label>
        <input type="text" name="estado" id="estado" />
        <button type="submit" name="Registrar">Registrar</button>
    </form>
</body>
</html>