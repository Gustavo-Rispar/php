<?php
    //ARQUIVO PARA CONEXÃO COM BANCO DE DADOS: conecta.php

    //Fuso horário do Brasil:
    date_default_timezone_set('America/Sao_Paulo');

    $pdo = new PDO("mysql:dbname=livraria;host=localhost;charset=utf8","root","");


?>