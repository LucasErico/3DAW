<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "alunos";

    $conexao = new mysqli ($servidor, $user, $senha, $database);

    if ($conexao->connect_error) {  
        die ("Conexao Falhou!");
    } else {   
        $comando = "SELECT * from `aluno`";
        $resultado = $conexao->query($comando);

        $alunos[] = array();
        $i = 0;
        While ($linha = $resultado->fetch_assoc()){
            $alunos[$i] = $linha;
            $i++;
        }

        if ($resultado == true){
            $retorno=json_encode($alunos);
        } else {
            $retorno=json_encode("erro");
        }

        echo $retorno;
    }
?>