<?php
declare(strict_types=1);

require_once __DIR__ . '/mailer.php';

$old['ime'] = trim((string) ($_POST['ime'] ?? ''));
$old['email'] = trim((string) ($_POST['email'] ?? ''));
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

if (
    $old['email'] === ''
    || str_length($old['email']) > 254
    || !preg_match('/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/', $old['email'])
) {
    $errors['email'] = 'Upiši ispravnu adresu e-pošte.';
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

if (contact_recipient() === '') {
    $_SESSION['kontakt_status'] = 'call';
    header('Location: kontakt.php');
    exit;
}

$sent = send_contact_message($old['ime'], $old['email'], $old['telefon'], $old['poruka']);

$_SESSION['kontakt_status'] = $sent ? 'sent' : 'call';
header('Location: kontakt.php');
exit;
