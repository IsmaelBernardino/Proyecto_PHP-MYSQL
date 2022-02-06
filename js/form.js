function hideOrShowPassword() {
    var password1, check;
  
    password1 = document.querySelector(".pass");
    check = document.getElementById("ver");
  
    if (check.checked == true){ // Si la checkbox de mostrar contraseña está activada
      password1.type = "text";
    } else{ // Si no está activada 
      password1.type = "password";
    }
  }

function hideOrShowPassword2() {
    password1 = document.querySelector(".pass2");
    check = document.getElementById("ver2");
  
    if (check.checked == true){ // Si la checkbox de mostrar contraseña está activada
      password1.type = "text";
    } else{ // Si no está activada 
      password1.type = "password";
    }
  }