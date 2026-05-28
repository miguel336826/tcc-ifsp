const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

console.log("executando");

function imprimeTextos(){
    fetch(baseUrl + "carrega_todos_textos.php")
    .then(response => response.json())
    .then(data => {
        const listaTextos = document.getElementById("container-textos");
        listaTextos.innerHTML = "";
        data.forEach(texto => {
            const card = document.createElement("div");  
            card.classList.add("texto-card");

            const titulo = document.createElement("h2");
            //const conteudo = document.createElement("h3");
            const acessar = document.createElement("a");
            const favoritar = document.createElement("a");

            acessar.textContent = "Acessar";
            titulo.textContent = texto.titulo;
            //conteudo.innerHTML = texto.conteudo;

            favoritar.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16"><path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/></svg>`;

            acessar.addEventListener("click", () => {
                const id_texto = texto.id_texto;
                redirecionar(id_texto);
            });

            favoritar.addEventListener("click", () => {
                const id_texto = texto.id_texto;
                AdicionarFavoritoTexto(id_texto);
            });

            titulo.classList.add("text-danger");
            acessar.classList.add("btn", "btn-danger", "mb-1", "m-2");
            favoritar.classList.add("btn", "btn-star", "mb-1", "m-2");

            card.appendChild(titulo);
            //card.appendChild(conteudo);
            card.appendChild(acessar);
            card.appendChild(favoritar);
            listaTextos.appendChild(card);
        })
    })
}

function redirecionar(id_texto){
    console.log(id_texto);
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/info_texto.php?id_texto="+id_texto;
}

function AdicionarFavoritoTexto(id_texto){
    console.log("executando favoritar, id do texto: "+id_texto);

    //precisei usar parseint pra nao dar erro ao salvar no bd, lá é int e não pode ser varchar
    const id_usuario = parseInt(localStorage.getItem("id_usuario"));
    console.log("id do usuário: "+id_usuario);

    const data = new URLSearchParams();
    data.set("id_texto", id_texto);
    data.set("id_usuario", id_usuario);
    console.log(data);
    try{
        fetch(baseUrl + "adiciona_texto_favorito.php",{
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

document.addEventListener("DOMContentLoaded",imprimeTextos)