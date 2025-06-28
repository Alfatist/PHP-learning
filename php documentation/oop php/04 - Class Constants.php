<?php
class MyClass
{
    const CONSTANT = 'constant value';

    function showConstant() {
        echo  self::CONSTANT . "\n";
        
    }
}
?>

<!-- Toda classe tem uma constante especial ::class, que é o nome dela em tempo de compilação  -->
<?php
namespace foo {
    class bar {
    }

    echo bar::class; // foo\bar
}
?>

