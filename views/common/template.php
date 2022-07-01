<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_description; ?>">
    <title><?= $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="<?= URL ?>public/CSS/main.css" rel="stylesheet" />
    <?php if (!empty($page_css)) : ?>
        <?php foreach ($page_css as $fichier_css) : ?>
            <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <div class="body_container">
        <?= $page_content; ?>
    </div>
    <?php if (!empty($page_javascript)) : ?>
        <?php foreach ($page_javascript as $fichier_javascript) : ?>
            <script src="<?= URL ?>public/JavaScript/<?= $fichier_javascript ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>