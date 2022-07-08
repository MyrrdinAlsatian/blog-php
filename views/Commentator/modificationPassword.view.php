<h1> Modification du mot de passe - <?= $_SESSION["profile"]["username"]; ?></h1>
<form method="post" action="<?= URL . "backoffice/validation_newPassword" ?>">

    <div class="mb-3">
        <label for="oldPassword" class="form-label">
            Mot de passe actuel
        </label>
        <input type="password" class="form-control" name="oldPassword" id="oldPassword" />
    </div>
    <div class="mb-3">
        <label for="newPassword" class="form-label">
            Nouveau mot de passe
        </label>
        <input type="password" class="form-control" name="newPassword" id="newPassword" />
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">
            Confirmer le nouveau mot de passe
        </label>
        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" />
        <div class="p-1 d-none bg-warning" id="alert">
            veuillez écrire le même mot de passe
        </div>
    </div>
    <button id='sendNewPassword' type="submit" class="btn btn-warning btn-primary" disabled> Confirmer </button>
</form>