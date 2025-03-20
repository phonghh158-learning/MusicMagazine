<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <?php if (isset($css)) { echo '<link rel="stylesheet" href="'. $css .'">'; } ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title><?= $title ?? 'Music Magazine' ?></title>
</head>
<body class="dark">
    <?php include __DIR__ . '/../partials/navigation.php'; ?>
    <div class="container">
        <main>
            <?php include __DIR__ . '/../partials/header.php'; ?>

            <div class="main-container">
                <?= $content ?? '' ?>                
            </div>

            <?php include __DIR__ . '/../partials/footer.php'; ?>
        </main>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>