<?php

class Usuario
{
  private string $nome;
  private int $matricula;
  private string $tipo;

  function __construct(string $nome, int $matricula, string $tipo) {
    $this->nome = $nome;
    $this->matricula = $matricula;
    $this->tipo = $tipo;
  }

  function exibirDados() {
    return "Nome: $this->nome, Matrícula: $this->matricula, Tipo: $this->tipo";
  }
  function alterarTipo($novoTipo) {
    $this->tipo = $novoTipo;
  }
}

?>