<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ translate(489) }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #28a745;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            line-height: 1.3;
        }

        .content {
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }

        .content p {
            margin: 0 0 14px;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 18px;
            margin: 16px 0;
        }

        .docs-box {
            background: #ecfdf5;
            border: 2px solid #16a34a;
            border-radius: 14px;
            padding: 18px;
            margin: 0 0 18px;
        }

        .docs-box-title {
            font-size: 17px;
            font-weight: 800;
            color: #14532d;
            margin: 0 0 10px;
        }

        .docs-box p {
            color: #166534;
        }

        .docs-button {
            display: inline-block;
            background: #16a34a;
            color: #ffffff !important;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 800;
            text-decoration: none;
            margin-top: 12px;
        }

        .info-row {
            margin-bottom: 14px;
        }

        .info-label {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        .info-value.ref {
            font-size: 18px;
            font-weight: 800;
        }

        .footer {
            background-color: #f5f5f5;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #888;
            border-top: 1px solid #eee;
        }

        .footer a {
            color: #28a745;
            text-decoration: none;
        }

    </style>
</head>

<body>
<div class="email-container">

    <div class="header">
        <h1>{{ translate(614) }}</h1>
    </div>

    <div class="content">

        @php
            $hour = now()->hour;
            $greeting = $hour < 18 ? 501 : 502;
        @endphp

        <p>{{ translate($greeting) }} <b>{{ $fullname }}</b>,</p>

        <div class="docs-box">
            <p class="docs-box-title">{{ translate(646) }}</p>
            <p>{{ translate(590) }}</p>
            <p><strong>{{ translate(615) }}</strong></p>
            @if(!empty($complete_documents_url))
                <a href="{{ $complete_documents_url }}" class="docs-button">{{ translate(617) }}</a>
            @endif
        </div>

        <div class="info-box">

            <div class="info-row">
                <div class="info-label">{{ translate(493) }}</div>
                <div class="info-value">
                    {{ isset($financing['montant_du_pret'])
                        ? format_loan_money($financing['montant_du_pret'], $financing['devise_du_pret'] ?? loan_currency_code_for_locale())
                        : '' }}
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">{{ translate(494) }}</div>
                <div class="info-value">
                    {{ $financing['duree_totale_du_pret'] ?? '' }} {{ translate(495) }}
                </div>
            </div>

        </div>

        <p>{{ translate(496) }}</p>

        <p>
            {{ translate(497) }}
            <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>.
        </p>

        <p>
            {{ translate(499) }},<br>
            <strong>{{ translate(500) }}</strong>
        </p>

    </div>

    <div class="footer">
        <p>&copy; {{ WEBSITE_CREATED_DATE }} <strong>{{ SITE_NAME }}</strong>. {{ translate(372) }}</p>
    </div>

</div>
</body>
</html>
