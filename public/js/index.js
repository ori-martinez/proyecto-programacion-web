/* Responsive Navbar */

const toggle = document.querySelector('.navbar-toggle');
const navbar = document.querySelector('#navbar');

const toggleNavbar = () => {
    if (navbar.classList.contains('active')) {
        navbar.classList.remove('active');
        toggle.querySelector('a').innerHTML = '<img id="open" src="./img/menu-open-icon.svg" alt="Menú">';
    }
    else {
        navbar.classList.add('active');
        toggle.querySelector('a').innerHTML = '<img id="close" src="./img/menu-close-icon.svg" alt="Menú">';
    }
}

toggle.addEventListener('click', toggleNavbar, false);
