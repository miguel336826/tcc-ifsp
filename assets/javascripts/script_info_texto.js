const baseUrlInfoTexto = "http://matemagico.azurewebsites.net/tcc_html/web/";
console.log("buscar texto individual executando");

function buscarEimprimir(e){
    e.preventDefault();
    const link = window.location.search;
    console.log("link: "+link);
    const elementosUrl = new URLSearchParams(link);
    const id_texto = elementosUrl.get('id_texto');

    fetch(baseUrlInfoTexto+"carrega_texto_individual.php?id_texto="+id_texto)
        .then(response => response.json())
        .then(data => {
            if(data){
                const esseTexto = document.getElementById("container-texto");
                const card = document.createElement("div");  
                card.classList.add("texto-card");

                const titulo = document.createElement("h2");
                const conteudo = document.createElement("p");

                titulo.textContent = data["titulo"];
                conteudo.innerHTML = data["conteudo"];

                titulo.classList.add("text-danger");
                titulo.classList.add("text-center");

                card.appendChild(titulo);
                card.appendChild(conteudo);
                esseTexto.appendChild(card);
            }
        })
}

document.addEventListener("DOMContentLoaded",buscarEimprimir);