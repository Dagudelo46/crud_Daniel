<?php
require_once('../Modelo/Categoria.php');//Incluir el modelo Categoria
require_once('../Modelo/crudCategoria.php');//Incluir el CRUD.
class controladorCategoria{
    //Crear el constructor
      
    public function __construct(){
       //$categoria = new Categoria(); //Instanciar un objeto categoria
       //$crudCategoria = new crudCategoria();//Instanciar crudCategoria
    }

    public function listarCategoria(){
       //Llamar el método listarCategoria del crudCategoria.
       $crudCategoria = new crudCategoria();//Instanciar crudCategoria
       $listaCategoria = $crudCategoria->listarCategoria();//Listado de categorias
       return $listaCategoria;
    }

    ////Recibe los valores del formulario, crea un objeto y envía la petición al CRUD
    public function registrarCategoria($e_nombre){
      //Instanciación del objeto categoria
      $categoria = new Categoria();//Crear un objeto del tipo categoria
      $categoria->setidCategoria('');//Asignar el valor del formulario al objeto
      $categoria->setnombre($e_nombre);//Asignar el valor del formulario
    
      //Solicitar al crudCategoria realice la inserción
      $crudCategoria = new crudCategoria();
      $mensaje = $crudCategoria->registrarCategoria($categoria);
      //imprimir el mensaje del resultado de la insercion con jscript
      echo "
      <script>
          alert('$mensaje');
          document.location.href='../Vista/listarcategoria.php';

      </script>
      ";

   }

   public function buscarcategoria($e_idcategoria){
      $categoria = new Categoria ();
      $categoria->setidcategoria($e_idcategoria);

      $crudCategoria = new crudCategoria();//definir un objetvo
      $datosCategoria = $crudCategoria->buscarcategoria($categoria);//llamar el metodo del crud
      
      //var_dump($datosCategoria);
      $categoria->setnombre($datosCategoria['nombre']);
      return $categoria;
      
   }
   public function actualizarcategoria($e_idcategoria,$e_nombre){
        //Instanciación del objeto categoria
        $categoria = new Categoria();//Crear un objeto del tipo categoria
        $categoria->setidCategoria($e_idcategoria);//Asignar el valor del formulario al objeto
        $categoria->setnombre($e_nombre);//Asignar el valor del formulario
      
        //Solicitar al crudCategoria realice la actalizacion
        $crudCategoria = new crudCategoria();
        $crudCategoria->actualizarCategoria($categoria);

   }
   public function eliminarcategoria($e_idcategoria){
      //Instanciación del objeto categoria
      $categoria = new Categoria();//Crear un objeto del tipo categoria
      $categoria->setidCategoria($e_idcategoria);//Asignar el valor del formulario al objeto
      $categoria->setnombre('');//Asignar el valor del formulario
    
      //Solicitar al crudCategoria realice la actalizacion
      $crudCategoria = new crudCategoria();
      $crudCategoria->eliminarCategoria($categoria);

 }

   public function desplegarvista($pagina){
      //redireccionar hacia una vista 
      header ("location:../Vista/".$pagina);

   }

}

//Probar el Controlador
$controladorCategoria = new controladorCategoria();
$listaCategoria = $controladorCategoria->listarCategoria();//Verificar si se devuelven datos

//Verificar la acción a realizar.
if(isset($_POST['Registrar'])){//isset: Establer si una variable existe
   //echo "Registrando";
   //Capturar los datos enviados desde el formulario
   $e_nombre = $_POST['nombre']; //Captura del nombre digitado en la caja de texto

   //Hacer la petición al controlador
   $controladorCategoria->registrarCategoria($e_nombre);
}

else if (isset($_POST['Editar'])){
   $e_idcategoria = $_POST['idcategoria'];//recibo variable del formulario
   
   $controladorCategoria->desplegarvista("editarcategoria.php?idcategoria=$e_idcategoria");
}

else if (isset($_REQUEST['Actualizar'])){
   //capturar valores enviados desde la vista
   $e_idcategoria = $_REQUEST['idCategoria'];
   $e_nombre = $_REQUEST['nombre'];

   $controladorCategoria->actualizarcategoria($e_idcategoria,$e_nombre);


}
else if (isset($_REQUEST['Eliminar'])){
   //capturar valores enviados desde la vista
   $e_idcategoria = $_REQUEST['idcategoria'];
   

   $controladorCategoria->eliminarcategoria($e_idcategoria);
}

else if (isset($_REQUEST['vista'])){
   $controladorCategoria->desplegarvista($_REQUEST['vista']);
}
//Probar en el navegador

//Probar la creación de objetos
//crear o instanciar 1 objeto de la clase Categoria.


/*
$categoria1 = new Categoria();

var_dump($categoria1);
$categoria1->setidCategoria($_POST['id']);
$categoria1->setnombre($_POST['nombre']);
//var_dump($categoria1);
echo "<br>";
echo "El id de la categoria es: ".$categoria1->getidCategoria();
echo "<br>";
echo "El nombre de la categoria es: ".$categoria1->getnombre();

*/
?>