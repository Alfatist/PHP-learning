<?php
require '../banco/db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id) {
    
    mysqli_query($mysqli, "DELETE FROM participantes WHERE id = $id");
}
header('Location: participante_list.php');