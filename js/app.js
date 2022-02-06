let usuarios_max = 5;
const btnResponsable = document.querySelector('.btnres');
const usu = document.getElementById('usuario');
let contador = 1;

btnResponsable.addEventListener("click", function(e){
    e.preventDefault();
    
    if(contador < usuarios_max){
        ++contador;
        var divName = document.createElement("div");
        divName.className = "page__input";
        var labelName = document.createElement("label");
        labelName.append('Nombre:');
        var inputName = document.createElement("input");
        inputName.type = "text";
        inputName.name = `nombre${contador}`;
        var labelApeP = document.createElement("label");
        labelApeP.append('Apellido Paterno:');
        var inputApeP = document.createElement("input");
        inputApeP.type = "text";
        inputApeP.name = `apellidoP${contador}`;
        var labelApeM = document.createElement("label");
        labelApeM.append('Apellido Materna:');
        var inputApeM = document.createElement("input");
        inputApeM.type = "text";
        inputApeM.name = `apellidoM${contador}`;
        divName.appendChild(labelName);
        divName.appendChild(inputName);
        divName.appendChild(labelApeP);
        divName.appendChild(inputApeP);
        divName.appendChild(labelApeM);
        divName.appendChild(inputApeM);
        
        var divRol = document.createElement("div");
        divRol.className = "page__input";
        var labelRol = document.createElement("label");
        labelRol.append('Rol de institución:');
        var inputRol = document.createElement("input");
        inputRol.type = "text";
        inputRol.name = `rol${contador}`;
        divRol.appendChild(labelRol);
        divRol.appendChild(inputRol);

        var divCorreo = document.createElement("div");
        divCorreo.className = "page__input";
        var labelCorreo = document.createElement("label");
        labelCorreo.append('Correo electrónico:');
        var inputCorreo = document.createElement("input");
        inputCorreo.type = "email";
        inputCorreo.name = `correo${contador}`;
        divCorreo.appendChild(labelCorreo);
        divCorreo.appendChild(inputCorreo);
        
        var divResponsable = document.createElement("div");
        divResponsable.className = "responsable";
        divResponsable.appendChild(divName);
        divResponsable.appendChild(divRol);
        divResponsable.appendChild(divCorreo);

        usu.append(divResponsable);

        return contador;
    }
});

const btnEliminar = document.querySelector('.Eliminar')
btnEliminar.addEventListener("click", function (e) {
    e.preventDefault();
    if (contador > 1) {
        var parent = document.getElementById('usuario').lastChild;
        parent.parentNode.removeChild(parent);
        --contador;
    }
})