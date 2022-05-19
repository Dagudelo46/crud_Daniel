<?php
require_once('../Controlador/controladorCategoria.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Categorias</title>
</head>
<body>
    <a href="../Controlador/controladorCategoria.php?vista=registrarCategoria.html" >Registrar</a>
    <h1 align="center">Categorías</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listaCategoria as $categoria){
                    echo "<tr>";
                    echo "<td>".$categoria['idCategoria']."</td>";
                    echo "<td>".$categoria['nombre']."</td>";
                    echo "<td>
                    <form id='frmcategoria$categoria[idCategoria]' method='post' action='../controlador/controladorcategoria.php'>
                        <input type='hidden' name='idcategoria' value=".$categoria['idCategoria']." />
                        <button type='submit' name='Editar'>Editar</button>
                        <input type='hidden' name='Eliminar'/>
                        <button type='button' onclick='validarEliminacion($categoria[idCategoria])'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";

                }
            ?>
        </tbody>
    </table>
    <script>
    function validarEliminacion(idcategoria){
        if(confirm('seguro desea eliminar')){
            document.getElementById('frmcategoria'+idcategoria).submit();
        }
    }
    </script>
</body>
</html>