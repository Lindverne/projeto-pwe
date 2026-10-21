<?php 

class ComidinhaORM
{
	//Object-Relational Mapping
    private $conexao;
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }


    public function listar()
    {
        $sql = "SELECT * FROM comidinhas";
        $resultado = mysqli_query($this->conexao, $sql);
        $lista = [];
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $comidinha = new Comidinha();
            $comidinha->id = $linha["id"];
            $comidinha->nome = $linha["nome"];
            $comidinha->descricao = $linha["descricao"];
            $lista[] = $comidinha;
        }
        return $lista;
    }



public function cadastrar($comidinha)
{
    $sql = "INSERT INTO comidinhas (nome, descricao)
            VALUES ('" . $comidinha->nome . "',
                    '" . $comidinha->descricao . "')";

    return mysqli_query($this->conexao, $sql);
}

public function excluir($id)
{
    $sql = "DELETE FROM comidinhas WHERE id = " . (int)$id;

    return mysqli_query($this->conexao, $sql);
}

public function alterar($comidinha)
{
    $sql = "UPDATE comidinhas
            SET nome = '" . $comidinha->nome . "',
                descricao = '" . $comidinha->descricao . "'
            WHERE id = " . (int)$comidinha->id;

    return mysqli_query($this->conexao, $sql);
}


    
}
