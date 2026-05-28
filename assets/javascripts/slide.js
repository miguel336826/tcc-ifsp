var radio = document.querySelector(".manual-btn");
var count = 1;

//primeiro radio sendo marcado
document.getElementById("radio1").checked = true;

setInterval(() => {
    proximoSlide();
}, 4000);

function proximoSlide(){
    count++;
    if(count > 4){
        count = 1;
    }
    document.getElementById("radio"+count).checked = true;
}