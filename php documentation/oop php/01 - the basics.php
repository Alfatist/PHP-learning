<!-- Declaração de classe:  -->
<?php
class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    static int $valor = 5;

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}
?>

<!-- Instanciação de classe: -->
<?php
$instance = new SimpleClass();
var_dump($instance); // SimpleClass object
$instance->displayVar(); // Operador -> acessa a propriedade ou método de um objeto
?>

<!-- instanciação de classe por string  -->

<?php 
$className = 'SimpleClass';
$instanceString = new $className();
var_dump($instanceString); // SimpleClass object
?>


<!-- Instanciação por referência -->
<?php 
$assigned = $instance; // $assigned referencia ao mesmo objeto
$reference =& $instance;

$instance->var = '$assigned will have this value';
$instance = null; // $instance agora referencia null, porém $assigned não

var_dump($instance); // null
var_dump($reference); // null, pois referencia o $instance
var_dump($assigned); // SimpleClass com var == '$assigned will have this value', pois o objeto anterior continua existindo
?>


<!-- Funções e propriedades podem ter o mesmo nome -->
<?php 
 class Foo
{
    public $bar = 'property';

    public function bar() {
        return 'method';
    }
}

$obj = new Foo();
echo $obj->bar, PHP_EOL; // property

// Isso referencia o método
$method = [$obj, 'bar'];
echo $method(), PHP_EOL; // method
?>


<!-- Override -->

<?php 
class SimpleClass2 extends SimpleClass{
  /// override
  public function displayVar() {
        echo $this->var." evolved";
    }
}

$extended = new SimpleClass2();
$extended->displayVar();

// Importante: seguindo o SOLID, o override sempre deve estar aberto a extensões, nunca a restrições.
?>


<!-- nullsafe (o "?" do javascript) -->
<?php 
// As of PHP 8.0.0, this line:
$result = $repository?->getUser(5)?->name;  // Caso um destes for nulo, retorna nulo no lugar de erro.

// Is equivalent to the following code block:
if (is_null($repository)) {
    $result = null;
} else {
    $user = $repository->getUser(5);
    if (is_null($user)) {
        $result = null;
    } else {
        $result = $user->name;
    }
}
?>