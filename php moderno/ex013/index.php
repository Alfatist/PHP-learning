<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cálculo de idade</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Calculando a sua idade</h1>
    <section>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="nascimento">Em que ano você nasceu?</label>
        <input type="number" name="nascimento" id="idnascimento" step="any" required>
        <label for="almejado">1º almejado</label>
        <input type="number" name="almejado" id="idalmejado" step="any" required>
        <button type="submit">Qual será minha idade?</button>
      </form>
    </section>

    <?php 
      $nascimento = $_GET['nascimento'] ?? null;
      $almejado = $_GET['almejado'] ?? null;

      /** Calcula a idade */
      function idadeCalcular(int $nascimento, int $almejado) : int {
        return (($almejado - $nascimento)**2)**0.5;
      }

      if($nascimento !== null && $almejado !== null ){
        
        echo "<section><h2>Resultado</h2><p>Quem nasceu em $nascimento vai ter ".idadeCalcular($nascimento, $almejado)
        ." anos em $almejado!</section>";

      }
    ?>

  </header>
</body>

</html>