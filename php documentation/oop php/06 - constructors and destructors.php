<?php
class BaseClass {
    function __construct() {
        print "In BaseClass constructor\n";
    }
}

$obj = new BaseClass; // Perceba que não preciso abrir parêntesis, visto que meu construtor não tem argumentos. Também é válido para classes que não possuam construtor.

class ClassWithArguments extends BaseClass{
    protected int $x;
    protected int $y;

    public function __construct(int $x, int $y = 0) {
        $this->x = $x;
        $this->y = $y;
        parent::__construct();
    }
}

$p1 = new ClassWithArguments(4);
?>

<!-- A classe acima poderia ser convertida para esta: -->

<?php
class ClassWithArgumentsSimplified extends BaseClass{
    public function __construct(protected int $x, protected int $y = 0) {
      parent::__construct();
    }
}

?>

<!-- A documentação diz que, se você precisar usar construtores diferentes para dados diferentes, 
 para manter o construtor privado e utilizar construtores estáticos, como a seguir:  -->

<?php
$some_json_string = '{ "id": 1004, "name": "Elephpant" }';
$some_xml_string = "<animal><id>1005</id><name>Elephpant</name></animal>";

class Product {

    private ?int $id;
    private ?string $name;

    private function __construct(?int $id = null, ?string $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromBasicData(int $id, string $name): static {
        $new = new static($id, $name);
        return $new;
    }

    public static function fromJson(string $json): static {
        $data = json_decode($json, true);
        return new static($data['id'], $data['name']);
    }

    public static function fromXml(string $xml): static {
        $data = simplexml_load_string($xml);
        $new = new static();
        $new->id = (int) $data->id;
        $new->name = $data->name;
        return $new;
    }
}

$p1 = Product::fromBasicData(5, 'Widget');
$p2 = Product::fromJson($some_json_string);
$p3 = Product::fromXml($some_xml_string);

var_dump($p1, $p2, $p3);

?>


<!-- DESTRUTOR -->

<?php

class MyDestructableClass 
{
    function __construct() {
        print "In constructor\n";
    }

    function __destruct() {
        print "Destroying " . __CLASS__ . "\n";
    }
}

$obj = new MyDestructableClass();


class MyDestructableClassEvolved extends MyDestructableClass{
  function __construct(){
    print "Constructing\n";
  }

  function __destruct()
  {
    print "Destroying!";
    print "...";
    print "...";
    print "Hey, I remembered! I need to call the parent destruct to call him. Wait!";
    parent::__destruct();
    print "Now I can die in peace. Bye :)";
  }
}

$obj2 = new MyDestructableClassEvolved();

die;
?>