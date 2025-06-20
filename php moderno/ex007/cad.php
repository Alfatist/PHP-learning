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
    <h1>Conversdor de Moedas v2.0</h1>
  </header>

  <main>
    <?php 
    $data = date('m-d-Y');
    $url = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarDia(dataCotacao='$data')";
    $result = file_get_contents($url);
    $cotacaoVenda = json_decode($result, true)['value'][0]['cotacaoVenda'];
    
    echo "<p>Seus R$".$_GET['numero']
        ." convertidos para dólares, você terá: <strong>R$". number_format(round(($_GET['numero'] / $cotacaoVenda), 2), 2)."</strong></p>"
        ."<p>*Cotação de R$ $cotacaoVenda retirada direto do banco central</p>";
    ?>

    <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
  </main>
</body>

</html>