<?php
require_once('../Controlador/controladorproducto.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista productos</title>
</head>
<body>
    <a href="../Controlador/controladorproducto.php?vista=registrarproducto.php" >Registrar</a>
    <h1 align="center">productos</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listaproducto as $producto){
                    echo "<tr>";
                    echo "<td>".$producto['idproducto']."</td>";
                    echo "<td>".$producto['nombre']."</td>";
                    echo "<td>$".number_format($producto['precio'],2,",",".")."</td>";
                    echo "<td>
                    <form id='frmproducto$producto[idproducto]' method='post' action='../controlador/controladorproducto.php'>
                        <input type='hidden' name='idproducto' value=".$producto['idproducto']." />
                        <button type='submit' name='Editar'>Editar</button>
                        <input type='hidden' name='Eliminar'/>
                        <button type='button' onclick='validarEliminacion($producto[idproducto])'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";

                }
            ?>
        </tbody>
    </table>
    <script>
    function validarEliminacion(idproducto){
        if(confirm('seguro desea eliminar')){
            document.getElementById('frmproducto'+idproducto).submit();
        }
    }
    </script>
</body>
</html>