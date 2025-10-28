<?php 

  class SistemaBiblioteca 
  {
    /** @var Usuario[] */
    private array $usuarios = [];

    /** @var Livro[] */
    private array $livros = [];

   function registrarUsuario(Usuario $usuario) : void {

    $this->usuarios[] = $usuario;
   } 

  function registrarLivro(Livro $livro) : void {
    $this->livros[$livro->obterCodigo()] = $livro;
   }
   
  function emprestarLivro(int $codigoLivro, int $matriculaUsuario) : void {
    $this->livros[$codigoLivro]->emprestar();
  }

  function devolverLivro(int $codigoLivro) : void {
    $this->livros[$codigoLivro]->devolver();
  }
  }
  
?>