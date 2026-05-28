const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function voltar(){
    window.location.href="http://matemagico.azurewebsites.net/tcc_html/pages/ger_usuarios.php";
}

function editarUsuario(e){
    e.preventDefault();
    const id_usuario = e.target.id;
    document.getElementById("id-editar-usuario").value = id_usuario;
    fetch(baseUrl + "buscar_usuario.php?id_usuario="+id_usuario)
    .then(response => response.json())
    .then(data => {
        if(data){
            const nome_usuario = document.getElementById("nome-usuario-editar");
            const sobrenome_usuario = document.getElementById("sobrenome-usuario-editar");
            const nascimento_usuario = document.getElementById("nascimento-usuario-editar");
            const email_usuario = document.getElementById("email-usuario-editar");
            nome_usuario.value = data["nome_usuario"];
            sobrenome_usuario.value = data["sobrenome_usuario"];
            nascimento_usuario.value = data["nascimento_usuario"];
            email_usuario.value = data["email_usuario"];
        }
    })
    abreModalEditarUsuario();
    document.getElementById("btnEditarUsuario").addEventListener("click", (e) =>{
        e.preventDefault();
        const nome_usuario = document.getElementById("nome-usuario-editar").value;
        const sobrenome_usuario = document.getElementById("sobrenome-usuario-editar").value;
        const nascimento_usuario = document.getElementById("nascimento-usuario-editar").value;
        const email_usuario = document.getElementById("email-usuario-editar").value;
        const data = {"id_usuario" : id_usuario, "nome_usuario" : nome_usuario, "sobrenome_usuario" : sobrenome_usuario, "nascimento_usuario" : nascimento_usuario, "email_usuario" : email_usuario}
        fetch(baseUrl + "editar_usuario.php",{
            method: "POST",
            headers:{"Content-Type":"application/json"},
            body:JSON.stringify(data)
        })
        .then(response =>response.json())
        .then(dataa =>{
            if(dataa.success){
                loadUsers();
                let count = 4;
                const timer = setInterval(function(){
                    count--;
                    const alerta = document.getElementById("alerta");
                    alerta.classList.add("alert");
                    alerta.classList.add("alert-success");
                    alerta.classList.add("text-center");
                    alerta.textContent = "Dados atualizados com sucesso";
                    if(count === 0){
                        clearInterval(timer);
                        alerta.classList.remove("alert");
                        alerta.classList.remove("alert-success");
                        alerta.classList.remove("text-center");
                        alerta.textContent = "";
                    }
                }, 1000);
            } else{
                alert(dataa.message);
            }
        });
        fechaModalEditarUsuario();
        loadUsers();
    })
}

function loadUsers(){
    fetch(baseUrl + "carrega_todos_usuarios.php")
        .then(response => response.json())
        .then(data => {
            const listaUsuarios = document.getElementById("lista-usuarios");
            listaUsuarios.innerHTML = "";
            data.forEach(usuario => {
                const row = document.createElement("tr");
                
                const tdId = document.createElement("td");
                const tdNome = document.createElement("td");
                const tdSobrenome = document.createElement("td");
                const tdNascimento = document.createElement("td");
                const tdEmail = document.createElement("td");

                const tdBtnExcluir = document.createElement("td");
                const btnExcluir = document.createElement("button");

                const tdBtnEditar = document.createElement("td");
                const btnEditar = document.createElement("button");

                tdId.textContent = usuario.id_usuario;
                tdNome.textContent = usuario.nome_usuario;
                tdSobrenome.textContent = usuario.sobrenome_usuario;
                tdNascimento.textContent = usuario.nascimento_usuario;
                tdEmail.textContent = usuario.email_usuario;

                btnExcluir.textContent = "Excluir";
                btnExcluir.id = usuario.id_usuario;

                btnEditar.textContent = "Editar";
                btnEditar.id = usuario.id_usuario;

                btnEditar.classList.add("btn");
                btnEditar.classList.add("btn-outline-primary");
                btnExcluir.classList.add("btn");
                btnExcluir.classList.add("btn-primary");

                btnExcluir.addEventListener("click",excluirUsuario);
                btnEditar.addEventListener("click",editarUsuario);

                tdBtnExcluir.appendChild(btnExcluir);
                tdBtnEditar.appendChild(btnEditar);

                row.appendChild(tdId);
                row.appendChild(tdNome);
                row.appendChild(tdSobrenome);
                row.appendChild(tdNascimento);
                row.appendChild(tdEmail);
                row.appendChild(tdBtnExcluir);
                row.appendChild(tdBtnEditar);

                listaUsuarios.appendChild(row);
            })
        })
}

function abreModalExcluirUsuario(){
    document.getElementById("modal-excluir-usuario").classList.add("show");
    document.getElementById("btnCancelarExcluirUsuario").addEventListener("click", fechaModalExcluirUsuario);
}
function fechaModalExcluirUsuario(e){
    e.preventDefault();
    document.getElementById("modal-excluir-usuario").classList.remove("show");
}
function abreModalEditarUsuario(){
    document.getElementById("modal-editar-usuario").classList.add("show");
    document.getElementById("btnCancelarEditarUsuario").addEventListener("click", fechaModalEditarUsuario);
}
function fechaModalEditarUsuario(){
    document.getElementById("modal-editar-usuario").classList.remove("show");
}

function excluirUsuario(e){
    e.preventDefault();
    const id_usuario = e.target.id;
    const data = {"id_usuario" : id_usuario};
    abreModalExcluirUsuario();
    console.log("abriu modal. id_usuario: "+id_usuario);

    //função anonima:
    document.getElementById("btnExcluirUsuario").addEventListener("click", () => {
        fetch(baseUrl + "excluir_ger_usuarios.php",{
            method: "POST",
            headers: {"Content-Type" : "application/json"},
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                localStorage.clear("id_usuario",data["id_usuario"]);
                localStorage.clear("token_usuario",data["token_usuario"]);
                voltar();
            } else{
                alert(data.message);
            }
        })
        fechaModalExcluirUsuario();
    })
}

document.addEventListener("DOMContentLoaded",loadUsers);