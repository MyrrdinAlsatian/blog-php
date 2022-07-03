const sideMenu = document.querySelector('aside');
const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('.btn-close');

if (menuBtn) {
    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = 'block';
    });
}

if (closeBtn) {
    closeBtn.addEventListener('click', () => {
        sideMenu.style = '';
    });
}
window.addEventListener('resize', () => {
    console.log('resize');
    if (window.innerWidth >= 768) {
        sideMenu.style.display = 'block';
        menuBtn.style.display = 'none';
    } else {
        menuBtn.style = '';
    }
});
