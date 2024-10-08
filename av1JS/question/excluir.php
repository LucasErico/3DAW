
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
<h1>Excluir da Pergunta</h1>
<form action="excluir.php" method="POST">
    Número de Pergunta: <input type="text" name="numPergunta">
    <br><br>
    <input type="submit" value="Excluir Pergunta">
</form>

<?php

    $numPergunta = $_POST['numPergunta'];



   $arqDisc = fopen("question.txt","r") or die("erro ao abrir arquivo");
   $temp = fopen("temp.txt", "w");
   while (!feof($arqDisc)) {
  
    $linha = fgets($arqDisc);
    $dados = explode(";", $linha);
    if ($dados[0] == $numPergunta) {
      continue;
    }
    
    fwrite($temp, $linha);
  }


    fclose($arqDisc);
    fclose($temp);


    unlink("question.txt");

    rename("temp.txt", "question.txt");
 

    $msg = "Deu tudo certo!!!";
?>
</table>
<p><?php echo $msg ?></p>
<br>
</body>
</html>

