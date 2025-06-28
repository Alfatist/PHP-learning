<!-- Muitos programadores, ao desenvolver aplicações orientadas a objeto, criam um arquivo PHP para 
cada definição de classe. Um dos maiores contratempos é ter de escrever uma longa lista de "includes" 
no início de cada script (um para cada classe).

A função spl_autoload_register() registra qualquer número de autocarregadores, permitindo que classes e interfaces
sejam automaticamente carregadas se elas não ainda não tiverem sido definidas. Ao registrar autocarregadores, o 
PHP tem uma última chance de carregar classes e interfaces antes que falhem com um erro. -->

<!-- O exemplo abaixo tenta carregar as classes MyClass1 e MyClass2 -->

<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// $obj  = new MyClass1();
// $obj2 = new MyClass2(); 
?>