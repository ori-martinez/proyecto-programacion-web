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

/* Validations */

const commentaryForm = d.querySelector('#commentaries-section form');
const errorDiv = d.querySelector('#div-error');
const inputCommentary = d.querySelector('#input-commentary');
const buttonSubmit = d.querySelector('#commentary-button');

const validCommentary = (e) => {
    errorDiv.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDiv.innerHTML = '<span class="error-message">El comentario no puede estar vacío</span>';
    } 
    else if (e.target.value.length > 200) {
        errorDiv.innerHTML = '<span class="info-message">El comentario no debe sobrepasar los 200 caracteres</span>';
    }
}
const submitForm = (e) => {
    e.preventDefault();

    if (inputCommentary.value.length === 0  || inputCommentary.value.length > 200) {
        errorDiv.innerHTML = '<span class="error-message">Completa correctamente todos los campos para registrarte</span>';
    }
    else {
        commentaryForm.submit();
    }
}

inputCommentary.addEventListener('change', (e) => validCommentary(e), false);
buttonSubmit.addEventListener('click', (e) => submitForm(e), false);
