<section class="blogs-bloc">
    <h2 class="title-section">Blog</h2>
    <ol class="blogs-bloc__list">
        <?php
        foreach ($articles as $article) :
        ?>
            <li class="blogs-bloc__item">
                <article class="blogs-bloc__item-article">
                    <time class="blogs-bloc__item-tag" datetime=""> <?= $article["readingTime"] ?> minutes </time>
                    <img class="blogs-bloc__item-img" src="<?= $article['featureImage'] ?>" alt="blog" />
                    <header>
                        <h3 class="blogs-bloc__item-header"><?= $article["title"]; ?></h3>
                    </header>
                </article>
            </li>
        <?php
        endforeach;
        ?>
    </ol>
    <a name="intro__btn-blog" id="intro__btn-blog" class="btn--custom btn-primary--custom" href="#" role="button">
        Voir plus d'articles
    </a>
</section>