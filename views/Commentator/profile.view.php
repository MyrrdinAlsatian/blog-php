<h2>Profile de <?= $user['username'] ?></h2>

<div id="Mail">
    <div class="row">
        <p class="col-2">Mail :</p>
        <p class="col-8"><?= $user['email'] ?></p>
        <button class="btn btn-primary col-2" id="MailModification" name="MailModification">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
        </button>
    </div>
</div>
<div id="ModificationMail" class="d-none">
    <form action="<?= URL . "backoffice/validation_mailModification" ?>" method="post">
        <div class="row">
            <label for="mail" class="col-2 col-form-label">Mail :</label>
            <p class="col-8">
                <input type="mail" id="mail" name="mail" class="form-control" placeholder="<?= $user['email'] ?>" value="<?= $user['email'] ?>" />
            </p>
            <button class=" btn btn-success col-2" id="submitMail" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                </svg>
            </button>
        </div>
    </form>
</div>

<div>
    <a href="<?= URL ?>backoffice/passwordModification" class="btn btn-warning btn-xs"> Modifier mon mot de passe</a>
</div>
<?php

?>