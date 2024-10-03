const burger = document.querySelector('.burger');
const sidemenu = document.querySelector('.sidemenu');

burger.addEventListener('click', () => {
    sidemenu.classList.toggle('show-menu');
});

const modal = document.querySelector('.container-modal');

window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('show-modal');
    }
});

