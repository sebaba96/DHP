<?php
declare(strict_types=1);

$old['ime'] = trim((string) ($_POST['ime'] ?? ''));
$old['telefon'] = trim((string) ($_POST['telefon'] ?? ''));
$old['poruka'] = trim((string) ($_POST['poruka'] ?? ''));
$honeypot = trim((string) ($_POST['web_stranica'] ?? ''));
$token = (string) ($_POST['csrf'] ?? '');

if (!hash_equals($_SESSION['csrf'], $token)) {
    $errors['obrazac'] = 'Obrazac je istekao. Osvježite stranicu i pokušajte ponovno.';
}

if ($honeypot !== '') {
    $_SESSION['kontakt_status'] = 'sent';
    header('Location: kontakt.php');
    exit;
}

$lastSent = (int) ($_SESSION['kontakt_vrijeme'] ?? 0);
if ($lastSent > 0 && (time() - $lastSent) < 20) {
    $errors['obrazac'] = 'Pričekajte trenutak prije slanja nove poruke.';
}

if ($old['ime'] === '' || str_length($old['ime']) < 2 || str_length($old['ime']) > 80) {
    $errors['ime'] = 'Upiši ime i prezime.';
}

if ($old['telefon'] === '' || str_length($old['telefon']) > 30 || !preg_match('/^[0-9+\s().\/-]+$/u', $old['telefon'])) {
    $errors['telefon'] = 'Upiši broj telefona.';
}

if (str_length($old['poruka']) < 10 || str_length($old['poruka']) > 4000) {
    $errors['poruka'] = 'Napiši kratak opis što trebaš.';
}

if ($errors !== []) {
    return;
}

$_SESSION['kontakt_vrijeme'] = time();
$_SESSION['csrf'] = bin2hex(random_bytes(32));

if (CONTACT_EMAIL === '') {
    $_SESSION['kontakt_status'] = 'call';
    header('Location: kontakt.php');
    exit;
}

$body = "Nova poruka s weba DHP\n\n"
    . "Ime: {$old['ime']}\n"
    . "Telefon: {$old['telefon']}\n\n"
    . $old['poruka'] . "\n";

$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'From: ' . CONTACT_EMAIL,
];

$sent = @mail(
    CONTACT_EMAIL,
    'Nova poruka s weba',
    $body,
    implode("\r\n", $headers)
);

$_SESSION['kontakt_status'] = $sent ? 'sent' : 'call';
header('Location: kontakt.php');
exit;
