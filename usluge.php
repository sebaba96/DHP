<?php
declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Usluge';
$pageDescription = 'Poslovni planovi i investicijske studije, zahtjevi za kreditiranje, EU projekti, vanjski CFO, analiza poslovanja, procjena vrijednosti i istraživanje tržišta.';
$currentPage = 'usluge.php';

require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow"><a href="index.php">Naslovnica</a> / Usluge</p>
        <h1>Usluge</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="service-list">
            <?php foreach ($services as $service): ?>
                <article class="service" id="<?= e($service['id']) ?>">
                    <span class="card-icon"><?= icon($service['icon']) ?></span>
                    <div>
                        <h2><?= e($service['title']) ?></h2>
                        <p><?= e($service['text']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
