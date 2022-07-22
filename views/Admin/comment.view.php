    <?php
    $comments = $page_data;
    ?>
    <div class="data-container">
        <h2>Commentaires</h2>
        <div class="row">
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Content</th>
                        <th scope="col">article</th>
                        <th scope="col">user</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id='articleBody' class="border-top-0">
                    <?php
                    foreach ($comments as $comment) :
                        $status = $comment['status'] == 1 ? "validé" : "non-validé";
                    ?>
                        <tr>
                            <td>
                                <h6 class="mt-2 mt-md-0 mb-0"> <?= $comment['content'] ?></h6>
                            </td>
                            <td>
                                <h6 class="mt-2 mt-md-0 mb-0"> <a href="<?= URL ?>article/<?= $comment['id'] ?>"><?= $comment['title'] ?></a></h6>
                            </td>
                            <td>
                                <h6 class="mt-2 mt-md-0"><?= $comment['username'] ?></h6>
                            </td>
                            <?php if (Security::isAdmin()) : ?>
                                <td class="">
                                    <div class="statusModification d-none col-8">
                                        <form class="d-flex" method="POST" action="<?= URL . 'backoffice/update_status_comments' ?>">
                                            <input type="hidden" name="id" value="<?= $comment['uuid'] ?>" />
                                            <select name="status" id="status" class="form-control col-8">
                                                <option value=" 0" <?= $comment['status'] == 0 ? "selected" : "" ?>>non-validé</option>
                                                <option value="1" <?= $comment['status'] == 1 ? "selected" : "" ?>>Publié</option>
                                            </select>
                                            <button class=" btn btn-success col-4" class="submitStatus" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="status col">
                                        <span class="badge  <?= $comment['status'] == 1 ? "bg-success text-light" : "bg-warning text-light" ?> bg-opacity-10 mt-2 mt-md-0">
                                            <?= $status ?>
                                        </span>
                                        <button class="btnStatusModification" name="StatusModification">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="pointer-events: none">
                                                <path d=" M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    </div>

                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <form method="POST" action="<?= URL . 'backoffice/deleteComment' ?>">
                                            <input type="hidden" name="id" value="<?= $comment['uuid'] ?>" />
                                            <button class="btn btn-danger btn-xs" href="">
                                                <span class="material-icons-sharp"> delete </span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>