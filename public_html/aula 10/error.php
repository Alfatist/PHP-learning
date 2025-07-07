<?php
  function ExibeErro(SQLite3 $con)
  {
     echo "Erro número: ". $con->lastErrorCode().": ".$con->lastErrorMsg();
     exit();
  }
?>