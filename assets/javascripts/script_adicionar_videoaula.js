const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function redirecionarVid(){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/videoaulas.php";
}
function adicionarVideoaula(e){
    e.preventDefault();
    const formAddVideoaula = document.querySelector("#formAddVideoaula");
    const data = new FormData(formAddVideoaula);
    console.log(data);
    try{
        fetch(baseUrl + "adiciona_videoaula.php",{
            method: "POST",
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                document.getElementById("titulo_va").value = "";
                document.getElementById("descricao").value = "";
                document.getElementById("link").value = "";

                console.log("video adicionado");

                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-sucesso");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-sucesso");
                    alerta.textContent = "Videoaula adicionada.";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                    }
                }, 1000);

            } else{
                alert(data.message);
                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-erro");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-erro");
                    alerta.textContent = "Videoaula não adicionada, tente novamente";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                    }
                }, 1000);
            }
        })
    } catch(erro){
        let count = 5;
        const timer = setInterval(function(){
            count--;
            const divalerta = document.getElementById("div-alerta-erro");
            divalerta.classList.remove("d-none");
            const alerta = document.getElementById("alerta-erro");
            alerta.textContent = "Videoaula não adicionada, tente novamente";
            if(count === 0){
                clearInterval(timer);
                divalerta.classList.add("d-none");
                alerta.textContent = "";
            }
        }, 1000);
        alert("Algo deu errado");
    }
}
document.getElementById("btnAdicionarVideoaula").addEventListener("click",adicionarVideoaula);