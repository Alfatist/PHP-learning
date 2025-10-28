<?php
require '../banco/db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT i.*, p.nome AS participante, p.email, e.nome AS evento, e.data_evento
        FROM inscricoes i
        JOIN participantes p ON p.id = i.participante_id
        JOIN eventos e ON e.id = i.evento_id
        WHERE i.id = $id";
$r = mysqli_query($mysqli, $sql);
if (!$row = mysqli_fetch_assoc($r)) die("Inscrição não encontrada");
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Inscrição #<?=h($row['id'])?></title>
  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <header>
    <h1>Sistema de Eventos: #<?=h($row['id'])?></h1>
  </header>
  <main>
    <p><strong>Evento:</strong> <?=h($row['evento'])?> (<?=h($row['data_evento'])?>)</p>
    <p><strong>Participante:</strong> <?=h($row['participante'])?> (<?=h($row['email'])?>)</p>
    <p><strong>Data inscrição:</strong> <?=h($row['data_inscricao'])?></p>
    <p><strong>Status:</strong> <?=h($row['status'])?></p>
    <p><a href="inscricao_list.php">Voltar</a></p>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>