<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caixa Eletrônico</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Caixa Eletrônico</h1>
    <section>

      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="valor">Qual valor você deseja sacar? (R$)</label>
        <input type="number" name="valor" id="idvalor" step="5" required>
        <p><small>* Notas disponíveis: R$100, R$50, R$10, R$5</small></p>
        <button type="submit">Calcular</button>
      </form>
    </section>

    <?php 
      $valor = $_GET['valor'] ?? null;

      class conversorMoeda{
        public int $resultado;
        public int $resto; 

        public function transformarParaCem(int $valor) : conversorMoeda {
          
          $this->resultado = floor($valor/ 100);
          $this->resto = $valor % 100 ;

          return $this;
        }

        public function transformarParaCinquenta(int $valor) : conversorMoeda {
          
          $this->resultado = floor($valor / 50);
          $this->resto = $valor % 50;

          return $this;
        }

        public function transformarParaDez(int $valor) : conversorMoeda {
          $this->resultado = floor($valor / 10);
          $this->resto = $valor % 10;
          return $this;
        }

        public function transformarParaCinco(int $valor) : conversorMoeda {
          $this->resultado = floor($valor / 5);
          $this->resto = $valor % 5;
          return $this;
        }
      }



      if($valor !== null ){
        
        $conversorMoeda = new conversorMoeda();
        echo "<section><h2>Saque de R$".number_format($valor, 2, ",", ".")." realizado</h2><p>O caixa eletrônico vai te entregar as seguintes notas: <br><br>"
        .$conversorMoeda->transformarParaCem($valor)->resultado." notas de 100<br>"
        .$conversorMoeda->transformarParaCinquenta($conversorMoeda->resto)->resultado." notas de 50<br>"
        .$conversorMoeda->transformarParaDez($conversorMoeda->resto)->resultado." notas de 10<br>"
        .$conversorMoeda->transformarParaCinco($conversorMoeda->resto)->resultado." notas de 5</section>";

      }
    ?>

  </header>
</body>

</html>