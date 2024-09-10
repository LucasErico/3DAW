<!DOCTYPE html>
<html>
<head>
    <style>
        table
        {
            border: solid;
        }
    </style>
</head>
<body>
<header>
        <nav>
            <a href="ex06_index.php">Início</a>
            <a href="criar.php">Incluir</a>
            <a href="alterar.php">Alterar</a>
            <a href="excluir.php">Excluir</a>
            <a href="mostrar.php">Mostrar</a>
            <a href="listar.php">Listar</a>
        </nav>
</header>
<h1>Listar Disciplinas</h1>
<table>
    <tr><th>NOME</th><th>SIGLA</th><th>CARGA</th></tr>
    
</table>



<br>
</body>
</html>

<?php
    $arqDisc = fopen("disciplinas.txt","r") or die("erro ao abrir arquivo");
 
   while(!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);
 
 // <tr><td><?php echo $colunaDados[0] </td>
        echo "<tr><td>" . $colunaDados[0] . "</td>" .
            "<td>" . $colunaDados[1] . "</td>" .
            "<td>" . $colunaDados[2] . "</td></tr>";
    }
 
   fclose($arqDisc);
    $msg = "Deu tudo certo!!!";
    echo $msg;
?>
