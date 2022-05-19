<?php
require_once('../Modelo/producto.php');//Incluir el modelo producto
require_once('../Modelo/crudproducto.php');//Incluir el CRUD.
class controladorproducto{
    //Crear el constructor

    public function __construct(){
       //$producto = new producto(); //Instanciar un objeto producto
       //$crudproducto = new crudproducto();//Instanciar crudproducto
    }

    public function listarproducto(){
       //Llamar el método listarproducto del crudproducto.
       $crudproducto = new crudproducto();//Instanciar crudproducto
       $listaproducto = $crudproducto->listarproducto();//Listado de productos
       return $listaproducto;
    }

    ////Recibe los valores del formulario, crea un objeto y envía la petición al CRUD
    public function registrarproducto($e_idCategoria,$e_nombre,$e_precio,$e_estado){
      //Instanciación del objeto producto
      $producto = new producto();//Crear un objeto del tipo producto
      $producto->setidproducto('');//Asignar el valor del formulario al objeto
      $producto->setidCategoria($e_idCategoria);
      $producto->setnombre($e_nombre);//Asignar el valor del formulario
      $producto->setprecio($e_precio);
      $producto->setestado($e_estado);
    
      //Solicitar al crudproducto realice la inserción
      $crudproducto = new crudproducto();
      $mensaje = $crudproducto->registrarproducto($producto);
      //imprimir el mensaje del resultado de la insercion con jscript
      echo "
      <script>
          alert('$mensaje');
          document.location.href='../Vista/listarproducto.php';

      </script>
      ";

   }

   public function buscarproducto($e_idproducto){
      $producto = new producto ();
      $producto->setidproducto($e_idproducto);

      $crudproducto = new crudproducto();//definir un objetvo
      $datosproducto = $crudproducto->buscarproducto($producto);//llamar el metodo del crud
      
      //var_dump($datosproducto);
      $producto->setnombre($datosproducto['nombre']);
      return $producto;
      
   }
   public function actualizarproducto($e_idproducto,$e_nombre){
        //Instanciación del objeto producto
        $producto = new producto();//Crear un objeto del tipo producto
        $producto->setidproducto($e_idproducto);//Asignar el valor del formulario al objeto
        $producto->setnombre($e_nombre);//Asignar el valor del formulario
      
        //Solicitar al crudproducto realice la actalizacion
        $crudproducto = new crudproducto();
        $crudproducto->actualizarproducto($producto);

   }
   public function eliminarproducto($e_idproducto){
      //Instanciación del objeto producto
      $producto = new producto();//Crear un objeto del tipo producto
      $producto->setidproducto($e_idproducto);//Asignar el valor del formulario al objeto
      $producto->setnombre('');//Asignar el valor del formulario
    
      //Solicitar al crudproducto realice la actalizacion
      $crudproducto = new crudproducto();
      $crudproducto->eliminarproducto($producto);

 }

   public function desplegarvista($pagina){
      //redireccionar hacia una vista 
      header ("location:../Vista/".$pagina);

   }

}

//Probar el Controlador
$controladorproducto = new controladorproducto();
$listaproducto = $controladorproducto->listarproducto();//Verificar si se devuelven datos

//Verificar la acción a realizar.
if(isset($_POST['Registrar'])){//isset: Establer si una variable existe
   //echo "Registrando";
   //Capturar los datos enviados desde el formulario
   $e_idCategoria = $_POST['idCategoria'];
   $e_nombre = $_POST['nombre'];
   $e_precio = $_POST['precio'];
   $e_estado = $_POST['estado'];
   //Captura del nombre digitado en la caja de texto

   //Hacer la petición al controlador
   $controladorproducto->registrarproducto($e_idCategoria,$e_nombre,$e_precio,$e_estado);
}

else if (isset($_POST['Editar'])){
   $e_idproducto = $_POST['idproducto'];//recibo variable del formulario
   
   $controladorproducto->desplegarvista("editarproducto.php?idproducto=$e_idproducto");
}

else if (isset($_REQUEST['Actualizar'])){
   //capturar valores enviados desde la vista
   $e_idproducto = $_REQUEST['idproducto'];
   $e_nombre = $_REQUEST['nombre'];

   $controladorproducto->actualizarproducto($e_idproducto,$e_nombre);


}
else if (isset($_REQUEST['Eliminar'])){
   //capturar valores enviados desde la vista
   $e_idproducto = $_REQUEST['idproducto'];
   

   $controladorproducto->eliminarproducto($e_idproducto);
}

else if (isset($_REQUEST['vista'])){
   $controladorproducto->desplegarvista($_REQUEST['vista']);
}
//Probar en el navegador

//Probar la creación de objetos
//crear o instanciar 1 objeto de la clase producto.


/*
$producto1 = new producto();

var_dump($producto1);
$producto1->setidproducto($_POST['id']);
$producto1->setnombre($_POST['nombre']);
//var_dump($producto1);
echo "<br>";
echo "El id de la producto es: ".$producto1->getidproducto();
echo "<br>";
echo "El nombre de la producto es: ".$producto1->getnombre();

*/
?>