<?php
declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Kako radimo';
$pageDescription = 'Uvodni razgovor, ponuda, izrada, predaja i podrška.';
$currentPage = 'kako-radimo.php';

require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow"><a href="index.php">Naslovnica</a> / Kako radimo</p>
        <h1>Kako radimo</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <ol class="timeline">
            <?php foreach ($steps as $index => $step): ?>
                <li class="timeline-item" id="korak-<?= $index + 1 ?>">
                    <span class="timeline-index"><?= sprintf('%02d', $index + 1) ?></span>
                    <article>
                        <h2><?= icon($step['icon']) ?><?= e($step['title']) ?></h2>
                        <p><?= e($step['text']) ?></p>
                    </article>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
