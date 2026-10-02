@extends('emails.layout')

@section('content')

@php
    $currencyCode = $financing['devise_du_pret'] ?? loan_currency_code_for_locale();
    $documentLabels = [
        'id_card' => translate(623),
        'passport' => translate(624),
    ];
@endphp

<p style="margin:0 0 16px 0;font-size:20px;line-height:1.4;font-weight:700;color:#111111;">
    {{ translate(652) }}
</p>

<p style="margin:0 0 18px 0;font-size:15px;line-height:1.6;color:#374151;">
    {{ translate(653) }} <strong>{{ $fullname }}</strong>
</p>

<div style="margin:0 0 22px 0;padding:18px;background-color:#f9fafb;border:1px solid #e5e7eb;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;border-collapse:collapse;">
        <tr>
            <td style="padding:0 12px 14px 0;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">{{ translate(493) }}</div>
                <div style="font-size:18px;font-weight:700;color:#111111;">
                    {{ isset($financing['montant_du_pret']) ? format_loan_money($financing['montant_du_pret'], $currencyCode) : '-' }}
                </div>
            </td>
            <td style="padding:0 0 14px 12px;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">{{ translate(494) }}</div>
                <div style="font-size:18px;font-weight:700;color:#111111;">{{ $financing['duree_totale_du_pret'] ?? '-' }} {{ translate(495) }}</div>
            </td>
        </tr>
        @if(!empty($job))
        <tr>
            <td style="padding:0 12px 14px 0;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">{{ translate(626) }}</div>
                <div style="font-size:16px;font-weight:700;color:#111111;">{{ $job }}</div>
            </td>
            <td style="padding:0 0 14px 12px;vertical-align:top;width:50%;">
                <div style="font-size:13px;color:#6b7280;">{{ translate(627) }}</div>
                <div style="font-size:16px;font-weight:700;color:#111111;">{{ isset($income) ? format_loan_money($income, $currencyCode) : '-' }}</div>
            </td>
        </tr>
        @endif
        @if(!empty($financing['numero_whatsapp']))
        <tr>
            <td colspan="2" style="padding:0 0 14px 0;vertical-align:top;">
                <div style="font-size:13px;color:#6b7280;">{{ translate(463) }}</div>
                <div style="font-size:16px;font-weight:700;color:#111111;word-break:break-word;">{{ $financing['numero_whatsapp'] }}</div>
            </td>
        </tr>
        @endif
    </table>
</div>

<div style="margin:0 0 24px 0;padding:18px;background:#f9fafb;border:1px solid #e5e7eb;">
    <p style="margin:0 0 14px 0;font-size:16px;line-height:1.5;font-weight:700;color:#111111;">
        {{ translate(646) }}
    </p>

    <div style="padding:0 0 10px 0;margin:0 0 10px 0;border-bottom:1px solid #e5e7eb;">
        <div style="font-size:13px;color:#6b7280;margin-bottom:4px;">{{ translate(628) }}</div>
        <div style="font-size:15px;color:#111111;font-weight:700;">{{ $documentLabels[$document_type] ?? $document_type }}</div>
    </div>

    <ul style="margin:0;padding-left:18px;color:#111111;line-height:1.8;">
        @if($document_type === 'id_card')
            @if($identity_front)
                <li>{{ translate(529) }}</li>
            @endif
            @if($identity_back)
                <li>{{ translate(530) }}</li>
            @endif
        @elseif($passport)
            @if($passport)
                <li>{{ translate(531) }}</li>
            @endif
        @endif
        @if($bank_statement)
            <li>{{ translate(643) }}</li>
        @endif
    </ul>
</div>

<p style="margin:0;font-size:15px;line-height:1.6;color:#374151;">{{ translate(654) }}</p>

@endsection
