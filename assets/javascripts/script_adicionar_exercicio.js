const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function redirecionarEx(){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/exercicios.php";
}

function adicionarExercicio(e){
    e.preventDefault();
    const formAddExercicio = document.querySelector("#formAddExercicio");
    const data = new FormData(formAddExercicio);
    console.log(data);
    try{
        fetch(baseUrl + "adiciona_exercicio.php",{
            method: "POST",
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                document.getElementById("enunciado").value = "";
                document.getElementById("comando").value = "";
                document.getElementById("alt_a").value = "";
                document.getElementById("alt_b").value = "";
                document.getElementById("alt_c").value = "";
                document.getElementById("alt_d").value = "";
                document.getElementById("alt_e").value = "";
                document.getElementById("correto").value = "";
                document.getElementById("explicacao").value = "";
                document.getElementById("id_assunto").value = "";
                console.log("sucesso");

                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-sucesso");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-sucesso");
                    alerta.textContent = "Exercício adicionado.";
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
                    alerta.textContent = "Exercício não adicionado, tente novamente";
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
            alerta.textContent = "Exercício não adicionado, tente novamente";
            if(count === 0){
                clearInterval(timer);
                divalerta.classList.add("d-none");
                alerta.textContent = "";
            }
        }, 1000);
        alert("Algo deu errado");
    }
}

document.getElementById("btnAdicionarExercicio").addEventListener("click",adicionarExercicio);