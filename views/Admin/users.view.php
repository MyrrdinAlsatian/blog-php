<div class="data-container">
    <h2>Utilisateur(s)</h2>
    <div class="row">
        <table class="table stable-stripped table-hover table-user">
            <thead>
                <tr>
                    <th scope="col"> #</th>
                    <th scope="col"> Pseudo</th>
                    <th scope="col"> Mail</th>
                    <th scope="col"> Role</th>
                    <th scope="col"> Actif</th>
                    <th scope="col"> Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allUsers as $singleUser) :
                ?>
                    <tr>
                        <td>
                            <h6 class="mt-2 mt-md-0 mb-0">
                                <?= $singleUser['id'] ?>
                            </h6>
                        </td>
                        <td>
                            <h6 class="mt-2 mt-md-0 mb-0">
                                <?= $singleUser['username'] ?>
                            </h6>
                        </td>
                        <td>
                            <h6 class="mt-2 mt-md-0 mb-0">
                                <?= $singleUser['email'] ?>
                            </h6>
                        </td>
                        <td>
                            <h6 class="mt-2 mt-md-0 mb-0">
                                <?php if ($singleUser['role'] === 2) : ?>
                                    <?= Toolbox::displayRole($singleUser['role']); ?>
                                <?php else : ?>
                                    <form method="post" action="<?= URL . 'backoffice/validation_RoleModification' ?>">
                                        <input type="hidden" name="id" value="<?= $singleUser['id'] ?>" />
                                        <select class="form-select" name="role" id="role" onchange="confirm('Confirmez vous la modification des rôles') ? submit() : document.location.reload();">
                                            <option value="1" <?= $singleUser['role'] === 1 ? 'selected' : '' ?>>Commentateur</option>
                                            <option value="2" <?= $singleUser['role'] === 2 ? 'selected' : '' ?>>Administrateur</option>
                                        </select>
                                    </form>
                                <?php endif; ?>
                            </h6>
                        </td>
                        <td>
                            <h6 class="mt-2 mt-md-0 mb-0">
                                <?= (int)$singleUser['isValid'] === 0 ? "Non validé" : "validé" ?>
                            </h6>
                        </td>
                        <td>
                            <?php if ($singleUser['role'] === 2) : ?>
                                <button type="button" class="btn btn-xs btn-disabled" disabled href="#">
                                    <span class="material-icons-sharp"> delete </span>
                                </button>
                            <?php else : ?>
                                <form method="POST" action="<?= URL . 'backoffice/admin_deleteUser' ?>">
                                    <input type="hidden" name="id" value="<?= $singleUser['id'] ?>" />
                                    <button class="btn btn-danger btn-xs" href="">
                                        <span class="material-icons-sharp"> delete </span>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>