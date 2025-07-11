<!-- php permite que você deixe o get e o set com visibilidades diferentes -->

<?php
class DifferentVisibilityForGetAndSet
{
    public function __construct(
        public private(set) string $title,
        public protected(set) string $author,
        protected private(set) int $pubYear,
    ) {}
}
?>


<!-- Objetos do mesmo tipo terão acesso para o outro -->
<?php
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz(Test $other)
    {
        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}

$test = new Test('test');

$test->baz(new Test('other'));
?>