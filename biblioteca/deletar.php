<?php
    $codigo =$_GET["codigo"];
    include("conecta.php");
    $comando = $pdo->prepare("DELETE FROM livros WHERE codigo=$codigo ");
    $resultado = $comando->execute();
    header("location: listar.php");
?>