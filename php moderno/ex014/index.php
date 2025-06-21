<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reajustar preços</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Reajustador de Preços</h1>
    <section>

      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="preco">Preço do Produto (R$)</label>
        <input type="number" name="preco" id="idpreco" step="any" required>
        <label for="range" id="labelRange">Qual será o percentual de reajuste?</label>
        <input type="range" min="0" max="1" name="range" id="idRange" width="100" step="0.01" required>
        <button type="submit">Qual será minha idade?</button>
      </form>
      <script>
      let labelRange = document.getElementById("labelRange");
      let rangeInput = document.getElementById("idRange");

      rangeInput.addEventListener('input', function() {
        labelRange.innerText = `Qual será o percentual de reajuste? (${(rangeInput.value*100).toFixed(0)}%)`
      });
      </script>
    </section>

    <?php 
      $preco = $_GET['preco'] ?? null;
      $range = $_GET["range"] ?? null;

      /** Calcula a idade */
      function reajusteCalcular(float $preco, float $range) : float {
        return number_format($preco * (1 + $range), 0, ",");
      }

      if($preco !== null && $range !== null ){
        
        echo "<section><h2>Resultado do Reajuste</h2><p>O produto que custava R$".number_format($preco, 2, ",").", com ".number_format($range*100, 0, ",")."% de aumento vai passar a custar R$"
        .reajusteCalcular($preco, $range)." a partir de agora!</section>";

      }
    ?>

  </header>
</body>

</html>