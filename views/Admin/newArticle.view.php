<h1> Nouvelle article de <?= $_SESSION["profile"]["username"]; ?></h1>
<form method="post" enctype="multipart/form-data" action="<?= URL . "backoffice/validation_newArticle" ?>">
    <input type="hidden" name="CRSF" value="<?= $_SESSION["TOKEN"]["token"]; ?>" />
    <div class="mb-3">
        <label for="title" class="form-label">
            titre
        </label>
        <input type="text" class="form-control" name="title" id="title" />
    </div>
    <div class="mb-3">
        <label for="subTitle" class="form-label">
            Chapo
        </label>
        <input type="text" class="form-control" name="subTitle" id="subTitle" />
    </div>
    <div class="mb-3 row">
        <div class="col-3">
            <label for="status" class="form-label">
                Status
            </label>
            <select class="form-control" name="status" id="status">
                <option value="0" selected>Brouillon</option>
                <option value="1">Publié</option>
            </select>
        </div>
        <div class="col-3">
            <label for="readingTime" class="form-label">
                temps de lecture
            </label>
            <input type="number" class="form-control" name="readingTime" id="readingTime" min="1" max="120" />
        </div>
        <div class="col-6">
            <label for="image" class="form-label">
                Image (png,jpeg)
            </label>
            <input type="file" class="form-control" name="image" id="image" accept="image/png,image/jpg,image/jpeg,image/gif,image/webp" />
        </div>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">
            Content
        </label>
        <textarea class="form-control" name="content" id="content"></textarea>
    </div>
    <!--<div class="mb-3">
        <label for="confirmPassword" class="form-label">
            Confirmer le nouveau mot de passe
        </label>
        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" />
        <div class="mt-2 alert alert-warning d-none " id="alert">
            veuillez écrire le même mot de passe
        </div>
    </div>-->
    <input type="hidden" name="user" id="user" value="<?= $_SESSION["profile"]["id"]; ?>" />
    <button id='sendNewArticle' type="submit" class="btn btn-success"> Confirmer </button>
</form>