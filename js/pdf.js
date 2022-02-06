const viewPDF = document.querySelectorAll('.btn_view');
const modal = document.querySelectorAll('.modalpdf');
const cierre = document.querySelectorAll('.cierre');
for (let i = 0; i < viewPDF.length; i++) {
    viewPDF[i].addEventListener("click", function(){
        modal[i].style.display = "flex";
    });
}
for (let j = 0; j < viewPDF.length; j++) {
    cierre[j].addEventListener("click", function(){
        modal[j].style.display = "none";
    });
}