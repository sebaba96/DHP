<?php
declare(strict_types=1);

const SITE_NAME = 'DHP';
const SITE_TAGLINE = 'Poslovni planovi, financiranje i financijsko vodstvo za mala i srednja poduzeća';
const OWNER_NAME = 'David Host';
const CONTACT_ADDRESS = 'Liburnijska 8';
const CONTACT_EMAIL = 'info@dhp-consult.hr';
// PHPMailer. Prazan SMTP_HOST šalje poruku kroz PHP-ov mail() prijenos.
const MAIL_FROM_ADDRESS = 'info@dhp-consult.hr';
const MAIL_FROM_NAME = SITE_NAME;
const SMTP_HOST = '';
const SMTP_PORT = 587;
const SMTP_USERNAME = '';
const SMTP_PASSWORD = '';
const SMTP_ENCRYPTION = 'tls';
const COMPANY_LINE = 'DHP, obrt za savjetovanje u vezi s poslovanjem i ostalim upravljanjem, vl. David Host';
// OIB se ne ispisuje dok broj nije upisan.
const OIB = '';
