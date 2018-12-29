<?php
    interface Veiculo{
        public function acelerar($velocidade);
        public function frenar($velocidade);
        public function trocarMarcha($marcha);
    }

    class Civic implements Veiculo{
        public function acelerar($velocidade):int{
            echo 'O veiculo acelerou até ' . $velocidade . ' km/h';
        }
        public function frenar($velocidade):int{
            echo 'O veiculo frenou até ' . $velocidade . ' km/h';
        }
        public function trocarMarcha($marcha):int{
            echo 'O veiculo engatou  a ' . $marcha . ' marcha.';
        }

    }

    $carro = new Civic();
    $carro -> trocarMarcha(1);

?>