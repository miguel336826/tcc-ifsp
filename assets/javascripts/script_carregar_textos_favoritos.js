const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function carregaIdsTextosFavoritos(){
    console.log("NA FUNÇÃO");
    const id_usuario = parseInt(localStorage.getItem("id_usuario"));
    console.log("id do usuário: "+id_usuario);

    const arrayDosIds = [];

    fetch(baseUrl + "carrega_todos_ids_textos_favoritos.php?id_usuario="+id_usuario)
    .then(response => response.json())
    .then(data => {
        const listaTextosFavoritos = document.getElementById("container-ids-textos-favoritos");
        listaTextosFavoritos.innerHTML = "";
        data.forEach(id => {
            const campo_id = document.createElement("p");
            campo_id.textContent = id.id_texto;
            campo_id.classList.add("d-none");
            listaTextosFavoritos.appendChild(campo_id);
            console.log(campo_id);

            arrayDosIds.push(id.id_texto);
            console.log("array dos ids: ", arrayDosIds);

            //imprimeTextosFavoritos(arrayDosIds);
        })
        imprimeTextosFavoritos(arrayDosIds);
    })
}

function imprimeTextosFavoritos(arrayDosIds){
    console.log(arrayDosIds);

    const data = {"arrayDosIds" : arrayDosIds};
    console.log(data);
    try{
        fetch(baseUrl + "carrega_todos_textos_favoritos.php",{
            method: "POST",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                const listaTextosFav = document.getElementById("container-textos-favoritos");
                listaTextosFav.innerHTML = "";
                data.data.forEach(texto => {
                    const card = document.createElement("div");  
                    card.classList.add("texto-favoritos-card");

                    const titulo = document.createElement("h2");
                    //const conteudo = document.createElement("h3");
                    const acessar = document.createElement("a");
                    const removerFav = document.createElement("a");

                    acessar.textContent = "Acessar";
                    //removerFav.textContent = "Remover dos favoritos";
                    titulo.textContent = texto.titulo;
                    //conteudo.innerHTML = texto.conteudo;

                    acessar.addEventListener("click",() => {
                        const id_texto = texto.id_texto;
                        redirecionar(id_texto);
                    })

                    removerFav.addEventListener("click",() => {
                        const id_texto = texto.id_texto;
                        removerFavorito(id_texto);
                    })

                    titulo.classList.add("text-warning");
                    acessar.classList.add("btn", "btn-warning", "mb-1", "m-2");
                    removerFav.classList.add("btn", "btn-close", "mb-1", "m-2");
                        
                    card.appendChild(titulo);
                    //card.appendChild(conteudo);
                    card.appendChild(acessar);
                    card.appendChild(removerFav);
                    listaTextosFav.appendChild(card);
                })
            } else{
                alert("Você não possui favoritos");
            }
        })
    }catch(erro){
        console.log("algo deu errado");
    }
}

function redirecionar(id_texto){
    console.log(id_texto);
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/info_texto.php?id_texto="+id_texto;
}

function removerFavorito(id_texto){
    const data = {"id_texto" : id_texto};
    console.log(data);
    fetch(baseUrl + "remove_favorito.php",{
        method:"POST",
        headers:{"Content-Type" : "application/json"},
        body:JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){  
            carregaIdsTextosFavoritos();
            let count = 5;
            const timer = setInterval(function(){
                count--;
                const divalerta = document.getElementById("div-alerta-sucesso");
                divalerta.classList.remove("d-none");
                const alerta = document.getElementById("alerta-sucesso");
                alerta.textContent = "Removido";
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

document.addEventListener("DOMContentLoaded", carregaIdsTextosFavoritos)
//document.addEventListener("DOMContentLoaded",carregaIdsTextosFavoritos)
//document.addEventListener("DOMContentLoaded",imprimeTextosFavoritos)