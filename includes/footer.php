<?php
declare(strict_types=1);
?>
    </main>
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <a class="logo" href="index.php">
                    <span class="logo-mark" aria-hidden="true"><span></span><span></span><span></span></span>
                    <span class="logo-word">DHP</span>
                </a>
                <p><?= e(OWNER_NAME) ?></p>
                <p><?= e(SITE_TAGLINE) ?></p>
            </div>
            <nav class="footer-nav" aria-label="Podnožje">
                <ul>
                    <?php foreach ($navigation as $href => $label): ?>
                        <li><a href="<?= e($href) ?>"><?= e($label) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="footer-contact">
                <p class="footer-label">Kontakt</p>
                <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><?= e(CONTACT_EMAIL) ?></a>
                <p><?= e(CONTACT_ADDRESS) ?></p>
                <a class="footer-mail" href="kontakt.php">Pošalji poruku</a>
            </div>
        </div>
        <div class="container footer-base">
            <p class="footer-legal">© <?= date('Y') ?> <?= e(COMPANY_LINE) ?> · <?= e(CONTACT_ADDRESS) ?> · <?= e(CONTACT_EMAIL) ?><?= OIB !== '' ? ' · OIB ' . e(OIB) : '' ?></p>
        </div>
    </footer>
    <script src="assets/js/main.js" defer></script>
</body>
</html>
