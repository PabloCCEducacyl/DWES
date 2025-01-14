const menuBotonLogin = document.getElementById('menu-login')
const menuBotonRegistro = document.getElementById('menu-registrar')
const formLogin = document.getElementById('form-login')
const formRegistro = document.getElementById('form-registro')


if(formRegistro != null){
    formRegistro.classList.add('menu-escondido')
    
    menuBotonLogin.addEventListener("click", mostrarForm)
    menuBotonRegistro.addEventListener("click", mostrarForm)
    
    function mostrarForm(event){
        let formAMostrar = event.target.id;
        console.log("meparto")
        console.log(formAMostrar)
        if(formAMostrar == "menu-login"){
            menuBotonLogin.classList.add('menu-activo')
            menuBotonRegistro.classList.remove('menu-activo')
            formLogin.classList.remove('menu-escondido')
            formRegistro.classList.add('menu-escondido')
        } else if(formAMostrar == "menu-registrar"){
            menuBotonRegistro.classList.add('menu-activo')
            menuBotonLogin.classList.remove('menu-activo')
            formLogin.classList.add('menu-escondido')
            formRegistro.classList.remove('menu-escondido')
        };
    }
}

$('#info').click(() => {
    $('#info').remove();
})

$('#cerrarsesion').click(() => {
    window.location.href = 'controlador/cerrar_sesion.php'
})

$('#nuevoproyecto').click(() => {
    window.location.href = window.location.href + '?form-proyecto=1'
})

window.addEventListener("load", () => {
    history.replaceState({}, "", ".")
});