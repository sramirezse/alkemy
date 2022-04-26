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
    protected $cumpleanios = '1995-08-02';
    public function __construct($nombre, $genero, $edad, $cumpleanios) {
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->edad = $edad;
        $this->cumpleanios = $cumpleanios;
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
    public function getCumpleanios(){
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
    public function setCumpleanios($Cumpleanios){
        $this->Cumpleaños = $Cumpleanios;
    }

}


