@php
    $parts = site_logo_parts();
    $variant = $attributes->get('variant', 'header');
@endphp

<a {{ $attributes->merge(['class' => 'site-brand-logo site-brand-logo--' . $variant, 'href' => routeWithLocale('site.index'), 'aria-label' => $parts['full']]) }}>
    <span class="site-brand-logo__flag" aria-hidden="true">
        <img src="{{ site_favicon() }}" alt="" width="44" height="44" loading="eager" decoding="async">
    </span>
    <span class="site-brand-logo__wordmark">
        <span class="site-brand-logo__primary">{{ $parts['primary'] }}</span><span class="site-brand-logo__accent">{{ $parts['secondary'] }}</span>
    </span>
</a>
