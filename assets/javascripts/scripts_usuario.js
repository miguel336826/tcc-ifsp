const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function redirecionarLogin(){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/login_usuario.php";
}

function adicionarUsuario(e){
    e.preventDefault();
    const formUsuario = document.querySelector("#formUsuario");
    const data = new FormData(formUsuario);
    console.log("em função js");
    console.log(data);
    try{
        fetch(baseUrl + "cadastrar_usuario.php",{
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                document.getElementById("nome_usuario").value = "";
                document.getElementById("sobrenome_usuario").value = "";
                document.getElementById("nascimento_usuario").value = "";
                document.getElementById("email_usuario").value = "";
                document.getElementById("senha_usuario").value = "";

                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-sucesso");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-sucesso");
                    alerta.textContent = "Cadastro concluído";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                        redirecionarLogin();
                    }
                }, 1000);
    
                console.log("usuario adicionado");
            } else{
                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-erro");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-erro");
                    alerta.textContent = data.message;
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                    }
                }, 1000);
            }
        })
    }catch(erro){
        let count = 5;
        const timer = setInterval(function(){
            count--;
            const divalerta = document.getElementById("div-alerta-erro");
            divalerta.classList.remove("d-none");
            const alerta = document.getElementById("alerta-erro");
            alerta.textContent = "Cadastro não efetuado, tente novamente";
            if(count === 0){
                clearInterval(timer);
                divalerta.classList.add("d-none");
                alerta.textContent = "";
            }
        }, 1000);
        alert("Falha no cadastro");
    }
}
document.getElementById("btnAdicionarUsuario").addEventListener("click",adicionarUsuario);