<main>
    <section class="blogs-bloc">
        <h2 class="title-section">Blog</h2>
        <ol class="blogs-bloc__list">
            <?php
            foreach ($articles as $article) :
            ?>
                <li class="blogs-bloc__item">
                    <a href="<?= URL . 'article/' . $article['id'] ?>">
                        <article class="blogs-bloc__item-article">
                            <time class="blogs-bloc__item-tag" datetime=""> <?= $article["readingTime"] ?> minutes </time>
                            <img class="blogs-bloc__item-img" src="<?= $article['featureImage'] ?>" alt="blog" />
                            <header>
                                <h3 class="blogs-bloc__item-header"><?= $article["title"]; ?></h3>
                            </header>
                        </article>
                    </a>
                </li>
            <?php
            endforeach;
            ?>
        </ol>
    </section>
</main>