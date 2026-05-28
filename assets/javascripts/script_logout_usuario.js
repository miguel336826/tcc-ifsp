const baseUrlLogout = "http://matemagico.azurewebsites.net/tcc_html/web/";

function logoutUsuario(e){
    e.preventDefault();
    localStorage.removeItem("id_usuario");
    localStorage.removeItem("token_usuario");
    localStorage.removeItem("nome_usuario");
    localStorage.removeItem("sobrenome_usuario");
    localStorage.clear();
    console.log("usuario saiu");
    window.location.href = "../pages/index.php";
}
document.getElementById("btnLogoutUsuario").addEventListener("click", logoutUsuario);