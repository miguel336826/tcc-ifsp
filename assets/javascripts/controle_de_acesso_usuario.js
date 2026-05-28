const baseUrlCAU = "http://matemagico.azurewebsites.net/tcc_html/web/";
function verificarUSU(e){
    e.preventDefault();
    document.body.style.display = "none";
    const data = new FormData();
    data.append("id_usuario", localStorage.getItem("id_usuario"));
    data.append("token_usuario", localStorage.getItem("token_usuario"));
    fetch(baseUrlCAU + "validar_acesso_usuario.php",{
        method:"POST",
        body:data
    })
    .then(response => response.json())
    .then(data => {
        if(data.succes){
            document.body.style.display = "block";
        } else{
            window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/home.php";
        }
    }).catch(error => {
        console.log(error);
    });
}
document.addEventListener("DOMContentLoaded",verificarUSU);