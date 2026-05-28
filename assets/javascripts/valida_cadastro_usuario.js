function avisos(x){
    switch(x){
        case "avisoNome": return "Nome precisa ter ao menos dois caracteres.";
        case "avisoSobrenome": return "Sobrenome precisa ter ao menos dois caracteres.";
        case "avisoDia": return "Dia apenas entre 1 e 31";
        case "avisoMes": return "Mês apenas entre 1 e 12";
        case "avisoAno": return "Ano apenas entre 1900 e 2024";
        case "avisoEmailTamanho": return "Email precisa ter mais de 3 caracteres";
        case "avisoEmailValido": return "Digite um Email válido";
        case "avisoSenhaTamanho": return "Senha precisa ser maior que 8";
        case "avisoSenhaMaiuscula": return "Senha precisa ter maiúsculas";
        case "avisoSenhaMinuscula": return "Senha precisa ter minúsculas";
        case "avisoSenhaNumero": return "Senha precisa ter um número";
        case "avisoSenhaEspecial": return "Senha precisa ter caracteres especiais";
    }
}

const btnEnviar = document.getElementById("btnAdicionarUsuario");
btnEnviar.classList.add("disabled");

function verEspacos(){
    const nome = document.getElementById("nome_usuario").value;
    const sobrenome = document.getElementById("sobrenome_usuario").value;
    const nasc = document.getElementById("nascimento_usuario").value;
    const email = document.getElementById("email_usuario").value;
    const senha = document.getElementById("senha_usuario").value;
    if(nome == "" || sobrenome == "" || nasc == "" || email == "" || senha == ""){
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
    let textoNome = document.getElementById("nome_usuario").value;
    let tmpNome = "";
    for(let i = 0; i < textoNome.length; i++){
        if(!temDigito(textoNome[i])){
            tmpNome = tmpNome + textoNome[i];
        }
    }
    document.getElementById("nome_usuario").value = tmpNome;
}

function validarNome(){
    let textoNome = document.getElementById("nome_usuario").value;
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
    let textoSobrenome = document.getElementById("sobrenome_usuario").value;
    console.log(textoSobrenome);
    let tmpSobrenome = "";
    for(let i = 0; i < textoSobrenome.length; i++){
        if(!temDigito(textoSobrenome[i])){
            tmpSobrenome = tmpSobrenome + textoSobrenome[i];
        }
    }
    document.getElementById("sobrenome_usuario").value = tmpSobrenome;
}

function validarSobrenome(){
    let textoSobrenome = document.getElementById("sobrenome_usuario").value;
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
    let textoData = document.getElementById("nascimento_usuario").value;
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
    document.getElementById("nascimento_usuario").value = tmpData;
}

function validarData(){
    let textoData = document.getElementById("nascimento_usuario").value;
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
    let textoEmail = document.getElementById("email_usuario").value;
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

function validarSenha(){
    let textoSenha = document.getElementById("senha_usuario").value;
    let avisoSenha =  document.getElementById("aviso_senha");
    let minuscula = false;
    let maiuscula = false;
    let numero = false;
    let especial = false;
    if(textoSenha.length < 8){
        avisoSenha.textContent = avisos("avisoSenhaTamanho");
        btnEnviar.classList.add("disabled");
        return;
    } else{
        btnEnviar.classList.remove("disabled");
        verEspacos();
    }
    for(let i = 0; i < textoSenha.length; i++){
        if(temMaiuscula(textoSenha[i])){
            maiuscula = true;
        }
        if(temMinuscula(textoSenha[i])){
            minuscula = true;
        }
        if(temDigito(textoSenha[i])){
            numero = true;
        }
        if(!temMaiuscula(textoSenha[i]) && !temMinuscula(textoSenha[i]) && !temDigito(textoSenha[i])){
            especial = true;
        }
    }
    if(!maiuscula){
        avisoSenha.textContent = avisos("avisoSenhaMaiuscula");
        btnEnviar.classList.add("disabled");
        return;
    }
    if(!minuscula){
        avisoSenha.textContent = avisos("avisoSenhaMinuscula");
        btnEnviar.classList.add("disabled");
        return;
    }
    if(!numero){
        avisoSenha.textContent = avisos("avisoSenhaNumero");
        btnEnviar.classList.add("disabled");
        return;
    }
    if(!especial){
        avisoSenha.textContent = avisos("avisoSenhaEspecial");
        btnEnviar.classList.add("disabled");
        return;
    }
    avisoSenha.textContent = "";
    btnEnviar.classList.remove("disabled");
    verEspacos();
}

document.getElementById("nome_usuario").addEventListener("input",verificarNome)
document.getElementById("nome_usuario").addEventListener("blur",validarNome)
document.getElementById("sobrenome_usuario").addEventListener("input",verificarSobrenome)
document.getElementById("sobrenome_usuario").addEventListener("blur",validarSobrenome)
document.getElementById("nascimento_usuario").addEventListener("input", validarData)
document.getElementById("nascimento_usuario").addEventListener("input", verificarData)
document.getElementById("nascimento_usuario").addEventListener("blur", validarData)
document.getElementById("email_usuario").addEventListener("input", validarEmail)
document.getElementById("email_usuario").addEventListener("blur", validarEmail)
document.getElementById("senha_usuario").addEventListener("input", validarSenha)
document.getElementById("senha_usuario").addEventListener("blur", validarSenha)
document.addEventListener("DOMContentLoaded", verEspacos);