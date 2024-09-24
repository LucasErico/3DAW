<?php

    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  
    {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
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
    }
?>
<!DOCTYPE html>
<html>
<head>
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
<main>
<h1>Cadastrar Novo Usuário</h1>
<form action="cadastrar.php" method="POST">
    Nome: <input type="text" name="nome">
    <br><br>
    Email: <input type="text" name="email">
    <br><br>
    Senha: <input type="text" name="senha">
    <br><br>
    <input type="submit" value="Cadastrar Novo Usuário">
</form>
<p><?php echo $msg ?></p>
<br>
</main>
</body>
</html>