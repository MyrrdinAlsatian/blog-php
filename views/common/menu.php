<div class="navigation navigation--desktop">
    <nav class="navigation__nav" role="navigation" aria-label="main">
        <ul class="navigation__list">
            <li class="navigation__item">
                <a class="navigation__link" href="<?= URL ?>">About me</a>
            </li>

            <li class="navigation__item">
                <a class="navigation__link" href="<?= URL ?>articles">Blog</a>
            </li>
            <li class="navigation__item">
                <a class="navigation__link" href="<?= URL ?>contact">Contact</a>
            </li>
        </ul>
        <?php
        if (!Security::isConnected()) : ?>
            <a type="button" class="btn--custom btn-primary--custom" href="<?= URL ?>login">Login</a>
        <?php else : ?>
            <a type="button" class="btn--custom btn-primary--custom" href="<?= URL ?>backoffice\profile">Mon Compte</a>
        <?php endif; ?>
    </nav>
</div>