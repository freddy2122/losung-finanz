@extends('layouts.default')

@section('content')

<style>
    .cfs-page {
        max-width: 720px;
        margin: 0 auto;
        padding: 0 14px;
    }

    .cfs-card {
        background: #fff;
        border: 1px solid #e7eaef;
        border-radius: 24px;
        padding: 30px 22px;
        box-shadow: 0 10px 26px rgba(15, 23, 42, 0.04);
        margin: 32px 0 28px;
        text-align: center;
    }

    .cfs-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #ecfdf3;
        color: #15803d;
        border: 1px solid #bbf7d0;
        border-radius: 999px;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .cfs-title {
        margin: 0 0 14px;
        font-size: 28px;
        line-height: 1.15;
        font-weight: 800;
        color: #0f172a;
    }

    .cfs-text {
        margin: 0 auto 14px;
        max-width: 560px;
        font-size: 15px;
        line-height: 1.8;
        color: #6b7280;
    }

    .cfs-box {
        background: #f8fafc;
        border: 1px solid #e8edf3;
        border-radius: 18px;
        padding: 18px;
        margin: 22px 0 0;
        text-align: left;
    }

    .cfs-box-label {
        display: block;
        margin-bottom: 6px;
        font-size: 13px;
        color: #6b7280;
    }

    .cfs-box-value {
        font-size: 20px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.3;
        word-break: break-word;
    }

    .cfs-actions {
        margin-top: 22px;
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cfs-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 52px;
        padding: 0 22px;
        border-radius: 16px;
        font-size: 15px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s ease;
    }

    .cfs-btn-primary {
        background: #1fad49;
        color: #fff;
        box-shadow: 0 12px 26px rgba(31,173,73,.18);
    }

    .cfs-btn-secondary {
        background: #fff;
        color: #0f172a;
        border: 1px solid #dfe5ec;
    }

    .cfs-btn:hover {
        transform: translateY(-1px);
    }

    @media (max-width: 767px) {
        .cfs-page {
            padding: 0 10px;
        }

        .cfs-card {
            padding: 24px 18px;
            border-radius: 22px;
            margin-top: 22px;
        }

        .cfs-title {
            font-size: 27px;
        }

        .cfs-actions {
            flex-direction: column;
        }

        .cfs-btn {
            width: 100%;
        }
    }
</style>

<div class="container pt-4 pb-5">
    <div class="cfs-page">

        <div class="cfs-card">
            <div class="cfs-badge">✔ {{ translate(567) }}</div>

            <h1 class="cfs-title">{{ translate(568) }}</h1>

            <p class="cfs-text" style="margin-bottom:20px;">
    {{ translate(575) }}
</p>

<p class="cfs-text">
    {{ translate(576) }}
</p>

            <p style="
    margin-top: 22px;
    font-size: 14px;
    color: #16a34a;
    font-weight: 700;
">
    🔒 {{ translate(574) }}
</p>
        </div>

    </div>
</div>

@endsection