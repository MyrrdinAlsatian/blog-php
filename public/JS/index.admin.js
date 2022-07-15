const SIDEMENU = document.querySelector('aside');
const MENUBTN = document.querySelector('#menu-btn');
const CLOSEBTN = document.querySelector('.btn-close');

if (MENUBTN) {
    MENUBTN.addEventListener('click', () => {
        SIDEMENU.style.display = 'block';
    });
}

if (CLOSEBTN) {
    CLOSEBTN.addEventListener('click', () => {
        SIDEMENU.style = '';
    });
}
window.addEventListener('resize', () => {
    console.log('resize');
    if (window.innerWidth >= 768) {
        SIDEMENU.style.display = 'block';
        MENUBTN.style.display = 'none';
    } else {
        MENUBTN.style = '';
    }
});
