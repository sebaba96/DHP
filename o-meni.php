<?php
declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'O meni';
$pageDescription = 'Ja sam David Host, ekonomist iz Rijeke. Diplomirao sam na Ekonomskom fakultetu u Rijeci s pohvalom.';
$currentPage = 'o-meni.php';

require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow"><a href="index.php">Naslovnica</a> / O meni</p>
        <h1>O meni</h1>
    </div>
</section>

<section class="section">
    <div class="container about-copy">
        <?php foreach ($aboutLead as $paragraph): ?>
            <p><?= e($paragraph) ?></p>
        <?php endforeach; ?>
        <h2>Ukratko:</h2>
        <ul class="plain-list">
            <?php foreach ($aboutPoints as $point): ?>
                <li><?= e($point) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
