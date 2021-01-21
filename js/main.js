const toggleNav = document.querySelector('.toggler');
const mainNav = document.querySelector('.mainNavBar');
const links = document.querySelectorAll('.mainNavBar li');

toggleNav.addEventListener('click', () => {
    mainNav.classList.toggle('open');
});
