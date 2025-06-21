<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Médias aritméticas php</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Médias Aritméticas</h1>
    <section>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="primeiro">1º valor</label>
        <input type="number" name="primeiro" id="idprimeiro" step="any" required>
        <label for="peso">1º peso</label>
        <input type="number" name="peso" id="idpeso" step="any" required>
        <label for="segundo">2º valor</label>
        <input type="number" name="segundo" id="idsegundo" step="any" required>
        <label for="peso2">2º peso</label>
        <input type="number" name="peso2" id="idpeso2" step="any" required>
        <button type="submit">Calcular médias</button>
      </form>
    </section>

    <?php 
      $primeiro = $_GET['primeiro'] ?? null;
      $peso = $_GET['peso'] ?? null;
      $segundo = $_GET['segundo'] ?? null;
      $peso2 = $_GET['peso2'] ?? null;

      if($primeiro !== null && $peso !== null && $segundo !== null && $peso2 !== null ){
        
        echo "<section><h2>Cálculo das médias</h2><p>Analisando os valores $primeiro e $segundo:<br><br>"
        ."A <strong>Média Aritmética Simples</strong> entre os valores é igual a ".number_format(($primeiro + $segundo)/2, 2)."<br>"
        ."A <strong>Média Aritmética Ponderada</strong> com pesos $peso e $peso2 é igual a ".number_format(($peso*$primeiro + $segundo*$peso2)/($peso+$peso2), 2)
        ."</section>";

      }
    ?>

  </header>
</body>

</html>