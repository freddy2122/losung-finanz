<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ translate(547) }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 12px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .header {
            background-color: #28a745;
            color: #ffffff;
            text-align: center;
            padding: 14px 18px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
        }

        .content {
            padding: 16px 18px 18px;
            color: #333;
            line-height: 1.55;
        }

        .content p {
            margin: 0 0 10px;
            font-size: 15px;
        }

        .reference-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 12px 14px;
            margin: 14px 0;
        }

        .reference-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .reference-value {
            font-size: 20px;
            font-weight: 800;
            color: #111827;
            word-break: break-word;
            user-select: all;
            cursor: text;
        }

        .reference-help {
            margin-top: 8px;
            font-size: 13px;
            color: #6b7280;
        }

        .footer {
            background: #f5f5f5;
            text-align: center;
            padding: 10px 14px;
            font-size: 13px;
            color: #888;
            border-top: 1px solid #eee;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        .button {
            display: block;
            background: #16a34a;
            color: #ffffff;
            padding: 13px 16px;
            border-radius: 10px;
            font-weight: 800;
            margin: 0 0 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="email-container">

        <div class="header">
            <h1>{{ translate(547) }}</h1>
        </div>

        <div class="content">

            @php
                $hour = now()->hour;
                $greeting = $hour < 18 ? 501 : 502;
            @endphp

            <p>{{ translate($greeting) }} <strong>{{ $fullname }}</strong>,</p>

            <p>{{ translate(614) }}</p>

            <p>{{ translate(615) }}</p>

            <p>{{ translate(616) }}</p>

            <p>{{ translate(550) }}</p>

            <p>
                {{ translate(552) }}
                <a href="mailto:{{ SITE_EMAIL }}">{{ SITE_EMAIL }}</a>.
            </p>

            <p>
                {{ translate(499) }},<br>
                <strong>{{ translate(500) }}</strong>
            </p>

        </div>

        <div class="footer">
            &copy; {{ WEBSITE_CREATED_DATE }} {{ SITE_NAME }} — {{ translate(372) }}
        </div>

    </div>
</body>
</html>
