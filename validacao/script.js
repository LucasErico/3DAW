function ValidarNome(nome) {
    return nome.trim().length > 0;
}

function ValidarEmail(email) {
    const eReg = /\S+@\S+\.\S+/;
    return eReg.test(email);
}

function ValidarCpf(cpf) {
    let soma = 0, resto;
    cpf = cpf.replace(/\D/g, "");  
    
    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

    for (let i = 1; i <= 9; i++)
        soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;

    soma = 0;
    for (let i = 1; i <= 10; i++)
        soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    return resto === parseInt(cpf.substring(10, 11));
}

function ValidaForm(event) {
    event.preventDefault();
    let msg = "";
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const cpf = document.getElementById("cpf").value;
    const endereco = document.getElementById("endereco").value;
    const cep = document.getElementById("cep").value;
    const cidade = document.getElementById("cidade").value;
    const ufSelect = document.getElementById("uf");
    const ufSelecionado = ufSelect.value;
    
    if (!ValidarNome(nome)) msg += "Nome não pode ser vazio!<br>";
    if (!ValidarEmail(email)) msg += "Email inválido!<br>";
    if (!ValidarCpf(cpf)) msg += "CPF inválido!<br>";
    if (!endereco.trim()) msg += "Endereço não pode ser vazio!<br>";
    if (!/^\d{5}-\d{3}$/.test(cep)) msg += "CEP inválido! Use o formato 12345-678.<br>";
    if (!ValidarNome(cidade)) msg += "Cidade não pode ser vazia!<br>";

    document.getElementById("msgErro").innerHTML = msg;

    if (!msg) {
        alert("Formulário enviado com sucesso!");
        document.getElementById("cadastro").submit();
    }

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/valid/php.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nome=" + nome + "&email=" + email + "&cpf=" + cpf + "&endereco=" + endereco + "&cep=" + cep + "&cidade=" + cidade + "&uf" + ufSelecionado);
}