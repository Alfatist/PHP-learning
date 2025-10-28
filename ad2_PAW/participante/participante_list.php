<?php
require '../banco/db.php';
$res = mysqli_query($mysqli, "SELECT * FROM participantes ORDER BY id");
?>
<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="/style.css">
  <meta charset="utf-8">
  <title>Participantes</title>
</head>

<body>
  <header>
    <h1>Sistema de Eventos</h1>
  </header>
  <main>

    <a href="participante_form.php">Novo Participante</a> | <a href="../index.php">Menu</a>
    <table border="1" cellpadding="6">
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Matricula</th>
        <th>Curso</th>
        <th>Data Inscrição</th>
        <th>Ações</th>
      </tr>
      <?php while($row = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td><?=h($row['id'])?></td>
        <td><?=h($row['nome'])?></td>
        <td><?=h($row['email'])?></td>
        <td><?=h($row['matricula'])?></td>
        <td><?=h($row['curso'])?></td>
        <td><?=h($row['data_inscricao'])?></td>
        <td>
          <a href="participante_form.php?id=<?=h($row['id'])?>">Editar</a> |
          <a href="participante_delete.php?id=<?=h($row['id'])?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>