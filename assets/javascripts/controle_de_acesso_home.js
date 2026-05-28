const baseUrlCAU = "http://matemagico.azurewebsites.net/tcc_html/web/";
function verificarHOME(e){
    e.preventDefault();
    document.body.style.display = "none";
    
    const id_usuario = localStorage.getItem("id_usuario");
    const token_usuario = localStorage.getItem("token_usuario");
    const id_admin = localStorage.getItem("id_admin");
    const token_admin = localStorage.getItem("token_admin");

   
        if(id_usuario && token_usuario || id_admin && token_admin){
            document.body.style.display = "block";

            console.log("EXISTE ACESSO");
        } else{
            window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/index.php";

            console.log("NÃO EXISTE ACESSO");
        }
    
}
document.addEventListener("DOMContentLoaded",verificarHOME);