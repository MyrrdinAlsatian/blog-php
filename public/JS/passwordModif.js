const newPassword = document.querySelector('#newPassword');
const confirmPassword = document.querySelector('#confirmPassword');
const confirmBtn = document.querySelector('#sendNewPassword');

const verifyPassword = () => {
    if (newPassword.value === confirmPassword.value) {
        confirmBtn.disabled = false;
        document.querySelector('#alert').classList.add('d-none');
    } else {
        confirmBtn.disabled = true;
        document.querySelector('#alert').classList.remove('d-none');
    }
};

newPassword.addEventListener('keyup', verifyPassword);

confirmPassword.addEventListener('keyup', verifyPassword);

