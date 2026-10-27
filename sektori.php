<?php
declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Sektori u kojima radim';
$pageDescription = $sectorsIntro;
$currentPage = 'sektori.php';

require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow"><a href="index.php">Naslovnica</a> / Sektori</p>
        <h1>Sektori u kojima radim</h1>
        <p class="lead"><?= e($sectorsIntro) ?></p>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>Istaknuti sektori</h2>
        <ul class="name-grid">
            <?php foreach ($featuredSectors as $sector): ?>
                <li id="<?= e($sector['id']) ?>"><?= e($sector['title']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="band">
    <div class="container">
        <h2>Ostali sektori</h2>
        <ul class="name-grid">
            <?php foreach ($otherSectors as $sector): ?>
                <li id="<?= e($sector['id']) ?>"><?= e($sector['title']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
