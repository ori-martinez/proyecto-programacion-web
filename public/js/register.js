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
const inputPassCon = d.querySelector('#input-password-confirmation');
const togglePass = d.querySelector('#toggle-password');
const togglePassCon = d.querySelector('#toggle-password-confirmation');

const togglePassword = () => {
    if (inputPass.getAttribute('type') === 'password') {
        inputPass.setAttribute('type', 'text');
        inputPassCon.setAttribute('type', 'text');
        togglePass.innerHTML = '<span class="icon-eye-blocked"></span>';
        togglePassCon.innerHTML = '<span class="icon-eye-blocked"></span>';
    }
    else {
        inputPass.setAttribute('type', 'password');
        inputPassCon.setAttribute('type', 'password');
        togglePass.innerHTML = '<span class="icon-eye"></span>';
        togglePassCon.innerHTML = '<span class="icon-eye"></span>';
    }
}

togglePass.addEventListener('click', togglePassword, false);
togglePassCon.addEventListener('click', togglePassword, false);

/* Validations */

const registerForm = d.querySelector('#register-form');
const errorDiv = d.querySelector('#div-error');
const inputName = d.querySelector('#input-name');
const inputLastname = d.querySelector('#input-lastname');
const inputBirthdate = d.querySelector('#input-birthdate');
const inputGender = d.querySelector('#input-gender');
const inputAddress = d.querySelector('#input-address');
const inputEmail = d.querySelector('#input-email');
const buttonSubmit = d.querySelector('#form-button');

// Regular Expression
const regexName = /^([A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]+[ ]?){1,2}$/;
const regexEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
const regexPass = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

// Helpers
const getAge = (date) => {
    const today = new Date();
    const birthdate = new Date(date);
    const age = today.getFullYear() - birthdate.getFullYear();
    const m = today.getMonth() - birthdate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
        age--;
    }

    return age;
}

const validName = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El campo Nombre es requerido</span>';
    }
    else if (!e.target.value.match(regexName)) {
        errorDiv.innerHTML = '<span class="info-message">Ingresa un nombre válido, con la primera letra mayúscula y sin números o caracteres especiales</span>';
    }
}
const validLastname = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El campo Apellido es requerido</span>';
    }
    else if (!e.target.value.match(regexName)) {
        errorDiv.innerHTML = '<span class="info-message">Ingresa un apellido válido, con la primera letra mayúscula y sin números o caracteres especiales</span>';
    }
}
const validBirthdate = (e) => {
    errorDiv.innerHTML = '';

    if (new Date(e.target.value) > new Date()) {
        errorDiv.innerHTML = '<span class="info-message">Ingresa una fecha de nacimiento válida</span>';
    }
    else if (getAge(e.target.value) < 18) {
        errorDiv.innerHTML = '<span class="error-message">No puedes registrarse si eres menor de edad</span>';
    }
}
const validGender = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value === '0') {
        errorDiv.innerHTML = '<span class="error-message">El campo Género es requerido</span>';
    }
}
const validAddress = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El campo Dirección es requerido</span>';
    } 
    else if (e.target.value.length > 255) {
        errorDiv.innerHTML = '<span class="info-message">La dirección no debe sobrepasar los 255 caracteres</span>';
    }
}
const validEmail = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El campo Correo Electrónico es requerido</span>';
    }
    else if (!e.target.value.match(regexEmail)) {
        errorDiv.innerHTML = '<span class="info-message">Ingresa un correo electrónico válido, todo en minúsculas que incluya un @ y un .</span>';
    }
}
const validPassword = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El campo Contraseña es requerido</span>';
    }
    else if (!e.target.value.match(regexPass)) {
        errorDiv.innerHTML = '<span class="info-message">La contraseña debe tener entre 8 y 16 caracteres con al menos un dígito, una minúscula y una mayúscula</span>';
    }
}
const validPasswordCon = (e) => {
    errorDiv.innerHTML = '';

    if (inputPass.value.length === 0) {
        errorDiv.innerHTML = '<span class="info-message">Ingresa primero una contraseña para confirmar</span>';
    }
    else {
        if (e.target.value.length === 0) {
            errorDiv.innerHTML = '<span class="error-message">El campo Confirmación es requerido</span>';
        }
        else if (e.target.value !== inputPass.value) {
            errorDiv.innerHTML = '<span class="info-message">La confirmación debe coincidir con la contraseña</span>'
        }
    }
}
const submitForm = (e) => {
    e.preventDefault();

    if (
        inputName.value.length === 0 || !inputName.value.match(regexName) || 
        inputLastname.value.length === 0 || !inputLastname.value.match(regexName) ||
        new Date(inputBirthdate.value) > new Date() || getAge(inputBirthdate.value) < 18 ||
        inputGender.value === '0' ||
        inputAddress.value.length === 0 || inputAddress.value.length > 255 ||
        inputEmail.value.length === 0 || !inputEmail.value.match(regexEmail) || 
        inputPass.value.length === 0 || !inputPass.value.match(regexPass) ||
        inputPassCon.value.length === 0 || inputPass.value !== inputPassCon.value
    ) {
        errorDiv.innerHTML = '<span class="error-message">Completa correctamente todos los campos para registrarte</span>';
    }
    else {
        registerForm.submit();
    }
}

inputName.addEventListener('change', (e) => validName(e), false);
inputLastname.addEventListener('change', (e) => validLastname(e), false);
inputBirthdate.addEventListener('change', (e) => validBirthdate(e), false);
inputGender.addEventListener('change', (e) => validGender(e), false);
inputAddress.addEventListener('change', (e) => validAddress(e), false);
inputEmail.addEventListener('change', (e) => validEmail(e), false);
inputPass.addEventListener('change', (e) => validPassword(e), false);
inputPassCon.addEventListener('change', (e) => validPasswordCon(e), false);
buttonSubmit.addEventListener('click', (e) => submitForm(e), false);
