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

/* Toggle Password */

const inputPass = d.querySelector('#input-password');
const togglePass = d.querySelector('#toggle-password');

const togglePassword = () => {
    if (inputPass.getAttribute('type') === 'password') {
        inputPass.setAttribute('type', 'text');
        togglePass.innerHTML = '<span class="icon-eye-blocked"></span>';
    }
    else {
        inputPass.setAttribute('type', 'password');
        togglePass.innerHTML = '<span class="icon-eye"></span>';
    }
}

togglePass.addEventListener('click', togglePassword, false);

/* Validations */

const loginForm = d.querySelector('#login-form');
const errorDiv = d.querySelector('#div-error');
const inputEmail = d.querySelector('#input-email');
const buttonSubmit = d.querySelector('#form-button');

// Regular Expression
const regexEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

const validEmail = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El campo Correo Electrónico es requerido</span>';
    }
    else if (!e.target.value.match(regexEmail)) {
        errorDiv.innerHTML = '<span class="info-message">Ingresa un correo electrónico válido, que incluya un @ y un .</span>';
    }
}
const validPassword = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El campo Contraseña es requerido</span>';
    }
}
const submitForm = (e) => {
    e.preventDefault();

    if (
        inputEmail.value.length === 0 || !inputEmail.value.match(regexEmail) || 
        inputPass.value.length === 0
    ) {
        errorDiv.innerHTML = '<span class="error-message">Completa correctamente todos los campos para logearte</span>';
    }
    else {
        loginForm.submit();
    }
}

inputEmail.addEventListener('change', (e) => validEmail(e), false);
inputPass.addEventListener('change', (e) => validPassword(e), false);
buttonSubmit.addEventListener('click', (e) => submitForm(e), false);
