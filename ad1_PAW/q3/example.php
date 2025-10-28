<?php

require_once 'SistemaBiblioteca.php';
require_once 'Livro.php';
require_once 'Usuario.php';

$sistema = new SistemaBiblioteca();

$usuario1 = new Usuario("Ana Silva", 1001, "Aluno");
$usuario2 = new Usuario("Carlos Souza", 1002, "Professor");

$sistema->registrarUsuario($usuario1);
$sistema->registrarUsuario($usuario2);

$livro1 = new Livro("Introdução à Biologia", 1, true);
$livro2 = new Livro("História do Brasil", 2, true);

$sistema->registrarLivro($livro1);
$sistema->registrarLivro($livro2);

echo "📚 Status inicial:\n<br><br>";
echo $livro1->exibirStatus() . "\n<br><br>";
echo $livro2->exibirStatus() . "\n<br><br>";

$sistema->emprestarLivro(1, 1001);

echo "<br><br>\n📚 Após empréstimo do livro 1:\n<br><br>";
echo $livro1->exibirStatus() . "\n<br><br>";
echo $livro2->exibirStatus() . "\n<br><br>";

$sistema->devolverLivro(1);

echo "\n📚 Após devolução do livro 1:\n<br><br>";
echo $livro1->exibirStatus() . "\n<br><br>";
echo $livro2->exibirStatus() . "\n<br><br>";