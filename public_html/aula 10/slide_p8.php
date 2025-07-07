<?php

include "./error.php";
include "./clean.php";

if (empty($_POST["titulo"]) || empty($_POST["descricao"]))
{
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inserção de novos dados</title>
</head>

<body>
  <form action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
    Novo título:
    <br><input type="text" name="titulo" size="80">
    <br> Descrição:
    <br> <textarea name="descricao" cols="80" rows="4"></textarea>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    <br>Capa (formato GIF):
    <input type="text" name="capa">
    <br><input type="submit">

  </form>
</body>

</html>
<?php 
}
else{
  $titulo = clean($_POST["titulo"], 50);
  $descricao = clean($_POST["descricao"], 2048);
  $capa = $_FILES["capa"]["tmp_name"];
  if(!($con = @mysqli_connect("../database.db", "aluno", "aluno" )))
    die("Não pôde conectar ao banco de dados");
  if(!mysqli_select_db($con, "prog2"))
    ExibeErro($con);
  if(is_uploaded_file($capa))
  {
    $arquivo = fopen($capa, "r");
    $arqconts = fread($arquivo, filesize($capa));
    $arqconts = addslashes($arqconts);

  }
  $arqconts = NULL;
  $inseredado = "INSERT INTO livros (titulo, descricao, fotocapa) VALUES (
                  ("."\"$titulo\"".","."\"$descricao\"".",".
                  "\"$arqconts\"".")";
  if((@mysqli_query($con, $inseredado)) && @mysqli_affected_rows($con) == 1)
    header("Location: notificacao.php?"."idlivro=".mysqli_insert_id($con)."&status=T");
  else
    header("Location: notificacao.php?"."status=F");
}
?>