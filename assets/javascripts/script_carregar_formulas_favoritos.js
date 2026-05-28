const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function carregaIdsFormulasFavoritos(){
    const id_usuario = parseInt(localStorage.getItem("id_usuario"));
    console.log("id do usuário: "+id_usuario);

    const arrayDosIds = [];

    fetch(baseUrl + "carrega_todos_ids_formulas_favoritos.php?id_usuario="+id_usuario)
    .then(response => response.json())
    .then(data => {
        const listaFormulasFavoritos = document.getElementById("container-ids-formulas-favoritos");
        listaFormulasFavoritos.innerHTML = "";
        data.forEach(id => {
            const campo_id = document.createElement("p");
            campo_id.textContent = id.id_formula;
            campo_id.classList.add("d-none");
            listaFormulasFavoritos.appendChild(campo_id);
            console.log(campo_id);

            arrayDosIds.push(id.id_formula);
            console.log("array dos ids: ", arrayDosIds);
        })
        imprimeFormulasFavoritos(arrayDosIds);
    })
}

function imprimeFormulasFavoritos(arrayDosIds){
    console.log(arrayDosIds);
    const data = {"arrayDosIds" : arrayDosIds};
    console.log(data);
    try{
        fetch(baseUrl + "carrega_todos_formulas_favoritos.php",{
            method: "POST",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                const listaFormulasFav = document.getElementById("container-formulas-favoritos");
                listaFormulasFav.innerHTML = "";
                data.data.forEach(formula => {
                    const card = document.createElement("div");  
                    card.classList.add("formula-favoritos-card");

                    const titulo_fo = document.createElement("h2");
                    const materia = document.createElement("h3");
                    const expressao = document.createElement("h2");
                    const removerFav = document.createElement("a");

                    titulo_fo.textContent = formula.titulo_fo;
                    materia.textContent = formula.materia;
                    expressao.textContent = formula.expressao;

                    removerFav.addEventListener("click",() => {
                        const id_formula = formula.id_formula;
                        removerFormulaFavorito(id_formula);
                    })

                    titulo_fo.classList.add("text-warning");
                    removerFav.classList.add("btn", "btn-close", "mb-1", "m-2");
                        
                    card.appendChild(titulo_fo);
                    card.appendChild(materia);
                    card.appendChild(expressao);
                    card.appendChild(removerFav);
                    listaFormulasFav.appendChild(card);
                })
            } else{
                alert("Você não possui favoritos");
            }
        })
    }catch(erro){
        console.log("algo deu errado");
    }
}

function removerFormulaFavorito(id_formula){
    const data = {"id_formula" : id_formula};
    console.log(data);
    fetch(baseUrl + "remove_formula_favorito.php",{
        method:"POST",
        headers:{"Content-Type" : "application/json"},
        body:JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){  
            carregaIdsFormulasFavoritos();
            let count = 5;
            const timer = setInterval(function(){
                count--;
                const divalerta = document.getElementById("div-alerta-sucesso");
                divalerta.classList.remove("d-none");
                const alerta = document.getElementById("alerta-sucesso");
                alerta.textContent = "Removido.";
                if(count === 0){
                    clearInterval(timer);
                    divalerta.classList.add("d-none");
                    alerta.textContent = "";
                }
            }, 1000);
        }else{
            alert(data.message);
        }
    });
}

document.addEventListener("DOMContentLoaded", carregaIdsFormulasFavoritos)