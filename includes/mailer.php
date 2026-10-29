<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;

// Reads a mail setting from the environment, or returns the config value when that variable is missing.
function mail_setting_string(string $env, string $fallback): string
{
    $value = getenv($env);
    if ($value === false || $value === '') {
        return $fallback;
    }

    return $value;
}

// Reads a numeric mail setting from the environment, or returns the config value when it is missing or not a whole number.
function mail_setting_int(string $env, int $fallback): int
{
    $value = getenv($env);
    if (!is_string($value) || !preg_match('/^[0-9]+$/', $value)) {
        return $fallback;
    }

    return (int) $value;
}

// Returns the address that receives contact form messages.
function contact_recipient(): string
{
    return mail_setting_string('CONTACT_EMAIL', CONTACT_EMAIL);
}

// Returns the From address, using the recipient when no sender address is configured.
function contact_mail_from_address(): string
{
    $from = mail_setting_string('MAIL_FROM_ADDRESS', MAIL_FROM_ADDRESS);

    return $from !== '' ? $from : contact_recipient();
}

// Returns the display name used in the From header.
function contact_mail_from_name(): string
{
    return mail_setting_string('MAIL_FROM_NAME', MAIL_FROM_NAME);
}

// Loads PHPMailer through Composer's autoloader when the library is present.
function load_phpmailer(): bool
{
    $autoload = dirname(__DIR__) . '/vendor/autoload.php';
    if (!is_file($autoload)) {
        return false;
    }

    require_once $autoload;

    return true;
}

// Sets the message to UTF-8 plain text and chooses SMTP or the server mail transport.
function configure_contact_transport(PHPMailer $mail): void
{
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->Timeout = 20;
    $mail->isHTML(false);

    $host = mail_setting_string('SMTP_HOST', SMTP_HOST);
    if ($host === '') {
        $mail->isMail();
        return;
    }

    $encryption = strtolower(mail_setting_string('SMTP_ENCRYPTION', SMTP_ENCRYPTION));
    $username = mail_setting_string('SMTP_USERNAME', SMTP_USERNAME);

    $mail->isSMTP();
    $mail->Host = $host;
    $mail->Port = mail_setting_int('SMTP_PORT', SMTP_PORT);
    $mail->SMTPAuth = $username !== '';
    $mail->Username = $username;
    $mail->Password = mail_setting_string('SMTP_PASSWORD', SMTP_PASSWORD);

    if ($encryption === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($encryption === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    } else {
        $mail->SMTPSecure = '';
        $mail->SMTPAutoTLS = false;
    }
}

// Builds the contact message from the visitor's name, phone, and text without sending it.
function compose_contact_message(string $ime, string $telefon, string $poruka): PHPMailer
{
    if (!load_phpmailer()) {
        throw new RuntimeException('PHPMailer nije dostupan.');
    }

    $mail = new PHPMailer(true);
    configure_contact_transport($mail);
    $mail->setFrom(contact_mail_from_address(), contact_mail_from_name());
    $mail->addAddress(contact_recipient());
    $mail->Subject = 'Nova poruka s weba';
    $mail->Body = "Nova poruka s weba DHP\n\n"
        . "Ime: {$ime}\n"
        . "Telefon: {$telefon}\n\n"
        . $poruka . "\n";

    return $mail;
}

// Sends the contact message and returns false when PHPMailer cannot deliver it.
function send_contact_message(string $ime, string $telefon, string $poruka): bool
{
    try {
        return compose_contact_message($ime, $telefon, $poruka)->send();
    } catch (Throwable $exception) {
        error_log('Kontakt: slanje poruke nije uspjelo. ' . $exception->getMessage());
        return false;
    }
}
