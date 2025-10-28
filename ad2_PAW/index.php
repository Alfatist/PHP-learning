<?php require 'banco/db.php'; ?>
<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="/style.css">
  <meta charset="utf-8">
  <title>Sistema Eventos</title>
</head>

<body>
  <header>
    <h1>Sistema de Eventos</h1>
  </header>
  <main>

    <h1>Sistema de Eventos</h1>
    <ul>
      <li><a href="./participante/participante_list.php">Participantes</a></li>
      <li><a href="./evento/evento_list.php">Eventos</a></li>
      <li><a href="./inscricao/inscricao_list.php">Inscrições</a></li>
    </ul>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>