const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function carregaIdsVideoaulasFavoritos(){
    console.log("NA FUNÇÃO");
    const id_usuario = parseInt(localStorage.getItem("id_usuario"));
    console.log("id do usuário: "+id_usuario);

    const arrayDosIds = [];

    fetch(baseUrl + "carrega_todos_ids_videoaulas_favoritos.php?id_usuario="+id_usuario)
    .then(response => response.json())
    .then(data => {
        const listaVideoaulasFavoritos = document.getElementById("container-ids-videoaulas-favoritos");
        listaVideoaulasFavoritos.innerHTML = "";
        data.forEach(id => {
            const campo_id = document.createElement("p");
            campo_id.textContent = id.id_videoaula;
            campo_id.classList.add("d-none");
            listaVideoaulasFavoritos.appendChild(campo_id);
            console.log(campo_id);

            arrayDosIds.push(id.id_videoaula);
            console.log("array dos ids: ", arrayDosIds);
        })
        imprimeVideoaulasFavoritos(arrayDosIds);
    })
}

function imprimeVideoaulasFavoritos(arrayDosIds){
    console.log(arrayDosIds);

    const data = {"arrayDosIds" : arrayDosIds};
    console.log(data);
    try{
        fetch(baseUrl + "carrega_todos_videoaulas_favoritos.php",{
            method: "POST",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                const listaVideoaulasFav = document.getElementById("container-videoaulas-favoritos");
                listaVideoaulasFav.innerHTML = "";
                data.data.forEach(videoaula => {
                    const card = document.createElement("div");  
                    card.classList.add("videoaula-favoritos-card");

                    const titulo_vd = document.createElement("h2");
                    const descricao_vd = document.createElement("h3");
                    const acessar = document.createElement("a");
                    const removerFav = document.createElement("a");

                    acessar.textContent = "Acessar";
                    titulo_vd.textContent = videoaula.titulo_vd;
                    descricao_vd.innerHTML = videoaula.descricao_vd;

                    acessar.addEventListener("click",() => {
                        const id_videoaula = videoaula.id_videoaula;
                        redirecionar(id_videoaula);
                    })

                    removerFav.addEventListener("click",() => {
                        const id_videoaula = videoaula.id_videoaula;
                        removerFavorito(id_videoaula);
                    })

                    titulo_vd.classList.add("text-warning");
                    acessar.classList.add("btn", "btn-warning", "mb-1", "m-2");
                    removerFav.classList.add("btn", "btn-close", "mb-1", "m-2");
                        
                    card.appendChild(titulo_vd);
                    card.appendChild(descricao_vd);
                    card.appendChild(acessar);
                    card.appendChild(removerFav);
                    listaVideoaulasFav.appendChild(card);
                })
            } else{
                alert("Você não possui favoritos");
            }
        })
    }catch(erro){
        console.log("algo deu errado");
    }
}

function redirecionar(id_videoaula){
    console.log(id_videoaula);
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/videoplayer.php?id_videoaula="+id_videoaula;
}

function removerFavorito(id_videoaula){
    const data = {"id_videoaula" : id_videoaula};
    console.log(data);
    fetch(baseUrl + "remove_videoaula_favorito.php",{
        method:"POST",
        headers:{"Content-Type" : "application/json"},
        body:JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){  
            carregaIdsVideoaulasFavoritos();
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

document.addEventListener("DOMContentLoaded", carregaIdsVideoaulasFavoritos)