<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_description; ?>">
    <title><?= $page_title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?= URL ?>public/CSS/main.css" rel="stylesheet" />
    <?php if (!empty($page_css)) : ?>
        <?php foreach ($page_css as $fichier_css) : ?>
            <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <?php require_once("menu.php") ?>
    <div class="body_container">
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
    </div>
    <?php require_once("footer.php") ?>
    <?php if (!empty($page_javascript)) : ?>
        <?php foreach ($page_javascript as $fichier_javascript) : ?>
            <script src="<?= URL ?>public/JS/<?= $fichier_javascript ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>