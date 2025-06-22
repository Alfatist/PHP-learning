<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de tempo</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Calculadora de tempo</h1>
    <section>

      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="segundos">Qual é o total de segundos?</label>
        <input type="number" name="segundos" id="idsegundos" step="any" required>
        <button type="submit">Calcular</button>
      </form>
    </section>

    <?php 
      $segundos = $_GET['segundos'] ?? null;

      class conversorTempo{
        public int $resultado;
        public int $resto; 

        public function transformarSegundosParaSemana(int $segundos) : conversorTempo {
          $segundosPorSemana = 7*24*60*60;
          $this->resultado = floor($segundos/ $segundosPorSemana);
          $this->resto = $segundos % $segundosPorSemana ;

          return $this;
        }

        public function transformarSegundosParaDias(int $segundos) : conversorTempo {
          $segundosPorDias = 24*60*60;
          $this->resultado = floor($segundos / $segundosPorDias);
          $this->resto = $segundos % $segundosPorDias;

          return $this;
        }

        public function transformarSegundosParaHoras(int $segundos) : conversorTempo {
          $segundosPorHoras = 60*60;
          $this->resultado = floor($segundos / $segundosPorHoras);
          $this->resto = $segundos % $segundosPorHoras;
          return $this;
        }

        public function transformarSegundosParaMinutos(int $segundos) : conversorTempo {
          $segundosPorMinutos = 60;
          $this->resultado = floor($segundos / $segundosPorMinutos);
          $this->resto = $segundos % $segundosPorMinutos;
          return $this;
        }
      }



      if($segundos !== null ){
        
        $conversorTempo = new conversorTempo();
        echo "<section><h2>Totalizando tudo</h2><p>Analisando o valor que você digitou, <strong>".number_format($segundos, 0, ",", ".")." segundos </strong> equivalem a um total de: <br><br>"
        .$conversorTempo->transformarSegundosParaSemana($segundos)->resultado." semanas<br>"
        .$conversorTempo->transformarSegundosParaDias($conversorTempo->resto)->resultado." dias<br>"
        .$conversorTempo->transformarSegundosParaHoras($conversorTempo->resto)->resultado." horas<br>"
        .$conversorTempo->transformarSegundosParaMinutos($conversorTempo->resto)->resultado." minutos<br>"
        .$conversorTempo->resto." segundos</section>";

      }
    ?>

  </header>
</body>

</html>