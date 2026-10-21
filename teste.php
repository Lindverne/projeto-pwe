<?php

// :::: Testando o método listar() ::::

// 1) incluindo arquivos
require('Comidinha.php');
require('ComidinhaORM.php');

// 2) Conexão com o Banco de Dados
$conexao = mysqli_connect('localhost', 'root', '', 'comidinhas');

// 3) Instanciando Classe ComidinhaORM
$orm = new ComidinhaORM($conexao);

// :::: Testando o método deletar() e alterar() ::::
$comidinha = new Comidinha();

$comidinha->id = 1;
$comidinha->nome = "Pizza brotinho";
$comidinha->descricao = "Pizza brotinho de Morango";

// Executando
$orm->alterar($comidinha);

//Executando o método Excluir
$orm->excluir(0);


// :::: Testado o método cadastrar() ::::
$comida_saborosa = new Comidinha;

$comida_saborosa->nome = "Bolovo";
$comida_saborosa->descricao = "Salgado de boteco raiz";

// Salvando no Banco de Dados 
    if($orm->cadastrar($comida_saborosa))
    {
        echo "Cadastrado com sucesso!!! <3"; "<br>";
    }
    else
    {
        echo "Erro ao Cadastrar a comida! Tente novamente (0w0)";
    }

// 4) Método listar() retornando valores
$lista = $orm->listar();

// 5) Percorrer e mostrar os valores
foreach ($lista as $comida) 
{
    echo "ID: " . $comida->id . "<br>";
    echo "Nome: " . $comida->nome . "<br>";
    echo "Descrição: " . $comida->descricao . "<br>";
}

?>