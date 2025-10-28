<?php

// Permite uma classe usar todas as funções de um conjunto.

trait TraitA {
    public function sayHello() {
        echo 'Hello';
    }
}

class MyHello{
     use TraitA; // Pode usar múltiplos traits, separados com ","
}

$myHello = new MyHello();
$myHello->sayHello();
?>