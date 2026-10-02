<?php

use Illuminate\Support\Facades\Route;

if ( ! function_exists('addr2_array') ) {
	function addr2_array($url){
		$i = 0; $data = array();
		$file = file( $url, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
		foreach($file as $value){
			$explode = explode('|', $value);
			$_explode = array_map("trim", $explode);
			$__explode = array_map("str_replacing", $_explode);
			$data[$i] = $__explode;
			$i++;
		}
		return $data;
	}
}

if ( !function_exists('social_meta_tags') ) {
	function social_meta_tags() {
		# OG:BALISES
		$data[] = array( "name" 		=> "google", 				"content" => "notranslate" );
		$data[] = array( "property" 	=> "description", 			"content" => translate(106) );
		$data[] = array( "property" 	=> "og:site_name", 			"content" => SITE_NAME );
		$data[] = array( "property" 	=> "og:type", 				"content" => "website" );
		$data[] = array( "property" 	=> "og:title", 				"content" => site_title() );
		$data[] = array( "property" 	=> "og:description", 		"content" => translate(106) );
		$data[] = array( "property" 	=> "og:image", 				"content" => site_favicon() );
		$data[] = array( "property" 	=> "og:url", 				"content" => url()->current() );
		$data[] = array( "name" 		=> "twitter:card", 			"content" => site_favicon() );
		$data[] = array( "name" 		=> "twitter:site", 			"content" => SITE_NAME );
		$data[] = array( "name" 		=> "twitter:title", 		"content" => site_title() );
		$data[] = array( "name" 		=> "twitter:description", 	"content" => translate(106) );
		
		$meta = '';
		foreach ($data as $array) {
			$meta .= '<meta';
			foreach ($array as $key => $value) {
				$meta .= " ".$key."="."\"$value\"";
			}
			$meta .= '/>'."\n"."\t\t";
		}
		return trim($meta, "\t\t");
	}
}


if ( !function_exists('formFieldNameMaker') ) {
	function formFieldNameMaker(&$properties, $param) {
		$attributeExploded = explode(".", $param);

		$properties = $attributeExploded[0];
		foreach ($attributeExploded as $index => $attribute) {
		    if ( $index === 0 ) {
		        continue;
		    }

		    $properties .= "[$attribute]";
		}
	}
}


if ( ! function_exists('str_replacing') ) {
	function str_replacing($string){
		$return = str_ireplace("(WEBSITE_NAME)", SITE_NAME, $string);
		$return = str_ireplace("(CREATED_ANNO)", WEBSITE_CREATED_DATE, $return);
		$return = str_ireplace("(WEBSITE_URL)",'<a href="'. URL::to('/') .'">'.SITE_WWW.'</a>', $return);
		$return = str_ireplace("(WEBSITE_EMAIL)",'<a href="mailto:'.SITE_EMAIL.'">'.SITE_EMAIL.'</a>', $return);
		$return = str_ireplace("(WEBSITE_ADDRESS)",SITE_ADDRESS, $return);
		$return = str_ireplace("(WEBMASTER_EMAIL)",'<a href="mailto:'.SITE_EMAIL.'">'.SITE_EMAIL.'</a>', $return);
		$return = str_ireplace("(WEBMASTER_NAME)",WEBMASTER_NAME, $return);
		$return = str_ireplace("(AUTHOR_NAME)",AUTHOR_NAME, $return);
		$return = str_ireplace("(LEGAL_FULL_NAME)", LEGAL_FULL_NAME, $return);
		$return = str_ireplace("(LEGAL_REGISTRATION_OR_VAT_NUMBER)", LEGAL_REGISTRATION_OR_VAT_NUMBER, $return);
		$return = str_ireplace("(LEGAL_COMPANY_FORM)", defined('LEGAL_COMPANY_FORM') ? LEGAL_COMPANY_FORM : '', $return);
		$return = str_ireplace("(LEGAL_RCS)", defined('LEGAL_RCS') ? LEGAL_RCS : '', $return);
		$return = str_ireplace("(LEGAL_SIREN)", defined('LEGAL_SIREN') ? LEGAL_SIREN : '', $return);
		$return = str_ireplace("(LEGAL_SIRET)", defined('LEGAL_SIRET') ? LEGAL_SIRET : '', $return);
		$return = str_ireplace("(LEGAL_NAF)", defined('LEGAL_NAF') ? LEGAL_NAF : '', $return);
		$return = str_ireplace("(LEGAL_VAT_NUMBER)", defined('LEGAL_VAT_NUMBER') ? LEGAL_VAT_NUMBER : '', $return);
		$return = str_ireplace("(LEGAL_ACPR)", defined('LEGAL_ACPR') ? LEGAL_ACPR : '', $return);
		$return = str_ireplace("(LEGAL_PUBLICATION_DIRECTOR)", defined('LEGAL_PUBLICATION_DIRECTOR') ? LEGAL_PUBLICATION_DIRECTOR : '', $return);
		$return = str_ireplace("(LEGAL_EDITOR_DIRECTOR)", defined('LEGAL_EDITOR_DIRECTOR') ? LEGAL_EDITOR_DIRECTOR : '', $return);
		$return = str_ireplace("(AUTHOR_EMAIL)",'<a href="mailto:'.SITE_EMAIL.'">'.SITE_EMAIL.'</a>', $return);
		$return = str_ireplace("(TEAG)",TEAG, $return);
		$return = str_ireplace("\\",'<br/>', $return);
		return $return;
	}
}

if ( ! function_exists('loan_currency_code_for_locale') ) {
	function loan_currency_code_for_locale($locale = null) {
		$localeKey = loan_processing_fee_locale_key($locale);
		$currenciesByLocale = defined('LOAN_CURRENCIES_BY_LOCALE') ? LOAN_CURRENCIES_BY_LOCALE : [];

		return $currenciesByLocale[$localeKey] ?? (defined('DEFAULT_LOAN_CURRENCY') ? DEFAULT_LOAN_CURRENCY : 'EUR');
	}
}

if ( ! function_exists('loan_currency_symbol_for_code') ) {
	function loan_currency_symbol_for_code($currencyCode = null) {
		$currencyCode = strtoupper((string) ($currencyCode ?: 'EUR'));
		$symbols = [
			'EUR' => '€',
			'PLN' => 'zł',
			'SEK' => 'kr',
		];

		return $symbols[$currencyCode] ?? $currencyCode;
	}
}

if ( ! function_exists('loan_currency_symbol_for_locale') ) {
	function loan_currency_symbol_for_locale($locale = null) {
		return loan_currency_symbol_for_code(loan_currency_code_for_locale($locale));
	}
}

if ( ! function_exists('loan_country_name_for_locale') ) {
	function loan_country_name_for_locale($locale = null) {
		$localeKey = loan_processing_fee_locale_key($locale);
		$countriesByLocale = defined('LOAN_COUNTRIES_BY_LOCALE') ? LOAN_COUNTRIES_BY_LOCALE : [];

		return $countriesByLocale[$localeKey] ?? null;
	}
}

if ( ! function_exists('format_loan_money') ) {
	function format_loan_money($amount, $currencyCode = null, $decimals = 0) {
		$currencyCode = strtoupper((string) ($currencyCode ?: loan_currency_code_for_locale()));
		$symbol = loan_currency_symbol_for_code($currencyCode);
		$formattedAmount = number_format((float) $amount, $decimals, ',', ' ');

		return $formattedAmount . ' ' . $symbol;
	}
}

if ( ! function_exists('loan_amount_options_for_locale') ) {
	function loan_amount_options_for_locale($locale = null) {
		$localeKey = loan_processing_fee_locale_key($locale);
		$optionsByLocale = defined('LOAN_AMOUNT_OPTIONS_BY_LOCALE') ? LOAN_AMOUNT_OPTIONS_BY_LOCALE : [];
		$options = $optionsByLocale[$localeKey] ?? (defined('LOAN_AMOUNT_OPTIONS') ? LOAN_AMOUNT_OPTIONS : [LOAN_MIN_AMOUNT]);

		return array_values($options);
	}
}

if ( ! function_exists('loan_min_amount_for_locale') ) {
	function loan_min_amount_for_locale($locale = null) {
		$options = loan_amount_options_for_locale($locale);

		return (float) ($options[0] ?? LOAN_MIN_AMOUNT);
	}
}

if ( ! function_exists('loan_max_amount_for_locale') ) {
	function loan_max_amount_for_locale($locale = null) {
		$options = loan_amount_options_for_locale($locale);

		return (float) ($options[count($options) - 1] ?? LOAN_MAX_AMOUNT);
	}
}

if ( ! function_exists('loan_processing_fee_locale_key') ) {
	function loan_processing_fee_locale_key($locale = null) {
		$locale = $locale ?: app()->getLocale();
		$locale = str_replace('_', '-', mb_strtolower((string) $locale));

		return explode('-', $locale)[0] ?: DEFAULT_SITE_LANGUAGE;
	}
}

if ( ! function_exists('legal_notice_information') ) {
	function legal_notice_information() {
		$information = [
			translate(655) => SITE_NAME,
			translate(656) => defined('LEGAL_COMPANY_FORM') ? LEGAL_COMPANY_FORM : '',
			translate(657) => defined('LEGAL_RCS') ? LEGAL_RCS : '',
			translate(658) => defined('LEGAL_SIREN') ? LEGAL_SIREN : '',
			translate(659) => defined('LEGAL_SIRET') ? LEGAL_SIRET : '',
			translate(660) => defined('LEGAL_NAF') ? LEGAL_NAF : '',
			translate(661) => defined('LEGAL_VAT_NUMBER') ? LEGAL_VAT_NUMBER : '',
			translate(662) => SITE_ADDRESS,
			translate(663) => SITE_EMAIL,
			translate(664) => defined('LEGAL_PUBLICATION_DIRECTOR') ? LEGAL_PUBLICATION_DIRECTOR : '',
			translate(665) => defined('LEGAL_EDITOR_DIRECTOR') ? LEGAL_EDITOR_DIRECTOR : '',
		];

		return array_filter($information, function ($value) {
			return trim((string) $value) !== '';
		});
	}
}


if ( ! function_exists('text_wrap') ) {
	function text_wrap($text, $len){
		$text = WordWrap($text, $len, '***', true);
		$array = explode('***', $text);
		return trim(trim($array[0]), ".")." ... ";
	}
}

if ( ! function_exists('translate') ) {
	function translate($key, $wrap=false) {
		if ((string) $key === '598') {
			$translated_str = loan_taeg_example_text();
		} else {
			$translated_str = str_replacing( __('TRAD_' . $key) );
		}

		if ($wrap) {
			$translated_str = text_wrap($translated_str, $wrap);
		}
		return ucfirst($translated_str);
	}
}

if ( ! function_exists('get_page_contents') ) {
	function get_page_contents($page_action) {
		$dir = PAGE_SAMPLE_DIR . $page_action . '/';
		$file = $dir. app()->getLocale().'.txt';

		if ( !is_dir($dir) ) {
			return false;
		}

		if (!file_exists($file)) {
			$file = $dir . DEFAULT_SITE_LANGUAGE . '.txt';
		}

		if (!file_exists($file) && app()->getLocale() === 'ch') {
			$file = $dir . 'de.txt';
		}

		if (!file_exists($file)) {
			return false;
		}

		$textHTML = file_get_contents($file);
		$textHTML = str_replacing($textHTML);
		return $textHTML;
	}
}

if ( ! function_exists('partners') ) {
	function partners(){
		$data = array();
		$files = scandir( PARTNERS_ASSETS_DIR );
		foreach($files as $file){
			$file = trim($file, ".");
			$ext = strtolower( substr($file, strrpos($file, ".")+1) );
			if(in_array($ext, ["jpg", "gif", "png", "jpeg"])){
				$name = substr($file, 0, strrpos($file, "."));
				if(!empty($file)){
					$data[$name] = basename($file);
				}
			}
		}
		return $data;
	}
}

if ( ! function_exists('routeWithLocale') ) {
	function routeWithLocale($name, $parameter=null) {
		$route_param[] = app()->getLocale();
		if ( !empty($parameter) ) {
			$route_param[] = $parameter;
		}

		return route($name, $route_param);
	}
}

if ( ! function_exists('current_page_name') ) {
	function current_page_name(){

		$pages[] = array( "site.contact_us", "73" );
		$pages[] = array( "site.cookie_policy", "77" );
		$pages[] = array( "site.privacy_policy", "683" );
		$pages[] = array( "site.accessibility_statement", "687" );
		$pages[] = array( "site.vulnerability_disclosure", "688" );
		$pages[] = array( "site.fraud_risks", "689" );
		$pages[] = array( "site.helps", "80" );
		$pages[] = array( "site.loan_offers", "113" );
		$pages[] = array( "site.index", "69" );
		$pages[] = array( "site.assurances", "311" );
		$pages[] = array( "site.about_us", "296" );
		$pages[] = array( "site.legal_notice", "76" );
		$pages[] = array( "site.obtain_financing", "103" );
		$pages[] = array( "site.testimonials", "84" );
		$pages[] = array( "site.how_it_works", "78" );
		
		foreach ($pages as $page) {
			if ( in_array( Route::currentRouteName(), $page) ) {
				return translate($page[1]);
			}
		}
		return null;
	}
}

if ( ! function_exists('site_title') ) {
	function site_title(){
		if ( current_page_name() ) {
			return current_page_name() . ' | ' .SITE_NAME;
		}
		return SITE_NAME;
	}
}

if ( ! function_exists('site_copyright') ) {
	function site_copyright() {
		return '&copy;' . WEBSITE_CREATED_DATE .  ' - ' . SITE_NAME . '. ' . translate(1);
	}
}

if ( ! function_exists('site_favicon') ) {
	function site_favicon() {
		return asset('assets/images/icons/favicon.png');
	}
}

if ( ! function_exists('site_logo') ) {
	function site_logo() {
		return asset_img('logo.svg');
	}
}

if ( ! function_exists('site_logo_flag') ) {
	function site_logo_flag() {
		return asset('assets/images/icons/favicon.png');
	}
}

if ( ! function_exists('loan_teag_rate_decimal') ) {
	function loan_teag_rate_decimal(): float {
		return (float) str_replace(',', '.', str_replace('%', '', TEAG));
	}
}

if ( ! function_exists('loan_teag_rate_display') ) {
	function loan_teag_rate_display($locale = null): string {
		$localeKey = loan_processing_fee_locale_key($locale);
		$rate = TEAG;

		if ($localeKey === 'en') {
			return trim(str_replace(' ', '', $rate));
		}

		return preg_replace('/\s*%$/', ' %', str_replace('.', ',', $rate));
	}
}

if ( ! function_exists('loan_calculate_amortization') ) {
	function loan_calculate_amortization(float $amount, int $months, ?float $annualRate = null): array {
		$annualRate = $annualRate ?? loan_teag_rate_decimal();
		$monthlyRate = $annualRate / 12 / 100;

		if ($monthlyRate > 0) {
			$payment = $amount * ($monthlyRate / (1 - pow(1 + $monthlyRate, -$months)));
		} else {
			$payment = $amount / $months;
		}

		$payment = round($payment, 2);

		return [
			'monthly' => $payment,
			'total' => round($payment * $months, 2),
		];
	}
}

if ( ! function_exists('loan_taeg_example_config_for_locale') ) {
	function loan_taeg_example_config_for_locale($locale = null): array {
		$localeKey = loan_processing_fee_locale_key($locale);
		$configs = [
			'pl' => ['amount' => 20000, 'months' => 48],
			'sv' => ['amount' => 100000, 'months' => 48],
			'fi' => ['amount' => 10000, 'months' => 48, 'currency' => 'EUR'],
			'et' => ['amount' => 10000, 'months' => 48, 'currency' => 'EUR'],
		];

		$config = $configs[$localeKey] ?? ['amount' => 10000, 'months' => 48];
		$config['currency'] = $config['currency'] ?? loan_currency_code_for_locale($localeKey);

		return $config;
	}
}

if ( ! function_exists('loan_taeg_example_text') ) {
	function loan_taeg_example_text($locale = null): string {
		$localeKey = loan_processing_fee_locale_key($locale);
		$config = loan_taeg_example_config_for_locale($localeKey);
		$calc = loan_calculate_amortization($config['amount'], $config['months']);
		$rate = loan_teag_rate_display($localeKey);
		$amount = format_loan_money($config['amount'], $config['currency'], 0);
		$monthly = format_loan_money(round($calc['monthly']), $config['currency'], 0);
		$total = format_loan_money(round($calc['total']), $config['currency'], 0);
		$months = (string) $config['months'];

		$templates = [
			'fr' => 'Exemple : pour :amount sur :months mois au TAEG de :rate, mensualité de :monthly, montant total dû : :total.',
			'ch' => 'Beispiel: Für :amount über :months Monate bei einem effektiven Jahreszins von :rate beträgt die Monatsrate :monthly, der insgesamt geschuldete Betrag :total.',
			'de' => 'Beispiel: Für :amount über :months Monate bei einem effektiven Jahreszins von :rate beträgt die Monatsrate :monthly, der insgesamt geschuldete Betrag :total.',
			'en' => 'Example: for :amount over :months months at a :rate APR, monthly payment of :monthly, total amount due: :total.',
			'es' => 'Ejemplo: para :amount en :months meses con un TAEG del :rate, mensualidad de :monthly, importe total adeudado: :total.',
			'it' => 'Esempio: per :amount su :months mesi al TAEG del :rate, rata mensile di :monthly, importo totale dovuto: :total.',
			'pt' => 'Exemplo: para :amount em :months meses com TAEG de :rate, mensalidade de :monthly, montante total devido: :total.',
			'pl' => 'Przykład: dla :amount na :months miesięcy przy RRSO :rate, rata miesięczna :monthly, całkowita kwota do spłaty: :total.',
			'sv' => 'Exempel: för :amount över :months månader med effektiv ränta på :rate, månadsbetalning :monthly, totalt belopp att betala: :total.',
			'fi' => 'Esimerkki: :amount :months kuukaudeksi todellisella vuosikorolla :rate, kuukausierä :monthly, maksettava kokonaismäärä: :total.',
			'nl' => 'Voorbeeld: voor :amount over :months maanden met een JKP van :rate, maandelijkse betaling van :monthly, totaal verschuldigd bedrag: :total.',
		];

		$template = $templates[$localeKey]
			?? ($localeKey === 'ch' ? ($templates['de'] ?? null) : null)
			?? $templates['fr']
			?? $templates['en'];

		return str_replace(
			[':amount', ':months', ':rate', ':monthly', ':total'],
			[$amount, $months, $rate, $monthly, $total],
			$template
		);
	}
}

if ( ! function_exists('loan_page_text') ) {
	function loan_page_text(string $key): string {
		static $keys = [
			'financing_tag' => 671,
			'identity_tag' => 672,
			'file_tag' => 673,
			'instant_calculation' => 674,
			'country_placeholder' => 675,
			'amount_error' => 676,
			'duration_error' => 677,
			'phone_prefix_placeholder' => 678,
			'phone_prefix_label' => 679,
			'income_placeholder' => 680,
			'whatsapp_optional' => 681,
			'full_name_placeholder' => 682,
		];

		if (!isset($keys[$key])) {
			return '';
		}

		return str_replacing(__('TRAD_' . $keys[$key]));
	}
}

if ( ! function_exists('site_logo_parts') ) {
	function site_logo_parts() {
		if (defined('SITE_LOGO_PRIMARY') && defined('SITE_LOGO_ACCENT')) {
			return [
				'primary' => SITE_LOGO_PRIMARY,
				'secondary' => SITE_LOGO_ACCENT,
				'full' => defined('SITE_LOGO_NAME') ? SITE_LOGO_NAME : (SITE_LOGO_PRIMARY . SITE_LOGO_ACCENT),
			];
		}

		$name = defined('SITE_LOGO_NAME') ? SITE_LOGO_NAME : trim((string) SITE_NAME);
		$segments = preg_split('/\s+/', $name, 2) ?: [];

		return [
			'primary' => $segments[0] ?? $name,
			'secondary' => $segments[1] ?? '',
			'full' => $name,
		];
	}
}

if ( ! function_exists('asset_img') ) {
	function asset_img($uri) {
		return asset('assets/images/' . $uri);
	}
}

if ( ! function_exists('asset_css') ) {
	function asset_css($uri) {
		$url = asset('assets/css/' . $uri);
		$path = public_path('assets/css/' . ltrim($uri, '/'));

		if (is_file($path)) {
			$url .= '?v=' . filemtime($path);
		}

		return $url;
	}
}

if ( ! function_exists('asset_js') ) {
	function asset_js($uri) {
		return asset('assets/js/' . $uri);
	}
}

if ( ! function_exists('loanOffersLists') ) {
	function loanOffersLists($current=null){
        $services['consumer-loan'] = [ 212, [213, 214] ];
        $services['work-credit'] = [ 308, [309, 310] ];
        $services['real-estate-loan'] = [ 215, [216, 217] ];
        $services['credit-redemption'] = [ 218, [219, 220] ];
        $services['credit-leasing'] = [ 221, [222, 223] ];
        $services['student-loan'] = [ 224, [225, 226] ];

        if ( !empty($services[ $current ]) ) {
        	return $services[ $current ];
        }
        return $services;
    }
}

if ( ! function_exists('FaqsListing') ) {
	function FaqsListing($position=1, $per_page=5){
        $helps[] = [274, 275];
        $helps[] = [276, 277];
        $helps[] = [278, 279];
        $helps[] = [280, 281];
        $helps[] = [282, 283];
        $helps[] = [284, 285];
        $helps[] = [286, 287];
        $helps[] = [288, 289];
        $helps[] = [56, 57];
        $helps[] = [58, 59];

        return array_slice($helps, $position - 1, $per_page);

        return $helps;
    }
}

if ( ! function_exists('assuranceOffersLists') ) {
	function assuranceOffersLists($current=null){
        $services['loan'] = [ 312, [313, 314, 315] ];
        $services['home'] = [ 316, [317, 318, 319, 320] ];
        $services['animal'] = [ 321, [322, 323] ];
        $services['professional'] = [ 324, [325, 326] ];
        $services['health'] = [ 327, [328] ];

        if ( !empty($services[ $current ]) ) {
        	return $services[ $current ];
        }
        return $services;
    }
}
