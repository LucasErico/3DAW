<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "alunos";

    $conexao = new mysqli ($servidor, $user, $senha, $database);

    if ($conexao->connect_error) {  
        die ("Conexao Falhou!");
    } else {   
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $matricula = $_POST["matricula"];
            $comando = "DELETE FROM `aluno` WHERE matricula = " . $matricula;
            $resultado = $conexao->query($comando);
        }
    }
?>