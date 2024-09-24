
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
<h1>Listar Perguntas</h1>
<table>
    <tr><th>Pergunta</th><th>Opção A</th><th>Opção B</th><th>Opção C</th><th>Opção D</th><th>Gabarito</th></tr>
<?php
   $arqDisc = fopen("question.txt","r") or die("erro ao abrir arquivo");
 
   while(!feof($arqDisc)) 
   {
        $linha = fgets($arqDisc);
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);
 
 // <tr><td><?php echo $colunaDados[0] </td>
        echo "<tr><td>" . $colunaDados[0] . "</td>" .
            "<td>" . $colunaDados[1] . "</td>" .
            "<td>" . $colunaDados[2] . "</td>" .
            "<td>" . $colunaDados[3] . "</td>" .
            "<td>" . $colunaDados[4] . "</td>" .
            "<td>" . $colunaDados[5] . "</td></tr>";
    }
 
   fclose($arqDisc);
    $msg = "Deu tudo certo!!!";
?>
</table>
<p><?php echo $msg ?></p>
<br>
</body>
</html>

