<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Resultado do processamento</h1>
  </header>

  <main>
    <?php 
      var_dump($_GET);
      $name = $_GET['nome'] ?? "sem nome";
      $lastName = $_GET['sobrenome'] ?? "desconhecido";
      echo "<p>Olá, $name $lastName!</p>";
    ?>

    <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
  </main>
</body>

</html>