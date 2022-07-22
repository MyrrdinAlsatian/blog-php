<?php
$article = $page_data;
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
    </aside>