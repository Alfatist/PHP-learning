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
    <h1>Conversdor de Moedas v1.0</h1>
  </header>

  <main>
    <?php 
    $realPart = floor($_GET['numero']);
    
    echo "<p>Analisando o número <strong>".$_GET['numero']
        ."</strong> informado pelo usuário:</p>"
        ."<p>O número inteiro é <strong>$realPart</strong></p>"
        ."<p>O número decimal é <strong>".($_GET['numero'] - $realPart)."</strong></p>";

    ?>

    <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
  </main>
</body>

</html>