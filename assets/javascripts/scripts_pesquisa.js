const baseUrlP = "http://matemagico.azurewebsites.net/tcc_html/web/";

function pesquisa(){
    const valor = document.getElementById("pesquisa").value;
    console.log(valor);
    const resultados = document.getElementById("resultados");
    resultados.innerHTML = "";
    fetch(baseUrlP + "pesquisa.php?txt="+valor)
    .then(response => response.json())
    .then(data => {
        data.forEach(videoaula => {
            const li = document.createElement("li");
            li.classList.add("list-group-item");
            li.addEventListener("click", () => {
                document.getElementById("pesquisa").value = videoaula.titulo_vd;
                resultados.innerHTML = "";
                window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/videoplayer.php?id_videoaula=" + videoaula.id_videoaula;
            })
            li.textContent = videoaula.titulo_vd;   
            resultados.appendChild(li);
        });
    })
}

document.getElementById("pesquisa").addEventListener("input",pesquisa)