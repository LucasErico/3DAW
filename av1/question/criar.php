<?php

    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  
    {
        $pergunta = $_POST["pergunta"];
        $opc_A = $_POST["opc_A"];
        $opc_B = $_POST["opc_B"];
        $opc_C = $_POST["opc_C"];
        $opc_D = $_POST["opc_D"];
        $gabarito = $_POST["gabarito"];
        $msg = "";
        
        if (!file_exists("question.txt"))
        {
            $arqDisc = fopen("question.txt","w") or die("erro ao criar arquivo");
            $linha = "numPergunta;pergunta;opc_A;opc_B;opc_C;opc_D;gabarito\n";
            fwrite($arqDisc, $linha);
            fclose($arqDisc);
        }
        else
        {
            $arqDisc = fopen("question.txt","r") or die("erro ao abrir arquivo");
            while(!feof($arqDisc)) 
            {
                $linha = fgets($arqDisc);
                $colunaDados = explode(";", $linha);
                (int)$numAnt = intval($colunaDados[0]);
            }

            fclose($arqDisc);
        }

        $num = 70;
   
        $arqDisc = fopen("question.txt","a") or die("erro ao criar arquivo");
        $linha = $num . ";" . $pergunta . ";" . $opc_A . ";" . $opc_B . ";" . $opc_C . ";" . $opc_D . ";" . $gabarito . "\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
            
        $msg = "Deu tudo certo!!!";        
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<header>
        <nav>
            <a href="../index.html">Início</a>
            <a href="criar.php">Incluir</a>
            <a href="alterar.php">Alterar</a>
            <a href="excluir.php">Excluir</a>
            <a href="listarTodas.php">Listar Todas</a>
            <a href="listarUma.php">Listar Uma</a>
        </nav>
</header>
<main>
<h1>Cadastrar Novo Usuário</h1>
<form action="criar.php" method="POST">
    Pergunta: <input type="text" name="pergunta">
    <br><br>
    Opção A: <input type="text" name="opc_A">
    <br><br>
    Opção B: <input type="text" name="opc_B">
    <br><br>
    Opção C: <input type="text" name="opc_C">
    <br><br>
    Opção D: <input type="text" name="opc_D">
    <br><br>
    Gabarito: <input type="text" name="gabarito">
    <br><br>
    <input type="submit" value="Cadastrar Nova Pergunta">
</form>
<p><?php echo $msg ?></p>
<br>
</main>
</body>
</html>