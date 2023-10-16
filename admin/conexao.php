<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "testes";
    $port = 3306;

    try{
        $con = mysqli_connect($host, $user, $pass, $dbname);
        $conn = new PDO("mysql:host=$host;dbname=". $dbname, $user, $pass);


    }   catch(PDOException $err){
            echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado". $err->getMessage();
    }
?>