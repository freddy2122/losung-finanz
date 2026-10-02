<ul class="{{ $class }}">
    @if ( !empty($contactLink) )
        <li><a href="{{ routeWithLocale('site.contact_us') }}">{{ translate(73) }}</a></li>
    @endif

    <li><a href="{{ routeWithLocale('site.legal_notice') }}">{{ translate(76) }}</a></li>
    @if (!empty($privacyLink))
        <li><a href="{{ routeWithLocale('site.privacy_policy') }}">{{ translate(683) }}</a></li>
        <li><a href="{{ routeWithLocale('site.accessibility_statement') }}">{{ translate(687) }}</a></li>
        <li><a href="{{ routeWithLocale('site.vulnerability_disclosure') }}">{{ translate(688) }}</a></li>
        <li><a href="{{ routeWithLocale('site.fraud_risks') }}">{{ translate(689) }}</a></li>
    @endif
    <li><a href="{{ routeWithLocale('site.cookie_policy') }}">{{ translate(77) }}</a></li>
    <li><a href="{{ routeWithLocale('site.how_it_works') }}">{{ translate(78) }}</a></li>
</ul>