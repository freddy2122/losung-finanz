@extends('emails.layout')

@section('content')

<p style="margin:0 0 16px 0;font-size:20px;line-height:1.4;font-weight:700;color:#111111;">
    {{ translate(714) }}
</p>

<p style="margin:0 0 18px 0;font-size:15px;line-height:1.6;color:#374151;">
    {{ translate(715) }}
</p>

<div style="margin:0 0 22px 0;padding:18px;background-color:#f9fafb;border:1px solid #e5e7eb;">
    <p style="margin:0 0 4px 0;font-size:13px;color:#6b7280;">{{ translate(716) }}</p>
    <p style="margin:0 0 16px 0;font-size:16px;font-weight:700;color:#111111;">{{ $data['name'] }}</p>

    <p style="margin:0 0 4px 0;font-size:13px;color:#6b7280;">{{ translate(717) }}</p>
    <p style="margin:0 0 16px 0;font-size:16px;font-weight:700;color:#f59e0b;">
        {{ str_repeat('★', $data['rating']) }}{{ str_repeat('☆', 5 - $data['rating']) }}
        <span style="color:#6b7280;font-weight:400;">({{ $data['rating'] }}/5)</span>
    </p>

    <p style="margin:0 0 4px 0;font-size:13px;color:#6b7280;">{{ translate(718) }}</p>
    <p style="margin:0;font-size:15px;line-height:1.6;color:#111111;white-space:pre-line;">{{ $data['message'] }}</p>
</div>

<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
    <tr>
        <td align="center" style="padding:0 6px 0 0;">
            <a href="{{ $data['approve_url'] }}" style="display:inline-block;background-color:#16a34a;color:#ffffff;text-decoration:none;font-weight:700;font-size:15px;padding:12px 20px;border-radius:6px;">
                {{ translate(719) }}
            </a>
        </td>
        <td align="center" style="padding:0 0 0 6px;">
            <a href="{{ $data['reject_url'] }}" style="display:inline-block;background-color:#dc2626;color:#ffffff;text-decoration:none;font-weight:700;font-size:15px;padding:12px 20px;border-radius:6px;">
                {{ translate(720) }}
            </a>
        </td>
    </tr>
</table>

@endsection
