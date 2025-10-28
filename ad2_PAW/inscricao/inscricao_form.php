<?php
require '../banco/db.php';

$part = mysqli_query($mysqli, "SELECT id, nome FROM participantes ORDER BY nome");
$ev = mysqli_query($mysqli, "SELECT id, nome, data_evento, vagas FROM eventos ORDER BY data_evento");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $participante_id = (int)$_POST['participante_id'];
    $evento_id = (int)$_POST['evento_id'];
    $msg = '';

    mysqli_begin_transaction($mysqli);

    try {
        
        $stmt = mysqli_prepare($mysqli, "SELECT data_evento, vagas FROM eventos WHERE id = ? FOR UPDATE");
        mysqli_stmt_bind_param($stmt, 'i', $evento_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $data_evento, $vagas);
        if (!mysqli_stmt_fetch($stmt)) {
            throw new Exception('Evento não encontrado.');
        }
        mysqli_stmt_close($stmt);

        
        if (strtotime($data_evento) < time()) {
            throw new Exception('Evento já realizado; não é possível inscrever.');
        }

        
        $stmt = mysqli_prepare($mysqli, "SELECT COUNT(*) FROM inscricoes WHERE participante_id = ? AND evento_id = ? AND status = 'ativa'");
        mysqli_stmt_bind_param($stmt, 'ii', $participante_id, $evento_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $countDup);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        if ($countDup > 0) throw new Exception('Participante já inscrito (ativo) neste evento.');

        
        $stmt = mysqli_prepare($mysqli, "SELECT COUNT(*) FROM inscricoes WHERE evento_id = ? AND status = 'ativa'");
        mysqli_stmt_bind_param($stmt, 'i', $evento_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $countAtivos);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($countAtivos >= $vagas) {
            throw new Exception('Número máximo de vagas atingido.');
        }

        
        $now = date('Y-m-d H:i:s');
        $stmt = mysqli_prepare($mysqli, "INSERT INTO inscricoes (participante_id, evento_id, data_inscricao, status) VALUES (?,?,?, 'ativa')");
        mysqli_stmt_bind_param($stmt, 'iis', $participante_id, $evento_id, $now);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        mysqli_commit($mysqli);
        header('Location: inscricao_list.php');
        exit;
    } catch (Exception $e) {
        mysqli_rollback($mysqli);
        $msg = $e->getMessage();
    }
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Nova Inscrição</title>
  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <header>
    <h1>Sistema de Eventos</h1>
  </header>
  <main>

    <?php if(!empty($msg)): ?><div style="color:red"><?=h($msg)?></div><?php endif; ?>
    <form method="post">
      <label>Participante:
        <select name="participante_id" required>
          <option value="">-- selecione --</option>
          <?php mysqli_data_seek($part, 0); while($p = mysqli_fetch_assoc($part)): ?>
          <option value="<?=h($p['id'])?>"><?=h($p['nome'])?></option>
          <?php endwhile; ?>
        </select>
      </label><br>
      <label>Evento:
        <select name="evento_id" required>
          <option value="">-- selecione --</option>
          <?php mysqli_data_seek($ev, 0); while($e = mysqli_fetch_assoc($ev)): ?>
          <option value="<?=h($e['id'])?>"><?=h($e['nome'])?> (<?=h($e['data_evento'])?>) - Vagas: <?=h($e['vagas'])?>
          </option>
          <?php endwhile; ?>
        </select>
      </label><br>
      <button type="submit">Inscrever</button>
      <a href="inscricao_list.php">Cancelar</a>
    </form>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>