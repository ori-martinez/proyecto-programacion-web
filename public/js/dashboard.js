const d = document;

/* Responsive Navbar */

const toggle = d.querySelector('.navbar-toggle');
const navbar = d.querySelector('#navbar');

const toggleNavbar = () => {
    if (navbar.classList.contains('active')) {
        navbar.classList.remove('active');
        toggle.innerHTML = '<img id="open" src="./img/menu-open-icon.svg" alt="Menú">';
    }
    else {
        navbar.classList.add('active');
        toggle.innerHTML = '<img id="close" src="./img/menu-close-icon.svg" alt="Menú">';
    }
}

toggle.addEventListener('click', toggleNavbar, false);

/* Greeting */

const spanGreeting = d.querySelector('.greeting');

const getGreeting = () => {
    let hours = new Date().getHours();

    if (hours > 4 && hours <= 12) spanGreeting.innerHTML = 'Buenos días';
    else if (hours > 12 && hours <= 19) spanGreeting.innerHTML = 'Buenas tardes';
    else spanGreeting.innerHTML = 'Buenas noches';
}

spanGreeting.addEventListener('DOMContentLoaded', getGreeting(), false);
