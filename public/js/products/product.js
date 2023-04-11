const d = document;

/* Responsive Navbar */

const toggle = d.querySelector('.navbar-toggle');
const navbar = d.querySelector('#navbar');

const toggleNavbar = () => {
    if (navbar.classList.contains('active')) {
        navbar.classList.remove('active');
        toggle.innerHTML = '<img id="open" src="../../img/menu-open-icon.svg" alt="Menú">';
    }
    else {
        navbar.classList.add('active');
        toggle.innerHTML = '<img id="close" src="../../img/menu-close-icon.svg" alt="Menú">';
    }
}

toggle.addEventListener('click', toggleNavbar, false);
