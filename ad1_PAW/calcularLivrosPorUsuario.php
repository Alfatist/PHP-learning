<?php

function calcularLivrosPorUsuario(array $usuarios, array $livros ) : array {
  $result = [];
  for ($i=0; $i < count($usuarios); $i++) { 
    $element = $usuarios[$i];
    $result[$element] = 0;
  };

  for ($i=0; $i < count($usuarios); $i++) { 
    $element = $usuarios[$i];
    $result[$element]++;
  };
  
  print_r($result);
  return $result;
};

calcularLivrosPorUsuario([1, 2, 1, 3, 2], [101, 102,103,104,105]);
?>