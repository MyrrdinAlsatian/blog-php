console.warn('Error loading');

let btnMailModif = document.getElementById('MailModification');
let btnSubmitMailModif = document.getElementById('submitMail');

let MailModificationForm = document.getElementById('ModificationMail');
let MailDiv = document.getElementById('Mail');

btnMailModif.addEventListener('click', () => {
    MailDiv.classList.toggle('d-none');
    MailModificationForm.classList.toggle('d-none');
});

