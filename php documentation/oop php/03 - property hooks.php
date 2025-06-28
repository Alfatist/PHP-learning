<!-- Ganchos de Propriedade: substituir o corportamento de leitura e gravação de uma propriedade, sem necessariamente getter and setter -->
<!-- SOMENTE A PARTIR DA VERSÃO 8.4 -->

<?php
class Exemplo {
    private bool $modificado = false;

    public string $foo = 'valor padrão' {
        get {
            if ($this->modificado) {
                return $this->foo . ' (modificado)';
            }
            return $this->foo;
        }
        set(string $value) {
            $this->foo = strtolower($value);
            $this->modificado = true;
        }
    }
}

$exemplo = new Exemplo();
$exemplo->foo = 'ALTERADO';
print $exemplo->foo;
?>

<!-- No set, se o tipo do parâmetro for igual a da variável, os parâmetros podem ser omitidos e o valor se torna $value automaticamente-->
<?php
class Example
{
    private bool $modified = false;

    public string $foo = 'default value' {
        get => $this->foo . ($this->modified ? ' (modified)' : '');

        set { // perceba que, não tenho mais (string $value) pois os dois são da mesma string, e o $value é o padrão ao pegar uma variável
            $this->foo = strtolower($value);
            $this->modified = true;
        }
    }
}
?>


<!-- Os hooks podem ser somente arrow function. Perceba que eu sequer preciso indicar a variável. -->

<?php
class Ejemplo{
    public string $foo = 'valor predeterminado' {
        set => strtolower($value); // Perceba que não é equivalente ao anterior, visto que não modifico mais a variável modified.
    }
}
$ejemplo = new Ejemplo();
$ejemplo->foo = 'MODIFICADO';
print $ejemplo->foo;

?>

<!-- Um fato curioso: se o set for omitido mas o get não, ele se torna read-only. -->


<!-- O valor que vai ser lido depende também da função. Abaixo, alguma das funções e o valor que ela lê:
 
var_dump(): Use raw value
serialize(): Use raw value
unserialize(): Use raw value
__serialize()/__unserialize(): Custom logic, uses get/set hook
Array casting: Use raw value
var_export(): Use get hook
json_encode(): Use get hook
JsonSerializable: Custom logic, uses get hook
get_object_vars(): Use get hook
get_mangled_object_vars(): Use raw value

-->