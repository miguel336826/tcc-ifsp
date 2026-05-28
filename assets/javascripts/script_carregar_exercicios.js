const baseUrlCEX = "http://matemagico.azurewebsites.net/tcc_html/web/";

function imprimeExercicios(e) {
    e.preventDefault();
    const link_w = window.location.search;
    const elementosUrl = new URLSearchParams(link_w);
    const id_assunto = elementosUrl.get("id_assunto");
    console.log(id_assunto);

    const listaExercicios = document.getElementById("container-exercicios");
    listaExercicios.innerHTML = "";

    fetch(baseUrlCEX + "carrega_exercicios.php?id_assunto=" + id_assunto)
        .then(response => response.json())
        .then(data => {
            data.forEach(exercicio => {
                const card = document.createElement("div");
                card.classList.add("exercicio-card");

                const enunciado = document.createElement("p");
                const comando = document.createElement("p");
                const mostrarresposta = document.createElement("button");
                const certo = document.createElement("p");
                const explic = document.createElement("p");
                const barra = document.createElement("hr");
                
                enunciado.textContent = exercicio.enunciado;
                comando.textContent = exercicio.comando;
                certo.textContent = "Resposta correta: "+exercicio.correto;
                explic.textContent = exercicio.explicacao;
                mostrarresposta.textContent = "Ver resposta";
                mostrarresposta.classList.add("btn");
                mostrarresposta.classList.add("btn-outline-danger");
                mostrarresposta.classList.add("mt-3");
                mostrarresposta.classList.add("mb-1");
                certo.classList.add("d-none");
                certo.classList.add("mt-3");
                explic.classList.add("d-none");
                barra.classList.add("d-none");

                card.appendChild(enunciado);
                card.appendChild(comando);

                mostrarresposta.addEventListener("click",() => {
                    barra.classList.remove("d-none");
                    certo.classList.remove("d-none");
                    explic.classList.remove("d-none");
                    mostrarresposta.classList.add("d-none");
                })

                const respostas = [exercicio.alt_a, exercicio.alt_b, exercicio.alt_c, exercicio.alt_d, exercicio.alt_e];

                respostas.forEach((respostaSelecionada) => {
                    const li = document.createElement("li");
                    
                    li.textContent = respostaSelecionada;
                    li.classList.add("list-group-item");
                    li.style.cursor = "pointer";
                    li.classList.add("p-2");
                    li.setAttribute("data-resposta", respostaSelecionada);

                    li.addEventListener("click", () => {
                        verificarResposta(respostaSelecionada);
                    });

                    card.appendChild(li);
                });

                card.appendChild(barra);
                card.appendChild(mostrarresposta);
                card.appendChild(certo);
                card.appendChild(explic);

                listaExercicios.appendChild(card);
            })
        });
}

function verificarResposta(respostaSelecionada) {
    console.log("Resposta selecionada: "+respostaSelecionada);
    fetch(baseUrlCEX + "verifica_resposta.php?resposta_selecionada=" + respostaSelecionada)
        .then(response => response.json())
        .then(data => {
            if (data){
                console.log("acertou");

                //"ativa" os confettes
                jsConfetti.addConfetti();

            } else if(!data){
                console.log("errou");

                let count = 5;
                const timer = setInterval(function(){
                    count--;
                    const divalerta = document.getElementById("div-alerta-erro");
                    divalerta.classList.remove("d-none");
                    const alerta = document.getElementById("alerta-erro");
                    alerta.textContent = "Resposta incorreta.";
                    if(count === 0){
                        clearInterval(timer);
                        divalerta.classList.add("d-none");
                        alerta.textContent = "";
                    }
                }, 1000);

            }
        });
}

document.addEventListener("DOMContentLoaded", imprimeExercicios);