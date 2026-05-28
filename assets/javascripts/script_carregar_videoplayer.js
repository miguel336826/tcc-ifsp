const baseUrlInfoVideoaula = "http://matemagico.azurewebsites.net/tcc_html/web/";

function buscarEimprimirVideoplayer(e){
    e.preventDefault();
    const link_w = window.location.search;
    console.log("link_w: "+link_w);
    const elementosUrl = new URLSearchParams(link_w);
    const id_videoaula = elementosUrl.get("id_videoaula");

    console.log(id_videoaula);

    fetch(baseUrlInfoVideoaula+"carrega_videoplayer.php?id_videoaula="+id_videoaula)
        .then(response => response.json())
        .then(data => {
            if(data){
                const titulo_vd = document.getElementById("titulo_vd");
                const descricao_vd = document.getElementById("descricao_vd");
                const videoplayer = document.getElementById("videoplayer");

                titulo_vd.textContent = data["titulo_vd"];
                descricao_vd.textContent = data["descricao_vd"];

                videoplayer.innerHTML = data["link"];
            }
        })
}

document.addEventListener("DOMContentLoaded",buscarEimprimirVideoplayer);