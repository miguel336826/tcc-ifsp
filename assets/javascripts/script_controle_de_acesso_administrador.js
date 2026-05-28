/*console.log("controle de acesso usuario executado");
const baseUrlCA = "http://localhost/tcc_html/web/";

function controleDeAcesso(e){
    e.preventDefault();
    document.body.style.display = "none";
    const data = new FormData();
    data.append("id_admin", localStorage.getItem("id_admin"));
    data.append("token_admin", localStorage.getItem("token_admin"));
    fetch(baseUrlCA + "validar_token_admin.php",{
        method: "POST",
        body: data
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            console.log("Administrador possui permissão para acessar essa pagina");
            document.body.style.display = "block";
        } else{
            window.location.href = "http://localhost/tcc_html/pages/home.php";
            console.log("Administrador não possui permissão para acessar essa pagina");
        }
    }).catch(error => {
        console.log(error);
    });
}
document.addEventListener("DOMContentLoaded",controleDeAcesso);*/