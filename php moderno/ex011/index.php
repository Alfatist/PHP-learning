<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raízes php</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header>
    <h1>Informe um número</h1>
    <section>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="raiz">Número (R$):</label>
        <input type="number" name="raiz" id="idraiz" step="any" required>
        <button type="submit">Calcular raízes</button>
      </form>
    </section>

    <?php 
      $raiz = $_GET['raiz'] ?? null;

      if($raiz !== null){
        
        
        echo "<section><h2>Resultado Final</h2><p>Analisando o <strong>número $raiz</strong>, temos:<br><br>"
        ."Sua raíz quadrada é <strong>".number_format($raiz**0.5, 4)."</strong><br>"
        ."Sua raíz cúbica é <strong>".number_format($raiz**(1/3), 4)."</strong><br>"
        ."</section>";
         

      }
    ?>

  </header>
</body>

</html>