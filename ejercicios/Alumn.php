<?php

class Person{
    protected $genero = 'Mujer';
    public function getGenero(){
        return $this->genero;
    }
}
class Alumn extends Person {
    protected $nombre = 'Gerardo';
    protected $genero = 'Hombre';
    protected $edad = '26';
    protected $Cumpleaños = '1995-08-02';
    public function __construct($nombre, $genero, $edad, $cumpleaños) {
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->edad = $edad;
        $this->cumpleaños = $cumpleaños;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getGenero(){
        return Person::getGenero();
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getCumpleaños(){
        return $this->Cumpleaños;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setGenero($genero){
        $this->genero = $genero;
    }
    public function setEdad($edad){
        $this->edad = $edad;
    }
    public function setCumpleaños($Cumpleaños){
        $this->Cumpleaños = $Cumpleaños;
    }

}


