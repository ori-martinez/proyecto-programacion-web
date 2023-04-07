const d = document;

/* Responsive Navbar */

const toggleNav = d.querySelector('.navbar-toggle');
const navbar = d.querySelector('#navbar');

const toggleNavbar = () => {
    if (navbar.classList.contains('active')) {
        navbar.classList.remove('active');
        toggleNav.innerHTML = '<img id="open" src="./img/menu-open-icon.svg" alt="Menú">';
    }
    else {
        navbar.classList.add('active');
        toggleNav.innerHTML = '<img id="close" src="./img/menu-close-icon.svg" alt="Menú">';
    }
}

toggleNav.addEventListener('click', toggleNavbar, false);

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
        errorDiv.innerHTML = '<span class="error-message">Ingresa un correo electrónico válido</span>';
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

    if (inputEmail.value.length === 0 || inputPass.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">Completa los campos para logearte</span>';
    }
    else {
        loginForm.submit();
    }
}

inputEmail.addEventListener('change', (e) => validEmail(e), false);
inputPass.addEventListener('change', (e) => validPassword(e), false);
buttonSubmit.addEventListener('click', (e) => submitForm(e), false);
