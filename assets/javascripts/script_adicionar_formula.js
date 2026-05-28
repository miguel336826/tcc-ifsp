const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function adicionarFormula(e){
    e.preventDefault();

    const formAddFormula = document.querySelector("#formAddFormula");
    const data = new FormData(formAddFormula);

    console.log(data);
    try{
        fetch(baseUrl + "adiciona_formula.php",{
            method: "POST",
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                document.getElementById("titulo_fo").value = "";
                document.getElementById("materia").value = "";
                document.getElementById("expressao").value = "";
                console.log("adicionado");
                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-sucesso");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-sucesso");
                    alerta.textContent = "Fórmula adicionada.";
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
                    alerta.textContent = "Fórmula não adicionada, tente novamente";
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
            alerta.textContent = "Fórmula não adicionada, tente novamente";
            if(count === 0){
                clearInterval(timer);
                divalerta.classList.add("d-none");
                alerta.textContent = "";
            }
        }, 1000);
    }
}

document.getElementById("btnAdicionarFormula").addEventListener("click",adicionarFormula);