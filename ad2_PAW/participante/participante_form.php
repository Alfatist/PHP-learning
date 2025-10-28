<?php
require '../banco/db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$nome = $email = $matricula = $curso = $data_inscricao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $matricula = trim($_POST['matricula']);
    $curso = trim($_POST['curso']);
    $data_inscricao = trim($_POST['data_inscricao']) ?: date('Y-m-d H:i:s');

    if ($id) {
        $sql = "UPDATE participantes SET nome=?, email=?, matricula=?, curso=?, data_inscricao=? WHERE id=?";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssi', $nome, $email, $matricula, $curso, $data_inscricao, $id);
        $ok = mysqli_stmt_execute($stmt);
    } else {
        $sql = "INSERT INTO participantes (nome,email,matricula,curso,data_inscricao) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, 'sssss', $nome, $email, $matricula, $curso, $data_inscricao);
        $ok = mysqli_stmt_execute($stmt);
    }
    if (!$ok) {
        $err = mysqli_error($mysqli);
    } else {
        header('Location: participante_list.php');
        exit;
    }
}

if ($id && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    $r = mysqli_query($mysqli, "SELECT * FROM participantes WHERE id = $id");
    if ($row = mysqli_fetch_assoc($r)) {
        $nome = $row['nome']; $email = $row['email']; $matricula = $row['matricula']; $curso = $row['curso']; $data_inscricao = $row['data_inscricao'];
    } else {
        die("Participante não encontrado");
    }
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title><?= $id ? 'Editar' : 'Novo' ?> Participante</title>
  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <header>
    <h1>Sistema de Eventos</h1>
  </header>
  <main>
    <h1><?= $id ? 'Editar' : 'Novo' ?> Participante</h1>
    <?php if(!empty($err)): ?><div style="color:red"><?=h($err)?></div><?php endif; ?>
    <form method="post">
      <input type="hidden" name="id" value="<?=h($id)?>">
      <label>Nome: <input name="nome" required value="<?=h($nome)?>"></label><br>
      <label>Email: <input name="email" type="email" required value="<?=h($email)?>"></label><br>
      <label>Matricula: <input name="matricula" value="<?=h($matricula)?>"></label><br>
      <label>Curso: <input name="curso" value="<?=h($curso)?>"></label><br>
      <label>Data Inscrição: <input name="data_inscricao" type="datetime-local"
          value="<?= $data_inscricao ? date('Y-m-d\TH:i', strtotime($data_inscricao)) : '' ?>"></label><br>
      <button type="submit">Salvar</button>
      <a href="participante_list.php">Cancelar</a>
    </form>
  </main>
  <footer>© <?=date('Y')?> Sistema de Eventos</footer>
</body>

</html>