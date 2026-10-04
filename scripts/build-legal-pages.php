<?php

$root = dirname(__DIR__);
$elementsDir = $root . '/resources/views/elements';

$locales = [
    'fr', 'en', 'de', 'ch', 'es', 'it', 'pt', 'nl', 'pl', 'sv', 'fi', 'el', 'cs', 'sk', 'sl', 'hr', 'ro',
    'bg', 'da', 'no', 'et', 'lt', 'lv', 'hu', 'ru', 'tr', 'hy', 'kk', 'ky', 'mn', 'tg', 'uz', 'lb', 'sq',
];

function writePageFiles(string $slug, array $contentsByLocale, array $locales, string $elementsDir): void
{
    $dir = $elementsDir . '/' . $slug;
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $fallback = $contentsByLocale['en'] ?? reset($contentsByLocale);

    foreach ($locales as $locale) {
        $content = $contentsByLocale[$locale] ?? $fallback;
        if ($locale === 'ch' && !isset($contentsByLocale['ch'])) {
            $content = $contentsByLocale['de'] ?? $fallback;
        }
        file_put_contents($dir . '/' . $locale . '.txt', $content);
    }
}

$accessibility = [
    'fr' => <<<'HTML'
<h2>Accessibilité : partiellement conforme</h2>
<p>(WEBSITE_NAME) s'engage à rendre son site internet accessible conformément à l'article 47 de la loi n° 2005-102 du 11 février 2005. À cette fin, il met en œuvre la stratégie et les actions détaillées dans son schéma pluriannuel. Cette déclaration d'accessibilité s'applique au site (WEBSITE_NAME).</p>
<p>Le site (WEBSITE_NAME) est partiellement conforme avec le RGAA 4.1 de niveau Double-A (AA) en raison des non-conformités et des dérogations énumérées ci-dessous.</p>
<p>L'audit de conformité réalisé révèle que 70,77&nbsp;% des critères RGAA 4.1 de niveau Double-A (AA) sont respectés.</p>

<h2>Contenus non accessibles</h2>
<p>Les contenus listés ci-dessous ne sont pas accessibles pour les raisons suivantes.</p>
<h3>Non-conformités</h3>
<p>Plusieurs éléments de non-conformité sont décrits dans ce document, dont certains récurrents sur plusieurs pages :</p>
<ul>
<li>Certaines images à vocation informative ne possèdent pas de description détaillée.</li>
<li>Des informations sont transmises uniquement par la couleur, sans alternative textuelle ou visuelle.</li>
<li>Le contraste entre le texte et l'arrière-plan est insuffisant sur certains éléments.</li>
<li>Le contraste de certains éléments graphiques porteurs d'information est insuffisant.</li>
<li>Les vidéos présentes ne disposent pas systématiquement d'une transcription ou d'une audiodescription.</li>
<li>Certains tableaux de données sont dépourvus de titre.</li>
<li>Certains liens ne sont pas explicites hors contexte.</li>
<li>Certains scripts ne sont pas accessibles aux technologies d'assistance.</li>
<li>Certains scripts ne sont pas utilisables à la fois au clavier et à la souris.</li>
<li>Le code source de certaines pages contient des erreurs de validité.</li>
<li>Le titre de certaines pages n'est pas pertinent.</li>
<li>Certaines balises sont utilisées à des fins purement visuelles, ce qui nuit à la structure sémantique.</li>
<li>La présentation repose partiellement sur des attributs HTML au lieu de feuilles de style CSS.</li>
<li>Le zoom à 200&nbsp;% rend difficile la lecture de certains contenus textuels.</li>
<li>Les couleurs de fond et de police ne sont pas toujours correctement définies dans les feuilles de style.</li>
<li>Le focus clavier n'est pas toujours visible lors de la navigation.</li>
<li>Les propriétés d'espacement du texte ne respectent pas toujours les exigences minimales d'accessibilité.</li>
<li>Certains documents bureautiques disponibles en téléchargement ne sont pas accessibles.</li>
<li>Le contenu ne s'adapte pas toujours correctement au changement d'orientation de l'écran (portrait/paysage).</li>
</ul>

<h3>Dérogations pour charge disproportionnée</h3>
<p>Pas de dérogation identifiée.</p>

<h3>Contenus non soumis à l'obligation d'accessibilité</h3>
<p>Pas de contenus non soumis à l'obligation d'accessibilité.</p>

<h2>Établissement de cette déclaration d'accessibilité</h2>
<p>Cette déclaration a été établie le 16/04/2025 et a été mise à jour le 15/07/2025.</p>
<p><strong>Technologies utilisées pour la réalisation du site web :</strong></p>
<ul>
<li>HTML5</li>
<li>CSS3</li>
<li>JavaScript</li>
</ul>
<p><strong>Tests des pages web :</strong></p>
<ul>
<li>Mozilla Firefox et lecteur d'écran NVDA</li>
<li>Safari et VoiceOver</li>
</ul>
<p><strong>Outils utilisés lors de l'évaluation :</strong></p>
<ul>
<li>WAVE</li>
<li>axe DevTools</li>
<li>Colour Contrast Analyser</li>
</ul>

<h2>Retour d'information et contact</h2>
<p>Si vous n'arrivez pas à accéder à un contenu ou à un service, vous pouvez contacter le responsable du site web pour être orienté vers une alternative accessible ou obtenir le contenu sous une autre forme.</p>
<p>Contacter le webmaster du site (WEBSITE_NAME) à l'adresse suivante : (WEBSITE_EMAIL).</p>

<h2>Voies de recours</h2>
<p>Cette procédure est à utiliser dans le cas suivant : vous avez signalé au responsable du site internet un défaut d'accessibilité qui vous empêche d'accéder à un contenu ou à un des services du portail et vous n'avez pas obtenu de réponse satisfaisante.</p>
<p>Vous pouvez signaler le problème au Défenseur des droits (<a href="https://www.defenseurdesdroits.fr/" rel="noopener noreferrer" target="_blank">www.defenseurdesdroits.fr</a>) ou contacter le délégué du Défenseur des droits dans votre région.</p>
HTML,
    'en' => <<<'HTML'
<h2>Accessibility: partially compliant</h2>
<p>(WEBSITE_NAME) is committed to making its website accessible in accordance with applicable accessibility regulations. This accessibility statement applies to the (WEBSITE_NAME) website.</p>
<p>The (WEBSITE_NAME) website is partially compliant with RGAA 4.1 level Double-A (AA) due to the non-conformities and exemptions listed below.</p>
<p>The compliance audit shows that 70.77% of RGAA 4.1 Double-A (AA) criteria are met.</p>

<h2>Non-accessible content</h2>
<p>The content listed below is not accessible for the following reasons.</p>
<h3>Non-conformities</h3>
<ul>
<li>Some informative images do not have a detailed description.</li>
<li>Information is conveyed by colour alone, without a textual or visual alternative.</li>
<li>Contrast between text and background is insufficient on some elements.</li>
<li>Some links are not explicit out of context.</li>
<li>Some scripts are not accessible to assistive technologies.</li>
<li>Keyboard focus is not always visible during navigation.</li>
</ul>

<h3>Disproportionate burden exemptions</h3>
<p>No exemption identified.</p>

<h3>Content not subject to accessibility requirements</h3>
<p>No content excluded from accessibility requirements.</p>

<h2>Preparation of this accessibility statement</h2>
<p>This statement was established on 16/04/2025 and updated on 15/07/2025.</p>
<p><strong>Technologies used:</strong> HTML5, CSS3, JavaScript.</p>
<p><strong>Testing:</strong> Firefox with NVDA; Safari with VoiceOver.</p>
<p><strong>Evaluation tools:</strong> WAVE, axe DevTools, Colour Contrast Analyser.</p>

<h2>Feedback and contact</h2>
<p>If you are unable to access content or a service, please contact the website manager at: (WEBSITE_EMAIL).</p>

<h2>Enforcement procedure</h2>
<p>If you reported an accessibility issue to the website manager and did not receive a satisfactory response, you may contact the relevant supervisory authority in your country.</p>
HTML,
    'de' => <<<'HTML'
<h2>Barrierefreiheit: teilweise konform</h2>
<p>(WEBSITE_NAME) verpflichtet sich, seine Website barrierefrei zu gestalten. Diese Erklärung gilt für die Website von (WEBSITE_NAME).</p>
<p>Die Website ist teilweise konform mit RGAA 4.1 Stufe Double-A (AA) aufgrund der unten aufgeführten Nichtkonformitäten.</p>
<p>Das Konformitätsaudit zeigt, dass 70,77&nbsp;% der RGAA-4.1-Kriterien der Stufe Double-A (AA) eingehalten werden.</p>

<h2>Nicht zugängliche Inhalte</h2>
<h3>Nichtkonformitäten</h3>
<ul>
<li>Einige informative Bilder haben keine detaillierte Beschreibung.</li>
<li>Informationen werden nur durch Farbe vermittelt.</li>
<li>Der Kontrast zwischen Text und Hintergrund ist bei einigen Elementen unzureichend.</li>
<li>Einige Links sind außerhalb des Kontexts nicht eindeutig.</li>
<li>Einige Skripte sind für Hilfstechnologien nicht zugänglich.</li>
</ul>

<h2>Erstellung dieser Erklärung</h2>
<p>Diese Erklärung wurde am 16.04.2025 erstellt und am 15.07.2025 aktualisiert.</p>
<p><strong>Technologien:</strong> HTML5, CSS3, JavaScript.</p>

<h2>Rückmeldung und Kontakt</h2>
<p>Bei Problemen mit der Zugänglichkeit kontaktieren Sie uns unter: (WEBSITE_EMAIL).</p>
HTML,
];

$vulnerability = [
    'fr' => <<<'HTML'
<h2>Sécurité et transparence</h2>
<h3>Notre engagement</h3>
<p>Nous considérons que la sécurité de nos clients est l'une de nos principales priorités. C'est pourquoi nous concevons des produits et services de la meilleure qualité et fiabilité possible. Malgré nos efforts pour mettre en œuvre les meilleures mesures de sécurité possibles, des vulnérabilités peuvent encore être présentes dans nos produits, services et systèmes.</p>
<p>Ce document décrit la politique de (WEBSITE_NAME) en matière de réception de rapports sur les vulnérabilités potentielles de ses produits et services en matière de sécurité.</p>
<p>Chacun est encouragé à signaler les vulnérabilités identifiées, quel que soit le type de service ou de produit. Chercheurs, partenaires, CERT, clients ou toute autre source sont les bienvenus pour signaler les vulnérabilités.</p>

<h2>Comment déclarer une potentielle faille de sécurité ?</h2>
<p>Pour toute déclaration de vulnérabilité, merci de nous contacter par e-mail à l'adresse suivante : (WEBSITE_EMAIL).</p>
<p>Afin d'améliorer la prise en charge et l'identification de la vulnérabilité, merci d'inclure le maximum d'informations disponibles. Veuillez ne pas inclure de données personnelles dans vos rapports, en dehors des informations nécessaires pour vous contacter.</p>
<p>Le traitement est destiné uniquement aux fins de signaler les vulnérabilités en matière de sécurité des services. Il ne s'agit pas d'informations d'assistance technique sur nos services. Tout contenu autre que celui spécifique aux vulnérabilités de sécurité de nos services ne sera pas traité.</p>

<h2>Le traitement de votre déclaration</h2>
<p>Suite à votre déclaration, nos équipes analyseront son contenu afin de valider la qualification de vulnérabilité dans les plus brefs délais. (WEBSITE_NAME) engagera ensuite un dialogue pour discuter des problèmes identifiés et vous informer de chaque étape de l'enquête.</p>
<p>De plus, aucune rémunération n'est prévue dans le cadre de ce programme, et ce même si la faille de vulnérabilité est avérée. Pour des raisons de sécurité, aucune publication des failles et de leur résolution ne sera faite.</p>
<p>(WEBSITE_NAME) reste seul juge de la classification de la vulnérabilité et de la catégorisation du risque qui en découle. Le traitement et le délai de résolution des vulnérabilités restent à la discrétion de (WEBSITE_NAME).</p>

<h2>Exigences en matière de divulgation</h2>
<p>En soumettant à (WEBSITE_NAME) votre déclaration de vulnérabilité, vous vous engagez à :</p>
<ul>
<li>Vous conformer aux lois applicables ;</li>
<li>Ne pas effectuer d'attaques par déni de service ou par épuisement des ressources ;</li>
<li>Utiliser les systèmes (WEBSITE_NAME) sans but de nuire à l'entreprise, à ses clients, à ses employés ou à ses tiers ;</li>
<li>Ne pas utiliser, diffuser, modifier ou effacer des données auxquelles vous pourriez accéder en exploitant la vulnérabilité ;</li>
<li>Ne pas effectuer d'ingénierie sociale, de spam ou d'attaques de phishing à l'encontre des employés de (WEBSITE_NAME), de ses tiers ou de ses clients ;</li>
<li>Ne pas tester la sécurité physique des biens de (WEBSITE_NAME), de ses tiers ou de ses clients ;</li>
<li>Ne pas divulguer les informations relatives à cette déclaration, la vulnérabilité signalée, ni le fait qu'une vulnérabilité a été signalée à (WEBSITE_NAME).</li>
</ul>
<p>(WEBSITE_NAME) s'engage à ne pas poursuivre en justice les parties déclarantes qui soumettent des rapports respectant ces règles.</p>
<p>La déclaration d'une vulnérabilité ne vous confère aucun droit de propriété intellectuelle sur des actifs appartenant à (WEBSITE_NAME) ou à l'un de ses tiers.</p>
<p>Tous les aspects de ce processus sont sujets à changement sans préavis, ainsi qu'à des exceptions au cas par cas.</p>
<p>(WEBSITE_NAME) apprécie les efforts déployés par l'auteur du rapport pour identifier la vulnérabilité. Nous vous remercions de votre contribution pour améliorer la sécurité de nos produits et systèmes.</p>
HTML,
    'en' => <<<'HTML'
<h2>Security and transparency</h2>
<h3>Our commitment</h3>
<p>We consider the security of our customers to be one of our main priorities. Despite our efforts to implement the best possible security measures, vulnerabilities may still exist in our products, services and systems.</p>
<p>This document describes (WEBSITE_NAME)'s policy for receiving reports on potential security vulnerabilities in its products and services.</p>
<p>Everyone is encouraged to report identified vulnerabilities, regardless of the type of service or product.</p>

<h2>How to report a potential security flaw</h2>
<p>For any vulnerability report, please contact us by email at: (WEBSITE_EMAIL).</p>
<p>Please include as much information as possible. Do not include personal data in your reports beyond what is necessary to contact you.</p>
<p>Reports are processed solely for the purpose of reporting security vulnerabilities in our services.</p>

<h2>Processing your report</h2>
<p>After your report, our teams will analyse its content to validate the vulnerability qualification as quickly as possible. (WEBSITE_NAME) will then engage in a dialogue to discuss the identified issues.</p>
<p>No remuneration is provided under this programme, even if the vulnerability is confirmed. For security reasons, no publication of flaws or their resolution will be made.</p>
<p>(WEBSITE_NAME) remains the sole judge of vulnerability classification and resulting risk categorisation.</p>

<h2>Disclosure requirements</h2>
<ul>
<li>Comply with applicable laws;</li>
<li>Do not perform denial-of-service or resource exhaustion attacks;</li>
<li>Use (WEBSITE_NAME) systems without intent to harm the company, its customers, employees or third parties;</li>
<li>Do not use, disclose, modify or delete data accessed by exploiting the vulnerability;</li>
<li>Do not perform social engineering, spam or phishing attacks against (WEBSITE_NAME) employees, third parties or customers;</li>
<li>Do not test the physical security of (WEBSITE_NAME), third-party or customer property;</li>
<li>Do not disclose information relating to this policy, the reported vulnerability, or the fact that a vulnerability was reported to (WEBSITE_NAME).</li>
</ul>
<p>(WEBSITE_NAME) commits not to pursue legal action against reporters who submit reports complying with these rules.</p>
HTML,
    'de' => <<<'HTML'
<h2>Sicherheit und Transparenz</h2>
<p>Die Sicherheit unserer Kunden ist eine unserer Hauptprioritäten. Trotz unserer Bemühungen können weiterhin Schwachstellen in unseren Produkten, Dienstleistungen und Systemen vorhanden sein.</p>
<p>Dieses Dokument beschreibt die Richtlinie von (WEBSITE_NAME) zur Entgegennahme von Berichten über potenzielle Sicherheitsschwachstellen.</p>

<h2>Wie meldet man eine potenzielle Sicherheitslücke?</h2>
<p>Für jede Meldung kontaktieren Sie uns bitte per E-Mail unter: (WEBSITE_EMAIL).</p>
<p>Bitte geben Sie so viele Informationen wie möglich an und fügen Sie keine unnötigen personenbezogenen Daten bei.</p>

<h2>Behandlung Ihrer Meldung</h2>
<p>Nach Ihrer Meldung analysieren unsere Teams den Inhalt, um die Qualifikation als Schwachstelle zu validieren. Es ist keine Vergütung vorgesehen.</p>

<h2>Anforderungen an die Offenlegung</h2>
<ul>
<li>Einhaltung geltender Gesetze;</li>
<li>Keine Denial-of-Service-Angriffe;</li>
<li>Keine schädliche Nutzung der Systeme von (WEBSITE_NAME);</li>
<li>Keine unbefugte Nutzung, Verbreitung oder Löschung von Daten;</li>
<li>Keine Social-Engineering-, Spam- oder Phishing-Angriffe;</li>
<li>Keine Tests der physischen Sicherheit;</li>
<li>Keine Offenlegung der gemeldeten Schwachstelle.</li>
</ul>
HTML,
];

$fraud = [
    'fr' => <<<'HTML'
<h2>Protégez-vous contre la fraude</h2>
<p>Nous prenons la menace de fraude très au sérieux et nous avons mis en place des politiques et des procédures pour protéger nos clients et nos investisseurs.</p>
<p>Nous vous invitons, en tant que clients, investisseurs et partenaires commerciaux, à rester vigilants face au risque de fraude et aux communications frauduleuses, afin de nous aider à lutter contre la fraude au niveau mondial.</p>

<h2>Recommandations importantes</h2>
<p>Nous vous recommandons en particulier de rester attentifs face aux dangers de fraude, notamment la fraude aux investissements et aux paiements*, même si les documents ou les sites Internet font référence à de véritables produits et apparaissent légitimes.</p>
<p>Les investisseurs potentiels doivent faire preuve d'une extrême prudence. (WEBSITE_NAME) déclinera toute responsabilité concernant les pertes potentielles que vous pourriez subir.</p>

<h2>Sociétés non affiliées</h2>
<p>Nous vous confirmons que les sociétés suivantes ne sont pas affiliées de quelque manière que ce soit à (WEBSITE_NAME), ni n'en font pas partie :</p>
<ul>
<li>Caisse Régionale de Codifis-Portugal Mutuel de la Martinique et de la Guyane ;</li>
<li>Codifis-Portugal Italia S.p.A (clone utilisant le SWIFT CODE CATDITR1, qui ne fait pas partie des codes SWIFT du Groupe).</li>
</ul>
<p>Le cas échéant, ces problèmes auront été signalés à la Financial Conduct Authority (FCA) et/ou à Action Fraud.</p>
<p>Si vous avez perdu de l'argent suite à une escroquerie, nous vous invitons à contacter Action Fraud ou les autorités compétentes de votre pays, ainsi que (WEBSITE_NAME) à l'adresse : (WEBSITE_EMAIL).</p>

<h2>Types de fraudes</h2>
<h3>Fraude aux investissements et aux paiements*</h3>
<p>Dans le cadre d'une fraude aux investissements et aux paiements, la victime est invitée à envoyer une somme forfaitaire qui sera utilisée pour investir dans des obligations ou dans un fonds fictif(s) offert(s) par la « banque ».</p>

<h3>Fraude aux paiements (fraude aux avances de frais)*</h3>
<p>Dans le cadre d'une fraude aux paiements (ou fraude aux avances de frais), la victime effectue un paiement d'avance en faveur de la « banque », afin de recevoir un service. Il peut par exemple s'agir de « frais administratifs » pour un prêt ou de « frais juridiques » pour permettre à la « banque » de traiter un « héritage » sous la forme d'une somme forfaitaire. Il est alors demandé à la victime de réaliser le paiement avant que le prêt ne soit accepté ou que la somme ne soit perçue, après quoi les escrocs ne donneront plus jamais de nouvelles.</p>

<p><em>* Ces descriptions sont fournies à titre informatif pour sensibiliser nos clients et partenaires.</em></p>
HTML,
    'en' => <<<'HTML'
<h2>Protect yourself against fraud</h2>
<p>We take the threat of fraud very seriously and have implemented policies and procedures to protect our customers and investors.</p>
<p>We invite you, as customers, investors and business partners, to remain vigilant against the risk of fraud and fraudulent communications, to help us fight fraud worldwide.</p>

<h2>Important recommendations</h2>
<p>We particularly recommend that you remain alert to the dangers of fraud, especially investment and payment fraud*, even if documents or websites refer to genuine products and appear legitimate.</p>
<p>Potential investors should exercise extreme caution. (WEBSITE_NAME) accepts no liability for potential losses you may suffer.</p>

<h2>Unaffiliated companies</h2>
<p>We confirm that the following companies are in no way affiliated with (WEBSITE_NAME), nor are they part of it.</p>
<p>If you have lost money as a result of a scam, please contact the relevant authorities in your country and (WEBSITE_NAME) at: (WEBSITE_EMAIL).</p>

<h2>Types of fraud</h2>
<h3>Investment and payment fraud*</h3>
<p>In investment and payment fraud, the victim is invited to send a lump sum to invest in bonds or fictitious fund(s) offered by the « bank ».</p>

<h3>Payment fraud (advance fee fraud)*</h3>
<p>In payment fraud (or advance fee fraud), the victim makes an advance payment to the « bank » to receive a service, such as « administrative fees » for a loan or « legal fees » to process an « inheritance ». The victim is asked to pay before the loan is approved or the sum received, after which the fraudsters disappear.</p>
HTML,
    'de' => <<<'HTML'
<h2>Schützen Sie sich vor Betrug</h2>
<p>Wir nehmen die Bedrohung durch Betrug sehr ernst und haben Richtlinien und Verfahren zum Schutz unserer Kunden und Investoren eingeführt.</p>
<p>Wir laden Sie ein, wachsam gegenüber Betrugsrisiken und betrügerischen Mitteilungen zu bleiben.</p>

<h2>Wichtige Empfehlungen</h2>
<p>Seien Sie insbesondere wachsam gegenüber Investitions- und Zahlungsbetrug*, auch wenn Dokumente oder Websites legitim erscheinen.</p>
<p>Potenzielle Investoren sollten äußerste Vorsicht walten lassen. (WEBSITE_NAME) übernimmt keine Haftung für mögliche Verluste.</p>

<h2>Nicht verbundene Unternehmen</h2>
<p>Wir bestätigen, dass bestimmte Unternehmen in keiner Weise mit (WEBSITE_NAME) verbunden sind.</p>
<p>Bei finanziellen Verlusten durch Betrug kontaktieren Sie bitte die zuständigen Behörden und (WEBSITE_EMAIL).</p>

<h2>Arten von Betrug</h2>
<h3>Investitions- und Zahlungsbetrug*</h3>
<p>Die Opfer werden aufgefordert, einen Pauschalbetrag zu senden, der angeblich in Anleihen oder fiktive Fonds investiert wird.</p>

<h3>Zahlungsbetrug (Vorschussbetrug)*</h3>
<p>Die Opfer leisten eine Vorauszahlung an die « Bank », z.&nbsp;B. für « Verwaltungsgebühren » oder « Rechtskosten », bevor ein angeblicher Kredit oder ein Erbe ausgezahlt wird.</p>
HTML,
];

$privacy = [
    'fr' => <<<'HTML'
<h2>Politique de protection des données</h2>
<p>En tant que responsable de traitement (AUTHOR_NAME), (WEBSITE_NAME) traite vos données personnelles conformément à la réglementation en vigueur, notamment le Règlement général sur la protection des données (RGPD) et la législation suisse applicable. L'objectif de cette politique est de vous informer clairement sur les traitements que nous opérons sur vos données à caractère personnel.</p>
<p>(WEBSITE_NAME) vous accompagne dans la recherche d'offres de financement auprès de partenaires bancaires suisses, dans le respect des standards suisses et des exigences de la FINMA (Autorité fédérale de surveillance des marchés financiers).</p>

<h2>Pourquoi cette politique vous concerne</h2>
<ul>
<li>Vous êtes un client potentiel : vos données sont traitées même sans relation contractuelle établie ;</li>
<li>Vous utilisez nos services ou notre site (WEBSITE_URL) ;</li>
<li>Vous êtes en relation avec (WEBSITE_NAME), qui partage vos données dans le cadre de ses activités.</li>
</ul>
<p>Cette politique complète les informations figurant dans les contrats signés ou dans d'autres supports (sites internet, formulaires, etc.). En cas de contradiction, les dispositions de la présente politique prévaudront sauf stipulations contractuelles contraires.</p>

<h2>Comment collectons-nous vos données ?</h2>
<ul>
<li>Directement auprès de vous lorsque vous utilisez nos services, remplissez un formulaire ou naviguez sur nos sites ;</li>
<li>Indirectement par l'intermédiaire de nos partenaires ;</li>
<li>Indirectement via des sources externes, publiques ou privées, dans le respect de vos droits et de la réglementation.</li>
</ul>

<h2>Données collectées</h2>
<ul>
<li>Données d'identification : nom, e-mail, numéro WhatsApp ;</li>
<li>Données relatives à votre demande : montant, durée, objet du financement, situation professionnelle et revenus ;</li>
<li>Données de navigation : adresse IP, type de navigateur, pages consultées et cookies ;</li>
<li>Pièces justificatives transmises dans le cadre de votre dossier.</li>
</ul>

<h2>Pourquoi traitons-nous vos données ?</h2>
<p>Nous traitons vos données sur les bases juridiques suivantes : exécution de mesures précontractuelles ou contractuelles, intérêt légitime, respect d'obligations légales et, le cas échéant, votre consentement.</p>
<p>Finalités principales :</p>
<ul>
<li>Étude, instruction et suivi de votre demande de financement ;</li>
<li>Communication concernant votre dossier ;</li>
<li>Conformité réglementaire et gestion des risques ;</li>
<li>Amélioration de nos services ;</li>
<li>Prévention de la fraude et sécurisation du site.</li>
</ul>

<h2>Durée de conservation</h2>
<p>Vos données sont conservées pendant la durée nécessaire à la finalité poursuivie, puis archivées ou supprimées conformément à la réglementation applicable.</p>

<h2>Destinataires et transferts</h2>
<p>Vos données peuvent être communiquées aux services internes de (WEBSITE_NAME), à nos prestataires techniques et, le cas échéant, à nos partenaires impliqués dans l'instruction de votre dossier. Nous ne vendons pas vos données personnelles.</p>
<p>En cas de transfert hors de l'Union européenne ou de la Suisse, (WEBSITE_NAME) s'assure que des garanties appropriées sont mises en place.</p>

<h2>Sécurité</h2>
<p>(WEBSITE_NAME) met en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données.</p>

<h2>Vos droits</h2>
<p>Vous disposez des droits d'accès, de rectification, d'effacement, de limitation, d'opposition, de portabilité et de retrait du consentement le cas échéant.</p>
<p>Pour exercer vos droits, contactez-nous à (WEBSITE_EMAIL). Vous pouvez également introduire une réclamation auprès de l'autorité de contrôle compétente.</p>

<h2>Cookies</h2>
<p>Pour plus d'informations, consultez notre politique de gestion des cookies disponible sur ce site.</p>

<h2>Contact</h2>
<p>Pour toute question relative à cette politique ou à vos données personnelles : (WEBSITE_EMAIL).</p>
HTML,
    'en' => <<<'HTML'
<h2>Data protection policy</h2>
<p>As data controller, (WEBSITE_NAME) processes your personal data in accordance with applicable regulations, including the GDPR and Swiss data protection law. This policy explains how we collect, use, store and protect your information when you use (WEBSITE_URL).</p>
<p>(WEBSITE_NAME) helps you find suitable financing offers from Swiss banking partners, in compliance with Swiss standards and FINMA requirements.</p>

<h2>Why this policy applies to you</h2>
<ul>
<li>You are a potential customer: your data is processed even without an established contractual relationship;</li>
<li>You use our services or website;</li>
<li>You are in a relationship with (WEBSITE_NAME) within the scope of its activities.</li>
</ul>

<h2>How we collect your data</h2>
<ul>
<li>Directly from you when you use our services or complete forms;</li>
<li>Indirectly through our partners;</li>
<li>Indirectly from external public or private sources, in compliance with applicable law.</li>
</ul>

<h2>Data collected</h2>
<ul>
<li>Identification data: name, email, WhatsApp number;</li>
<li>Request data: amount, duration, purpose, employment and income;</li>
<li>Browsing data: IP address, browser type, pages viewed and cookies;</li>
<li>Supporting documents submitted for your file.</li>
</ul>

<h2>Purposes of processing</h2>
<ul>
<li>Review and follow-up of your financing request;</li>
<li>Communication regarding your file;</li>
<li>Regulatory compliance and risk management;</li>
<li>Service improvement and fraud prevention.</li>
</ul>

<h2>Retention, recipients and security</h2>
<p>Data is retained for the period necessary for the stated purposes. It may be shared with internal teams, technical providers and partners involved in processing your request. We do not sell your personal data. Appropriate security measures are implemented.</p>

<h2>Your rights</h2>
<p>You have the right of access, rectification, erasure, restriction, objection, portability and withdrawal of consent where applicable. Contact us at (WEBSITE_EMAIL).</p>

<h2>Cookies and contact</h2>
<p>See our cookie policy for more information. Questions: (WEBSITE_EMAIL).</p>
HTML,
    'de' => <<<'HTML'
<h2>Datenschutzrichtlinie</h2>
<p>Als Verantwortlicher verarbeitet (WEBSITE_NAME) Ihre personenbezogenen Daten gemäß der DSGVO und dem anwendbaren schweizerischen Datenschutzrecht. Diese Richtlinie informiert Sie über die Verarbeitung Ihrer Daten bei Nutzung von (WEBSITE_URL).</p>
<p>(WEBSITE_NAME) unterstützt Sie bei der Suche nach Finanzierungsangeboten schweizer Bankpartner unter Einhaltung der FINMA-Anforderungen.</p>

<h2>Erhebung und Zwecke</h2>
<ul>
<li>Identifikationsdaten: Name, E-Mail, WhatsApp-Nummer;</li>
<li>Antragsdaten: Betrag, Laufzeit, Zweck, Beruf und Einkommen;</li>
<li>Navigationsdaten und Cookies;</li>
<li>Einreichungsunterlagen für Ihr Dossier.</li>
</ul>
<p>Zwecke: Bearbeitung Ihres Finanzierungsantrags, Kommunikation, Compliance, Betrugsprävention und Verbesserung unserer Dienste.</p>

<h2>Aufbewahrung, Empfänger und Sicherheit</h2>
<p>Daten werden nur so lange gespeichert wie erforderlich und an interne Teams, Dienstleister und Partner weitergegeben, soweit nötig. Ein Verkauf personenbezogener Daten findet nicht statt.</p>

<h2>Ihre Rechte</h2>
<p>Sie haben Rechte auf Auskunft, Berichtigung, Löschung, Einschränkung, Widerspruch und Datenübertragbarkeit. Kontakt: (WEBSITE_EMAIL).</p>
HTML,
];

writePageFiles('accessibility-statement', $accessibility, $locales, $elementsDir);
writePageFiles('vulnerability-disclosure', $vulnerability, $locales, $elementsDir);
writePageFiles('fraud-risks', $fraud, $locales, $elementsDir);
writePageFiles('privacy-policy', $privacy, $locales, $elementsDir);

echo "Legal page contents generated.\n";
