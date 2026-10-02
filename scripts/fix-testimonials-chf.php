<?php

$root = dirname(__DIR__);
$langDir = $root . '/resources/lang';

$testimonialUpdates = [
    'fr' => [
        'TRAD_341' => "Il serait injuste de ma part de ne pas faire leur éloge. C'est ma curiosité qui m'a poussé à essayer et finalement j'ai pu obtenir ce prêt qui m'a sorti d'une impasse dans laquelle je me trouvais. J'ai rempli les conditions et mon compte a été crédité des 38 000 € que j'avais demandés.",
        'TRAD_344' => "Ma banque BNP m'a facturé plus de 1 000 € de frais bancaires sur 1 an, sans me proposer de solution. Merci (WEBSITE_NAME) de m'avoir aidé à obtenir ce prêt qui m'a permis de me sortir de cette situation.",
        'TRAD_346' => "Je confirme et certifie l'authenticité des témoignages lus à propos de cette structure. Je viens d'obtenir un prêt de 25 000 € grâce à eux. Je vous envoie ce témoignage suite à un service très professionnel que m'a rendu (WEBSITE_NAME) lorsque j'étais à la recherche d'un prêt d'argent.",
    ],
    'en' => [
        'TRAD_341' => 'It would be unfair of me not to praise them. It was my curiosity that pushed me to try and finally I was able to obtain this loan which got me out of a dead end in which I found myself. I fulfilled the conditions and my account was credited with the € 38,000 I had requested.',
        'TRAD_344' => 'My BNP bank charged me more than € 1,000 in bank charges over 1 year without offering me a solution. Thank you (WEBSITE_NAME) for helping me get this loan which got me out of this situation.',
        'TRAD_346' => 'I confirm and certify the authenticity of the testimonials read about this structure. I just obtained a loan of € 25,000 thanks to them. I am sending you this testimonial following a very professional service provided to me by (WEBSITE_NAME) when I was looking for a loan of money.',
    ],
    'de' => [
        'TRAD_341' => 'Es wäre unfair von mir, sie nicht zu loben. Meine Neugier trieb mich zum Ausprobieren und schließlich konnte ich diesen Kredit erhalten, der mich aus einer Sackgasse holte. Ich erfüllte die Bedingungen und mein Konto wurde mit den von mir beantragten 38.000 € gutgeschrieben.',
        'TRAD_344' => 'Meine BNP-Bank berechnete mir über 1 Jahr hinweg mehr als 1.000 € an Bankgebühren, ohne mir eine Lösung anzubieten. Danke (WEBSITE_NAME), dass Sie mir geholfen haben, diesen Kredit zu erhalten.',
        'TRAD_346' => 'Ich bestätige die Echtheit der über diese Struktur gelesenen Zeugnisse. Dank ihnen habe ich gerade einen Kredit über 25.000 € erhalten. Ich sende Ihnen dieses Zeugnis nach einem sehr professionellen Service von (WEBSITE_NAME).',
    ],
    'ch' => null,
    'es' => [
        'TRAD_341' => 'Sería injusto por mi parte no elogiarles. Fue mi curiosidad la que me impulsó a probar y finalmente pude obtener este préstamo que me sacó de un callejón sin salida. Cumplí las condiciones y se abonaron en mi cuenta los 38.000 € que había solicitado.',
        'TRAD_344' => 'Mi banco BNP me cobró más de 1.000 € en comisiones bancarias en 1 año sin ofrecerme una solución. Gracias (WEBSITE_NAME) por ayudarme a obtener este préstamo.',
        'TRAD_346' => 'Confirmo la autenticidad de los testimonios leídos sobre esta estructura. Acabo de obtener un préstamo de 25.000 € gracias a ellos, tras un servicio muy profesional de (WEBSITE_NAME).',
    ],
    'it' => [
        'TRAD_341' => 'Sarebbe ingiusto da parte mia non elogiarli. La mia curiosità mi ha spinto a provare e finalmente sono riuscita a ottenere questo prestito che mi ha tirato fuori da un vicolo cieco. Ho soddisfatto le condizioni e sul mio conto sono stati accreditati i 38.000 € che avevo richiesto.',
        'TRAD_344' => 'La mia banca BNP mi ha addebitato più di 1.000 € di spese bancarie in 1 anno senza offrirmi una soluzione. Grazie (WEBSITE_NAME) per avermi aiutato a ottenere questo prestito.',
        'TRAD_346' => 'Confermo l\'autenticità delle testimonianze lette su questa struttura. Ho appena ottenuto un prestito di 25.000 € grazie a loro, dopo un servizio molto professionale di (WEBSITE_NAME).',
    ],
    'pt' => [
        'TRAD_341' => 'Seria injusto da minha parte não elogiá-los. A minha curiosidade levou-me a tentar e finalmente consegui obter este empréstimo que me tirou de um beco sem saída. Cumpri as condições e a minha conta foi creditada com os 38.000 € que solicitei.',
        'TRAD_344' => 'O meu banco BNP cobrou-me mais de 1.000 € em despesas bancárias ao longo de 1 ano sem me oferecer uma solução. Obrigado (WEBSITE_NAME) por me ajudar a obter este empréstimo.',
        'TRAD_346' => 'Confirmo a autenticidade dos depoimentos lidos sobre esta estrutura. Acabei de obter um empréstimo de 25.000 € graças a eles, após um serviço muito profissional da (WEBSITE_NAME).',
    ],
    'nl' => [
        'TRAD_341' => 'Het zou oneerlijk zijn als ik hen niet zou prijzen. Mijn nieuwsgierigheid dreef me om het te proberen en uiteindelijk kon ik deze lening krijgen die me uit een impasse haalde. Ik voldeed aan de voorwaarden en mijn rekening werd gecrediteerd met de 38.000 € die ik had aangevraagd.',
        'TRAD_344' => 'Mijn BNP-bank rekende me meer dan 1.000 € aan bankkosten in 1 jaar zonder een oplossing te bieden. Bedankt (WEBSITE_NAME) voor de hulp bij deze lening.',
        'TRAD_346' => 'Ik bevestig de authenticiteit van de getuigenissen over deze structuur. Ik heb dankzij hen net een lening van 25.000 € gekregen na een zeer professionele service van (WEBSITE_NAME).',
    ],
];

$testimonialUpdates['ch'] = $testimonialUpdates['de'];

$legalLinkUpdates = [
    'fr' => [
        'TRAD_698' => 'Vous pouvez consulter notre',
    ],
    'en' => [
        'TRAD_698' => 'You can read our',
    ],
    'de' => [
        'TRAD_698' => 'Sie können unsere',
    ],
    'es' => [
        'TRAD_698' => 'Puede consultar nuestra',
    ],
    'it' => [
        'TRAD_698' => 'Può consultare la nostra',
    ],
    'pt' => [
        'TRAD_698' => 'Pode consultar a nossa',
    ],
    'nl' => [
        'TRAD_698' => 'U kunt ons',
    ],
];

$legalLinkUpdates['ch'] = $legalLinkUpdates['de'];

$fallback = 'en';

foreach (glob($langDir . '/*.json') as $file) {
    $locale = basename($file, '.json');
    $data = json_decode(file_get_contents($file), true);
    if (!is_array($data)) {
        continue;
    }

    $source = $testimonialUpdates[$locale] ?? $testimonialUpdates[$fallback] ?? [];
    foreach ($source as $key => $value) {
        $data[$key] = $value;
    }

    $legal = $legalLinkUpdates[$locale] ?? $legalLinkUpdates[$fallback] ?? [];
    foreach ($legal as $key => $value) {
        $data[$key] = $value;
    }

    if (!isset($testimonialUpdates[$locale])) {
        foreach (['TRAD_341', 'TRAD_344', 'TRAD_346'] as $key) {
            if (!isset($data[$key])) {
                continue;
            }
            $data[$key] = preg_replace('/€\s?([\d\s\.,]+)/u', '$1 €', $data[$key]);
            $data[$key] = preg_replace('/([\d\s\.,]+)\s?€/u', '$1 €', $data[$key]);
            $data[$key] = preg_replace('/([\d\s\.,]+)\s?euro(s)?/iu', '$1 €', $data[$key]);
            $data[$key] = preg_replace('/([\d\s\.,]+)\s?evro/u', '$1 €', $data[$key]);
        }
    }

    ksort($data, SORT_STRING);
    file_put_contents(
        $file,
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n"
    );
    echo "Updated {$locale}.json\n";
}

echo "Testimonials and TRAD_698 synced.\n";
