const d = document;

// FUNCTIONS
/* Active Menu */
const activeMenu = (menu) => menu.classList.toggle('active');

/* Toggle Navbar */

const toggleButton = d.querySelector('.toggle-button');
const navbar = d.querySelector('.navbar');

toggleButton.addEventListener('click', () => activeMenu(navbar), false);

/* Toggle User Menu */

const userButton = d.querySelector('#user-menu-button');
const userMenu = d.querySelector('#user-menu');

if (userButton) userButton.addEventListener('click', () => activeMenu(userMenu), false);

/* Toggle Searcher Input */

const searcherButton = d.querySelector('#searcher-button');
const searcherInput = d.querySelector('#searcher-input');

searcherButton.addEventListener('click', () => activeMenu(searcherInput), false);
/* sms de mensaje ennviado */
function enviar(){
    var sms = document.getElementById('mensaje');
    if(sms.value.length==0)
    {window.alert('No hay mensaje ')}
    else{window.alert('envio exitoso')}
    
}
