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

/* Greeting */

const spanGreeting = d.querySelector('.greeting');

const getGreeting = () => {
    let hours = new Date().getHours();

    if (hours > 4 && hours <= 12) spanGreeting.innerHTML = 'Buenos días';
    else if (hours > 12 && hours <= 19) spanGreeting.innerHTML = 'Buenas tardes';
    else spanGreeting.innerHTML = 'Buenas noches';
}

spanGreeting.addEventListener('DOMContentLoaded', getGreeting(), false);
