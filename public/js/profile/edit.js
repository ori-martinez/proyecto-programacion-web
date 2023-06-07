const d = document;
const w = window;

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

/* Validations (Searcher) */

const searchForm = d.querySelector('#search-form');
const errorSearch = d.querySelector('#div-error-search');
const inputSearch = d.querySelector('#input-search');
const buttonSearch = d.querySelector('#search-form a');

const validSearch = (e) => {
    errorSearch.innerHTML = '';

    if (e.target.value.length === 0) {
        errorSearch.innerHTML = '<span class="error-message">Ingresa un valor para la búsqueda</span>';
    }
    else if (e.target.value.length < 4) {
        errorSearch.innerHTML = '<span class="info-message">Trata con un valor mayor de 3 caracteres</span>';
    }
}

const submitSearchForm = (e) => {
    e.preventDefault();

    if (inputSearch.value.length === 0 || inputSearch.value.length < 4) {
        errorSearch.innerHTML = '<span class="error-message">Ingresa un valor válido para la búsqueda</span>';
    }
    else {
        searchForm.submit();
    }
}

inputSearch.addEventListener('change', (e) => validSearch(e), false);
buttonSearch.addEventListener('click', (e) => submitSearchForm(e), false);

/* Validations (Update Info Profile) */

const profileForm = d.querySelector('#update-profile-form');
const errorProfile = d.querySelector('#div-error-profile');
const inputName = d.querySelector('#input-name');
const inputLastname = d.querySelector('#input-lastname');
const inputAddress = d.querySelector('#input-address');
const inputEmail = d.querySelector('#input-email');
const buttonProfile = d.querySelector('#update-profile-button');

// Regular Expression
const regexName = /^([A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]+[ ]?){1,2}$/;
const regexEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

const validName = (e) => {
    errorProfile.innerHTML = '';

    if (e.target.value.length === 0) {
        errorProfile.innerHTML = '<span class="error-message">El campo Nombre es requerido</span>';
    }
    else if (!e.target.value.match(regexName)) {
        errorProfile.innerHTML = '<span class="info-message">Ingresa un nombre válido, con la primera letra mayúscula y sin números o caracteres especiales</span>';
    }
}
const validLastname = (e) => {
    errorProfile.innerHTML = '';

    if (e.target.value.length === 0) {
        errorProfile.innerHTML = '<span class="error-message">El campo Apellido es requerido</span>';
    }
    else if (!e.target.value.match(regexName)) {
        errorProfile.innerHTML = '<span class="info-message">Ingresa un apellido válido, con la primera letra mayúscula y sin números o caracteres especiales</span>';
    }
}
const validAddress = (e) => {
    errorProfile.innerHTML = '';

    if (e.target.value.length === 0) {
        errorProfile.innerHTML = '<span class="error-message">El campo Dirección es requerido</span>';
    } 
    else if (e.target.value.length > 255) {
        errorProfile.innerHTML = '<span class="info-message">La dirección no debe sobrepasar los 255 caracteres</span>';
    }
}
const validEmail = (e) => {
    errorProfile.innerHTML = '';

    if (e.target.value.length === 0) {
        errorProfile.innerHTML = '<span class="error-message">El campo Correo Electrónico es requerido</span>';
    }
    else if (!e.target.value.match(regexEmail)) {
        errorProfile.innerHTML = '<span class="info-message">Ingresa un correo electrónico válido, que incluya un @ y un .</span>';
    }
}

const submitProfileForm = (e) => {
    e.preventDefault();

    if (
        inputName.value.length === 0 || !inputName.value.match(regexName) || 
        inputLastname.value.length === 0 || !inputLastname.value.match(regexName) ||
        inputAddress.value.length === 0 || inputAddress.value.length > 255 ||
        inputEmail.value.length === 0 || !inputEmail.value.match(regexEmail)
    ) {
        errorProfile.innerHTML = '<span class="error-message">Completa correctamente todos los campos</span>';
    }
    else {
        profileForm.submit();
    }
}

inputName.addEventListener('change', (e) => validName(e), false);
inputLastname.addEventListener('change', (e) => validLastname(e), false);
inputAddress.addEventListener('change', (e) => validAddress(e), false);
inputEmail.addEventListener('change', (e) => validEmail(e), false);
buttonProfile.addEventListener('click', (e) => submitProfileForm(e), false);

/* Validations (Update Password Profile) */

const passForm = d.querySelector('#update-password-form');
const errorPass = d.querySelector('#div-error-password');
const buttonPass = d.querySelector('#update-password-button');

// Regular Expression
const regexPass = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

const validPassword = (e) => {
    errorPass.innerHTML = '';

    if (e.target.value.length === 0) {
        errorPass.innerHTML = '<span class="error-message">El campo Contraseña es requerido</span>';
    }
    else if (!e.target.value.match(regexPass)) {
        errorPass.innerHTML = '<span class="info-message">La contraseña debe tener entre 8 y 16 caracteres con al menos un dígito, una minúscula y una mayúscula</span>';
    }
}
const validPasswordCon = (e) => {
    errorPass.innerHTML = '';

    if (inputPass.value.length === 0) {
        errorPass.innerHTML = '<span class="info-message">Ingresa primero una nueva contraseña para confirmar</span>';
    }
    else {
        if (e.target.value.length === 0) {
            errorPass.innerHTML = '<span class="error-message">El campo Confirmación es requerido</span>';
        }
        else if (e.target.value !== inputPass.value) {
            errorPass.innerHTML = '<span class="info-message">La confirmación debe coincidir con la contraseña</span>'
        }
    }
}
const submitPassForm = (e) => {
    e.preventDefault();

    if (
        inputPass.value.length === 0 || !inputPass.value.match(regexPass) ||
        inputPassCon.value.length === 0 || inputPass.value !== inputPassCon.value
    ) {
        errorPass.innerHTML = '<span class="error-message">Completa correctamente todos los campos para registrarte</span>';
    }
    else {
        passForm.submit();
    }
}

inputPass.addEventListener('change', (e) => validPassword(e), false);
inputPassCon.addEventListener('change', (e) => validPasswordCon(e), false);
buttonPass.addEventListener('click', (e) => submitPassForm(e), false);

/* Delete Profile Modal */

const modal = d.querySelector("#delete-modal");
const buttonModal = d.querySelector("#open-modal");
const buttonCancelModal = d.querySelector("#cancel-modal");

buttonModal.addEventListener('click', () => modal.style.display = 'block', false);
buttonCancelModal.addEventListener('click', () => modal.style.display = 'none', false);
window.addEventListener('click', (e) => { if (e.target == modal) modal.style.display = 'none'; }, false);

/* Toggle Password Delete Profile */

const inputPassDelete = d.querySelector('#input-password-delete');
const togglePassDelete = d.querySelector('#toggle-password-delete');

const togglePasswordDelete = () => {
    if (inputPassDelete.getAttribute('type') === 'password') {
        inputPassDelete.setAttribute('type', 'text');
        togglePassDelete.innerHTML = '<span class="icon-eye-blocked"></span>';
    }
    else {
        inputPassDelete.setAttribute('type', 'password');
        togglePassDelete.innerHTML = '<span class="icon-eye"></span>';
    }
}

togglePassDelete.addEventListener('click', togglePasswordDelete, false);
