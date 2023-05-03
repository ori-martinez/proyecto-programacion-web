const d = document;

/* Responsive Navbar */

const toggle = d.querySelector('.navbar-toggle');
const navbar = d.querySelector('#navbar');

const toggleNavbar = () => {
    if (navbar.classList.contains('active')) {
        navbar.classList.remove('active');
        toggle.innerHTML = '<img id="open" src="../img/menu-open-icon.svg" alt="Menú">';
    }
    else {
        navbar.classList.add('active');
        toggle.innerHTML = '<img id="close" src="../img/menu-close-icon.svg" alt="Menú">';
    }
}

toggle.addEventListener('click', toggleNavbar, false);

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
