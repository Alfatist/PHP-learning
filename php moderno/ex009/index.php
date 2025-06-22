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
    <section>
      <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <label for="dividendo">Dividendo:</label>
        <input type="number" name="dividendo" id="iddividendo" step="any" required>
        <label for="divisor">Divisor:</label>
        <input type="number" name="divisor" id="iddivisor" step="any" required>
        <button type="submit">Analisar</button>
      </form>
    </section>

    <?php 
      $dividendo = $_GET['dividendo'] ?? null;
      $divisor = $_GET['divisor'] ?? null;

      if($dividendo !== null && $divisor !== null){
        if($divisor == 0) {
        echo "<section>"
        ."Dividendo: $dividendo<br>"
        ."Divisor: $divisor<br>"
        ."Quociente: ∞<br>"
        ."Resto: ∞";
        }
        else {
        echo "<section>"
        ."Dividendo: $dividendo<br>"
        ."Divisor: $divisor<br>"
        ."Quociente: ". floor($dividendo/$divisor)."<br>"
        ."Resto: ".$dividendo%$divisor;
        }
      }
    ?>

  </header>
</body>

</html>