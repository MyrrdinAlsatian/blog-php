<div class="navigation navigation--desktop">
    <nav class="navigation__nav" role="navigation" aria-label="main">
        <ul class="navigation__list">
            <li class="navigation__item">
                <a class="navigation__link" href="<?= URL ?>">About me</a>
            </li>

            <li class="navigation__item">
                <a class="navigation__link" href="./blog-item.html">Blog</a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="/contact">Contact</a>
            </li>
        </ul>
        <?php if (empty($_SESSION['profile'])) : ?>
            <a type="button" class="btn--custom btn-primary--custom" href="<?= URL ?>login">Login</a>
        <?php else : ?>
            <a type="button" class="btn--custom btn-primary--custom" href="<?= URL ?>backoffice\profile">Compte</a>
        <?php endif; ?>
    </nav>
</div>