function ajustarMensagem(){
    const mensagem = document.getElementById("mensagem");
    const horarioAgora = new Date().getHours();
    
    const usuario_id = localStorage.getItem("id_usuario");
    const usuario_token = localStorage.getItem("token_usuario");   
    const usuario_nome = localStorage.getItem("nome_usuario");
    console.log(usuario_id, usuario_token);

    const admin_id = localStorage.getItem("id_admin");
    const admin_token = localStorage.getItem("token_admin");   
    const admin_nome = localStorage.getItem("nome_admin");
    console.log(admin_nome);

    if(horarioAgora >= 4 && horarioAgora < 12){
        if(usuario_id != null && usuario_token != null){
            mensagem.innerHTML = "Bom dia, "+usuario_nome+"!";
        } /*else if(admin_id != "" && admin_token != ""){
            mensagem.innerHTML = "Bom dia, "+admin_nome+"!";
        }*/ else{
            mensagem.innerHTML = "Bom dia, "+admin_nome+"!";
            //mensagem.innerHTML = "Bom dia!";
        }
    } else if (horarioAgora >= 12 && horarioAgora < 18) {
        if(usuario_id != null && usuario_token != null){
            mensagem.textContent = "Boa tarde, "+usuario_nome+"!";
        } /*else if(admin_id != "" && admin_token != ""){
            mensagem.innerHTML = "Boa tarde, "+admin_nome+"!";
        }*/ else{
            mensagem.innerHTML = "Boa tarde, "+admin_nome+"!";
            //mensagem.innerHTML = "Boa tarde!";
        }
    } else {
        if(usuario_id != null && usuario_token != null){
            mensagem.textContent = "Boa noite, "+usuario_nome+"!";
        } /*else if(admin_id != "" && admin_token != ""){
            mensagem.innerHTML = "Boa noite, "+admin_nome+"!";
        }*/ else{
            mensagem.innerHTML = "Boa noite, "+admin_nome+"!";
            //mensagem.innerHTML = "Boa noite!";
        }
    }
}
window.onload = ajustarMensagem;