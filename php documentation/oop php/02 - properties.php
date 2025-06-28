<!-- Exemplos de declaração de propriedades -->
<?php
class SimpleClass
{
   public ?string $var1 = 'hello ' . 'world'; // Somente string, pode ser null
   public $var2 = <<<EOD
hello world
EOD;
   public $var3 = 1+2;
   // invalid property declarations:
   // public $var4 = self::myStaticMethod();
   // public $var5 = $myVar;

   // valid property declarations:
   // public $var6 = minhaConstante;
   public $var7 = [true, false];

   public $var8 = <<<'EOD'
hello world
EOD;

   // Sem modificador de visibilidade (neste caso, é public por padrão):
   static $var9;
   readonly int $var10; // Propriedade somente leitura, deve ser inicializada no construtor. 

   // Incorreto:
   // readonly int $var11 = 42; //  Propriedade somente leitura não pode ter valor padrão
}
?>