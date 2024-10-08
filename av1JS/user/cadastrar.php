<?php

    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET')  
    {
        $nome = $_GET["nome"];
        $email = $_GET["email"];
        $senha = $_GET["senha"];
        $msg = "";
        
        if (!file_exists("user.txt"))
        {
            $arqDisc = fopen("user.txt","w") or die("erro ao criar arquivo");
            $linha = "nome;email;senha\n";
            fwrite($arqDisc, $linha);
            fclose($arqDisc);
        }
        
           
        $arqDisc = fopen("user.txt","a") or die("erro ao criar arquivo");
        $linha = $nome . ";" . $email . ";" . $senha . "\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);

        
        $msg = "Deu tudo certo!!!";  
        echo $msg;      
    }
?>
