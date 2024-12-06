function incluir() {
    let nome = document.getElementById("nome").value;
    let matricula = document.getElementById("matri").value;
    let email = document.getElementById("email").value;

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

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nome=" + nome + "&matricula=" + matricula + "&email=" + email);    
}

function alterar() {
    let matricula = document.getElementById("matriAlt").value;
    let email = document.getElementById("novoemail").value;

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

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/alterar.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("matricula=" + matricula + "&email=" + email);
}

function excluir() {
    let matricula = document.getElementById("matriExc").value;

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

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/excluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("matricula=" + matricula);
}

function listarUm() {
    let matricula = document.getElementById("matriLst").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById("tabela-aluno").innerHTML = "";
                const objReturnJSON = JSON.parse(this.responseText);
                CriarLinhaTabela(objReturnJSON, "tabela-aluno");
            } else {
                console.log("Requisição falhou: " + this.status);
            }
        }
    };

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/listarUm.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("matricula=" + matricula); 
}

function listarTodos() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById("tabela-alunos").innerHTML = "";
                const objReturnJSON = JSON.parse(this.responseText);
                CriarLinhaTabela(objReturnJSON, "tabela-alunos");
            } else {
                console.log("Requisição falhou: " + this.status);
            }
        }
    };

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/listarTodos.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function CriarLinhaTabela(data, tableId) {
    const table = document.getElementById(tableId);

    if (Array.isArray(data)) {
        data.forEach(aluno => {
            const tr = document.createElement("tr");

            const tdNome = document.createElement("td");
            tdNome.textContent = aluno.nome;
            tr.appendChild(tdNome);

            const tdMatricula = document.createElement("td");
            tdMatricula.textContent = aluno.matricula;
            tr.appendChild(tdMatricula);

            const tdEmail = document.createElement("td");
            tdEmail.textContent = aluno.email;
            tr.appendChild(tdEmail);

            table.appendChild(tr);
        });
    } else {
        const tr = document.createElement("tr");

        const tdNome = document.createElement("td");
        tdNome.textContent = data.nome;
        tr.appendChild(tdNome);

        const tdMatricula = document.createElement("td");
        tdMatricula.textContent = data.matricula;
        tr.appendChild(tdMatricula);

        const tdEmail = document.createElement("td");
        tdEmail.textContent = data.email;
        tr.appendChild(tdEmail);

        table.appendChild(tr);
    }
}


function menuTest (type) {
    displayReset();
    document.getElementById(type).style.display = "block";        
}

function displayReset() {
    for (var i = 1; i <= 5; i++) {
        var element = document.getElementById(i.toString());
        if (element) {
            element.style.display = 'none'; 
        }   
    }
}