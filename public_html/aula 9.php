<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exemplo de acesso a BDs</title>
</head>

<body>
  <pre>
    <?php 
    echo "Neste exemplo, quando você clicou no botão <abrir navegador>, uma tabela 
    chamada cliente foi criada, com atributos: id, nome e endereço. Para repetir
    este exemplo, fora do contexto da aula, é necessário criar esta tabela manualmente no servidor mysql.\n\n";
    // (1) abrir conexão com sqlite
    // para rodar sqlite, no linux foi necessário um sudo apt-get install php8.4-sqlite3
    $con = new SQLite3("./database.db");

    // (2) consulta ao bd prog2 sobre tabela cliente
    $res = $con->query("SELECT * FROM cliente");
    // (3) recupera linhas da tabela
    while ($row = $res->fetchArray() )
    {
      // (4) imprime valores de atributos
      for ($i=0; $i < $res->numColumns() ; $i++) echo $row[$i]." ";
      echo "\n";
      
    }
    // (5) fechar conexão
    $con->close();
    ?>
  </pre>
</body>

</html>