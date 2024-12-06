<?php

class Pregunta
{
    private $imagen;
    private $respuesta;
    private $resultado;
    private $categoria;

    public function __construct($imagenes, $categoria){

        $pos_img = array_rand($imagenes[$categoria]);
        $this->categoria = $categoria;
        $this->imagen = $imagenes[$categoria][$pos_img];

    }

    public function getImagen(){
        return "$this->categoria/$this->imagen";
    }
}