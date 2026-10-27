<?php
declare(strict_types=1);

$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? SITE_TAGLINE;
$currentPage = $currentPage ?? '';
$fullTitle = $pageTitle === SITE_NAME ? SITE_NAME . ' · ' . SITE_TAGLINE : $pageTitle . ' · ' . SITE_NAME;
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="theme-color" content="#e7f3fb">
    <meta property="og:title" content="<?= e($fullTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="hr_HR">
    <title><?= e($fullTitle) ?></title>
    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700&family=Source+Sans+3:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>document.documentElement.classList.add('js');</script>
</head>
<body>
    <a class="skip-link" href="#sadrzaj">Preskoči na sadržaj</a>
    <header class="site-header">
        <div class="header-blur" aria-hidden="true"></div>
        <div class="container header-inner">
            <a class="logo" href="index.php" aria-label="DHP, naslovnica">
                <span class="logo-mark" aria-hidden="true">
                    <span></span><span></span><span></span>
                </span>
                <span class="logo-word">DHP</span>
            </a>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="glavna-navigacija">
                <span class="sr-only">Izbornik</span>
                <span class="nav-toggle-bars" aria-hidden="true"><span></span><span></span><span></span></span>
            </button>
            <nav class="site-nav" id="glavna-navigacija" aria-label="Glavna navigacija">
                <ul class="nav-list">
                    <?php foreach ($navigation as $href => $label): ?>
                        <?php if ($href === 'kontakt.php') { continue; } ?>
                        <li>
                            <a href="<?= e($href) ?>"<?= $currentPage === $href ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a class="btn btn-primary nav-cta" href="kontakt.php"<?= $currentPage === 'kontakt.php' ? ' aria-current="page"' : '' ?>>Kontakt</a>
            </nav>
        </div>
    </header>
    <main id="sadrzaj">
