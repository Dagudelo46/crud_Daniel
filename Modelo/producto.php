<?php
class producto{
    //definir los atributos
    private $idproducto;
    private $idcategoria;
    private $nombre;
    private $precio;
    private $estado;

    public function __construct(){

    }

    public function  setidproducto($e_idproducto){
        $this->idproducto = $e_idproducto;

    }

    public function setidcategoria($e_idcategoria){
        $this->idcategoria = $e_idcategoria;

    }

    public function setnombre($e_nombre){
        $this->nombre = $e_nombre;

    }

    public function setprecio($e_precio){
        $this->precio = $e_precio;
    
    }

    public function setestado($e_estado){
        $this->estado = $e_estado;
    }

    public function getidproducto(){
        return $this->idproducto;

    }
    public function getidcategoria(){
        return $this->idcategoria;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function getprecio(){
        return $this->precio;
    }
    public function getestado(){
        return $this->estado;
    }


}



?>