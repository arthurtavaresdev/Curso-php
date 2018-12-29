<?php
    class Pessoa{

        public $nome;

        public function falar(){

            return "O meu nome é ".$this -> nome;

        } 

    }


    $arthur = new Pessoa();
    $arthur -> nome = 'Arthur Tavares';
    echo $arthur -> falar();

?>