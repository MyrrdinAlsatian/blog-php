const ARTICLEBODY = document.getElementById('articleBody');

ARTICLEBODY.addEventListener('click', e => {
    console.log(e);

    if (e.target.classList.contains('btnStatusModification')) {
        e.path[1].previousElementSibling.classList.toggle('d-none');
        e.path[1].children[0].classList.toggle('d-none');
        e.target.classList.toggle('d-none');
    }
    if (e.target.classList.contains('submitStatus')) {
        e.path[1].nextElementSibling.classList.toggle('d-none');
        e.path[1].children[1].classList.toggle('d-none');
    }
});

