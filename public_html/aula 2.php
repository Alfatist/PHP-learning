<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php echo "<p>Hello, World!</p>"; 
  $idade = 41;
  $preco = 2.90;
  $nome = "Ines Dutra";
  ?>
  
  <p> Your age is <?php echo $idade; ?> years old.</p>
  <p> Hello World! 
    <?php $nome = "Ines"; ?> 
  </p>
  <p>Hello World again!
  <?php echo $nome; 
  $preco = 25;
  $fpreco = sprintf("%.2f", $preco);
  echo "<p>$fpreco<BR></p>";
  ?>
  </p>

  <!-- constantes -->
  <?php define("PI", 3.14); ?>
  <p>The value of PI is <?php echo PI; ?>.</p>

  <!-- " versus ' -->
  <?php
  // Aspas duplas interpretam variáveis, aspas simples não, são as strings literais
  $idade = 12;
  $result1 = "$idade";
  $result2 = '$idade';
  echo "<p>Result 1: $result1</p>";  // 12
  echo "<p>Result 2: $result2</p>";  // $idade 

  $string1 = "string entre \naspas";
  $string2 = 'string entre \napostofos';

  echo "$string1 <BR>"; // Neste primeiro, pula uma linha
  echo $string2; // neste segundo, exibe o \n

  ?>

  <!-- Exemplo de concatenação -->
  <?php 
  echo "<p>Exemplo de"." concatenação</p>";

  $string1 .= " e mais concatenação";
  echo "<p>$string1</p>";
  ?>
</body>
</html>

