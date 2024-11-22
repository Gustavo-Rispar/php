<?php

    $codigo             = $_POST["codigo"];
    $titulo             = $_POST["titulo"];
    $autor              = $_POST["autor"];
    $data_lancamento    = $_POST["data_lancamento"];

    include("conecta.php");
    
    /*echo("
            $codigo  $titulo  $autor  $data_lancamento
        ");
*/

    //Qual botão foi setado?
    if(isset($_POST["inserir"]))
    {
        $comando = $pdo->prepare("INSERT INTO livros VALUES($codigo, '$titulo', '$autor', '$data_lancamento')");
        $resultado = $comando->execute();
        header("location: index.html");
    }

    if(isset($_POST["deletar"]))
    {
        $comando = $pdo->prepare("DELETE FROM livros WHERE codigo=$codigo ");
        $resultado = $comando->execute();
        header("location: index.html");
    }

    if(isset($_POST["alterar"]))
    {
        $comando = $pdo->prepare("UPDATE livros SET titulo='$titulo', autor='$autor', data_lancamento='$data_lancamento' WHERE codigo=$codigo ");
        $resultado = $comando->execute();
        header("location: index.html");
    }

    if(isset($_POST["listar"]) )
    {
        header("location: listar.php");
    }
?>