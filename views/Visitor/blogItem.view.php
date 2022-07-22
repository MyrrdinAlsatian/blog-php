<?php
$article = $page_data;
print_r($_SESSION)
?>
<main class="single-blog__content">
    <base href="<?= URL ?>" target="_blank">
    <div class="single-blog__core">
        <h1 class="single-blog__title title-blog"><?= $article['title'] ?></h1>
        <!--<div class="row">
            <ul class="taglist">
                Tag
            </ul>
        </div>-->
        <div class="single-blog__chapo">
            <?= $article['chapo'] ?>
        </div>
        <div class="single-blog__text">
            <?= $article['content'] ?>
        </div>
    </div>
    <aside class="single-blog__metadata">
        <figure>
            <img src="<?= $article['featureImage'] ?>" alt="<?= $article['title'] ?>" />
            <figcaption><?= $article['title'] ?></figcaption>
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
                        <li><?= $article['readingTime'] ?> minutes</li>
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
        <div class="container justify-content-center mt-5 border-left border-right">
            <div class="d-flex w-100">
                <?php if (!empty($_SESSION['profile'])) : ?>
                    <form method="post" action="<?= URL ?>sendComment" class="d-flex w-100">
                        <input type="hidden" name="id" value="<?= $article['id'] ?>" />
                        <input type="text" name="text" placeholder="+ Ajouter un commentaire" class="form-control addtxt">
                        <button type="submit" class="btn btn-primary col-2 form-control">+</button>
                    </form>
                <?php else : ?>
                    <input type="text" name="text" placeholder="Veuillez vous connectez" class="form-control addtxt" disabled>

                <?php endif; ?>
            </div>
            <?php if (!empty($comments)) : ?>
                <?php foreach ($comments as $comment) : ?>
                    <div class="d-flex justify-content-center">
                        <div class="w-100  py-2 px-2"> <span class="fs-3"><?= $comment['content'] ?></span>
                            <div class="d-flex justify-content-between py-1 pt-2">
                                <div><span class="text2"> <?= $comment['username']  ?> </span></div>
                                <div><span class="text3"><?= $comment['created'] ?></span></div>
                            </div>
                        </div>
                <?php endforeach;
            endif; ?>
                    </div>
        </div>
    </aside>