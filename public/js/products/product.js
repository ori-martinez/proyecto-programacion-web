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

/* Validations (Shop) */

const shopForm = d.querySelector('#shop-form');
const errorDivShop = d.querySelector('#div-error-shop');
const inputQty = d.querySelector('#quantity-input');
const selectSize = d.querySelector('#select-size');
const selectDelivery = d.querySelector('#select-delivery');

const validQty = (e) => {
    errorDivShop.innerHTML = '';

    if (e.target.value.length === 0) {
        errorDivShop.innerHTML = '<span class="error-message">El Campo Cantidad no puede estar vacío</span>';
    }
    else if (Number(e.target.value) <= 0) {
        errorDivShop.innerHTML = '<span class="info-message">La cantidad no puede ser menor o igual que cero</span>';
    }
}
const selectedItem = (e, message) => {
    errorDivShop.innerHTML = '';

    if (e.target.value === '0') {
        errorDivShop.innerHTML = `<span class="info-message">Debe seleccionar ${message}</span>`;
    }
}

inputQty.addEventListener('change', (e) => validQty(e), false);
selectSize.addEventListener('change', (e) => selectedItem(e, 'una talla'), false);
selectDelivery.addEventListener('change', (e) => selectedItem(e, 'los días que tomará la entrega'), false);

/* Validations (Commentaries) */

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
