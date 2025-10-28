<?php
require '../banco/db.php';
$res = mysqli_query($mysqli, "SELECT * FROM eventos ORDER BY data_evento DESC");
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Eventos</title>
  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <header>
    <h1>Sistema de Eventos</h1>
  </header>
  <main>
    <a href="evento_form.php">Novo Evento</a> | <a href="../index.php">Menu</a>
    <table border="1" cellpadding="6">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Vagas</th>
        <th>Carga</th>
        <th>Ações</th>
      </tr>
      <?php while($row = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td><?=h($row['id'])?></td>
        <td><?=h($row['nome'])?></td>
        <td><?=h($row['data_evento'])?></td>
        <td><?=h($row['vagas'])?></td>
        <td><?=h($row['carga_horaria'])?></td>
        <td>
          <a href="evento_form.php?id=<?=h($row['id'])?>">Editar</a> |
          <a href="evento_delete.php?id=<?=h($row['id'])?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>