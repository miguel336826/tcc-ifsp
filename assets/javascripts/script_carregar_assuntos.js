const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function imprimeAssuntos(){
    fetch(baseUrl + "carrega_todos_assuntos.php")
    .then(response => response.json())
    .then(data => {
        const listaAssuntos = document.getElementById("container-assuntos");
        listaAssuntos.innerHTML = "";
        data.forEach(assuntoexercicio => {
            const card = document.createElement("div");  
            card.classList.add("assunto-card");

            const assunto = document.createElement("h3");
            const acessar = document.createElement("a");

            assunto.textContent = assuntoexercicio.assunto;
            acessar.textContent = "Praticar";

            acessar.addEventListener("click",() => {
                const id_assunto = assuntoexercicio.id_assunto;
                redirecionar(id_assunto);
            })

            //card.classList.add("card");
            //card.classList.add("mt-4");
            //card.classList.add("ms-4");
            //card.classList.add("me-4");
            //card.classList.add("pt-4");
            //card.classList.add("ps-4");
            //card.classList.add("pe-4");
            //card.classList.add("pb-4");
            //acessar.classList.add("btn");
            //acessar.classList.add("btn-danger");
            //acessar.classList.add("mb-1");
            //acessar.classList.add("m-2");
            //acessar.classList.add("col-1");

            assunto.classList.add("text-danger");
            acessar.classList.add("btn", "btn-danger", "mb-1", "m-2");

            //assunto.classList.add("card-title");
            //assunto.classList.add("text-danger");
                
            card.appendChild(assunto);
            card.appendChild(acessar);
            listaAssuntos.appendChild(card);
        })
    })
}

function redirecionar(id_assunto){
    console.log(id_assunto);
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/praticar.php?id_assunto="+id_assunto;
}

document.addEventListener("DOMContentLoaded",imprimeAssuntos)