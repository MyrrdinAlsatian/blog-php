const NEWPASSWORD = document.querySelector('#newPassword');
const CONFIRMPASSWORD = document.querySelector('#confirmPassword');
const CONFIRMBTN = document.querySelector('#sendNewPassword');

const verifyPassword = () => {
    if (NEWPASSWORD.value === CONFIRMPASSWORD.value) {
        CONFIRMBTN.disabled = false;
        document.querySelector('#alert').classList.add('d-none');
    } else {
        CONFIRMBTN.disabled = true;
        document.querySelector('#alert').classList.remove('d-none');
    }
};

NEWPASSWORD.addEventListener('keyup', verifyPassword);

CONFIRMPASSWORD.addEventListener('keyup', verifyPassword);

