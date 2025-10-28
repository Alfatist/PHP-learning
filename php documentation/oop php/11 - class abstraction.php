<?php

abstract class AbstractClass
{
    // Funções para serem implementadas
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // Métodos comuns
    public function printOut()
    {
        print $this->getValue() . "\n";
    }
}




class ConcreteClass1 extends AbstractClass
{
    protected function getValue()
    {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass1";
    }
}



class ConcreteClass2 extends AbstractClass
{
    public function getValue()
    {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass2";
    }
}


/* Chamadas de função */


$class1 = new ConcreteClass1();
$class1->printOut();
echo $class1->prefixValue('FOO_'), "\n";

$class2 = new ConcreteClass2();
$class2->printOut();
echo $class2->prefixValue('FOO_'), "\n";

?>



<!-- Também tem como definir atributos abstratos: -->

<?php
abstract class A {
    /** atributo [$readable] deve ter um get explícito  */
    abstract public string $readable {
        get;
    }

    /** atributo [$writeable] deve ter um set explícito  */
    abstract protected string $writeable {
        set;
    }

    /** atributo [$both] deve ter um get e um set explícito  */
    abstract protected string $both {
        get;
        set;
    }
}
?>