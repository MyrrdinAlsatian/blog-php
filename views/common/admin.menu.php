<aside>
    <div class="top">
        <div class="logo">
            <!--<img src="https://via.placeholder.com/150" />-->
        </div>
        <h2>Backoffice</h2>
        <button type="button" class="btn-close" aria-label="Close"></button>
    </div>
    <div class="sidebar">
        <a href="<?= URL ?>" rel="noopener noreferrer" class="d-flex align-items-center text-center">
            <span class="material-icons-sharp"> home </span>
            <h3>Home</h3>
        </a>
        <a href="<?= URL ?>backoffice/profile" rel="noopener noreferrer" class="d-flex align-items-center text-center">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>Profile</h3>
        </a>
        <?php if (Security::isAdmin()) : ?>
            <a href="<?= URL ?>backoffice/users" rel="noopener noreferrer" class="d-flex align-items-center text-center">
                <span class="material-icons-sharp"> account_circle </span>
                <h3>Users</h3>
            </a>
            <a href="<?= URL ?>backoffice/new_article" rel="noopener noreferrer" class="d-flex align-items-center text-center">
                <span class="material-icons-sharp"> brush </span>
                <h3>Nouvelle article</h3>
            </a>

            <a href="<?= URL ?>backoffice/articles" rel="noopener noreferrer" class="d-flex align-items-center text-center">
                <span class="material-icons-sharp"> article </span>
                <h3>Articles</h3>
            </a>
        <?php
        endif;
        ?>

        <a href="<?= URL ?>backoffice/comments" rel="noopener noreferrer" class="d-flex align-items-center text-center">
            <span class="material-icons-sharp"> comment_bank </span>
            <h3>Comment</h3>
            <?php
            if ($comment_nbr > 0 && Security::isAdmin() || Security::isUser()) :
            ?>
                <span class="bg-danger text-light count"><?= $comment_nbr ?></span>
            <?php endif; ?>
        </a>
        <a href="<?= URL ?>logout" rel="noopener noreferrer" class="d-flex align-items-center text-center">
            <span class="material-icons-sharp"> logout </span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>