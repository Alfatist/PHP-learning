<?php
require '../banco/db.php';
$sql = "SELECT i.id, i.data_inscricao, i.status, p.nome AS participante, e.nome AS evento
        FROM inscricoes i
        JOIN participantes p ON p.id = i.participante_id
        JOIN eventos e ON e.id = i.evento_id
        ORDER BY i.id DESC";
$res = mysqli_query($mysqli, $sql);
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Inscrições</title>
  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <header>
    <h1>Sistema de Eventos</h1>
  </header>
  <main>

    <a href="inscricao_form.php">Nova Inscrição</a> | <a href="../index.php">Menu</a>
    <table border="1" cellpadding="6">
      <tr>
        <th>ID</th>
        <th>Evento</th>
        <th>Participante</th>
        <th>Data</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
      <?php while($r = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td><?=h($r['id'])?></td>
        <td><?=h($r['evento'])?></td>
        <td><?=h($r['participante'])?></td>
        <td><?=h($r['data_inscricao'])?></td>
        <td><?=h($r['status'])?></td>
        <td>
          <a href="inscricao_view.php?id=<?=h($r['id'])?>">Ver</a> |
          <?php if ($r["status"] == "cancelada"): ?>
          <a href="inscricao_delete.php?id=<?=h($r['id'])?>" onclick="return confirm('Excluir inscrição?')">Excluir</a>
          <?php else: ?>
          <a href="inscricao_cancel.php?id=<?=h($r['id'])?>"
            onclick="return confirm('Cancelar inscrição?')">Cancelar</a>
          <?php endif; ?>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>