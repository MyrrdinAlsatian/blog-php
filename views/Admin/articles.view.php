<div class="data-container">
    <h2>Dernier Article</h2>
    <div class="row">
        <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Création</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <?php
                foreach ($allArticles as $singleArticle) :
                    $status = $singleArticle['status'] == 1 ? "Publié" : "Brouillon";
                ?>
                    <tr>
                        <td>
                            <h6 class="mt-2 mt-md-0 mb-0"> <?= $singleArticle['title'] ?></h6>
                        </td>
                        <td>
                            <h6 class="mt-2 mt-md-0 mb-0"> <?= $singleArticle['username'] ?></h6>
                        </td>
                        <td>
                            <h6 class="mt-2 mt-md-0"><?= $singleArticle['created'] ?></h6>
                        </td>
                        <td>
                            <span class="badge  <?= $singleArticle['status'] == 1 ? "bg-success text-light" : "bg-warning text-light" ?> bg-opacity-10 mt-2 mt-md-0">
                                <?= $status ?>
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                            </div>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>