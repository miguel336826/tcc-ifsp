const baseUrlUS = "http://matemagico.azurewebsites.net/tcc_html/web/";

function voltarParaLogin(){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/login_usuario.php";
}

function editarDadosPerfilUsuario(e){
    e.preventDefault();
    const id_usuario = e.target.id;
    document.getElementById("id-editar-usuario").value = id_usuario;
    fetch(baseUrlUS + "buscar_usuario.php?id_usuario="+id_usuario)
    .then(response => response.json())
    .then(data =>{
        if(data){
            const nome_usuario = document.getElementById("nome-usuario-editar");
            const sobrenome_usuario = document.getElementById("sobrenome-usuario-editar");
            const nascimento_usuario = document.getElementById("nascimento-usuario-editar");
            const email_usuario = document.getElementById("email-usuario-editar");
            nome_usuario.value = data["nome_usuario"];
            sobrenome_usuario.value = data["sobrenome_usuario"];
            nascimento_usuario.value = data["nascimento_usuario"];
            email_usuario.value = data["email_usuario"];
        }
    })
    abrirModalEditarUsuario();
    document.getElementById("btnSalvarEditarUsuario").addEventListener("click", (e) =>{
        e.preventDefault();
        const nome_usuario = document.getElementById("nome-usuario-editar").value;
        const sobrenome_usuario = document.getElementById("sobrenome-usuario-editar").value;
        const nascimento_usuario = document.getElementById("nascimento-usuario-editar").value;
        const email_usuario = document.getElementById("email-usuario-editar").value;
        const data = {"id_usuario" : id_usuario, "nome_usuario" : nome_usuario, "sobrenome_usuario" : sobrenome_usuario, "nascimento_usuario" : nascimento_usuario, "email_usuario" : email_usuario}

        console.log();

        fetch(baseUrlUS + "editar_usuario.php",{
            method: "POST",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify(data)
        })
        .then(response =>response.json())
        .then(dataa =>{
            if(dataa.success){
                buscarDadosUsuarioPerfilComToken(e);
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
        fecharModalEditarUsuario(e);
        buscarDadosUsuarioPerfilComToken(e);
    })
}

function abrirModalExcluirUsuario(){
    document.getElementById("modal-excluir-usuario").classList.add("show");
    document.getElementById("btnModalExcluirUsuarioNao").addEventListener("click",fecharModalExcluirUsuario);
}
function fecharModalExcluirUsuario(e){
    e.preventDefault();
    document.getElementById("modal-excluir-usuario").classList.remove("show");
}

function abrirModalEditarUsuario(){    
    document.getElementById("modal-editar-usuario").classList.add("show");
    document.getElementById("btnModalEditarUsuarioNao").addEventListener("click",fecharModalEditarUsuario);
}
function fecharModalEditarUsuario(){  
    document.getElementById("modal-editar-usuario").classList.remove("show");
}

function buscarDadosUsuarioPerfilComToken(e){
    e.preventDefault();
    const token_usuario = localStorage.getItem("token_usuario");
    
    console.log("token usuario: "+token_usuario);

    data = token_usuario;
    try{
        fetch(baseUrlUS + "buscar_token_usuario.php?token_usuario="+token_usuario)
        .then(response => response.json())
        .then(data =>{
            if(data){
                const dadosUsuario = document.getElementById("container-perfil-usuario");
                dadosUsuario.innerHTML = "";
                //const nome_usuario = document.createElement("h1");
                //const sobrenome_usuario = document.createElement("h1");
                const nascimento_usuario = document.createElement("h1");
                const email_usuario = document.createElement("h1");
                const btn_excluir_dados = document.createElement("button");
                const btn_editar_dados = document.createElement("button");

                //nome_usuario.textContent = data.nome_usuario;
                //sobrenome_usuario.textContent = data.sobrenome_usuario;
                nascimento_usuario.textContent = data.nascimento_usuario;
                email_usuario.textContent = data.email_usuario;

                const nome_completo = document.createElement("h1");
                nome_completo.textContent = data.nome_usuario + " " + data.sobrenome_usuario;

                btn_excluir_dados.textContent = "Excluir dados da conta";
                btn_excluir_dados.id = data.id_usuario;

                btn_editar_dados.textContent = "Editar dados da conta";
                btn_editar_dados.id = data.id_usuario;

                btn_excluir_dados.classList.add("btn");
                btn_excluir_dados.classList.add("btn-outline-dark");
                btn_excluir_dados.classList.add("me-3");
                btn_editar_dados.classList.add("btn");
                btn_editar_dados.classList.add("btn-outline-dark");

                btn_excluir_dados.addEventListener("click", excluirDadosPerfilUsuario);
                btn_editar_dados.addEventListener("click", editarDadosPerfilUsuario);

                //dadosUsuario.appendChild(nome_usuario);
                dadosUsuario.appendChild(nome_completo);
                //dadosUsuario.appendChild(sobrenome_usuario);
                dadosUsuario.appendChild(nascimento_usuario);
                dadosUsuario.appendChild(email_usuario);
                dadosUsuario.appendChild(btn_excluir_dados);
                dadosUsuario.appendChild(btn_editar_dados);
            } else{
                alert(data.message);
            }
        })
    } catch(erro){
        alert("Algo deu errado");
    }
}

function excluirDadosPerfilUsuario(e){
    const id_usuario = e.target.id;
    const data = {"id_usuario" : id_usuario};
    console.log(data);
    abrirModalExcluirUsuario();
    document.getElementById("btnModalExcluirUsuarioSim").addEventListener("click", () => {
        fetch(baseUrlUS + "excluir_usuario.php",{
            method:"POST",
            headers:{"Content-Type" : "application/json"},
            body:JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){  
                voltarParaLogin();
                
                localStorage.clear("id_usuario",data["id_usuario"]);
                localStorage.clear("token_usuario",data["token_usuario"]);
            }else{
                alert(data.message);
            }
        });
        fecharModalEditarUsuario();
    })
}

function buscarCaminhoImagem(){
    const id_usuario = localStorage.getItem("id_usuario");
    console.log("id usuario: "+id_usuario);
    data = id_usuario;
    try{
        fetch(baseUrlUS + "buscar_imagem.php?id_usuario="+id_usuario)
        .then(response => response.json())
        .then(data =>{
            if (data){
                const foto = data.imagem_usuario;
                console.log(foto);

                //const containerPerfil = document.getElementById("container-perfil-usuario");

                const imgElement = document.getElementById("imagemdoperfil");
                imgElement.src = foto;

                //containerPerfil.appendChild(imgElement);

                //containerPerfil.classList.remove("d-none");
            } else {
                alert(data.message);
            }
        })
    } catch(erro){
        alert("Algo deu errado");
    }
}
const usuario_idd = localStorage.getItem("id_usuario");
const usuario_tokenn = localStorage.getItem("token_usuario");        
if(usuario_idd != "" && usuario_tokenn != ""){
    buscarCaminhoImagem();
};

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

const btnEnviar = document.getElementById("btnSalvarEditarUsuario");
btnEnviar.classList.add("disabled");

function verEspacos(){
    const nome = document.getElementById("nome-usuario-editar").value;
    const sobrenome = document.getElementById("sobrenome-usuario-editar").value;
    const nasc = document.getElementById("nascimento-usuario-editar").value;
    const email = document.getElementById("email-usuario-editar").value;
    if(nome == "" || sobrenome == "" || nasc == "" || email == ""){
        btnEnviar.classList.add("disabled");
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
    let textoNome = document.getElementById("nome-usuario-editar").value;
    let tmpNome = "";
    for(let i = 0; i < textoNome.length; i++){
        if(!temDigito(textoNome[i])){
            tmpNome = tmpNome + textoNome[i];
        }
    }
    document.getElementById("nome-usuario-editar").value = tmpNome;
}

function validarNome(){
    let textoNome = document.getElementById("nome-usuario-editar").value;
    let avisoNome = document.getElementById("aviso_nome");
    if(textoNome.length < 2){
        avisoNome.textContent = avisos("avisoNome");
        btnEnviar.classList.add("disabled");
    } else{
        avisoNome.textContent = "";
        btnEnviar.classList.remove("disabled");
        verEspacos();
    }
}

function verificarSobrenome(){
    let textoSobrenome = document.getElementById("sobrenome-usuario-editar").value;
    console.log(textoSobrenome);
    let tmpSobrenome = "";
    for(let i = 0; i < textoSobrenome.length; i++){
        if(!temDigito(textoSobrenome[i])){
            tmpSobrenome = tmpSobrenome + textoSobrenome[i];
        }
    }
    document.getElementById("sobrenome-usuario-editar").value = tmpSobrenome;
}

function validarSobrenome(){
    let textoSobrenome = document.getElementById("sobrenome-usuario-editar").value;
    let avisoSobrenome = document.getElementById("aviso_sobrenome");
    if(textoSobrenome.length < 2){
        avisoSobrenome.textContent = avisos("avisoSobrenome");
        btnEnviar.classList.add("disabled");
    } else{
        avisoSobrenome.textContent = "";
        btnEnviar.classList.remove("disabled");
        verEspacos();
    }
}

function verificarData(){
    let textoData = document.getElementById("nascimento-usuario-editar").value;
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
    document.getElementById("nascimento-usuario-editar").value = tmpData;
}

function validarData(){
    let textoData = document.getElementById("nascimento-usuario-editar").value;
    let avisoData = document.getElementById("aviso_nascimento");
    let dia = parseInt(textoData.substring(0,2));
    let mes = parseInt(textoData.substring(3,5));
    let ano = parseInt(textoData.substring(6));
    if(!(dia >= 1 && dia <= 31)){
        btnEnviar.classList.add("disabled");
        avisoData.textContent = avisos("avisoDia");
        return;
    }
    if(!(mes >= 1 && mes <= 12)){
        btnEnviar.classList.add("disabled");
        avisoData.textContent = avisos("avisoMes");
        return;
    }
    if(!(ano >= 1900 && ano <= 2023)){
        btnEnviar.classList.add("disabled");
        avisoData.textContent = avisos("avisoAno");
        return;
    }
    avisoData.textContent = "";
    btnEnviar.classList.remove("disabled");
    verEspacos();
}

function validarEmail(){
    let textoEmail = document.getElementById("email-usuario-editar").value;
    let avisoEmail = document.getElementById("aviso_email");
    if(textoEmail.length < 3){
        avisoEmail.textContent = avisos("avisoEmailTamanho");
        btnEnviar.classList.add("disabled");
        return;
    }

    const valido = lerEmail(textoEmail);

    if(!valido){
        btnEnviar.classList.add("disabled");
        avisoEmail.textContent = avisos("avisoEmailValido");
        return;
    }

    avisoEmail.textContent = "";
    btnEnviar.classList.remove("disabled");
    verEspacos();
}

function lerEmail(textoEmail){
    const regex = /^[^\s]+@[^\s]+\.[^\s]/;
    return regex.test(textoEmail);
}

document.getElementById("nome-usuario-editar").addEventListener("input",verificarNome)
document.getElementById("nome-usuario-editar").addEventListener("blur",validarNome)
document.getElementById("sobrenome-usuario-editar").addEventListener("input",verificarSobrenome)
document.getElementById("sobrenome-usuario-editar").addEventListener("blur",validarSobrenome)
document.getElementById("nascimento-usuario-editar").addEventListener("input", validarData)
document.getElementById("nascimento-usuario-editar").addEventListener("input", verificarData)
document.getElementById("nascimento-usuario-editar").addEventListener("blur", validarData)
document.getElementById("email-usuario-editar").addEventListener("input", validarEmail)
document.getElementById("email-usuario-editar").addEventListener("blur", validarEmail)
document.addEventListener("DOMContentLoaded", verEspacos)

document.addEventListener("DOMContentLoaded", buscarDadosUsuarioPerfilComToken);