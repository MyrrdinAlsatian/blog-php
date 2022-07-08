const BTNMAILMODIF = document.getElementById('MailModification');
const BTNSUBMITMAILMODIF = document.getElementById('submitMail');
const BTNDELETEACCOUNT = document.getElementById('deleteAccount');

const MAILMODIFICATIONFORM = document.getElementById('ModificationMail');
const MAILDIV = document.getElementById('Mail');
const CONFIRMDELETEACCOUNT = document.getElementById('confirmDeleteAccount');

BTNMAILMODIF.addEventListener('click', () => {
    MAILDIV.classList.toggle('d-none');
    MAILMODIFICATIONFORM.classList.toggle('d-none');
});

BTNDELETEACCOUNT.addEventListener('click', () => {
    CONFIRMDELETEACCOUNT.classList.remove('d-none');
});

