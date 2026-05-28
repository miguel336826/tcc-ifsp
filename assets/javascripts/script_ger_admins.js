const baseUrl = "http://matemagico.azurewebsites.net/tcc_html/web/";

function voltar(){
    window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/ger_admins.php";
}

function editarDadosPerfilAdmin(e){
    e.preventDefault();
    const id_admin = e.target.id;
    document.getElementById("id-editar-admin").value = id_admin;
    fetch(baseUrl + "buscar_admin.php?id_admin="+id_admin)
    .then(response => response.json())
    .then(data =>{
        if(data){
            const nome_admin = document.getElementById("nome-admin-editar");
            const sobrenome_admin = document.getElementById("sobrenome-admin-editar");
            const nascimento_admin = document.getElementById("nascimento-admin-editar");
            const email_admin = document.getElementById("email-admin-editar");
            nome_admin.value = data["nome_admin"];
            sobrenome_admin.value = data["sobrenome_admin"];
            nascimento_admin.value = data["nascimento_admin"];
            email_admin.value = data["email_admin"];
        }
    })
    abrirModalEditarAdmin();
    document.getElementById("btnSalvarEditarAdmin").addEventListener("click", (e) =>{
        e.preventDefault();
        const nome_admin = document.getElementById("nome-admin-editar").value;
        const sobrenome_admin = document.getElementById("sobrenome-admin-editar").value;
        const nascimento_admin = document.getElementById("nascimento-admin-editar").value;
        const email_admin = document.getElementById("email-admin-editar").value;
        const data = {"id_admin" : id_admin, "nome_admin" : nome_admin, "sobrenome_admin" : sobrenome_admin, "nascimento_admin" : nascimento_admin, "email_admin" : email_admin}

        console.log();

        fetch(baseUrl + "editar_admin.php",{
            method: "POST",
            headers: {"Content-Type":"application/json"},
            body: JSON.stringify(data)
        })
        .then(response =>response.json())
        .then(dataa =>{
            if(dataa.success){
                loadAdmins(e);
                let count = 7;
                const timer = setInterval(function(){
                    count--;
                    const alerta = document.getElementById("alerta");
                    alerta.classList.add("alert");
                    alerta.classList.add("alert-success");
                    alerta.classList.add("text-center");
                    
                    alerta.textContent = "Dados atualizados com sucesso!";
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
        fecharModalEditarAdmin(e);
        loadAdmins(e);
    })
}

function abrirModalExcluirAdmin(){
    document.getElementById("modal-excluir-admin").classList.add("show");
    document.getElementById("btnModalExcluirAdminNao").addEventListener("click",fecharModalExcluirAdmin);
}
function fecharModalExcluirAdmin(e){
    e.preventDefault();
    document.getElementById("modal-excluir-admin").classList.remove("show");
}

function abrirModalEditarAdmin(){    
    document.getElementById("modal-editar-admin").classList.add("show");
    document.getElementById("btnModalEditarAdminNao").addEventListener("click",fecharModalEditarAdmin);
}
function fecharModalEditarAdmin(e){
    e.preventDefault();  
    document.getElementById("modal-editar-admin").classList.remove("show");
}

function loadAdmins(e){
    e.preventDefault();
    fetch(baseUrl + "carrega_todos_administradores.php")
        .then(response => response.json())
        .then(data => {
            const listaAdmins = document.getElementById("lista-admins");
            listaAdmins.innerHTML = "";
            data.forEach(admin => {
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

                tdId.textContent = admin.id_admin;
                tdNome.textContent = admin.nome_admin;
                tdSobrenome.textContent = admin.sobrenome_admin;
                tdNascimento.textContent = admin.nascimento_admin;
                tdEmail.textContent = admin.email_admin;

                btnExcluir.textContent = "Excluir";
                btnExcluir.id = admin.id_admin;

                btnEditar.textContent = "Editar";
                btnEditar.id = admin.id_admin;

                btnEditar.classList.add("btn");
                btnEditar.classList.add("btn-outline-primary");
                btnExcluir.classList.add("btn");
                btnExcluir.classList.add("btn-primary");

                btnExcluir.addEventListener("click",excluirDadosPerfilAdmin);
                btnEditar.addEventListener("click",editarDadosPerfilAdmin);

                tdBtnExcluir.appendChild(btnExcluir);
                tdBtnEditar.appendChild(btnEditar);

                row.appendChild(tdId);
                row.appendChild(tdNome);
                row.appendChild(tdSobrenome);
                row.appendChild(tdNascimento);
                row.appendChild(tdEmail);
                row.appendChild(tdBtnExcluir);
                row.appendChild(tdBtnEditar);

                listaAdmins.appendChild(row);
            })
        })
}

function excluirDadosPerfilAdmin(e){
    const id_admin = e.target.id;
    const data = {"id_admin" : id_admin};
    console.log(data);
    abrirModalExcluirAdmin();
    document.getElementById("btnModalExcluirAdminSim").addEventListener("click", () => {
        fetch(baseUrl + "excluir_admin.php",{
            method:"POST",
            headers:{"Content-Type" : "application/json"},
            body:JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){  
                voltar();
                
                localStorage.clear("id_admin",data["id_admin"]);
                localStorage.clear("token_admin",data["token_admin"]);
            }else{
                alert(data.message);
            }
        });
        fecharModalEditarAdmin();
    })
}

document.addEventListener("DOMContentLoaded",loadAdmins);