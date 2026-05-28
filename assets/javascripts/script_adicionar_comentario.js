const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function abrirModalAdiconarComentario(){
    document.getElementById("modal-adicionar-comentario").classList.add("show");
    document.getElementById("btnCancelarAdicionarComentario").addEventListener("click",fecharModalAdiconarComentario);
}
function fecharModalAdiconarComentario(e){
    e.preventDefault();
    document.getElementById("modal-adicionar-comentario").classList.remove("show");
}

function carregarComentarios(e) {
    e.preventDefault();
    const id_videoaula = document.getElementById("id_videoaula").value;
    console.log("id_videoaula do carregar: "+id_videoaula);

    const containerComentarios = document.getElementById("container-comentarios");
    containerComentarios.innerHTML = "";

    fetch(baseUrl + "carrega_comentarios.php?id_videoaula=" + id_videoaula)
        .then(response => response.json())
        .then(data => {
            data.forEach(comentario => {
                const card = document.createElement("div");
                card.classList.add("comentario-card");

                const nomeSobrenomeContainer = document.createElement("div");
                const nomeUsuario = document.createElement("h4");
                const sobrenomeUsuario = document.createElement("h4");
                const textoComentario = document.createElement("h3");

                nomeSobrenomeContainer.classList.add("nome-sobrenome-container");
                nomeUsuario.classList.add("nome-usuario");
                nomeUsuario.textContent = comentario.nome_usuario;
                sobrenomeUsuario.classList.add("sobrenome-usuario");
                sobrenomeUsuario.textContent = comentario.sobrenome_usuario;
                textoComentario.classList.add("texto-comentario");
                textoComentario.textContent = comentario.texto_comentario;

                nomeSobrenomeContainer.appendChild(nomeUsuario);
                nomeSobrenomeContainer.appendChild(sobrenomeUsuario);
                card.appendChild(nomeSobrenomeContainer);
                card.appendChild(textoComentario);
                containerComentarios.appendChild(card);

                document.getElementById("adicionarComentarioModal").addEventListener("click", abrirModalAdiconarComentario);
            })
        });
}
document.addEventListener("DOMContentLoaded", carregarComentarios);

function excluirComentarios(e){
    e.preventDefault();
    const id_usuario = localStorage.getItem("id_usuario");
    console.log(id_usuario);
    const data = {"id_usuario" : id_usuario};
    console.log(data);
    fetch(baseUrl + "excluir_comentarios.php",{
        method:"POST",
        headers:{"Content-Type" : "application/json"},
        body:JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){  
            carregarComentarios(e);
            console.log("EXCLUIDOS");
        }else{
            alert(data.message);
        }
    });
}

function adicionarComentario(e){
    e.preventDefault();
    const formAdicionarComentario = document.querySelector("#formAdicionarComentario");
    const data = new FormData(formAdicionarComentario);

    //data não é diretamente imprimivel:
    for (let pair of data.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
    }

    try{
        fetch(baseUrl + "adiciona_comentario.php",{
            method:"POST",
            body:data
        })
        .then(response => response.json())
        .then(data =>{
            if(data.success){
                document.getElementById("texto_comentario").value = "";  
                fecharModalAdiconarComentario(e);
                carregarComentarios(e);
                console.log("sucesso data");
            } else{
                alert(data.message);
            }
        })
    } catch(erro){
        alert("Algo deu errado");
    }
}
document.getElementById("btnAdicionarComentario").addEventListener("click",adicionarComentario);
document.getElementById("excluir_comentarios").addEventListener("click", excluirComentarios);
document.getElementById("adicionarComentarioModal").addEventListener("click", abrirModalAdiconarComentario);