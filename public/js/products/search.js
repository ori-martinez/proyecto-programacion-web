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

/* Validations (Searcher) */

const mainSearchForm = d.querySelector('#main-search-form');
const mainErrorSearch = d.querySelector('#main-div-error-search');
const mainInputSearch = d.querySelector('#main-input-search');
const mainButtonSearch = d.querySelector('#main-search-form a');

const validMainSearch = (e) => {
    mainErrorSearch.innerHTML = '';

    if (e.target.value.length === 0) {
        mainErrorSearch.innerHTML = '<span class="error-message">Ingresa un valor para la búsqueda</span>';
    }
    else if (e.target.value.length < 4) {
        mainErrorSearch.innerHTML = '<span class="info-message">Trata con un valor mayor de 3 caracteres</span>';
    }
}

const submitMainSearchForm = (e) => {
    e.preventDefault();

    if (mainInputSearch.value.length === 0 || mainInputSearch.value.length < 4) {
        mainErrorSearch.innerHTML = '<span class="error-message">Ingresa un valor válido para la búsqueda</span>';
    }
    else {
        mainSearchForm.submit();
    }
}

mainInputSearch.addEventListener('change', (e) => validMainSearch(e), false);
mainButtonSearch.addEventListener('click', (e) => submitMainSearchForm(e), false);
