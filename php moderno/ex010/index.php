<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Números php</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Analisador de número real</h1>
    <?php 
    const MINIMO = 1380;
    ?>
    <section>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="salario">Salário (R$):</label>
        <input type="number" name="salario" id="idsalario" step="any" required>
        <p>Considerando o salário mínimo de R$ <?=number_format(MINIMO, 2,",",".") ?></p>
        <button type="submit">Calcular</button>
      </form>
    </section>

    <?php 
      $salario = $_GET['salario'] ?? null;

      if($salario !== null){
        $MINIMOSPORSALARIO = floor($salario/MINIMO);
        $restante = $salario - MINIMO * $MINIMOSPORSALARIO;
        $texto = $restante !== 0 ? " + R$ ".number_format($restante, 2,'.',"'")."." : "";
        
        echo "<section><h2>Resultado Final</h2><p> Quem recebe um salário de R$".number_format($salario, 2,',',".")
        ." ganha ".number_format($MINIMOSPORSALARIO,0,",",".")." salários mínimos"
        .$texto;

      }
    ?>

  </header>
</body>

</html>