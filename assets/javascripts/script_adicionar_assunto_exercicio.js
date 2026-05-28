const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function adicionarAssuntoExercicio(e){
    e.preventDefault();
    const formAddAssuntoVideoaula = document.querySelector("#formAddAssuntoVideoaula");
    const data = new FormData(formAddAssuntoVideoaula);
    try{
        fetch(baseUrl + "adiciona_assunto_videoaula.php",{
            method: "POST",
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                document.getElementById("assunto").value = "";
                console.log("adicionado");
                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-sucesso");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-sucesso");
                    alerta.textContent = "Assunto adicionado.";
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
                    alerta.textContent = "Assunto não adicionado, tente novamente";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                    }
                }, 1000);
            }
        })
    } catch(erro){
        alert("Algo deu errado.");
        let count = 5;
        const timer = setInterval(function(){
            count--;
            const divalerta = document.getElementById("div-alerta-erro");
            divalerta.classList.remove("d-none");
            const alerta = document.getElementById("alerta-erro");
            alerta.textContent = "Assunto não adicionado, tente novamente";
            if(count === 0){
                clearInterval(timer);
                divalerta.classList.add("d-none");
                alerta.textContent = "";
            }
        }, 1000);
    }
}

document.getElementById("btnAdicionarAssuntoVideoaula").addEventListener("click",adicionarAssuntoExercicio);