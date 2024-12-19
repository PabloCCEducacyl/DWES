const menuBotonLogin = document.getElementById('menu-login')
const menuBotonRegistro = document.getElementById('menu-registrar')
const formLogin = document.getElementById('form-login')
const formRegistro = document.getElementById('form-registro')

formRegistro.classList.add('menu-escondido')

menuBotonLogin.addEventListener("click", mostrarForm)
menuBotonRegistro.addEventListener("click", mostrarForm)

function mostrarForm(event){
    let formAMostrar = event.target.parentElement.id;
    
    if(formAMostrar == "menu-login"){
        formLogin.classList.remove('menu-escondido')
        formLogin.classList.add('menu-escondido')
    } else if(formAMostrar == "menu-registro"){
        formLogin.classList.add('menu-escondido')
        formLogin.classList.remove('menu-escondido')
    };
}