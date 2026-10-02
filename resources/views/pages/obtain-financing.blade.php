@extends('layouts.default')

@section('content')
    <x-breadcrumb></x-breadcrumb>

    <style>
        .loan-modern-shell {
            max-width: 1080px;
            margin: 0 auto;
        }

        .loan-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 24px;
            padding: 34px 30px;
            color: #fff;
            margin-bottom: 28px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }

        .loan-hero h1 {
            font-size: 40px;
            line-height: 1.15;
            font-weight: 800;
            margin-bottom: 12px;
            color: #fff;
        }

        .loan-hero-notice {
            margin-top: 18px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 16px 18px;
        }

        .loan-hero-notice-title {
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .3px;
            text-transform: uppercase;
            margin-bottom: 6px;
            color: #fff;
        }

        .loan-hero-notice-text {
            margin: 0;
            font-size: 15px;
            line-height: 1.75;
            color: rgba(255,255,255,0.92);
        }

        .loan-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            align-items: start;
        }

        .loan-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            padding: 28px 26px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.05);
        }

        .loan-step-panel {
            display: none;
        }

        .loan-step-panel.active {
            display: block;
        }

        .loan-progress {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 0;
            max-width: 760px;
            margin: -6px auto 24px;
        }

        .loan-progress-item {
            position: relative;
            flex: 1 1 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
            min-width: 0;
            text-align: center;
        }

        .loan-progress-item::before {
            content: "";
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e2e8f0;
            z-index: 0;
        }

        .loan-progress-item:first-child::before {
            left: 50%;
        }

        .loan-progress-item:last-child::before {
            right: 50%;
        }

        .loan-progress-number,
        .loan-step-number {
            position: relative;
            z-index: 1;
            flex: 0 0 auto;
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: #16a34a;
            color: #ffffff;
            font-size: 14px;
            font-weight: 900;
        }

        .loan-progress-number {
            background: #e2e8f0;
            color: #475569;
            box-shadow: 0 0 0 6px #ffffff;
        }

        .loan-progress-label {
            min-width: 0;
            line-height: 1.35;
        }

        .loan-progress-item.active {
            color: #14532d;
        }

        .loan-progress-item.active .loan-progress-number {
            background: #16a34a;
            color: #ffffff;
        }

        .loan-progress-item.done {
            color: #0f172a;
        }

        .loan-progress-item.done .loan-progress-number {
            background: #0f172a;
            color: #ffffff;
        }

        .loan-progress-item.done::before,
        .loan-progress-item.active::before {
            background: linear-gradient(90deg, #0f172a 0%, #16a34a 100%);
        }

        .loan-step-head {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 18px;
        }

        .loan-step-kicker {
            display: inline-block;
            font-size: 13px;
            color: #15803d;
            background: #ecfdf3;
            padding: 5px 10px;
            border-radius: 999px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .loan-card-title {
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
        }

        .loan-card-subtitle {
            font-size: 15px;
            line-height: 1.75;
            color: #6b7280;
            margin-bottom: 22px;
        }

        .loan-divider {
            height: 1px;
            background: #eef2f7;
            margin: 18px 0 22px;
        }

        .loan-live-box {
            margin-top: 18px;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 18px;
        }

        .loan-live-title {
            font-size: 14px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 12px;
        }

        .loan-live-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .loan-live-item {
            background: #ffffff;
            border: 1px solid #eef2f7;
            border-radius: 14px;
            padding: 14px;
        }

        .loan-live-label {
            display: block;
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .loan-live-value {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            transition: all 0.2s ease;
        }

        .loan-live-note {
            margin-top: 12px;
            font-size: 13px;
            color: #6b7280;
            line-height: 1.7;
        }

        .loan-submit-box {
            margin-top: 26px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            padding: 22px 24px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.04);
        }

        .loan-step-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 22px;
        }

        .loan-step-actions .readon.submit,
        .loan-step-actions .loan-back-btn {
            min-width: 180px;
            text-align: center;
            border-radius: 14px !important;
            padding: 14px 20px !important;
            font-size: 16px !important;
            font-weight: 800;
        }

        .loan-back-btn {
            border: 1px solid #e5e7eb;
            background: #ffffff;
            color: #0f172a;
            cursor: pointer;
        }

        .loan-submit-note {
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            font-weight: 600;
            margin-top: 12px;
        }

        .loan-section-heading {
            border-top: 1px solid #eef2f7;
            margin: 20px 0 16px;
            padding-top: 20px;
        }

        .loan-section-heading h4 {
            color: #0f172a;
            font-size: 18px;
            font-weight: 800;
            line-height: 1.35;
            margin: 0 0 6px;
        }

        .loan-section-heading p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.65;
            margin: 0;
        }

        .loan-submit-box .readon.submit {
            width: 100%;
            border-radius: 16px !important;
            font-size: 20px !important;
            padding: 18px 24px !important;
        }

        .loan-mini-tag {
            display: inline-block;
            font-size: 13px;
            color: #15803d;
            background: #ecfdf3;
            padding: 6px 12px;
            border-radius: 999px;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .loan-modern-shell .form-group {
            margin-bottom: 18px;
        }

        .loan-modern-shell .input-group-text {
            min-width: 56px;
            justify-content: center;
        }

        .loan-phone-input {
            flex-wrap: nowrap;
        }

        .loan-phone-input .input-group-prepend {
            flex: 0 0 auto;
        }

        .loan-phone-prefix {
            display: flex;
            align-items: center;
            height: 50px;
            background-color: #f8fafc;
            border: 1px solid #e5e7eb;
            border-right: 0;
            border-radius: 8px 0 0 8px;
            overflow: hidden;
        }

        .loan-phone-prefix-flag {
            flex: 0 0 auto;
            width: 36px;
            padding-left: 10px;
            font-size: 20px;
            line-height: 1;
            text-align: center;
            pointer-events: none;
        }

        .loan-phone-prefix-flag.is-placeholder {
            opacity: 0.45;
        }

        .loan-phone-code-select {
            width: 88px;
            height: 100%;
            border: 0;
            border-radius: 0;
            background-color: transparent;
            color: #0f172a;
            font-weight: 700;
            padding: 0 24px 0 4px;
            text-align: left;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%230f172a' d='M1.4.4 6 5l4.6-4.6L12 2.8 6 8.8 0 2.8z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 10px 7px;
        }

        .loan-phone-input .form-control {
            min-width: 0;
        }

        .loan-field-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .loan-checkbox-wrap {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 14px;
            padding: 14px 16px;
            margin-top: 16px;
        }

        .loan-submit-box .loan-checkbox-wrap {
            margin-top: 0;
            margin-bottom: 16px;
        }

        .loan-checkbox-wrap label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            line-height: 1.75;
            color: #374151;
            margin: 0;
            cursor: pointer;
        }

        .loan-checkbox-wrap input[type="checkbox"] {
            margin-top: 4px;
        }

        .loan-checkbox-wrap a {
            color: #032E42;
            font-weight: 600;
            text-decoration: underline;
        }

        .loan-checkbox-wrap a:hover {
            color: #0B6B3A;
        }

        .loan-form-legal-footer {
            margin-top: 28px;
            padding: 18px 20px;
            border-radius: 14px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            text-align: center;
        }

        .loan-form-legal-footer p {
            margin: 0;
            font-size: 14px;
            line-height: 1.75;
            color: #475569;
        }

        .loan-form-legal-footer a {
            color: #032E42;
            font-weight: 700;
            text-decoration: underline;
        }

        .loan-form-legal-footer a:hover {
            color: #0B6B3A;
        }

        .amount-grid,
        .duration-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .amount-btn,
        .duration-btn {
            height: 56px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            font-weight: 700;
            font-size: 15px;
            color: #0f172a;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .amount-btn:hover,
        .duration-btn:hover {
            border-color: #16a34a;
            background: #f0fdf4;
        }

        .amount-btn.active,
        .duration-btn.active {
            background: #16a34a;
            color: #ffffff;
            border-color: #16a34a;
            box-shadow: 0 6px 16px rgba(22,163,74,0.25);
        }

        @media (max-width: 991px) {
            .loan-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .loan-hero {
                padding: 26px 18px;
                border-radius: 18px;
            }

            .loan-hero h1 {
                font-size: 31px;
            }

            .loan-progress {
                margin-top: -4px;
                margin-bottom: 20px;
            }

            .loan-progress-item {
                font-size: 11px;
                gap: 7px;
            }

            .loan-progress-number {
                width: 28px;
                height: 28px;
                font-size: 13px;
                box-shadow: 0 0 0 5px #ffffff;
            }

            .loan-progress-item::before {
                top: 14px;
            }

            .loan-step-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .loan-step-actions .readon.submit,
            .loan-step-actions .loan-back-btn {
                width: 100%;
                min-width: 0;
            }

            .loan-card,
            .loan-submit-box {
                padding: 22px 18px;
                border-radius: 18px;
            }

            .loan-card-title {
                font-size: 22px;
            }

            .loan-step-head {
                gap: 10px;
            }

            .loan-live-grid {
                grid-template-columns: 1fr;
            }

            .amount-grid,
            .duration-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .amount-btn,
            .duration-btn {
                height: 48px;
                font-size: 13px;
                border-radius: 12px;
                padding: 0 6px;
            }
        }

        @media (max-width: 380px) {
            .amount-grid,
            .duration-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .amount-btn,
            .duration-btn {
                height: 46px;
                font-size: 13px;
            }

            .loan-phone-prefix {
                height: 48px;
            }

            .loan-phone-prefix-flag {
                width: 32px;
                padding-left: 8px;
                font-size: 18px;
            }

            .loan-phone-code-select {
                width: 78px;
                font-size: 13px;
                padding-right: 20px;
                background-position: right 6px center;
            }
        }
    </style>

    <div class="rs-contact contact-style3 pt-5 md-pt-80 mb-5">
        <div class="container">
            <div class="loan-modern-shell">
                <x-alert only="success"></x-alert>
                <x-alert only="error"></x-alert>

                @php
                    $loanLocale = app()->getLocale();
                    $loanCurrencyCode = loan_currency_code_for_locale($loanLocale);
                    $loanAmountOptions = loan_amount_options_for_locale($loanLocale);
                    $loanMinAmount = loan_min_amount_for_locale($loanLocale);
                    $loanNumberLocale = [
                        'ch' => 'de-CH',
                        'fr' => 'fr-CH',
                        'de' => 'de-DE',
                        'el' => 'el-GR',
                        'en' => 'en-GB',
                        'es' => 'es-ES',
                        'fi' => 'fi-FI',
                        'it' => 'it-IT',
                        'pl' => 'pl-PL',
                        'pt' => 'pt-PT',
                        'sv' => 'sv-SE',
                    ][$loanLocale] ?? 'fr-FR';
                    $countryFieldValue = old('financing.adresse_pays', '');
                    $phoneDialCountries = [
                        ['iso' => 'AL', 'name' => 'Albania', 'country_value' => 'Albania', 'dial_code' => '+355', 'flag' => '🇦🇱'],
                        ['iso' => 'AD', 'name' => 'Andorra', 'country_value' => 'Andorra', 'dial_code' => '+376', 'flag' => '🇦🇩'],
                        ['iso' => 'AM', 'name' => 'Armenia', 'country_value' => 'Armenia', 'dial_code' => '+374', 'flag' => '🇦🇲'],
                        ['iso' => 'AT', 'name' => 'Austria', 'country_value' => 'Austria', 'dial_code' => '+43', 'flag' => '🇦🇹'],
                        ['iso' => 'BY', 'name' => 'Belarus', 'country_value' => 'Belarus', 'dial_code' => '+375', 'flag' => '🇧🇾'],
                        ['iso' => 'BE', 'name' => 'Belgium', 'country_value' => 'Belgium', 'dial_code' => '+32', 'flag' => '🇧🇪'],
                        ['iso' => 'BA', 'name' => 'Bosnia and Herzegovina', 'country_value' => 'Bosnia and Herzegovina', 'dial_code' => '+387', 'flag' => '🇧🇦'],
                        ['iso' => 'BG', 'name' => 'Bulgaria', 'country_value' => 'Bulgaria', 'dial_code' => '+359', 'flag' => '🇧🇬'],
                        ['iso' => 'CA', 'name' => 'Canada', 'country_value' => null, 'dial_code' => '+1', 'flag' => '🇨🇦'],
                        ['iso' => 'HR', 'name' => 'Croatia', 'country_value' => 'Croatia (Hrvatska)', 'dial_code' => '+385', 'flag' => '🇭🇷'],
                        ['iso' => 'CY', 'name' => 'Cyprus', 'country_value' => 'Cyprus', 'dial_code' => '+357', 'flag' => '🇨🇾'],
                        ['iso' => 'CZ', 'name' => 'Czech Republic', 'country_value' => 'Czech Republic', 'dial_code' => '+420', 'flag' => '🇨🇿'],
                        ['iso' => 'DK', 'name' => 'Denmark', 'country_value' => 'Denmark', 'dial_code' => '+45', 'flag' => '🇩🇰'],
                        ['iso' => 'EE', 'name' => 'Estonia', 'country_value' => 'Estonia', 'dial_code' => '+372', 'flag' => '🇪🇪'],
                        ['iso' => 'FI', 'name' => 'Finland', 'country_value' => 'Finland', 'dial_code' => '+358', 'flag' => '🇫🇮'],
                        ['iso' => 'FR', 'name' => 'France', 'country_value' => 'France', 'dial_code' => '+33', 'flag' => '🇫🇷'],
                        ['iso' => 'GE', 'name' => 'Georgia', 'country_value' => 'Georgia', 'dial_code' => '+995', 'flag' => '🇬🇪'],
                        ['iso' => 'DE', 'name' => 'Germany', 'country_value' => 'Germany', 'dial_code' => '+49', 'flag' => '🇩🇪'],
                        ['iso' => 'GR', 'name' => 'Greece', 'country_value' => 'Greece', 'dial_code' => '+30', 'flag' => '🇬🇷'],
                        ['iso' => 'HU', 'name' => 'Hungary', 'country_value' => 'Hungary', 'dial_code' => '+36', 'flag' => '🇭🇺'],
                        ['iso' => 'IS', 'name' => 'Iceland', 'country_value' => 'Iceland', 'dial_code' => '+354', 'flag' => '🇮🇸'],
                        ['iso' => 'IE', 'name' => 'Ireland', 'country_value' => 'Ireland', 'dial_code' => '+353', 'flag' => '🇮🇪'],
                        ['iso' => 'IT', 'name' => 'Italy', 'country_value' => 'Italy', 'dial_code' => '+39', 'flag' => '🇮🇹'],
                        ['iso' => 'JE', 'name' => 'Jersey', 'country_value' => 'Jersey', 'dial_code' => '+44', 'flag' => '🇯🇪'],
                        ['iso' => 'LV', 'name' => 'Latvia', 'country_value' => 'Latvia', 'dial_code' => '+371', 'flag' => '🇱🇻'],
                        ['iso' => 'LI', 'name' => 'Liechtenstein', 'country_value' => 'Liechtenstein', 'dial_code' => '+423', 'flag' => '🇱🇮'],
                        ['iso' => 'LT', 'name' => 'Lithuania', 'country_value' => 'Lithuania', 'dial_code' => '+370', 'flag' => '🇱🇹'],
                        ['iso' => 'LU', 'name' => 'Luxembourg', 'country_value' => 'Luxembourg', 'dial_code' => '+352', 'flag' => '🇱🇺'],
                        ['iso' => 'MK', 'name' => 'Macedonia', 'country_value' => 'Macedonia', 'dial_code' => '+389', 'flag' => '🇲🇰'],
                        ['iso' => 'MT', 'name' => 'Malta', 'country_value' => 'Malta', 'dial_code' => '+356', 'flag' => '🇲🇹'],
                        ['iso' => 'MD', 'name' => 'Moldova', 'country_value' => 'Moldova, Republic of', 'dial_code' => '+373', 'flag' => '🇲🇩'],
                        ['iso' => 'MC', 'name' => 'Monaco', 'country_value' => 'Monaco', 'dial_code' => '+377', 'flag' => '🇲🇨'],
                        ['iso' => 'ME', 'name' => 'Montenegro', 'country_value' => 'Montenegro', 'dial_code' => '+382', 'flag' => '🇲🇪'],
                        ['iso' => 'NL', 'name' => 'Netherlands', 'country_value' => 'Netherlands', 'dial_code' => '+31', 'flag' => '🇳🇱'],
                        ['iso' => 'NO', 'name' => 'Norway', 'country_value' => 'Norway', 'dial_code' => '+47', 'flag' => '🇳🇴'],
                        ['iso' => 'PL', 'name' => 'Poland', 'country_value' => 'Poland', 'dial_code' => '+48', 'flag' => '🇵🇱'],
                        ['iso' => 'PT', 'name' => 'Portugal', 'country_value' => 'Portugal', 'dial_code' => '+351', 'flag' => '🇵🇹'],
                        ['iso' => 'RO', 'name' => 'Romania', 'country_value' => 'Romania', 'dial_code' => '+40', 'flag' => '🇷🇴'],
                        ['iso' => 'RU', 'name' => 'Russian Federation', 'country_value' => 'Russian Federation', 'dial_code' => '+7', 'flag' => '🇷🇺'],
                        ['iso' => 'SM', 'name' => 'San Marino', 'country_value' => 'San Marino', 'dial_code' => '+378', 'flag' => '🇸🇲'],
                        ['iso' => 'RS', 'name' => 'Serbia', 'country_value' => 'Serbia', 'dial_code' => '+381', 'flag' => '🇷🇸'],
                        ['iso' => 'SK', 'name' => 'Slovakia', 'country_value' => 'Slovakia', 'dial_code' => '+421', 'flag' => '🇸🇰'],
                        ['iso' => 'SI', 'name' => 'Slovenia', 'country_value' => 'Slovenia', 'dial_code' => '+386', 'flag' => '🇸🇮'],
                        ['iso' => 'ES', 'name' => 'Spain', 'country_value' => 'Spain', 'dial_code' => '+34', 'flag' => '🇪🇸'],
                        ['iso' => 'SE', 'name' => 'Sweden', 'country_value' => 'Sweden', 'dial_code' => '+46', 'flag' => '🇸🇪'],
                        ['iso' => 'CH', 'name' => 'Switzerland', 'country_value' => 'Switzerland', 'dial_code' => '+41', 'flag' => '🇨🇭'],
                        ['iso' => 'TR', 'name' => 'Turkey', 'country_value' => 'Turkey', 'dial_code' => '+90', 'flag' => '🇹🇷'],
                        ['iso' => 'UA', 'name' => 'Ukraine', 'country_value' => 'Ukraine', 'dial_code' => '+380', 'flag' => '🇺🇦'],
                        ['iso' => 'AE', 'name' => 'United Arab Emirates', 'country_value' => null, 'dial_code' => '+971', 'flag' => '🇦🇪'],
                        ['iso' => 'GB', 'name' => 'United Kingdom', 'country_value' => 'United Kingdom', 'dial_code' => '+44', 'flag' => '🇬🇧'],
                        ['iso' => 'US', 'name' => 'United States', 'country_value' => null, 'dial_code' => '+1', 'flag' => '🇺🇸'],
                        ['iso' => 'VA', 'name' => 'Vatican City State', 'country_value' => 'Vatican City State', 'dial_code' => '+39', 'flag' => '🇻🇦'],
                    ];
                    $loanStep2ErrorFields = [
                        'financing.nom_complet',
                        'financing.adresse_complete',
                        'financing.adresse_pays',
                        'financing.email',
                        'financing.numero_whatsapp',
                        'financing.sexe',
                    ];
                    $loanStep3ErrorFields = [
                        'job',
                        'income',
                    ];
                    $initialLoanStep = 1;

                    foreach ($loanStep2ErrorFields as $field) {
                        if ($errors->has($field)) {
                            $initialLoanStep = 2;
                            break;
                        }
                    }

                    foreach ($loanStep3ErrorFields as $field) {
                        if ($errors->has($field)) {
                            $initialLoanStep = 3;
                            break;
                        }
                    }

                    $initialAmount = old('financing.montant_du_pret');
                    $initialDuration = old('financing.duree_totale_du_pret');

                    if ($initialAmount === null || $initialAmount === '') {
                        $requestedAmount = request()->query('amount');

                        if ($requestedAmount !== null && $requestedAmount !== '') {
                            $requestedAmount = (float) $requestedAmount;
                            $closestAmount = null;
                            $closestAmountDiff = null;

                            foreach ($loanAmountOptions as $option) {
                                $diff = abs((float) $option - $requestedAmount);

                                if ($closestAmountDiff === null || $diff < $closestAmountDiff) {
                                    $closestAmountDiff = $diff;
                                    $closestAmount = $option;
                                }
                            }

                            $initialAmount = $closestAmount ?? '';
                        } else {
                            $initialAmount = '';
                        }
                    }

                    if ($initialDuration === null || $initialDuration === '') {
                        $requestedDuration = request()->query('duration');

                        if ($requestedDuration !== null && $requestedDuration !== '') {
                            $requestedDuration = (int) $requestedDuration;
                            $closestDuration = null;
                            $closestDurationDiff = null;

                            foreach (LOAN_DURATION_OPTIONS as $option) {
                                $diff = abs((int) $option - $requestedDuration);

                                if ($closestDurationDiff === null || $diff < $closestDurationDiff) {
                                    $closestDurationDiff = $diff;
                                    $closestDuration = $option;
                                }
                            }

                            $initialDuration = $closestDuration ?? '';
                        } else {
                            $initialDuration = '';
                        }
                    }
                @endphp

                <div class="loan-hero">
                    <h1>{{ translate(473) }}</h1>
                </div>

                <div class="loan-progress" aria-hidden="true">
                    <div class="loan-progress-item active" data-progress-step="1">
                        <span class="loan-progress-number">1</span>
                        <span class="loan-progress-label">{{ loan_page_text('financing_tag') }}</span>
                    </div>
                    <div class="loan-progress-item" data-progress-step="2">
                        <span class="loan-progress-number">2</span>
                        <span class="loan-progress-label">{{ loan_page_text('identity_tag') }}</span>
                    </div>
                    <div class="loan-progress-item" data-progress-step="3">
                        <span class="loan-progress-number">3</span>
                        <span class="loan-progress-label">{{ loan_page_text('file_tag') }}</span>
                    </div>
                </div>

                <form action="{{ routeWithLocale('site.obtain_financing') }}" method="post" id="loanForm">
                    @csrf

                    <input type="hidden" name="financing[devise_du_pret]" value="{{ $loanCurrencyCode }}">

                    <div class="loan-grid">
                        <section class="loan-card loan-step-panel active" data-loan-step="1">
                            <div class="loan-step-head">
                                <span class="loan-step-number">1</span>
                                <div>
                                    <span class="loan-step-kicker">{{ loan_page_text('financing_tag') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="loan-field-label">{{ translate(484) }}</label>

                                <div class="amount-grid" id="amountGrid">
                                    @foreach($loanAmountOptions as $amount)
                                        <button
                                            type="button"
                                            class="amount-btn {{ (string) $initialAmount === (string) $amount ? 'active' : '' }}"
                                            data-value="{{ $amount }}">
                                            {{ format_loan_money($amount, $loanCurrencyCode) }}
                                        </button>
                                    @endforeach
                                </div>

                                <input
                                    type="hidden"
                                    id="amountHidden"
                                    name="financing[montant_du_pret]"
                                    value="{{ $initialAmount }}">
                            </div>

                            <div class="form-group">
                                <label class="loan-field-label">{{ translate(485) }}</label>

                                <div class="duration-grid" id="durationGrid">
                                    @foreach(LOAN_DURATION_OPTIONS as $duree)
                                        <button
                                            type="button"
                                            class="duration-btn {{ (string) $initialDuration === (string) $duree ? 'active' : '' }}"
                                            data-value="{{ $duree }}">
                                            {{ $duree }} {{ translate(471) }}
                                        </button>
                                    @endforeach
                                </div>

                                <input
                                    type="hidden"
                                    id="dureeHidden"
                                    name="financing[duree_totale_du_pret]"
                                    value="{{ $initialDuration }}">
                            </div>

                            <div class="loan-live-box">
                                <div class="loan-live-title">{{ translate(477) }}</div>

                                <div class="loan-live-grid">
                                    <div class="loan-live-item">
                                        <span class="loan-live-label">{{ translate(478) }}</span>
                                        <div class="loan-live-value" id="liveMensualite">—</div>
                                        <p style="font-size:13px;color:#16a34a;font-weight:600;margin-top:6px;margin-bottom:0;">
                                            {{ loan_page_text('instant_calculation') }}
                                        </p>
                                    </div>

                                    <div class="loan-live-item">
                                        <span class="loan-live-label">{{ translate(479) }}</span>
                                        <div class="loan-live-value" id="liveTotal">—</div>
                                    </div>
                                </div>

                                <p class="loan-live-note">{{ translate(480) }}</p>

<p style="margin-top:10px;font-size:14px;font-weight:700;color:#16a34a;">
    🔥 {{ translate(487) }}
</p>
                            </div>

                            <div class="loan-step-actions">
                                <span></span>
                                <button type="button" class="readon submit loan-next-btn" data-next-step="2">
                                    {{ translate(174) }}
                                </button>
                            </div>
                        </section>

                        <section class="loan-card loan-step-panel" data-loan-step="2">
                            <div class="loan-step-head">
                                <span class="loan-step-number">2</span>
                                <div>
                                    <span class="loan-step-kicker">{{ loan_page_text('identity_tag') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <x-form-input
                                    label="{{ translate(107) }}"
                                    name="financing.nom_complet"
                                    placeholder="{{ loan_page_text('full_name_placeholder') }}"
                                    value="{{ old('financing.nom_complet', trim(trim(old('financing.prenom', '')) . ' ' . trim(old('financing.nom', '')))) }}"
                                />
                            </div>

                            <div class="form-group">
                                <x-form-input
                                    label="{{ translate(458) }}"
                                    name="financing.adresse_complete"
                                    value="{{ old('financing.adresse_complete', '') }}"
                                >
                                    <p class="form-comment m-0">
                                        <i class="fa text-theme fa-info-circle"></i>
                                        {{ translate(459) }}
                                    </p>
                                </x-form-input>
                            </div>

                            <div class="form-group">
                                <label for="address-country" class="form-label">{{ translate(460) }}</label>

                                <select
                                    class="form-control @error('financing.adresse_pays') is-invalid @enderror"
                                    name="financing[adresse_pays]"
                                    id="address-country"
                                    required
                                >
                                    <option value="" disabled {{ $countryFieldValue === '' ? 'selected' : '' }}>
                                        {{ loan_page_text('country_placeholder') }}
                                    </option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}" {{ $countryFieldValue === $country ? 'selected="selected"' : '' }}>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('financing.adresse_pays')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="loan-divider"></div>

                            <div class="form-group">
                                <x-form-input
                                    type="email"
                                    label="{{ translate(461) }}"
                                    name="financing.email"
                                    value="{{ old('financing.email', '') }}"
                                >
                                    <p class="form-comment m-0">
                                        <i class="fa text-theme fa-info-circle"></i>
                                        {{ translate(462) }}
                                    </p>
                                </x-form-input>
                            </div>

                            <div class="form-group">
                                <label class="loan-field-label" for="visible-whatsapp">{{ translate(463) }}</label>

                                <div class="input-group loan-phone-input">
                                    <div class="input-group-prepend">
                                        <div class="loan-phone-prefix">
                                            <span class="loan-phone-prefix-flag is-placeholder" id="whatsapp-country-flag" aria-hidden="true">🌐</span>
                                            <select
                                                id="whatsapp-country-code"
                                                class="loan-phone-code-select"
                                                aria-label="{{ loan_page_text('phone_prefix_label') }}"
                                                required
                                            >
                                                <option value="" disabled {{ old('financing.numero_whatsapp') ? '' : 'selected' }}>
                                                    {{ loan_page_text('phone_prefix_placeholder') }}
                                                </option>
                                                @foreach ($phoneDialCountries as $country)
                                                    <option
                                                        value="{{ $country['iso'] }}"
                                                        data-iso="{{ $country['iso'] }}"
                                                        data-dial-code="{{ $country['dial_code'] }}"
                                                        data-flag="{{ $country['flag'] }}"
                                                        data-country-value="{{ $country['country_value'] }}"
                                                    >
                                                        {{ $country['dial_code'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input
                                        type="tel"
                                        id="visible-whatsapp"
                                        class="form-control @error('financing.numero_whatsapp') is-invalid @enderror"
                                        placeholder="{{ translate(464) }}"
                                        value="{{ old('financing.numero_whatsapp_display', '') }}"
                                        autocomplete="tel"
                                        required
                                    >
                                </div>

                                <input
                                    type="hidden"
                                    name="financing[numero_whatsapp]"
                                    id="real-whatsapp"
                                    value="{{ old('financing.numero_whatsapp', '') }}"
                                >

                                <p class="form-comment m-0">
                                    <i class="fa text-theme fa-info-circle"></i>
                                    {{ translate(467) }}
                                </p>

                                @error('financing.numero_whatsapp')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <input type="hidden" name="financing[geo_city]" id="geoCity">
                            <input type="hidden" name="financing[geo_country]" id="geoCountry">
                            <input type="hidden" name="financing[geo_region]" id="geoRegion">

                            <div class="form-group mt-3">
                                <label class="loan-field-label">{{ translate(465) }}</label>

                                <div class="form-check-inline">
                                    <label class="form-check-label mr-10" for="gender_man">
                                        <input
                                            id="gender_man"
                                            class="form-check-input"
                                            type="radio"
                                            value="{{ translate(330) }}"
                                            {{ old('financing.sexe') == translate(330) ? 'checked="checked"' : null }}
                                            name="financing[sexe]"
                                            required="required"
                                        >
                                        {{ translate(330) }}
                                    </label>

                                    <label class="form-check-label" for="gender_woman">
                                        <input
                                            id="gender_woman"
                                            class="form-check-input"
                                            type="radio"
                                            value="{{ translate(331) }}"
                                            {{ old('financing.sexe') == translate(331) ? 'checked="checked"' : null }}
                                            name="financing[sexe]"
                                            required="required"
                                        >
                                        {{ translate(331) }}
                                    </label>
                                </div>
                            </div>

                            <div class="loan-step-actions">
                                <button type="button" class="loan-back-btn" data-prev-step="1">
                                    {{ translate(173) }}
                                </button>
                                <button type="button" class="readon submit loan-next-btn" data-next-step="3">
                                    {{ translate(174) }}
                                </button>
                            </div>
                        </section>

                        <section class="loan-card loan-step-panel" data-loan-step="3">
                            <div class="loan-step-head">
                                <span class="loan-step-number">3</span>
                                <div>
                                    <span class="loan-step-kicker">{{ loan_page_text('file_tag') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="loan-field-label" for="jobField">{{ translate(521) }}</label>
                                <input
                                    type="text"
                                    name="job"
                                    id="jobField"
                                    class="form-control @error('job') is-invalid @enderror"
                                    required
                                    value="{{ old('job', '') }}"
                                    placeholder="{{ translate(522) }}">
                                @error('job')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="loan-field-label" for="incomeField">{{ translate(523) }}</label>
                                <div class="input-group">
                                    <input
                                        type="number"
                                        name="income"
                                        id="incomeField"
                                        class="form-control @error('income') is-invalid @enderror"
                                        required
                                        min="0"
                                        step="1"
                                        inputmode="numeric"
                                        value="{{ old('income', '') }}"
                                        placeholder="{{ loan_page_text('income_placeholder') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ loan_currency_symbol_for_code($loanCurrencyCode) }}</span>
                                    </div>
                                </div>
                                <p class="form-comment m-0">
                                    <i class="fa text-theme fa-info-circle"></i>
                                    {{ translate(524) }}
                                </p>
                                @error('income')
                                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="loan-submit-box">
                                <div class="loan-checkbox-wrap">
                                    <label for="privacy_policy_accepted">
                                        <input
                                            id="privacy_policy_accepted"
                                            name="privacy_policy_accepted"
                                            type="checkbox"
                                            value="1"
                                            required
                                            @checked(old('privacy_policy_accepted'))
                                        >
                                        <span>
                                            {{ translate(685) }}
                                            <a href="{{ routeWithLocale('site.privacy_policy') }}" target="_blank" rel="noopener noreferrer">{{ translate(683) }}</a>.
                                        </span>
                                    </label>
                                    @error('privacy_policy_accepted')
                                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <button type="submit" class="readon submit">
                                    {{ translate(468) }}
                                </button>

                                <p class="loan-submit-note">{{ translate(469) }}</p>
                            </div>

                            <div class="loan-step-actions">
                                <button type="button" class="loan-back-btn" data-prev-step="2">
                                    {{ translate(173) }}
                                </button>
                                <span></span>
                            </div>
                        </section>
                    </div>
                </form>

                <div class="loan-form-legal-footer">
                    <p>
                        {{ translate(698) }}
                        <a href="{{ routeWithLocale('site.privacy_policy') }}" target="_blank" rel="noopener noreferrer">{{ translate(683) }}</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const countrySelect = document.getElementById('address-country');
        const whatsappCountrySelect = document.getElementById('whatsapp-country-code');
        const whatsappCountryFlag = document.getElementById('whatsapp-country-flag');
        const visibleWhatsapp = document.getElementById('visible-whatsapp');
        const realWhatsapp = document.getElementById('real-whatsapp');
        const geoCity = document.getElementById('geoCity');
        const geoCountry = document.getElementById('geoCountry');
        const geoRegion = document.getElementById('geoRegion');
        const form = document.getElementById('loanForm');
        const stepPanels = document.querySelectorAll('[data-loan-step]');
        const progressItems = document.querySelectorAll('[data-progress-step]');
        const nextButtons = document.querySelectorAll('[data-next-step]');
        const prevButtons = document.querySelectorAll('[data-prev-step]');

        const amountButtons = document.querySelectorAll('.amount-btn');
        const amountHidden = document.getElementById('amountHidden');

        const durationButtons = document.querySelectorAll('.duration-btn');
        const dureeHidden = document.getElementById('dureeHidden');

        const liveMensualite = document.getElementById('liveMensualite');
        const liveTotal = document.getElementById('liveTotal');

        const submitBtn = form ? form.querySelector('button[type="submit"]') : null;
        const defaultSubmitText = submitBtn ? submitBtn.innerText : '';

        const tauxAnnuel = @json(loan_teag_rate_decimal());
        const loanMinAmount = @json($loanMinAmount);
        const loanCurrencyCode = @json($loanCurrencyCode);
        const phoneDialCountries = @json($phoneDialCountries);
        const countryOptions = countrySelect ? Array.from(countrySelect.options) : [];
        const initialStep = @json($initialLoanStep);
        let countryWasTouched = Boolean(countrySelect && countrySelect.value);
        let whatsappWasTouched = Boolean(realWhatsapp && realWhatsapp.value.trim());
        let currentStep = 1;

        function createPhoneFieldController(countrySelectEl, visibleInputEl, hiddenInputEl, flagSpanEl, getWasTouched, setWasTouched) {
            function updateFlag() {
                if (!flagSpanEl || !countrySelectEl) {
                    return;
                }

                const selected = countrySelectEl.selectedOptions[0];

                if (!selected || !selected.value) {
                    flagSpanEl.textContent = '🌐';
                    flagSpanEl.classList.add('is-placeholder');
                    return;
                }

                flagSpanEl.textContent = selected.dataset.flag || '🌐';
                flagSpanEl.classList.remove('is-placeholder');
            }

            function getSelectedDialCode() {
                if (!countrySelectEl || !countrySelectEl.selectedOptions.length) {
                    return '';
                }

                return countrySelectEl.selectedOptions[0].dataset.dialCode || '';
            }

            function sync() {
                if (!hiddenInputEl || !visibleInputEl) {
                    return;
                }

                const prefix = getSelectedDialCode();
                const number = visibleInputEl.value.trim();

                hiddenInputEl.value = prefix && number ? `${prefix} ${number}` : number;
            }

            function selectCountry(dialCode, isoCode) {
                if (!countrySelectEl) {
                    return false;
                }

                const options = Array.from(countrySelectEl.options).filter(option => option.value);
                const normalizedDialCode = String(dialCode || '').replace(/\s+/g, '');
                const normalizedIsoCode = String(isoCode || '').toUpperCase();
                let option = null;

                if (normalizedIsoCode) {
                    option = options.find(item => (item.dataset.iso || item.value) === normalizedIsoCode);
                }

                if (!option && normalizedDialCode) {
                    option = options.find(item => item.dataset.dialCode === normalizedDialCode);
                }

                if (!option) {
                    return false;
                }

                countrySelectEl.value = option.value;
                updateFlag();
                return true;
            }

            function hydrateFromHidden() {
                if (!hiddenInputEl || !visibleInputEl || !hiddenInputEl.value.trim()) {
                    return;
                }

                const rawPhone = hiddenInputEl.value.trim();
                const compactPhone = rawPhone.replace(/[^\d+]/g, '');
                const phoneDigits = rawPhone.replace(/\D/g, '');
                const sortedCountries = phoneDialCountries
                    .slice()
                    .sort((a, b) => b.dial_code.length - a.dial_code.length);

                const detectedCountry = sortedCountries.find(country => {
                    const dialCode = country.dial_code.replace(/\s+/g, '');
                    const dialDigits = dialCode.replace(/\D/g, '');

                    return compactPhone.startsWith(dialCode) || phoneDigits.startsWith(dialDigits);
                });

                if (!detectedCountry) {
                    visibleInputEl.value = rawPhone;
                    return;
                }

                selectCountry(detectedCountry.dial_code, detectedCountry.iso);

                const dialDigits = detectedCountry.dial_code.replace(/\D/g, '');
                const localDigits = phoneDigits.startsWith(dialDigits)
                    ? phoneDigits.slice(dialDigits.length)
                    : phoneDigits;

                visibleInputEl.value = localDigits.replace(/(\d{2})(?=\d)/g, '$1 ').trim();
                updateFlag();
                sync();
            }

            if (countrySelectEl) {
                countrySelectEl.addEventListener('change', function () {
                    setWasTouched(true);
                    updateFlag();
                    sync();
                });
            }

            if (visibleInputEl) {
                visibleInputEl.addEventListener('input', sync);
            }

            return {
                sync,
                hydrateFromHidden,
                selectCountry,
                updateFlag,
                getWasTouched,
            };
        }

        const whatsappField = createPhoneFieldController(
            whatsappCountrySelect,
            visibleWhatsapp,
            realWhatsapp,
            whatsappCountryFlag,
            () => whatsappWasTouched,
            value => { whatsappWasTouched = value; }
        );

        function getCurrentAmount() {
            if (!amountHidden) {
                return NaN;
            }

            return parseFloat(amountHidden.value);
        }

        function getCurrentDuree() {
            if (!dureeHidden) {
                return NaN;
            }

            return parseInt(dureeHidden.value, 10);
        }

        function formatLoanCurrency(value) {
            return new Intl.NumberFormat(@json($loanNumberLocale), {
                style: 'currency',
                currency: loanCurrencyCode
            }).format(value);
        }

        function normalizeCountry(value) {
            return String(value || '')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim();
        }

        function setCountryFromGeo(data) {
            if (!countrySelect || countryWasTouched || countrySelect.value) {
                return;
            }

            const isoCode = String(data.country_code || data.country_code_iso2 || '').toUpperCase();
            const countryFromIso = phoneDialCountries.find(country => country.iso === isoCode);
            const detectedCountry = (countryFromIso && countryFromIso.country_value)
                ? countryFromIso.country_value
                : data.country_name;

            if (!detectedCountry) {
                return;
            }

            const option = countryOptions.find(item => normalizeCountry(item.value) === normalizeCountry(detectedCountry));

            if (option) {
                countrySelect.value = option.value;
            }
        }

        function pulseValue(el) {
            if (!el) return;
            el.style.transform = 'scale(1.05)';
            setTimeout(() => {
                el.style.transform = 'scale(1)';
            }, 150);
        }

        function lockSubmitButton() {
            if (!submitBtn) return;
            submitBtn.disabled = true;
            submitBtn.innerText = '{{ translate(488) }}';
        }

        function unlockSubmitButton() {
            if (!submitBtn) return;
            submitBtn.disabled = false;
            submitBtn.innerText = defaultSubmitText;
            form.dataset.submitted = 'false';
        }

        function clearStepErrors() {
            const montantErrorEl = document.getElementById('montant-error');
            const dureeErrorEl = document.getElementById('duree-error');

            if (montantErrorEl) montantErrorEl.remove();
            if (dureeErrorEl) dureeErrorEl.remove();
        }

        function showStepError(anchorId, errorId, message) {
            const anchor = document.getElementById(anchorId);

            if (!anchor || document.getElementById(errorId)) {
                return;
            }

            const errorEl = document.createElement('div');
            errorEl.id = errorId;
            errorEl.className = 'alert alert-danger mt-2';
            errorEl.textContent = message;
            anchor.insertAdjacentElement('afterend', errorEl);
        }

        function setCurrentStep(step, shouldFocusTop = false) {
            currentStep = step;

            stepPanels.forEach(panel => {
                panel.classList.toggle('active', Number(panel.dataset.loanStep) === step);
            });

            progressItems.forEach(item => {
                const itemStep = Number(item.dataset.progressStep);
                item.classList.toggle('active', itemStep === step);
                item.classList.toggle('done', itemStep < step);
            });

            if (shouldFocusTop) {
                const activePanel = document.querySelector(`[data-loan-step="${step}"]`);
                const target = activePanel || form;

                if (target) {
                    window.scrollTo({
                        top: target.getBoundingClientRect().top + window.scrollY - 96,
                        behavior: 'smooth'
                    });
                }
            }
        }

        function validateStep(step) {
            clearStepErrors();

            if (step === 1) {
                const montant = getCurrentAmount();
                const duree = getCurrentDuree();

                if (isNaN(montant) || montant < loanMinAmount) {
                    showStepError(
                        'amountGrid',
                        'montant-error',
                        @json(loan_page_text('amount_error'))
                    );
                    return false;
                }

                if (isNaN(duree) || duree <= 0) {
                    showStepError(
                        'durationGrid',
                        'duree-error',
                        @json(loan_page_text('duration_error'))
                    );
                    return false;
                }
            }

            const panel = document.querySelector(`[data-loan-step="${step}"]`);
            const fields = panel ? Array.from(panel.querySelectorAll('input, select, textarea')) : [];
            const invalid = fields.find(field => {
                if (field.type === 'hidden' || field.disabled || field.offsetParent === null) {
                    return false;
                }

                return !field.checkValidity();
            });

            if (invalid) {
                invalid.reportValidity();
                return false;
            }

            return true;
        }

        function updateLiveSimulation() {
            if (!liveMensualite || !liveTotal) {
                return;
            }

            const montant = getCurrentAmount();
            const duree = getCurrentDuree();

            if (isNaN(montant) || montant < loanMinAmount || isNaN(duree) || duree <= 0) {
                liveMensualite.textContent = '—';
                liveTotal.textContent = '—';
                return;
            }

            const tauxMensuel = tauxAnnuel / 12 / 100;
            let mensualite = 0;

            if (tauxMensuel > 0) {
                mensualite = montant * (tauxMensuel / (1 - Math.pow(1 + tauxMensuel, -duree)));
            } else {
                mensualite = montant / duree;
            }

            mensualite = Math.round(mensualite * 100) / 100;
            const total = Math.round((mensualite * duree) * 100) / 100;

            liveMensualite.textContent = formatLoanCurrency(mensualite);
            liveTotal.textContent = formatLoanCurrency(total);

            pulseValue(liveMensualite);
            pulseValue(liveTotal);
        }

        function syncActiveAmountButton() {
            amountButtons.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.value === amountHidden.value);
            });
        }

        function syncActiveDurationButton() {
            durationButtons.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.value === dureeHidden.value);
            });
        }

        function snapToLoanAmountOption(value) {
            const requested = parseFloat(value);

            if (isNaN(requested)) {
                return null;
            }

            let closest = null;
            let minDiff = Infinity;

            amountButtons.forEach(btn => {
                const option = parseFloat(btn.dataset.value);
                const diff = Math.abs(option - requested);

                if (diff < minDiff) {
                    minDiff = diff;
                    closest = option;
                }
            });

            return closest;
        }

        function snapToLoanDurationOption(value) {
            const requested = parseInt(value, 10);

            if (isNaN(requested) || requested <= 0) {
                return null;
            }

            let closest = null;
            let minDiff = Infinity;

            durationButtons.forEach(btn => {
                const option = parseInt(btn.dataset.value, 10);
                const diff = Math.abs(option - requested);

                if (diff < minDiff) {
                    minDiff = diff;
                    closest = option;
                }
            });

            return closest;
        }

        function hydrateLoanSelectionFromUrl() {
            if (!amountHidden || !dureeHidden) {
                return;
            }

            const params = new URLSearchParams(window.location.search);
            const urlAmount = params.get('amount');
            const urlDuration = params.get('duration');

            if (!amountHidden.value && urlAmount) {
                const snappedAmount = snapToLoanAmountOption(urlAmount);

                if (snappedAmount !== null) {
                    amountHidden.value = String(snappedAmount);
                }
            }

            if (!dureeHidden.value && urlDuration) {
                const snappedDuration = snapToLoanDurationOption(urlDuration);

                if (snappedDuration !== null) {
                    dureeHidden.value = String(snappedDuration);
                }
            }
        }

        amountButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                amountHidden.value = this.dataset.value;
                syncActiveAmountButton();
                updateLiveSimulation();
            });
        });

        durationButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                dureeHidden.value = this.dataset.value;
                syncActiveDurationButton();
                updateLiveSimulation();
            });
        });

        if (countrySelect) {
            countrySelect.addEventListener('change', function () {
                countryWasTouched = true;
            });
        }

        whatsappField.hydrateFromHidden();
        whatsappField.updateFlag();

        nextButtons.forEach(button => {
            button.addEventListener('click', function () {
                const nextStep = Number(this.dataset.nextStep);

                if (!validateStep(currentStep)) {
                    return;
                }

                setCurrentStep(nextStep, true);
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener('click', function () {
                setCurrentStep(Number(this.dataset.prevStep), true);
            });
        });

        fetch('https://ipapi.co/json/')
            .then(res => res.json())
            .then(data => {
                const isoCode = String(data.country_code || data.country_code_iso2 || '').toUpperCase();

                if (data.country_calling_code && whatsappCountrySelect && !whatsappWasTouched && !whatsappCountrySelect.value) {
                    whatsappField.selectCountry(data.country_calling_code, isoCode);
                    whatsappField.sync();
                }

                setCountryFromGeo(data);

                if (geoCity) geoCity.value = data.city || '';
                if (geoCountry) geoCountry.value = data.country_name || '';
                if (geoRegion) geoRegion.value = data.region || '';
            })
            .catch(err => console.error('Erreur géo:', err));

        if (form) {
            form.addEventListener('submit', function (e) {
            if (form.dataset.submitted === 'true') {
                e.preventDefault();
                return;
            }

            form.dataset.submitted = 'true';
            lockSubmitButton();

            whatsappField.sync();

            const montant = getCurrentAmount();
            const duree = getCurrentDuree();

            const montantErrorId = 'montant-error';
            const dureeErrorId = 'duree-error';

            let montantErrorEl = document.getElementById(montantErrorId);
            let dureeErrorEl = document.getElementById(dureeErrorId);

            if (montantErrorEl) montantErrorEl.remove();
            if (dureeErrorEl) dureeErrorEl.remove();

            if (isNaN(montant) || montant < loanMinAmount) {
                e.preventDefault();
                unlockSubmitButton();

                montantErrorEl = document.createElement('div');
                montantErrorEl.id = montantErrorId;
                montantErrorEl.className = 'alert alert-danger mt-2';
                montantErrorEl.textContent = @json(loan_page_text('amount_error'));
                document.getElementById('amountGrid').insertAdjacentElement('afterend', montantErrorEl);
                setCurrentStep(1, true);
                return;
            }

            if (isNaN(duree) || duree <= 0) {
                e.preventDefault();
                unlockSubmitButton();

                dureeErrorEl = document.createElement('div');
                dureeErrorEl.id = dureeErrorId;
                dureeErrorEl.className = 'alert alert-danger mt-2';
                dureeErrorEl.textContent = @json(loan_page_text('duration_error'));
                document.getElementById('durationGrid').insertAdjacentElement('afterend', dureeErrorEl);
                setCurrentStep(1, true);
                return;
            }
        });
        }

        hydrateLoanSelectionFromUrl();
        syncActiveAmountButton();
        syncActiveDurationButton();
        updateLiveSimulation();
        setCurrentStep(initialStep, initialStep > 1);
    });
</script>
   
@endsection
