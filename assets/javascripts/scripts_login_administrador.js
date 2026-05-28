const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function redirecionarHome(){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/home.php";
}

function loginAdmin(e){
    e.preventDefault();
    const formLoginAdmin = document.querySelector("#formLoginAdmin");
    const data = new FormData(formLoginAdmin);
    
    console.log(data);

    fetch(baseUrl + "logar_administrador.php",{
        method: "POST",
        body: data
    })
    .then(response => response.json())
    .then(data =>{
        if(data.success){
            document.getElementById("email_admin").value = "";    
            document.getElementById("senha_admin").value = "";    

            localStorage.clear("id_usuario",data["id_usuario"]);
            localStorage.clear("token_usuario",data["token_usuario"]);
            localStorage.clear("nome_usuario",data["nome_usuario"]);
            localStorage.clear("sobrenome_usuario",data["sobrenome_usuario"]);

            localStorage.clear("id_admin",data["id_admin"]);
            localStorage.clear("token_admin",data["token_admin"]);
            localStorage.clear("nome_admin",data["nome_admin"]);
            localStorage.clear("sobrenome_admin",data["sobrenome_admin"]);

            localStorage.setItem("id_admin",data["id_admin"]);
            localStorage.setItem("token_admin",data["token_admin"]);
            localStorage.setItem("nome_admin",data["nome_admin"]);
            localStorage.setItem("sobrenome_admin",data["sobrenome_admin"]);
            console.log(data["nome_admin"]+" "+data["sobrenome_admin"]);

            console.log("dados do admin enviados para o localstorage");
            console.log("login efetuado");

            let count = 5;
            const timer = setInterval(function(){
                count--;
                const divalerta = document.getElementById("div-alerta-sucesso");
                divalerta.classList.remove("d-none");
                const alerta = document.getElementById("alerta-sucesso");
                alerta.textContent = "Login concluído";
                if(count === 0){
                    clearInterval(timer);
                    divalerta.classList.add("d-none");
                    alerta.textContent = "";
                    redirecionarHome();
                }
            }, 1000);
        } else{
            let count = 5;
            const timer = setInterval(function(){
                count--;
                const divalerta = document.getElementById("div-alerta-erro");
                divalerta.classList.remove("d-none");
                const alerta = document.getElementById("alerta-erro");
                alerta.textContent = "Login não efetuado, tente novamente";
                if(count === 0){
                    clearInterval(timer);
                    divalerta.classList.add("d-none");
                    alerta.textContent = "";
                }
            }, 1000);
        }
    }).catch(error =>{
        let count = 5;
        const timer = setInterval(function(){
            count--;
            const divalerta = document.getElementById("div-alerta-erro");
            divalerta.classList.remove("d-none");
            const alerta = document.getElementById("alerta-erro");
            alerta.textContent = "Login não efetuado, tente novamente";
            if(count === 0){
                clearInterval(timer);
                divalerta.classList.add("d-none");
                alerta.textContent = "";
            }
        }, 1000);
        //console.log(error);
    })
}
document.getElementById("btnLoginAdmin").addEventListener("click",loginAdmin);