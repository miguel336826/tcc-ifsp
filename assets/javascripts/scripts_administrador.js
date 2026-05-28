const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function adicionarAdmin(e){
    e.preventDefault();
    const formAdmin = document.querySelector("#formAdmin");
    const data = new FormData(formAdmin);

    console.log(data);
    try{
        fetch(baseUrl + "cadastrar_administrador.php",{
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                document.getElementById("nome_admin").value = "";
                document.getElementById("sobrenome_admin").value = "";
                document.getElementById("nascimento_admin").value = "";
                document.getElementById("email_admin").value = "";
                document.getElementById("senha_admin").value = "";
                console.log("adicionado ao bd");
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
                    }
                }, 1000);
            } else{
                alert(data.message);
            }
        })
    }catch(erro){
        alert("Falha no cadastro")
    }
}
document.getElementById("btnAdicionarAdmin").addEventListener("click",adicionarAdmin);