<?php
declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

$errors = [];
$old = [
    'ime' => '',
    'telefon' => '',
    'poruka' => '',
];
$status = $_SESSION['kontakt_status'] ?? null;
unset($_SESSION['kontakt_status']);

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    require __DIR__ . '/includes/contact-handler.php';
}

$pageTitle = 'Kontakt';
$pageDescription = 'Razgovarajmo o tvom projektu. Telefon: ' . CONTACT_PHONE . '. Adresa: ' . CONTACT_ADDRESS . '.';
$currentPage = 'kontakt.php';

require __DIR__ . '/includes/header.php';
?>
<section class="page-hero">
    <div class="container">
        <p class="eyebrow"><a href="index.php">Naslovnica</a> / Kontakt</p>
        <h1>Kontakt</h1>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">
        <aside class="contact-aside">
            <h2>Razgovarajmo o tvom projektu</h2>
            <p>Nazovi me ili pošalji poruku s kratkim opisom što trebaš. Javljam se u roku od radnog dana.</p>
            <p class="contact-mail">
                <span>Telefon</span>
                <a href="tel:<?= e(CONTACT_PHONE_TEL) ?>"><?= e(CONTACT_PHONE) ?></a>
            </p>
            <p class="contact-mail">
                <span>Adresa</span>
                <span class="contact-address"><?= e(CONTACT_ADDRESS) ?></span>
            </p>
        </aside>

        <div class="form-card">
            <?php if ($status === 'sent'): ?>
                <div class="alert alert-success" role="status">
                    <p>Javljam se u roku od radnog dana.</p>
                </div>
            <?php elseif ($status === 'call'): ?>
                <div class="alert alert-error" role="status">
                    <p>Nazovi me ili pošalji poruku s kratkim opisom što trebaš. Javljam se u roku od radnog dana.</p>
                    <p><a href="tel:<?= e(CONTACT_PHONE_TEL) ?>"><?= e(CONTACT_PHONE) ?></a></p>
                </div>
            <?php endif; ?>

            <?php if (isset($errors['obrazac'])): ?>
                <div class="alert alert-error" role="alert">
                    <p><?= e($errors['obrazac']) ?></p>
                </div>
            <?php elseif (count($errors) > 0): ?>
                <div class="alert alert-error" role="alert">
                    <p>Provjeri označena polja i pokušaj ponovno.</p>
                </div>
            <?php endif; ?>

            <form class="contact-form" method="post" action="kontakt.php" accept-charset="UTF-8" novalidate>
                <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                <div class="hp-field" aria-hidden="true">
                    <label for="web_stranica">Web stranica</label>
                    <input type="text" id="web_stranica" name="web_stranica" tabindex="-1" autocomplete="off">
                </div>

                <div class="field">
                    <label for="ime">Ime i prezime</label>
                    <input id="ime" name="ime" type="text" autocomplete="name" maxlength="80" required value="<?= e($old['ime']) ?>"<?= isset($errors['ime']) ? ' aria-invalid="true" aria-describedby="ime-greska"' : '' ?>>
                    <?php if (isset($errors['ime'])): ?><p class="field-error" id="ime-greska"><?= e($errors['ime']) ?></p><?php endif; ?>
                </div>
                <div class="field">
                    <label for="telefon">Telefon</label>
                    <input id="telefon" name="telefon" type="tel" autocomplete="tel" inputmode="tel" maxlength="30" required value="<?= e($old['telefon']) ?>"<?= isset($errors['telefon']) ? ' aria-invalid="true" aria-describedby="telefon-greska"' : '' ?>>
                    <?php if (isset($errors['telefon'])): ?><p class="field-error" id="telefon-greska"><?= e($errors['telefon']) ?></p><?php endif; ?>
                </div>
                <div class="field">
                    <label for="poruka">Poruka</label>
                    <textarea id="poruka" name="poruka" rows="6" maxlength="4000" required<?= isset($errors['poruka']) ? ' aria-invalid="true" aria-describedby="poruka-greska"' : '' ?>><?= e($old['poruka']) ?></textarea>
                    <?php if (isset($errors['poruka'])): ?><p class="field-error" id="poruka-greska"><?= e($errors['poruka']) ?></p><?php endif; ?>
                </div>
                <button class="btn btn-primary" type="submit">Pošalji poruku</button>
            </form>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
