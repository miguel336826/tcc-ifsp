const baseUrlAD = "http://matemagico.azurewebsites.net/tcc_html/web/";

function voltarParaLogin(){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/login_usuario.php";
}

function editarDadosPerfilAdmin(e){
    e.preventDefault();
    const id_admin = e.target.id;
    document.getElementById("id-editar-admin").value = id_admin;
    fetch(baseUrlUS + "buscar_admin.php?id_admin="+id_admin)
    .then(response => response.json())
    .then(data =>{
        if(data){
            const nome_admin = document.getElementById("nome-admin-editar");
            const sobrenome_admin = document.getElementById("sobrenome-admin-editar");
            const nascimento_admin = document.getElementById("nascimento-admin-editar");
            const email_admin = document.getElementById("email-admin-editar");
            nome_admin.value = data["nome_admin"];
            sobrenome_admin.value = data["sobrenome_admin"];
            nascimento_admin.value = data["nascimento_admin"];
            email_admin.value = data["email_admin"];
        }
    })
    abrirModalEditarAdmin();
    document.getElementById("btnSalvarEditarAdmin").addEventListener("click", (e) =>{
        e.preventDefault();
        const nome_admin = document.getElementById("nome-admin-editar").value;
        const sobrenome_admin = document.getElementById("sobrenome-admin-editar").value;
        const nascimento_admin = document.getElementById("nascimento-admin-editar").value;
        const email_admin = document.getElementById("email-admin-editar").value;
        const data = {"id_admin" : id_admin, "nome_admin" : nome_admin, "sobrenome_admin" : sobrenome_admin, "nascimento_admin" : nascimento_admin, "email_admin" : email_admin}

        console.log();

        fetch(baseUrlUS + "editar_admin.php",{
            method: "POST",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify(data)
        })
        .then(response =>response.json())
        .then(dataa =>{
            if(dataa.success){
                buscarDadosAdminPerfilComToken(e);
                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-sucesso");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-sucesso");
                    alerta.textContent = "Dados atualizados.";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                        redirecionarHome();
                    }
                }, 1000);
            } else{
                alert(dataa.message);
                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-erro");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-erro");
                    alerta.textContent = "Dados não atualizados, tente novamente.";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                    }
                }, 1000);
            }
        });
        fecharModalEditarAdmin(e);
        buscarDadosAdminPerfilComToken(e);
    })
}

function abrirModalExcluirAdmin(){
    document.getElementById("modal-excluir-admin").classList.add("show");
    document.getElementById("btnModalExcluirAdminNao").addEventListener("click",fecharModalExcluirAdmin);
}
function fecharModalExcluirAdmin(e){
    e.preventDefault();
    document.getElementById("modal-excluir-admin").classList.remove("show");
}

function abrirModalEditarAdmin(){    
    document.getElementById("modal-editar-admin").classList.add("show");
    document.getElementById("btnModalEditarAdminNao").addEventListener("click",fecharModalEditarAdmin);
}
function fecharModalEditarAdmin(e){
    e.preventDefault();  
    document.getElementById("modal-editar-admin").classList.remove("show");
}

function buscarDadosAdminPerfilComToken(e){
    e.preventDefault();
    const token_administrador = localStorage.getItem("token_admin");
    console.log("token admin: "+token_administrador);
    data = token_administrador;
    try{
        fetch(baseUrlAD + "buscar_token_administrador.php?token_administrador="+token_administrador)
        .then(response => response.json())
        .then(data =>{
            if(data){
                const dadosAdministrador = document.getElementById("container-perfil-admin");
                dadosAdministrador.innerHTML = "";
                const nascimento_administrador = document.createElement("h1");
                const email_administrador = document.createElement("h1");
                const btn_excluir_dados = document.createElement("button");
                const btn_editar_dados = document.createElement("button");

                nascimento_administrador.textContent = data.nascimento_admin;
                email_administrador.textContent = data.email_admin;

                const nome_completo = document.createElement("h1");
                nome_completo.textContent = data.nome_admin + " " + data.sobrenome_admin;

                btn_excluir_dados.textContent = "Excluir dados da conta";
                btn_excluir_dados.id = data.id_admin;

                btn_editar_dados.textContent = "Editar dados da conta";
                btn_editar_dados.id = data.id_admin;

                btn_excluir_dados.classList.add("btn");
                btn_excluir_dados.classList.add("btn-primary");
                btn_excluir_dados.classList.add("me-3");
                btn_editar_dados.classList.add("btn");
                btn_editar_dados.classList.add("btn-outline-primary");

                btn_excluir_dados.addEventListener("click", excluirDadosPerfilAdmin);
                btn_editar_dados.addEventListener("click", editarDadosPerfilAdmin);

                dadosAdministrador.appendChild(nome_completo);
                dadosAdministrador.appendChild(nascimento_administrador);
                dadosAdministrador.appendChild(email_administrador);
                dadosAdministrador.appendChild(btn_excluir_dados);
                dadosAdministrador.appendChild(btn_editar_dados);
            } else{
                alert(data.message);
            }
        })
    } catch(erro){
        alert("Algo deu errado");
    }
}

function excluirDadosPerfilAdmin(e){
    const id_admin = e.target.id;
    const data = {"id_admin" : id_admin};
    console.log(data);
    abrirModalExcluirAdmin();
    document.getElementById("btnModalExcluirAdminSim").addEventListener("click", () => {
        fetch(baseUrlUS + "excluir_admin.php",{
            method:"POST",
            headers:{"Content-Type" : "application/json"},
            body:JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){  
                voltarParaLogin();
                
                localStorage.clear("id_admin",data["id_admin"]);
                localStorage.clear("token_admin",data["token_admin"]);
            }else{
                alert(data.message);
            }
        });
        fecharModalEditarAdmin();
    })
}

function avisos(x){
    switch(x){
        case "avisoNome": return "Nome precisa ter ao menos dois caracteres.";
        case "avisoSobrenome": return "Sobrenome precisa ter ao menos dois caracteres.";
        case "avisoDia": return "Dia apenas entre 1 e 31";
        case "avisoMes": return "Mês apenas entre 1 e 12";
        case "avisoAno": return "Ano apenas entre 1900 e 2024";
        case "avisoEmailTamanho": return "Email precisa ter mais de 3 caracteres";
        case "avisoEmailValido": return "Digite um Email válido";
    }
}

const btnEnviarAdm = document.getElementById("btnSalvarEditarAdmin");
btnEnviarAdm.classList.add("disabled");

function verEspacos(){
    const nome = document.getElementById("nome-admin-editar").value;
    const sobrenome = document.getElementById("sobrenome-admin-editar").value;
    const nasc = document.getElementById("nascimento-admin-editar").value;
    const email = document.getElementById("email-admin-editar").value;
    if(nome == "" || sobrenome == "" || nasc == "" || email == ""){
        btnEnviarAdm.classList.add("disabled");
    }
}

function temDigito(x){
    return !isNaN(parseInt(x));
}

function temMaiuscula(x){
    if(x >= "A" && x <= "Z"){
        return true;
    }
    return false;
}

function temMinuscula(x){
    if(x >= "a" && x <= "z"){
        return true;
    }
    return false;
}

function temArroba(x){
    if(x == "@"){
        return true;
    }
    return false;
}

function temPonto(x){
    if(x == "."){
        return true;
    }
    return false;
}

function verificarNome(){
    let textoNome = document.getElementById("nome-admin-editar").value;
    let tmpNome = "";
    for(let i = 0; i < textoNome.length; i++){
        if(!temDigito(textoNome[i])){
            tmpNome = tmpNome + textoNome[i];
        }
    }
    document.getElementById("nome-admin-editar").value = tmpNome;
}

function validarNome(){
    let textoNome = document.getElementById("nome-admin-editar").value;
    let avisoNome = document.getElementById("aviso_nome");
    if(textoNome.length < 2){
        avisoNome.textContent = avisos("avisoNome");
        btnEnviarAdm.classList.add("disabled");
    } else{
        avisoNome.textContent = "";
        btnEnviarAdm.classList.remove("disabled");
        verEspacos();
    }
}

function verificarSobrenome(){
    let textoSobrenome = document.getElementById("sobrenome-admin-editar").value;
    console.log(textoSobrenome);
    let tmpSobrenome = "";
    for(let i = 0; i < textoSobrenome.length; i++){
        if(!temDigito(textoSobrenome[i])){
            tmpSobrenome = tmpSobrenome + textoSobrenome[i];
        }
    }
    document.getElementById("sobrenome-admin-editar").value = tmpSobrenome;
}

function validarSobrenome(){
    let textoSobrenome = document.getElementById("sobrenome-admin-editar").value;
    let avisoSobrenome = document.getElementById("aviso_sobrenome");
    if(textoSobrenome.length < 2){
        avisoSobrenome.textContent = avisos("avisoSobrenome");
        btnEnviarAdm.classList.add("disabled");
    } else{
        avisoSobrenome.textContent = "";
        btnEnviarAdm.classList.remove("disabled");
        verEspacos();
    }
}

function verificarData(){
    let textoData = document.getElementById("nascimento-admin-editar").value;
    let tmpData = "";
    for(let i = 0; i < textoData.length; i++){
        if(temDigito(textoData[i])){
            tmpData = tmpData + textoData[i];
        }
    }
    if(tmpData.length > 2){
        tmpData = tmpData.substring(0,2) + "/" + tmpData.substring(2);
    }
    if(tmpData.length > 5){
        tmpData = tmpData.substring(0,5) + "/" + tmpData.substring(5);
    }
    document.getElementById("nascimento-admin-editar").value = tmpData;
}

function validarData(){
    let textoData = document.getElementById("nascimento-admin-editar").value;
    let avisoData = document.getElementById("aviso_nascimento");
    let dia = parseInt(textoData.substring(0,2));
    let mes = parseInt(textoData.substring(3,5));
    let ano = parseInt(textoData.substring(6));
    if(!(dia >= 1 && dia <= 31)){
        btnEnviarAdm.classList.add("disabled");
        avisoData.textContent = avisos("avisoDia");
        return;
    }
    if(!(mes >= 1 && mes <= 12)){
        btnEnviarAdm.classList.add("disabled");
        avisoData.textContent = avisos("avisoMes");
        return;
    }
    if(!(ano >= 1900 && ano <= 2023)){
        btnEnviarAdm.classList.add("disabled");
        avisoData.textContent = avisos("avisoAno");
        return;
    }
    avisoData.textContent = "";
    btnEnviarAdm.classList.remove("disabled");
    verEspacos();
}

function validarEmail(){
    let textoEmail = document.getElementById("email-admin-editar").value;
    let avisoEmail = document.getElementById("aviso_email");
    if(textoEmail.length < 3){
        avisoEmail.textContent = avisos("avisoEmailTamanho");
        btnEnviarAdm.classList.add("disabled");
        return;
    }

    const valido = lerEmail(textoEmail);

    if(!valido){
        btnEnviarAdm.classList.add("disabled");
        avisoEmail.textContent = avisos("avisoEmailValido");
        return;
    }

    avisoEmail.textContent = "";
    btnEnviarAdm.classList.remove("disabled");
    verEspacos();
}

function lerEmail(textoEmail){
    const regex = /^[^\s]+@[^\s]+\.[^\s]/;
    return regex.test(textoEmail);
}

document.getElementById("nome-admin-editar").addEventListener("input",verificarNome)
document.getElementById("nome-admin-editar").addEventListener("blur",validarNome)
document.getElementById("sobrenome-admin-editar").addEventListener("input",verificarSobrenome)
document.getElementById("sobrenome-admin-editar").addEventListener("blur",validarSobrenome)
document.getElementById("nascimento-admin-editar").addEventListener("input", validarData)
document.getElementById("nascimento-admin-editar").addEventListener("input", verificarData)
document.getElementById("nascimento-admin-editar").addEventListener("blur", validarData)
document.getElementById("email-admin-editar").addEventListener("input", validarEmail)
document.getElementById("email-admin-editar").addEventListener("blur", validarEmail)
document.addEventListener("DOMContentLoaded", verEspacos)

document.addEventListener("DOMContentLoaded", buscarDadosAdminPerfilComToken);