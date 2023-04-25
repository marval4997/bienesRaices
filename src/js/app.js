document.addEventListener("DOMContentLoaded", function () {
    eventListeners();
    darkMode()
});

function darkMode(){
    const prefiereDarkMode=window.matchMedia('prefers-color-scheme: dark');
    //console.log(prefiereDarkMode)

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener("change",function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })


    const botonDarkMode=document.querySelector('.dark-mode-boton')

    botonDarkMode.addEventListener("click", function(){
        document.body.classList.toggle('dark-mode');
    })
}

function eventListeners() {
    const mobilMenu = document.querySelector(".mobile-menu")

    mobilMenu.addEventListener("click", navegacionResponsive);

    const metodoContacto= document.querySelectorAll('input[name="contacto[contactar]"]')
    metodoContacto.forEach(input => input.addEventListener('click',mostarMetodosContacto))
}

function navegacionResponsive() {
    const navegacion = document.querySelector(".navegacion");

    navegacion.classList.toggle('mostrar');
}

function mostarMetodosContacto(e){
    const divContacto=document.getElementById('metodo-contacto')
    
    if(e.target.value==="telefono"){
        divContacto.innerHTML=`
        <label for="telefono">Telefono</label>
        <input type="tel" name="contacto[telefono]" id="telefono" placeholder="Tu telefono">

        <p>Elija la fecha y la hora para la llamada</p>

        <label for="fecha">Fecha</label>
        <input type="date" name="contacto[fecha]" id="fecha">

        <label for="hora">Hora</label>
        <input type="time" name="contacto[hora]" id="hora" min="09:00" max="18:00">`;

        
    }else{
        divContacto.innerHTML=`
        <label for="email">E-mail</label>
        <input type="email" name="contacto[email]" id="email" placeholder="TU email">`;
    }

}