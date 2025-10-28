<?php
require '../banco/db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$nome = $descricao = $data_evento = $vagas = $carga = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $data_evento = trim($_POST['data_evento']);
    $vagas = max(0, (int)$_POST['vagas']);
    $carga = (int)$_POST['carga_horaria'];

    if ($id) {
        $sql = "UPDATE eventos SET nome=?, descricao=?, data_evento=?, vagas=?, carga_horaria=? WHERE id=?";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, 'sssiii', $nome, $descricao, $data_evento, $vagas, $carga, $id);
        mysqli_stmt_execute($stmt);
    } else {
        $sql = "INSERT INTO eventos (nome,descricao,data_evento,vagas,carga_horaria) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, 'sssii', $nome, $descricao, $data_evento, $vagas, $carga);
        mysqli_stmt_execute($stmt);
    }
    header('Location: evento_list.php');
    exit;
}

if ($id && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    $r = mysqli_query($mysqli, "SELECT * FROM eventos WHERE id = $id");
    if ($row = mysqli_fetch_assoc($r)) {
        $nome = $row['nome']; $descricao = $row['descricao']; $data_evento = $row['data_evento']; $vagas = $row['vagas']; $carga = $row['carga_horaria'];
    } else die("Evento não encontrado");
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title><?= $id ? 'Editar' : 'Novo' ?> Evento</title>
  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <header>
    <h1>Sistema de Eventos: <?= $id ? 'Edição' : 'Inserção' ?> </h1>
  </header>
  <main>

    <form method="post">
      <input type="hidden" name="id" value="<?=h($id)?>">
      <label>Nome: <input name="nome" required value="<?=h($nome)?>"></label><br>
      <label>Descrição: <textarea name="descricao"><?=h($descricao)?></textarea></label><br>
      <label>Data do Evento: <input name="data_evento" type="datetime-local"
          value="<?= $data_evento ? date('Y-m-d\TH:i', strtotime($data_evento)) : '' ?>"></label><br>
      <label>Vagas: <input name="vagas" type="number" min="0" value="<?=h($vagas)?>"></label><br>
      <label>Carga Horária: <input name="carga_horaria" type="number" value="<?=h($carga)?>"></label><br>
      <button type="submit">Salvar</button>
      <a href="evento_list.php">Cancelar</a>
    </form>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>