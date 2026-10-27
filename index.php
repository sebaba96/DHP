<?php
declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$pageTitle = SITE_NAME;
$pageDescription = SITE_TAGLINE . '. Pomažem poduzetnicima da ideje pretvore u projekte koje banke i institucije odobravaju, te da financije vode brojkama, a ne dojmom.';
$currentPage = 'index.php';

require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <div class="container hero-grid">
        <div class="hero-copy">
            <p class="eyebrow"><?= e(OWNER_NAME) ?></p>
            <h1><?= e(SITE_TAGLINE) ?></h1>
            <p class="lead">Pomažem poduzetnicima da ideje pretvore u projekte koje banke i institucije odobravaju, te da financije vode brojkama, a ne dojmom.</p>
            <div class="actions">
                <a class="btn btn-primary" href="kontakt.php">Zatraži besplatan uvodni razgovor</a>
                <a class="btn btn-ghost" href="usluge.php">Usluge</a>
            </div>
            <p class="note">Rijeka · rad s klijentima diljem Hrvatske i na daljinu</p>
        </div>
        <aside class="credential" aria-label="U brojkama">
            <p class="ledger-kicker">U brojkama</p>
            <ul class="credential-stats">
                <li>
                    <strong>9</strong>
                    <span>Usluga, od poslovnog plana do vanjskog CFO-a</span>
                </li>
                <li>
                    <strong>10</strong>
                    <span>Sektora, od turizma i proizvodnje do IT-ja</span>
                </li>
                <li>
                    <strong>4</strong>
                    <span>Koraka, od besplatnog razgovora do predaje</span>
                </li>
                <li>
                    <strong>1</strong>
                    <span>Radni dan do odgovora na upit</span>
                </li>
            </ul>
            <div class="credential-contact">
                <p>
                    <span>E-pošta</span>
                    <a href="mailto:info@dhp.hr">info@dhp.hr</a>
                </p>
                <p>
                    <span>Adresa</span>
                    <strong><?= e(CONTACT_ADDRESS) ?></strong>
                </p>
            </div>
        </aside>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <h2>Usluge</h2>
            <a class="text-link" href="usluge.php">Sve usluge</a>
        </div>
        <div class="home-services">
            <?php foreach (array_slice($services, 0, 3) as $service): ?>
                <article class="card">
                    <span class="card-icon"><?= icon($service['icon']) ?></span>
                    <h3><a href="usluge.php#<?= e($service['id']) ?>"><?= e($service['title']) ?></a></h3>
                    <p><?= e($service['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="band">
    <div class="container">
        <div class="section-head">
            <h2>Kako radimo</h2>
        </div>
        <ol class="home-steps">
            <?php foreach ($steps as $index => $step): ?>
                <li>
                    <span><?= sprintf('%02d', $index + 1) ?></span>
                    <h3><?= e($step['title']) ?></h3>
                    <p><?= e($step['text']) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <h2>Sektori u kojima radim</h2>
            <a class="text-link" href="sektori.php">Svi sektori</a>
        </div>
        <p class="lead sectors-lead"><?= e($sectorsIntro) ?></p>
        <h3 class="group-label">Istaknuti sektori</h3>
        <ul class="name-grid">
            <?php foreach ($featuredSectors as $sector): ?>
                <li><a href="sektori.php#<?= e($sector['id']) ?>"><?= e($sector['title']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="section section-tight">
    <div class="container cta-band">
        <div>
            <h2>Razgovarajmo o tvom projektu</h2>
            <p>Nazovi me ili pošalji poruku s kratkim opisom što trebaš. Javljam se u roku od radnog dana.</p>
            <p class="cta-meta"><a href="tel:<?= e(CONTACT_PHONE_TEL) ?>"><?= e(CONTACT_PHONE) ?></a> · <?= e(CONTACT_ADDRESS) ?></p>
        </div>
        <a class="btn btn-primary" href="kontakt.php">Zatraži besplatan uvodni razgovor</a>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
