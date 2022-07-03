<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_description; ?>">
    <title><?= $page_title; ?> | Backoffice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <link rel="stylesheet" href="<?= URL ?>public/CSS/admin.css" type="text/css" />
    <?php if (!empty($page_css)) : ?>
        <?php foreach ($page_css as $fichier_css) : ?>
            <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <?php // $isAdmin ? "is-admin" : "not-admin" 
    ?>
    <div class="content is-admin">
        <?php require_once("admin.menu.php") ?>
        <main>
            <?php
            if (!empty($_SESSION['alert'])) {
                foreach ($_SESSION['alert'] as $alert) {
                    echo "<div class='alert " . $alert['type'] . "' role='alert'>
                " . $alert['message'] . "
                </div>";
                }
                unset($_SESSION['alert']);
            }
            ?>
            <?= $page_content; ?>
        </main>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="profile">
                    <div class="info">
                        <p>
                            Hey, <b><?= $user['username'] ?></b>
                            <small class="text-muted"><?= Toolbox::displayRole($user['role']) ?></small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="last-comment">
                <h2>Last Comment</h2>
                <div class="comments">
                    <div class="comment">
                        <div class="name">Michel Drucker</div>
                        <div class="message">
                            <p>Toggolino</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("admin.footer.php") ?>
    <?php if (!empty($page_javascript)) : ?>
        <?php foreach ($page_javascript as $fichier_javascript) : ?>
            <script src="<?= URL ?>public/JS/<?= $fichier_javascript ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>