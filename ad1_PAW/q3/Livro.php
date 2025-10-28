<?php 

  class Livro
  {
    private string $titulo;
    private int $codigo;
    private bool $disponivel;
    
    function __construct(string $titulo, int $codigo, bool $disponivel) {
      $this->titulo = $titulo;
      $this->codigo = $codigo;
      $this->disponivel = $disponivel;
    }

    function emprestar(){$this->disponivel = false;}

    function devolver(){ $this->disponivel = true;}
 
    function exibirStatus(){
      return "Título: $this->titulo, Código: $this->codigo, " . 
       ($this->disponivel ? "Está disponível" : "Não está disponível");
    }

    function obterCodigo() : int {
      return $this->codigo;
    }

    


  }
  
?>