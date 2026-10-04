<?php

define('CHAT_API_KEY', '');
define('DEFAULT_SITE_LANGUAGE', 'de');
define('ALLOW_WEBPAGE_LOADER', false);

define('SITE_NAME', 'Losung Finanz');
define('SITE_LOGO_NAME', 'Losung Finanz');
define('SITE_LOGO_PRIMARY', "Losung\u{00A0}");
define('SITE_LOGO_ACCENT', 'Finanz');
define('WEBSITE_CREATED_DATE', '2015');
define('SITE_ADDRESS', 'Pl. Charles Rogier 15, 1210, Saint-Josse-ten-Noode');

define('SITE_EMAIL', 'kontakt@losung-finanz.com');

define('WEBMASTER_NAME', '');
define('AUTHOR_NAME', '');
define('TEAG', '2%');
define('LEGAL_FULL_NAME', 'Losung Finanz');
define('LEGAL_COMPANY_FORM', '');
define('LEGAL_RCS', '');
define('LEGAL_SIREN', '');
define('LEGAL_SIRET', '');
define('LEGAL_NAF', '');
define('LEGAL_VAT_NUMBER', '');
define('LEGAL_REGISTRATION_OR_VAT_NUMBER', '');
define('LEGAL_ACPR', '');
define('LEGAL_PUBLICATION_DIRECTOR', '');
define('LEGAL_EDITOR_DIRECTOR', '');
define('GOOGLE_TAG_MANAGER_ID', '');
define('GOOGLE_ADS_ID', 'AW-18330475088');
define('LOAN_REFERENCE_PREFIX', 'LF');
define('LOAN_MIN_AMOUNT', 5000);
define('LOAN_AMOUNT_OPTIONS', [LOAN_MIN_AMOUNT, 7000, 10000, 15000, 20000, 25000, 30000, 40000, 50000, 60000, 75000, 100000, 125000, 150000, 200000]);
define('LOAN_AMOUNT_OPTIONS_BY_LOCALE', [
	'fr' => [5000, 7000, 10000, 15000, 20000, 25000, 30000, 40000, 50000, 60000, 75000, 100000, 125000, 150000, 200000],
	'pt' => [5000, 7000, 10000, 15000, 20000, 25000, 30000, 40000, 50000, 60000, 75000, 100000, 125000, 150000, 200000],
	'de' => [5000, 7000, 10000, 15000, 20000, 25000, 30000, 40000, 50000, 60000, 75000, 100000, 125000, 150000, 200000],
]);
define('LOAN_DURATION_OPTIONS', [12, 24, 36, 48, 60, 84, 120, 180, 240]);
define('DEFAULT_LOAN_CURRENCY', 'EUR');
define('LOAN_CURRENCIES_BY_LOCALE', [
	'fr' => 'EUR',
	'pt' => 'EUR',
	'de' => 'EUR',
]);
define('LOAN_COUNTRIES_BY_LOCALE', [
	'fr' => 'Portugal',
	'pt' => 'Portugal',
	'de' => 'Österreich',
]);
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------

define('DS', DIRECTORY_SEPARATOR);
define('PAGE_SAMPLE_DIR', dirname(__DIR__) . '/resources/views/elements/');
define('PARTNERS_ASSETS_DIR', dirname(__DIR__) . '/public/assets/images/partners/');
define('SITE_WWW', !empty($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null );
