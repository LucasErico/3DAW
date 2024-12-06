<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = trim($_GET["nome"] ?? "");
    $email = trim($_GET["email"] ?? "");
    $cpf = trim($_GET["cpf"] ?? "");
    $endereco = trim($_GET["endereco"] ?? "");
    $cep = trim($_GET["cep"] ?? "");
    $cidade = trim($_GET["cidade"] ?? "");
    $uf = trim($_GET["uf"] ?? "");

    $formInvalido = false;

    function validaDadosString($strDado) {
        return !empty($strDado);
    }

    function validaEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    function validaCPF($cpf) {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    function validaCEP($cep) {
        return preg_match('/^\d{5}-\d{3}$/', $cep);
    }

    if (!validaDadosString($nome)) {
        $formInvalido = true;
    }

    if (!validaEmail($email)) {
        $formInvalido = true;
    }

    if (!validaCPF($cpf)) {
        $formInvalido = true;
    }

    if (!validaDadosString($endereco)) {
        $formInvalido = true;
    }

    if (!validaCEP($cep)) {
        $formInvalido = true;
    }

    if (!validaDadosString($cidade)) {
        $formInvalido = true;
    }

    if (!in_array($uf, ["RJ", "ES", "SP", "BA", "MG", "PE", "RS"])) {
        $formInvalido = true;
    }

    if (!$formInvalido) {
        $servidor = "localhost"; 
        $user = "root";
        $senha = "";
        $database = "clientes";

        $conexao = new mysqli ($servidor, $user, $senha, $database);

        if ($conexao->connect_error) {  
            die ("Conexao Falhou!");
        } else {   
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST["id"]; 
                $comando = "INSERT INTO `cliente`  (`nome`, `email`, `cpf`, `endereco`, `cep`, `cidade`, `uf`)  
                            VALUES ('" . $nome . "','" . $email . "','" . $cpf . "','" . $endereco . "','" . $cep . "','" . $cidade .  "','" . $uf ."')";
                $resultado = $conexao->query($comando);
            }
        }
    }
}
?>
