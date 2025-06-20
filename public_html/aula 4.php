<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comandos simples, loops, condicionais, arrays</title>
</head>
<body>

  <?php 
  $hoje = date("w");

  switch ($hoje) {
    case 0:
      echo "<h1>Hoje é domingo</h1>";
      break;
    case 1:
      echo "<h1>Hoje é segunda</h1>";
      break;
    case 2:
      echo "<h1>Hoje é terça</h1>";
      break;
    case 3:
      echo "<h1>Hoje é quarta</h1>";
      break;
    case 4:
      echo "<h1>Hoje é quinta</h1>";
      break;
    case 5:
      echo "<h1>Hoje é sexta</h1>";
      break;
    case 6:
      echo "<h1>Hoje é sábado</h1>";
      break;
    default:
      echo "<p>Dia inválido!</p>";
  }
  ?>

  <?php
  $frutas = ["maçã", "banana", "laranja", "uva"];
  echo "<h2>Lista de frutas:</h2>";
  echo "<ul>";
  foreach ($frutas as $fruta) {
    echo "<li>$fruta</li>";
  }
  echo "</ul>"; 
  echo "1  abbc" + 1

  
  ?>
<?php
    exit; // Interrompe a execução do script aqui. "die" tem a mesma função.
    echo "<h1>Este h1 nunca existiu</h1>";
  ?>
</body>
</html>