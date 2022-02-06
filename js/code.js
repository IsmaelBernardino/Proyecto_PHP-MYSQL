const formlogin = document.querySelector(".form--login");
const formregis = document.querySelector(".form--register");

function formRegister() {
    formlogin.style.transform = "rotateY(-180deg)";
    formregis.style.transform = "rotateY(0deg)";
    
}
function formLogin() {
    formlogin.style.transform = "rotateY(0deg)";
    formregis.style.transform = "rotateY(180deg)";
}

