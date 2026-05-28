const baseUrlCA = "http://matemagico.azurewebsites.net/tcc_html/web/";

function verificar(e){
    e.preventDefault();
    document.body.style.display = "none";
    const data = new FormData();
    data.append("id_admin", localStorage.getItem("id_admin"));
    data.append("token_admin", localStorage.getItem("token_admin"));
    console.log(data);
    fetch(baseUrlCA + "validar_acesso_admin.php",{
        method:"POST",
        body:data
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            document.body.style.display = "block";
        } else{
            window.location.href = "http://matemagico.azurewebsites.net/tcc_html/pages/home.php";
        }
    }).catch(error => {
        console.log(error);
    });
}
document.addEventListener("DOMContentLoaded",verificar);