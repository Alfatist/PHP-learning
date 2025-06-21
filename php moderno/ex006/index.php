<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aleatório</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Trabalhando com números aleatórios</h1>
  </header>

  <main>
    <p>Gerando um número aleatório entre 0 e 100</p>
    <?php 
      echo "<p>O valor gerado foi: <strong>".rand(0, 100)."</strong></p>";
    ?>

    <button onclick="location.reload()">Gerar outro</button>
  </main>
</body>

</html>