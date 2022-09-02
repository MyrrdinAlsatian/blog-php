<?php
$article = $page_data;
?>
<main class="single-blog__content">
    <base href="<?= URL ?>">
    <div class="single-blog__core">
        <div id="blog-title" class="">
            <h1 class="single-blog__title title-blog"><?= $article['title'] ?>
                <button class="btn btn-primary col-2" id="TitleModification" name="MailModification">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>
            </h1>

        </div>
        <form id='FormTitleModif' class="row d-none" action="<?= URL ?>validate_articleTitleModification" method="post">
            <input type="hidden" name="id" value="<?= $article['id'] ?>" />
            <input class="form-control col-10" type="text" name="title" value="<?= $article['title'] ?>" placeholder="<?= $article['title'] ?>" class="single-blog__title title-blog" />
            <button class=" btn btn-success col-2" id="FormTitleModif" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                </svg>
            </button>
        </form>
        <!--<div class="row">
            <ul class="taglist">
                Tag
            </ul>
        </div>-->
        <div class="single-blog__chapo">
            <div id="chapo"><?= $article["chapo"] ?>
                <button class="btn btn-primary col-2" id="ChapoModification" name="MailModification">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>
            </div>
            <form id='ChapoForm' class="row d-none" method="post" action="<?= URL ?>validate_articleChapoModification">
                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                <input class="form-control col-10" type="text" name="chapo" placeholder="<?= $article['chapo'] ?>" value="<?= $article['chapo'] ?>" />
                <button class=" btn btn-success col-2" id="FormChapoModif" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="single-blog__text">
            <div id="article-content">
                <?= $article['content'] ?>
                <button class="btn btn-primary col-2" id="ContentModification" name="MailModification">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>
            </div>
            <form class="row d-none" id="FormContentModif" method="post" action="<?= URL ?>validate_articleContentModification">
                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                <textarea class="col-10 form-control" name="content" placeholder="<?= $article['content'] ?>"><?= $article['content'] ?></textarea>
                <button class=" btn btn-success col-2" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <aside class="single-blog__metadata">
        <figure>
            <img src="<?= $article['featureImage'] ?>" alt="<?= $article['title'] ?>" />
            <figcaption>
                <form class="row" method="post" action="<?= URL ?>validate_articleImgModification" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                    <input type="file" accept="image/png,image/jpg" name="img" />
                    <button class=" btn btn-success col-2" id="FormTitleModif" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </button>
                </form>
            </figcaption>
        </figure>
        <details class="single-blog__metadata-list">
            <summary>Metadata</summary>
            <ol class="single-blog__metadata-list--primary">
                <li>
                    <span>Auteur :</span>
                    <ol class="single-blog__metadata-list--secondary">
                        <?= $article['username'] ?>
                    </ol>
                </li>
                <li>
                    <span>Temps de lecture :</span>
                    <ol class="single-blog__metadata-list--secondary">
                        <li>
                            <div id="ReadTime">
                                <?= $article['readingTime'] ?>
                                <button class="btn btn-primary col-2" id="ReadModification" name="MailModification">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>

                            </div>
                            <form class="row d-none" method="post" id="FormReadModif" action="<?= URL ?>validate_articleTimeModification">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                                <input type="number" name="readingTime" value="<?= $article['readingTime'] ?>" />
                                <button class=" btn btn-success col-2" id="FormTitleModif" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                    </svg>
                                </button>
                            </form>minutes
                        </li>
                    </ol>
                </li>
                <li>
                    <span>Créer :</span>
                    <ol class="single-blog__metadata-list--secondary">
                        <li><?= $article['created'] ?></li>
                    </ol>
                </li>
                <?php if ($article['modified'] !== NULL) : ?>
                    <li>
                        <span>modified :</span>
                        <ol class="single-blog__metadata-list--secondary">
                            <li><?= $article['modified'] ?></li>
                        </ol>
                    </li>
                <?php endif; ?>
            </ol>
        </details>
    </aside>