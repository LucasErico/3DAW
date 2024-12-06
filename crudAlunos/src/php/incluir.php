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
            $nome = $_POST["nome"];
            $matricula = $_POST["matricula"];
            $email = $_POST["email"];
            $comando = "INSERT INTO `aluno` (`nome`, `matricula`, `email`) VALUES ('" . $nome . "','" . $matricula . "','" . $email . "')";
            $resultado = $conexao->query ($comando);
        }
    }
?>