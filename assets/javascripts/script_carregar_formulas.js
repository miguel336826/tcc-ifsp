const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function imprimeFormulas(){
    fetch(baseUrl + "carrega_todas_as_formulas.php")
    .then(response => response.json())
    .then(data => {
        const listaFormulas = document.getElementById("container-formulas");
        listaFormulas.innerHTML = "";
        data.forEach(formula => {
            const card = document.createElement("div");  
            card.classList.add("formula-card");

            const titulo_fo = document.createElement("h3");
            const materia = document.createElement("p");
            const expressao = document.createElement("p");
            const favoritar = document.createElement("a");

            titulo_fo.textContent = formula.titulo_fo;
            materia.textContent = formula.materia;
            expressao.innerHTML = formula.expressao;
            favoritar.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16"><path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/></svg>`;

            favoritar.addEventListener("click", () => {
                const id_formula = formula.id_formula;
                AdicionarFavoritoFormula(id_formula);
            });

            //card.classList.add("card");
            //card.classList.add("mt-4");
            //card.classList.add("ms-4");
            //card.classList.add("me-4");
            //card.classList.add("pt-4");
            //card.classList.add("ps-4");
            //card.classList.add("pe-4");
            //card.classList.add("pb-4");
            //titulo_fo.classList.add("card-title");
            //titulo_fo.classList.add("text-danger");
            //materia.classList.add("card-text");
            //expressao.classList.add("card-text");

            titulo_fo.classList.add("text-danger");
            favoritar.classList.add("btn", "btn-star", "mb-1", "m-2");
                
            card.appendChild(titulo_fo);
            card.appendChild(materia);
            card.appendChild(expressao);
            card.appendChild(favoritar);
            listaFormulas.appendChild(card);
        })
    })
}

function AdicionarFavoritoFormula(id_formula){
    console.log("executando favoritar, id da formula: "+id_formula);

    const id_usuario = parseInt(localStorage.getItem("id_usuario"));
    console.log("id do usuário: "+id_usuario);

    const data = new URLSearchParams();
    data.set("id_formula", id_formula);
    data.set("id_usuario", id_usuario);
    console.log(data);
    try{
        fetch(baseUrl + "adiciona_formula_favorito.php",{
            method: "POST",
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                console.log("ADICIONADO AOS FAVORITOS");
                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-sucesso");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-sucesso");
                    alerta.textContent = "Adicionado aos favoritos.";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                    }
                }, 1000);
            } else{
                alert("Algo deu errado, tente novamente.");
                console.log("ALGO DEU ERRADO");
            }
        })
    }catch(erro){
        console.log("ALGO DEU ERRADO");
    }
}

document.addEventListener("DOMContentLoaded",imprimeFormulas)