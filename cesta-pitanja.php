<?php
declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = 'Česta pitanja';
$pageDescription = 'Odgovori o odobrenju kredita, cijeni poslovnog plana, vanjskom CFO-u i radu izvan Rijeke.';
$currentPage = 'cesta-pitanja.php';

require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow"><a href="index.php">Naslovnica</a> / Česta pitanja</p>
        <h1>Česta pitanja</h1>
    </div>
</section>

<section class="section">
    <div class="container narrow">
        <div class="faq-list">
            <?php foreach ($faqs as $index => $faq): ?>
                <article class="faq-item">
                    <h2>
                        <button class="faq-question" type="button" aria-expanded="false" aria-controls="odgovor-<?= $index ?>" id="pitanje-<?= $index ?>">
                            <span><?= e($faq['q']) ?></span>
                            <span class="faq-symbol" aria-hidden="true"></span>
                        </button>
                    </h2>
                    <div class="faq-answer" id="odgovor-<?= $index ?>" role="region" aria-labelledby="pitanje-<?= $index ?>">
                        <p><?= e($faq['a']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
