const baseUrlCVA = "http://matemagico.azurewebsites.net/tcc_html/web/";

function imprimeVideoaulas(){
    fetch(baseUrlCVA + "carrega_videoaulas.php")
    .then(response => response.json())
    .then(data => {
        const listaVideoaulas = document.getElementById("container-videos");
        listaVideoaulas.innerHTML = "";
        data.forEach(videoaula => {
            const card = document.createElement("div");
            card.classList.add("video-card");

            const titulo_va = document.createElement("h2");
            const descricao_vd = document.createElement("h3");
            const acessar = document.createElement("a");
            const favoritar = document.createElement("a");

            titulo_va.textContent = videoaula.titulo_vd;
            descricao_vd.textContent = videoaula.descricao_vd;
            acessar.textContent = "Acessar";

            favoritar.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16"><path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/></svg>`;

            titulo_va.classList.add("text-danger");

            acessar.addEventListener("click", () => {
                const id_videoaula = videoaula.id_videoaula;
                redirecionar_vd(id_videoaula);
            });

            favoritar.addEventListener("click", () => {
                const id_videoaula = videoaula.id_videoaula;
                AdicionarVideoaulaFav(id_videoaula);
            });

            acessar.classList.add("btn", "btn-danger", "mb-1", "m-2");
            favoritar.classList.add("btn", "btn-star", "mb-1", "m-2");

            card.appendChild(titulo_va);
            card.appendChild(descricao_vd);
            card.appendChild(acessar);
            card.appendChild(favoritar);

            listaVideoaulas.appendChild(card);
        });
    });
}

function redirecionar_vd(id_videoaula){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/videoplayer.php?id_videoaula="+id_videoaula;
}

function AdicionarVideoaulaFav(id_videoaula){
    const id_usuario = parseInt(localStorage.getItem("id_usuario"));
    console.log("id do usuário: "+id_usuario);

    const data = new URLSearchParams();
    data.set("id_videoaula", id_videoaula);
    data.set("id_usuario", id_usuario);
    console.log(data);
    try{
        fetch(baseUrl + "adiciona_videoaula_favorito.php",{
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
                console.log("ALGO DEU ERRADO");
            }
        })
    }catch(erro){
        alert("Algo deu errado, tente novamente.");
        console.log("ALGO DEU ERRADO");
    }
}

document.addEventListener("DOMContentLoaded",imprimeVideoaulas)