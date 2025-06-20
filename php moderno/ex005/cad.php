<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <header>
    <h1>Resultado do processamento</h1>
  </header>

  <main>
    <?php 
      $number = $_GET['numero'] ?? null;
      if ($number === null) {
        echo "<p>Número não informado.</p>";
        die;
      }

      echo "<p>O número informado foi: <strong>$number</strong></p>";
      echo "<p>Seu antecessor é: <strong>".($number - 1)."</strong></p>";
      echo "<p>Seu sucessor é: <strong>".($number + 1)."</strong></p>";
    ?>

    <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
  </main>
</body>

</html>