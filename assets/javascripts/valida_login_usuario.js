function avisos(x){
    switch(x){
        case "avisoEmailTamanho": return "Email precisa ter mais de 3 caracteres";
        case "avisoEmailValido": return "Digite um Email válido";
        case "avisoSenhaTamanho": return "Senha precisa ser maior que 8";
        case "avisoSenhaMaiuscula": return "Senha precisa ter maiúsculas";
        case "avisoSenhaMinuscula": return "Senha precisa ter minúsculas";
        case "avisoSenhaNumero": return "Senha precisa ter um número";
        case "avisoSenhaEspecial": return "Senha precisa ter caracteres especiais";
    }
}

const btnEnviar = document.getElementById("btnLoginUsuario");
btnEnviar.classList.add("disabled");

function verEspacos(){
    const email = document.getElementById("email_usuario").value;
    const senha = document.getElementById("senha_usuario").value;
    if(email == "" || senha == ""){
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

    /*let arroba = false;
    let ponto = false;
    for(let i = 0; i < textoEmail.length; i++){
        if(temArroba(textoEmail[i])){
            arroba = true;
        } else if(temPonto(textoEmail[i])){
            ponto = true;
        }
    }
    if((arroba == false) || (ponto == false)){
        btnEnviar.classList.add("disabled");
        avisoEmail.textContent = avisos("avisoEmailValido");
        return;
    }*/

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

document.getElementById("email_usuario").addEventListener("input", validarEmail)
document.getElementById("email_usuario").addEventListener("blur", validarEmail)
document.getElementById("senha_usuario").addEventListener("input", validarSenha)
document.getElementById("senha_usuario").addEventListener("blur", validarSenha)
document.addEventListener("DOMContentLoaded", verEspacos);