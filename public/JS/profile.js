const BTNMAILMODIF = document.getElementById('MailModification');
const BTNSUBMITMAILMODIF = document.getElementById('submitMail');
const BTNDELETEACCOUNT = document.getElementById('deleteAccount');

const TITLEMODIF = document.getElementById('TitleModification');
const TITLEMODIFORM = document.getElementById('FormTitleModif');
const ARTICLETITLE = document.getElementById('blog-title');

const ARTICLECHAPO = document.getElementById('chapo');
const CHAPOFROM = document.getElementById('ChapoForm');
const CHAPOMODIF = document.getElementById('ChapoModification');

const ARTICLECONTENT = document.getElementById('article-content');
const BTNARTICLECONTENT = document.getElementById('ContentModification');
const ARTICLEMODIFORM = document.getElementById('FormContentModif');

const READTIME = document.getElementById('ReadTime');
const READTIMEFORM = document.getElementById('FormReadModif');
const READMODIF = document.getElementById('ReadModification');

const MAILMODIFICATIONFORM = document.getElementById('ModificationMail');
const MAILDIV = document.getElementById('Mail');
const CONFIRMDELETEACCOUNT = document.getElementById('confirmDeleteAccount');

BTNMAILMODIF?.addEventListener('click', () => {
    MAILDIV.classList.toggle('d-none');
    MAILMODIFICATIONFORM.classList.toggle('d-none');
});

BTNDELETEACCOUNT?.addEventListener('click', () => {
    CONFIRMDELETEACCOUNT.classList.remove('d-none');
});

TITLEMODIF?.addEventListener('click', () => {
    ARTICLETITLE.classList.toggle('d-none');
    TITLEMODIFORM.classList.toggle('d-none');
});

CHAPOMODIF?.addEventListener('click', () => {
    CHAPOFROM.classList.toggle('d-none');
    ARTICLECHAPO.classList.toggle('d-none');
});

BTNARTICLECONTENT?.addEventListener('click', () => {
    ARTICLECONTENT.classList.toggle('d-none');
    ARTICLEMODIFORM.classList.toggle('d-none');
});

READMODIF?.addEventListener('click', () => {
    READTIMEFORM.classList.toggle('d-none');
    READTIME.classList.toggle('d-none');
});
