<?php

function senhaValida(string $senha ) : bool {
  $tamanho = strlen($senha);
  if($tamanho < 8 || $tamanho > 20) return false;

  $contemDigito = false;
  $contemMaiuscula = false;
  $contemCaractere = false;
  $caracteresValidos = [
    "!" => true,
    "@" => true,
    "#" => true,
    "$" => true,
    "%" => true,
    "&" => true,
    "*" => true,
  ];
  for ($i=0; $i < $tamanho; $i++) { 
    $caractere = $senha[$i];
    if($caractere == " ") return false;
    $contemCaractere = $contemCaractere || isset($caracteresValidos[$caractere]);
    $contemDigito = $contemDigito || is_numeric($caractere);
    $contemMaiuscula = $contemMaiuscula || ctype_upper($caractere);
  }
  if($contemCaractere && $contemDigito && $contemMaiuscula) return true;
  return false; 
};

var_dump(senhaValida("123A#akss")); // o único que deve dar true
var_dump(senhaValida("123abb1234")); // sem caractere
var_dump(senhaValida("123A%a3*! ")); // espaço
var_dump(senhaValida("abc23@amacq")); // sem maiúscula
var_dump(senhaValida("aA#!@zxY$%")); // sem digito
var_dump(senhaValida("M*t&S1BNAQKLSxqk$124%%,.;.jkaqwthhkkkpq")); // Maior de 20
var_dump(senhaValida("M*a23#")); // Menos de 8
?>