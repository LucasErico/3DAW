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
<h1>Listar Uma Pergunta</h1>
<form action="listarUma.php" method="POST">
    Número de Pergunta: <input type="text" name="numPergunta">
    <br><br>
    <input type="submit" value="Listar Uma Pergunta">
</form>

<p><?php echo $msg ?></p>

<table>
    <tr><th>Pergunta</th><th>Opção A</th><th>Opção B</th><th>Opção C</th><th>Opção D</th><th>Gabarito</th></tr>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  
    {   
        $numPergunta = $_POST["numPergunta"];
        $arqDisc = fopen("question.txt","r") or die("erro ao abrir arquivo");
 
   while(!feof($arqDisc)) 
   {
        $linha = fgets($arqDisc);
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);

        if($numPergunta == $colunaDados[0])
        {
            // <tr><td><?php echo $colunaDados[0] </td>
        echo "<tr><td>" . $colunaDados[0] . "</td>" .
        "<td>" . $colunaDados[1] . "</td>" .
        "<td>" . $colunaDados[2] . "</td>" .
        "<td>" . $colunaDados[3] . "</td>" .
        "<td>" . $colunaDados[4] . "</td>" .
        "<td>" . $colunaDados[5] . "</td></tr>";
        }
 
    }
 
   fclose($arqDisc);
    $msg = "Deu tudo certo!!!";
    }
   
?>
</table>
<br>
</body>
</html>


