<?php
require '../banco/db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id) {
    
    $stmt = mysqli_prepare($mysqli, "UPDATE inscricoes SET status = 'cancelada' WHERE id = ? AND status = 'ativa'");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
}
header('Location: inscricao_list.php');