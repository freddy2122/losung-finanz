<?php

$root = dirname(__DIR__);
$contentDir = $root . '/resources/views/elements/privacy-policy';
$langDir = $root . '/resources/lang';

if (!is_dir($contentDir)) {
    mkdir($contentDir, 0777, true);
}

$contents = [
    'fr' => <<<'HTML'
<h2>Introduction</h2>
<p>(WEBSITE_NAME) accorde une importance particulière à la protection de vos données personnelles. La présente politique de confidentialité décrit comment nous collectons, utilisons, conservons et protégeons vos informations lorsque vous utilisez notre site (WEBSITE_URL).</p>

<h2>Responsable du traitement</h2>
<p>Le responsable du traitement des données est <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), dont le siège est situé à (WEBSITE_ADDRESS). Pour toute question relative à vos données personnelles, vous pouvez nous contacter à l'adresse suivante : (WEBSITE_EMAIL).</p>


<p>(LEGAL_ACPR)</p>

<h2>Données collectées</h2>
<p>Dans le cadre de votre demande de financement ou de l'utilisation de notre site, nous pouvons collecter les catégories de données suivantes :</p>
<ul>
<li>Données d'identification : nom complet, adresse e-mail, numéro de téléphone et numéro WhatsApp le cas échéant ;</li>
<li>Données relatives à votre demande : montant, durée, objet du financement, situation professionnelle et revenus ;</li>
<li>Données de navigation : adresse IP, type de navigateur, pages consultées et cookies ;</li>
<li>Pièces justificatives transmises dans le cadre de votre dossier (carte d'identité, relevé bancaire, etc.).</li>
</ul>

<h2>Finalités du traitement</h2>
<p>Vos données sont traitées pour les finalités suivantes :</p>
<ul>
<li>Étude, instruction et suivi de votre demande de financement ;</li>
<li>Communication avec vous concernant votre dossier ;</li>
<li>Respect de nos obligations légales et réglementaires ;</li>
<li>Amélioration de nos services et de l'expérience utilisateur ;</li>
<li>Prévention de la fraude et sécurisation du site.</li>
</ul>

<h2>Base légale du traitement</h2>
<p>Le traitement de vos données repose sur l'exécution de mesures précontractuelles ou contractuelles, le respect d'obligations légales, notre intérêt légitime à sécuriser et améliorer nos services, et, le cas échéant, votre consentement.</p>

<h2>Destinataires des données</h2>
<p>Vos données peuvent être communiquées aux services internes de (WEBSITE_NAME), à nos prestataires techniques (hébergement, messagerie) et, le cas échéant, à nos partenaires impliqués dans l'instruction de votre dossier, dans la stricte limite nécessaire à ces finalités. Nous ne vendons pas vos données personnelles à des tiers.</p>

<h2>Durée de conservation</h2>
<p>Vos données sont conservées pendant la durée nécessaire à la gestion de votre demande et au respect de nos obligations légales, puis archivées ou supprimées conformément à la réglementation applicable.</p>

<h2>Sécurité</h2>
<p>(WEBSITE_NAME) met en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre tout accès non autorisé, perte, destruction ou divulgation.</p>

<h2>Vos droits</h2>
<p>Conformément au Règlement général sur la protection des données (RGPD) et à la législation applicable, vous disposez des droits suivants : accès, rectification, effacement, limitation du traitement, opposition, portabilité des données, et retrait de votre consentement lorsque le traitement en est fondé.</p>
<p>Pour exercer vos droits, contactez-nous à (WEBSITE_EMAIL). Vous pouvez également introduire une réclamation auprès de l'autorité de contrôle compétente (CNIL en France).</p>

<h2>Cookies</h2>
<p>Pour plus d'informations sur l'utilisation des cookies, consultez notre politique de gestion des cookies disponible sur ce site.</p>

<h2>Transferts hors Union européenne</h2>
<p>Le cas échéant, tout transfert de données en dehors de l'Union européenne est encadré par des garanties appropriées conformément à la réglementation applicable.</p>

<h2>Modifications</h2>
<p>(WEBSITE_NAME) se réserve le droit de modifier la présente politique de confidentialité à tout moment. La version en vigueur est celle publiée sur le site à la date de votre consultation.</p>

<h2>Contact</h2>
<p>Pour toute question relative à cette politique ou à vos données personnelles : (WEBSITE_EMAIL).</p>
HTML,
    'en' => <<<'HTML'
<h2>Introduction</h2>
<p>(WEBSITE_NAME) attaches great importance to protecting your personal data. This privacy policy describes how we collect, use, store and protect your information when you use our website (WEBSITE_URL).</p>

<h2>Data controller</h2>
<p>The data controller is <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), with its registered office at (WEBSITE_ADDRESS). For any questions regarding your personal data, please contact us at: (WEBSITE_EMAIL).</p>
<p>(LEGAL_ACPR)</p>

<h2>Data collected</h2>
<p>When you submit a financing request or use our website, we may collect the following categories of data:</p>
<ul>
<li>Identification data: full name, email address, phone number and WhatsApp number where applicable;</li>
<li>Request-related data: amount, duration, purpose of financing, employment status and income;</li>
<li>Browsing data: IP address, browser type, pages viewed and cookies;</li>
<li>Supporting documents submitted as part of your application (identity document, bank statement, etc.).</li>
</ul>

<h2>Purposes of processing</h2>
<p>Your data is processed for the following purposes:</p>
<ul>
<li>Review, processing and follow-up of your financing request;</li>
<li>Communication with you regarding your application;</li>
<li>Compliance with our legal and regulatory obligations;</li>
<li>Improvement of our services and user experience;</li>
<li>Fraud prevention and website security.</li>
</ul>

<h2>Legal basis for processing</h2>
<p>Processing is based on pre-contractual or contractual measures, compliance with legal obligations, our legitimate interest in securing and improving our services, and, where applicable, your consent.</p>

<h2>Data recipients</h2>
<p>Your data may be shared with internal teams at (WEBSITE_NAME), our technical service providers (hosting, email) and, where necessary, partners involved in processing your application, strictly to the extent required for these purposes. We do not sell your personal data to third parties.</p>

<h2>Retention period</h2>
<p>Your data is retained for as long as necessary to manage your request and comply with our legal obligations, then archived or deleted in accordance with applicable regulations.</p>

<h2>Security</h2>
<p>(WEBSITE_NAME) implements appropriate technical and organisational measures to protect your data against unauthorised access, loss, destruction or disclosure.</p>

<h2>Your rights</h2>
<p>Under the General Data Protection Regulation (GDPR) and applicable law, you have the right to access, rectify, erase, restrict processing, object, data portability, and to withdraw consent where processing is based on consent.</p>
<p>To exercise your rights, contact us at (WEBSITE_EMAIL). You may also lodge a complaint with the competent supervisory authority.</p>

<h2>Cookies</h2>
<p>For more information on the use of cookies, please see our cookie policy available on this website.</p>

<h2>Transfers outside the European Union</h2>
<p>Where applicable, any transfer of data outside the European Union is subject to appropriate safeguards in accordance with applicable regulations.</p>

<h2>Changes</h2>
<p>(WEBSITE_NAME) reserves the right to amend this privacy policy at any time. The version in force is the one published on the website on the date of your visit.</p>

<h2>Contact</h2>
<p>For any questions about this policy or your personal data: (WEBSITE_EMAIL).</p>
HTML,
    'de' => <<<'HTML'
<h2>Einleitung</h2>
<p>(WEBSITE_NAME) legt großen Wert auf den Schutz Ihrer personenbezogenen Daten. Diese Datenschutzrichtlinie beschreibt, wie wir Ihre Informationen erfassen, verwenden, speichern und schützen, wenn Sie unsere Website (WEBSITE_URL) nutzen.</p>

<h2>Verantwortlicher</h2>
<p>Verantwortlicher für die Datenverarbeitung ist <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), mit Sitz in (WEBSITE_ADDRESS). Bei Fragen zu Ihren personenbezogenen Daten kontaktieren Sie uns unter: (WEBSITE_EMAIL).</p>
<p>Codifis-Portugal ist ein französisches Kreditinstitut, das von der Autorité de Contrôle Prudentiel et de Résolution (ACPR, 4, place de Budapest, CS 92459, 75436 Paris Cedex 09) zugelassen ist.</p>

<h2>Erhobene Daten</h2>
<p>Im Rahmen Ihrer Finanzierungsanfrage oder der Nutzung unserer Website können folgende Datenkategorien erhoben werden:</p>
<ul>
<li>Identifikationsdaten: vollständiger Name, E-Mail-Adresse, Telefonnummer und gegebenenfalls WhatsApp-Nummer;</li>
<li>Antragsbezogene Daten: Betrag, Laufzeit, Finanzierungszweck, Berufssituation und Einkommen;</li>
<li>Navigationsdaten: IP-Adresse, Browsertyp, besuchte Seiten und Cookies;</li>
<li>Im Rahmen Ihres Dossiers übermittelte Nachweise (Ausweis, Kontoauszug usw.).</li>
</ul>

<h2>Zwecke der Verarbeitung</h2>
<p>Ihre Daten werden zu folgenden Zwecken verarbeitet:</p>
<ul>
<li>Prüfung, Bearbeitung und Nachverfolgung Ihrer Finanzierungsanfrage;</li>
<li>Kommunikation mit Ihnen bezüglich Ihres Dossiers;</li>
<li>Einhaltung gesetzlicher und regulatorischer Pflichten;</li>
<li>Verbesserung unserer Dienstleistungen und Nutzererfahrung;</li>
<li>Betrugsprävention und Sicherheit der Website.</li>
</ul>

<h2>Rechtsgrundlage</h2>
<p>Die Verarbeitung basiert auf vorvertraglichen oder vertraglichen Maßnahmen, der Erfüllung rechtlicher Pflichten, unserem berechtigten Interesse an der Sicherung und Verbesserung unserer Dienste und gegebenenfalls auf Ihrer Einwilligung.</p>

<h2>Empfänger der Daten</h2>
<p>Ihre Daten können internen Teams von (WEBSITE_NAME), technischen Dienstleistern (Hosting, E-Mail) und gegebenenfalls Partnern, die an der Bearbeitung Ihres Dossiers beteiligt sind, ausschließlich im erforderlichen Umfang mitgeteilt werden. Wir verkaufen Ihre personenbezogenen Daten nicht an Dritte.</p>

<h2>Aufbewahrungsdauer</h2>
<p>Ihre Daten werden so lange aufbewahrt, wie es für die Bearbeitung Ihrer Anfrage und die Einhaltung gesetzlicher Pflichten erforderlich ist, und anschließend gemäß den geltenden Vorschriften archiviert oder gelöscht.</p>

<h2>Sicherheit</h2>
<p>(WEBSITE_NAME) setzt angemessene technische und organisatorische Maßnahmen ein, um Ihre Daten vor unbefugtem Zugriff, Verlust, Zerstörung oder Offenlegung zu schützen.</p>

<h2>Ihre Rechte</h2>
<p>Gemäß der Datenschutz-Grundverordnung (DSGVO) und geltendem Recht haben Sie das Recht auf Auskunft, Berichtigung, Löschung, Einschränkung der Verarbeitung, Widerspruch, Datenübertragbarkeit und Widerruf Ihrer Einwilligung, sofern die Verarbeitung darauf basiert.</p>
<p>Um Ihre Rechte auszuüben, kontaktieren Sie uns unter (WEBSITE_EMAIL). Sie können auch eine Beschwerde bei der zuständigen Aufsichtsbehörde einreichen.</p>

<h2>Cookies</h2>
<p>Weitere Informationen zur Verwendung von Cookies finden Sie in unserer Cookie-Richtlinie auf dieser Website.</p>

<h2>Übermittlungen außerhalb der EU</h2>
<p>Gegebenenfalls werden Übermittlungen außerhalb der Europäischen Union durch geeignete Garantien gemäß den geltenden Vorschriften abgesichert.</p>

<h2>Änderungen</h2>
<p>(WEBSITE_NAME) behält sich das Recht vor, diese Datenschutzrichtlinie jederzeit zu ändern. Es gilt die zum Zeitpunkt Ihres Besuchs auf der Website veröffentlichte Fassung.</p>

<h2>Kontakt</h2>
<p>Bei Fragen zu dieser Richtlinie oder Ihren personenbezogenen Daten: (WEBSITE_EMAIL).</p>
HTML,
    'es' => <<<'HTML'
<h2>Introducción</h2>
<p>(WEBSITE_NAME) concede especial importancia a la protección de sus datos personales. Esta política de privacidad describe cómo recopilamos, utilizamos, conservamos y protegemos su información cuando utiliza nuestro sitio web (WEBSITE_URL).</p>

<h2>Responsable del tratamiento</h2>
<p>El responsable del tratamiento es <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), con domicilio social en (WEBSITE_ADDRESS). Para cualquier consulta sobre sus datos personales, contáctenos en: (WEBSITE_EMAIL).</p>
<p>(LEGAL_ACPR)</p>

<h2>Datos recopilados</h2>
<p>En el marco de su solicitud de financiación o del uso de nuestro sitio, podemos recopilar las siguientes categorías de datos:</p>
<ul>
<li>Datos de identificación: nombre completo, correo electrónico, número de teléfono y WhatsApp si procede;</li>
<li>Datos relativos a su solicitud: importe, plazo, finalidad, situación profesional e ingresos;</li>
<li>Datos de navegación: dirección IP, tipo de navegador, páginas visitadas y cookies;</li>
<li>Documentos justificativos enviados en el marco de su expediente.</li>
</ul>

<h2>Finalidades del tratamiento</h2>
<p>Sus datos se tratan con las siguientes finalidades:</p>
<ul>
<li>Estudio, tramitación y seguimiento de su solicitud de financiación;</li>
<li>Comunicación con usted sobre su expediente;</li>
<li>Cumplimiento de obligaciones legales y reglamentarias;</li>
<li>Mejora de nuestros servicios y de la experiencia del usuario;</li>
<li>Prevención del fraude y seguridad del sitio.</li>
</ul>

<h2>Base legal</h2>
<p>El tratamiento se basa en medidas precontractuales o contractuales, el cumplimiento de obligaciones legales, nuestro interés legítimo en asegurar y mejorar nuestros servicios y, en su caso, su consentimiento.</p>

<h2>Destinatarios</h2>
<p>Sus datos pueden comunicarse a los equipos internos de (WEBSITE_NAME), a proveedores técnicos (alojamiento, correo) y, en su caso, a socios implicados en la tramitación de su expediente, estrictamente en la medida necesaria. No vendemos sus datos personales a terceros.</p>

<h2>Plazo de conservación</h2>
<p>Sus datos se conservan durante el tiempo necesario para gestionar su solicitud y cumplir nuestras obligaciones legales, y luego se archivan o eliminan conforme a la normativa aplicable.</p>

<h2>Seguridad</h2>
<p>(WEBSITE_NAME) aplica medidas técnicas y organizativas adecuadas para proteger sus datos frente a accesos no autorizados, pérdida, destrucción o divulgación.</p>

<h2>Sus derechos</h2>
<p>De conformidad con el Reglamento General de Protección de Datos (RGPD), usted dispone de derechos de acceso, rectificación, supresión, limitación, oposición, portabilidad y retirada del consentimiento cuando proceda.</p>
<p>Para ejercer sus derechos, contáctenos en (WEBSITE_EMAIL). También puede presentar una reclamación ante la autoridad de control competente.</p>

<h2>Cookies</h2>
<p>Para más información sobre el uso de cookies, consulte nuestra política de cookies disponible en este sitio.</p>

<h2>Transferencias fuera de la UE</h2>
<p>En su caso, cualquier transferencia fuera de la Unión Europea se realiza con garantías adecuadas conforme a la normativa aplicable.</p>

<h2>Modificaciones</h2>
<p>(WEBSITE_NAME) se reserva el derecho de modificar esta política en cualquier momento. La versión vigente es la publicada en el sitio en la fecha de su consulta.</p>

<h2>Contacto</h2>
<p>Para cualquier pregunta sobre esta política o sus datos personales: (WEBSITE_EMAIL).</p>
HTML,
    'it' => <<<'HTML'
<h2>Introduzione</h2>
<p>(WEBSITE_NAME) attribuisce grande importanza alla protezione dei suoi dati personali. La presente informativa sulla privacy descrive come raccogliamo, utilizziamo, conserviamo e proteggiamo le sue informazioni quando utilizza il nostro sito (WEBSITE_URL).</p>

<h2>Titolare del trattamento</h2>
<p>Il titolare del trattamento è <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), con sede in (WEBSITE_ADDRESS). Per qualsiasi domanda relativa ai suoi dati personali, contattaci a: (WEBSITE_EMAIL).</p>
<p>(LEGAL_ACPR)</p>

<h2>Dati raccolti</h2>
<p>Nel contesto della sua richiesta di finanziamento o dell'utilizzo del sito, possiamo raccogliere le seguenti categorie di dati:</p>
<ul>
<li>Dati identificativi: nome completo, e-mail, numero di telefono e WhatsApp ove applicabile;</li>
<li>Dati relativi alla richiesta: importo, durata, finalità, situazione professionale e reddito;</li>
<li>Dati di navigazione: indirizzo IP, tipo di browser, pagine visitate e cookie;</li>
<li>Documenti giustificativi trasmessi nell'ambito del dossier.</li>
</ul>

<h2>Finalità del trattamento</h2>
<p>I suoi dati sono trattati per le seguenti finalità:</p>
<ul>
<li>Esame, gestione e follow-up della richiesta di finanziamento;</li>
<li>Comunicazione relativa al dossier;</li>
<li>Adempimento di obblighi legali e regolamentari;</li>
<li>Miglioramento dei servizi e dell'esperienza utente;</li>
<li>Prevenzione delle frodi e sicurezza del sito.</li>
</ul>

<h2>Base giuridica</h2>
<p>Il trattamento si basa su misure precontrattuali o contrattuali, sull'adempimento di obblighi legali, sul nostro legittimo interesse a proteggere e migliorare i servizi e, ove applicabile, sul suo consenso.</p>

<h2>Destinatari</h2>
<p>I suoi dati possono essere comunicati ai team interni di (WEBSITE_NAME), a fornitori tecnici (hosting, posta) e, se necessario, a partner coinvolti nella gestione del dossier, limitatamente a quanto necessario. Non vendiamo i suoi dati personali a terzi.</p>

<h2>Periodo di conservazione</h2>
<p>I dati sono conservati per il tempo necessario alla gestione della richiesta e al rispetto degli obblighi legali, quindi archiviati o cancellati secondo la normativa applicabile.</p>

<h2>Sicurezza</h2>
<p>(WEBSITE_NAME) adotta misure tecniche e organizzative adeguate per proteggere i dati da accessi non autorizzati, perdita, distruzione o divulgazione.</p>

<h2>I suoi diritti</h2>
<p>Conformemente al Regolamento generale sulla protezione dei dati (GDPR), ha diritto di accesso, rettifica, cancellazione, limitazione, opposizione, portabilità e revoca del consenso ove applicabile.</p>
<p>Per esercitare i suoi diritti, contattaci a (WEBSITE_EMAIL). Può inoltre presentare reclamo all'autorità di controllo competente.</p>

<h2>Cookie</h2>
<p>Per maggiori informazioni sull'uso dei cookie, consultare la nostra politica sui cookie disponibile su questo sito.</p>

<h2>Trasferimenti extra UE</h2>
<p>Ove applicabile, i trasferimenti al di fuori dell'Unione europea sono regolati da garanzie adeguate conformemente alla normativa applicabile.</p>

<h2>Modifiche</h2>
<p>(WEBSITE_NAME) si riserva il diritto di modificare la presente informativa in qualsiasi momento. La versione in vigore è quella pubblicata sul sito alla data della consultazione.</p>

<h2>Contatto</h2>
<p>Per qualsiasi domanda relativa a questa informativa o ai suoi dati personali: (WEBSITE_EMAIL).</p>
HTML,
    'pt' => <<<'HTML'
<h2>Introdução</h2>
<p>A (WEBSITE_NAME) atribui especial importância à proteção dos seus dados pessoais. Esta política de privacidade descreve como recolhemos, utilizamos, conservamos e protegemos as suas informações quando utiliza o nosso site (WEBSITE_URL).</p>

<h2>Responsável pelo tratamento</h2>
<p>O responsável pelo tratamento é a <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), com sede em (WEBSITE_ADDRESS). Para questões relacionadas com os seus dados pessoais, contacte-nos em: (WEBSITE_EMAIL).</p>
<p>(LEGAL_ACPR)</p>

<h2>Dados recolhidos</h2>
<p>No âmbito do seu pedido de financiamento ou da utilização do site, podemos recolher as seguintes categorias de dados:</p>
<ul>
<li>Dados de identificação: nome completo, e-mail, telefone e WhatsApp quando aplicável;</li>
<li>Dados relativos ao pedido: montante, prazo, finalidade, situação profissional e rendimentos;</li>
<li>Dados de navegação: endereço IP, tipo de browser, páginas visitadas e cookies;</li>
<li>Documentos comprovativos enviados no âmbito do processo.</li>
</ul>

<h2>Finalidades do tratamento</h2>
<p>Os seus dados são tratados para as seguintes finalidades:</p>
<ul>
<li>Análise, instrução e acompanhamento do pedido de financiamento;</li>
<li>Comunicação consigo sobre o processo;</li>
<li>Cumprimento de obrigações legais e regulamentares;</li>
<li>Melhoria dos nossos serviços e da experiência do utilizador;</li>
<li>Prevenção de fraude e segurança do site.</li>
</ul>

<h2>Base legal</h2>
<p>O tratamento baseia-se em medidas pré-contratuais ou contratuais, cumprimento de obrigações legais, o nosso interesse legítimo em proteger e melhorar os serviços e, quando aplicável, o seu consentimento.</p>

<h2>Destinatários</h2>
<p>Os seus dados podem ser comunicados às equipas internas da (WEBSITE_NAME), a prestadores técnicos (alojamento, e-mail) e, quando necessário, a parceiros envolvidos na instrução do processo, estritamente na medida necessária. Não vendemos os seus dados pessoais a terceiros.</p>

<h2>Prazo de conservação</h2>
<p>Os dados são conservados pelo tempo necessário à gestão do pedido e ao cumprimento das obrigações legais, sendo depois arquivados ou eliminados conforme a regulamentação aplicável.</p>

<h2>Segurança</h2>
<p>A (WEBSITE_NAME) implementa medidas técnicas e organizativas adequadas para proteger os seus dados contra acessos não autorizados, perda, destruição ou divulgação.</p>

<h2>Os seus direitos</h2>
<p>Nos termos do Regulamento Geral sobre a Proteção de Dados (RGPD), dispõe de direitos de acesso, retificação, apagamento, limitação, oposição, portabilidade e retirada do consentimento quando aplicável.</p>
<p>Para exercer os seus direitos, contacte-nos em (WEBSITE_EMAIL). Pode também apresentar reclamação junto da autoridade de controlo competente.</p>

<h2>Cookies</h2>
<p>Para mais informações sobre a utilização de cookies, consulte a nossa política de cookies disponível neste site.</p>

<h2>Transferências fora da UE</h2>
<p>Quando aplicável, qualquer transferência fora da União Europeia é efetuada com garantias adequadas nos termos da regulamentação aplicável.</p>

<h2>Alterações</h2>
<p>A (WEBSITE_NAME) reserva-se o direito de alterar esta política a qualquer momento. A versão em vigor é a publicada no site na data da consulta.</p>

<h2>Contacto</h2>
<p>Para questões sobre esta política ou os seus dados pessoais: (WEBSITE_EMAIL).</p>
HTML,
    'nl' => <<<'HTML'
<h2>Inleiding</h2>
<p>(WEBSITE_NAME) hecht veel belang aan de bescherming van uw persoonsgegevens. Dit privacybeleid beschrijft hoe wij uw gegevens verzamelen, gebruiken, bewaren en beschermen wanneer u onze website (WEBSITE_URL) gebruikt.</p>

<h2>Verwerkingsverantwoordelijke</h2>
<p>De verwerkingsverantwoordelijke is <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), gevestigd te (WEBSITE_ADDRESS). Voor vragen over uw persoonsgegevens kunt u contact opnemen via: (WEBSITE_EMAIL).</p>
<p>(LEGAL_ACPR)</p>

<h2>Verzamelde gegevens</h2>
<p>In het kader van uw financieringsaanvraag of het gebruik van onze site kunnen wij de volgende categorieën gegevens verzamelen:</p>
<ul>
<li>Identificatiegegevens: volledige naam, e-mailadres, telefoonnummer en WhatsApp-nummer indien van toepassing;</li>
<li>Aanvraaggegevens: bedrag, looptijd, doel, beroepssituatie en inkomen;</li>
<li>Navigatiegegevens: IP-adres, browsertype, bezochte pagina's en cookies;</li>
<li>Bewijsstukken die in het kader van uw dossier worden verzonden.</li>
</ul>

<h2>Doeleinden van verwerking</h2>
<p>Uw gegevens worden verwerkt voor de volgende doeleinden:</p>
<ul>
<li>Beoordeling, behandeling en opvolging van uw financieringsaanvraag;</li>
<li>Communicatie met u over uw dossier;</li>
<li>Naleving van wettelijke en reglementaire verplichtingen;</li>
<li>Verbetering van onze diensten en gebruikerservaring;</li>
<li>Fraudepreventie en beveiliging van de site.</li>
</ul>

<h2>Rechtsgrond</h2>
<p>De verwerking is gebaseerd op precontractuele of contractuele maatregelen, naleving van wettelijke verplichtingen, ons gerechtvaardigd belang bij het beveiligen en verbeteren van onze diensten en, indien van toepassing, uw toestemming.</p>

<h2>Ontvangers</h2>
<p>Uw gegevens kunnen worden gedeeld met interne teams van (WEBSITE_NAME), technische dienstverleners (hosting, e-mail) en, indien nodig, partners die betrokken zijn bij de behandeling van uw dossier, strikt voor zover nodig. Wij verkopen uw persoonsgegevens niet aan derden.</p>

<h2>Bewaartermijn</h2>
<p>Uw gegevens worden bewaard zolang nodig voor de behandeling van uw aanvraag en de naleving van wettelijke verplichtingen, en vervolgens gearchiveerd of verwijderd conform de toepasselijke regelgeving.</p>

<h2>Beveiliging</h2>
<p>(WEBSITE_NAME) past passende technische en organisatorische maatregelen toe om uw gegevens te beschermen tegen ongeautoriseerde toegang, verlies, vernietiging of openbaarmaking.</p>

<h2>Uw rechten</h2>
<p>Overeenkomstig de Algemene Verordening Gegevensbescherming (AVG) heeft u recht op inzage, rectificatie, wissing, beperking, bezwaar, dataportabiliteit en intrekking van toestemming waar van toepassing.</p>
<p>Om uw rechten uit te oefenen, contacteer ons via (WEBSITE_EMAIL). U kunt ook een klacht indienen bij de bevoegde toezichthoudende autoriteit.</p>

<h2>Cookies</h2>
<p>Voor meer informatie over het gebruik van cookies, raadpleeg ons cookiebeleid op deze website.</p>

<h2>Overdrachten buiten de EU</h2>
<p>Indien van toepassing worden overdrachten buiten de Europese Unie afgedekt door passende waarborgen conform de toepasselijke regelgeving.</p>

<h2>Wijzigingen</h2>
<p>(WEBSITE_NAME) behoudt zich het recht voor dit privacybeleid te allen tijde te wijzigen. De geldende versie is die op de website staat op de datum van uw bezoek.</p>

<h2>Contact</h2>
<p>Voor vragen over dit beleid of uw persoonsgegevens: (WEBSITE_EMAIL).</p>
HTML,
    'pl' => <<<'HTML'
<h2>Wprowadzenie</h2>
<p>(WEBSITE_NAME) przywiązuje szczególną wagę do ochrony danych osobowych. Niniejsza polityka prywatności opisuje, w jaki sposób gromadzimy, wykorzystujemy, przechowujemy i chronimy Państwa informacje podczas korzystania z naszej strony (WEBSITE_URL).</p>

<h2>Administrator danych</h2>
<p>Administratorem danych jest <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), z siedzibą pod adresem (WEBSITE_ADDRESS). W sprawach dotyczących danych osobowych prosimy o kontakt: (WEBSITE_EMAIL).</p>
<p>(LEGAL_ACPR)</p>

<h2>Gromadzone dane</h2>
<p>W związku z wnioskiem o finansowanie lub korzystaniem ze strony możemy gromadzić następujące kategorie danych:</p>
<ul>
<li>Dane identyfikacyjne: imię i nazwisko, adres e-mail, numer telefonu i WhatsApp;</li>
<li>Dane dotyczące wniosku: kwota, okres, cel finansowania, sytuacja zawodowa i dochody;</li>
<li>Dane nawigacyjne: adres IP, typ przeglądarki, odwiedzane strony i pliki cookie;</li>
<li>Dokumenty potwierdzające przesłane w ramach wniosku.</li>
</ul>

<h2>Cele przetwarzania</h2>
<p>Dane są przetwarzane w następujących celach:</p>
<ul>
<li>Rozpatrzenie, obsługa i monitorowanie wniosku o finansowanie;</li>
<li>Komunikacja w sprawie wniosku;</li>
<li>Spełnienie obowiązków prawnych i regulacyjnych;</li>
<li>Usprawnianie usług i doświadczenia użytkownika;</li>
<li>Zapobieganie oszustwom i zabezpieczenie strony.</li>
</ul>

<h2>Podstawa prawna</h2>
<p>Przetwarzanie opiera się na działaniach przedumownych lub umownych, wypełnieniu obowiązków prawnych, naszym prawnie uzasadnionym interesie oraz, w stosownych przypadkach, na zgodzie.</p>

<h2>Odbiorcy danych</h2>
<p>Dane mogą być przekazywane zespołom wewnętrznym (WEBSITE_NAME), dostawcom technicznym (hosting, poczta) oraz partnerom zaangażowanym w obsługę wniosku, wyłącznie w niezbędnym zakresie. Nie sprzedajemy danych osobowych podmiotom trzecim.</p>

<h2>Okres przechowywania</h2>
<p>Dane są przechowywane przez okres niezbędny do obsługi wniosku i spełnienia obowiązków prawnych, a następnie archiwizowane lub usuwane zgodnie z obowiązującymi przepisami.</p>

<h2>Bezpieczeństwo</h2>
<p>(WEBSITE_NAME) stosuje odpowiednie środki techniczne i organizacyjne w celu ochrony danych przed nieuprawnionym dostępem, utratą, zniszczeniem lub ujawnieniem.</p>

<h2>Państwa prawa</h2>
<p>Zgodnie z RODO przysługuje Państwu prawo dostępu, sprostowania, usunięcia, ograniczenia przetwarzania, sprzeciwu, przenoszenia danych oraz cofnięcia zgody, gdy przetwarzanie na niej polega.</p>
<p>Aby skorzystać ze swoich praw, prosimy o kontakt: (WEBSITE_EMAIL). Można również złożyć skargę do właściwego organu nadzorczego.</p>

<h2>Pliki cookie</h2>
<p>Więcej informacji o plikach cookie znajduje się w naszej polityce cookies dostępnej na tej stronie.</p>

<h2>Przekazywanie poza UE</h2>
<p>W stosownych przypadkach przekazywanie danych poza Unię Europejską odbywa się z odpowiednimi zabezpieczeniami zgodnie z obowiązującymi przepisami.</p>

<h2>Zmiany</h2>
<p>(WEBSITE_NAME) zastrzega sobie prawo do zmiany niniejszej polityki w dowolnym momencie. Obowiązuje wersja opublikowana w dniu odwiedzin strony.</p>

<h2>Kontakt</h2>
<p>W sprawach dotyczących niniejszej polityki lub danych osobowych: (WEBSITE_EMAIL).</p>
HTML,
    'sv' => <<<'HTML'
<h2>Inledning</h2>
<p>(WEBSITE_NAME) lägger stor vikt vid skyddet av dina personuppgifter. Denna integritetspolicy beskriver hur vi samlar in, använder, lagrar och skyddar dina uppgifter när du använder vår webbplats (WEBSITE_URL).</p>

<h2>Personuppgiftsansvarig</h2>
<p>Personuppgiftsansvarig är <strong>(WEBSITE_NAME)</strong>, (LEGAL_COMPANY_FORM), med säte på (WEBSITE_ADDRESS). För frågor om dina personuppgifter, kontakta oss på: (WEBSITE_EMAIL).</p>
<p>(LEGAL_ACPR)</p>

<h2>Insamlade uppgifter</h2>
<p>I samband med din finansieringsförfrågan eller användning av webbplatsen kan vi samla in följande kategorier av uppgifter:</p>
<ul>
<li>Identifikationsuppgifter: fullständigt namn, e-post, telefonnummer och WhatsApp vid behov;</li>
<li>Uppgifter om förfrågan: belopp, löptid, syfte, anställningssituation och inkomst;</li>
<li>Navigeringsuppgifter: IP-adress, webbläsartyp, besökta sidor och cookies;</li>
<li>Verifieringsdokument som skickas in som en del av ärendet.</li>
</ul>

<h2>Ändamål med behandlingen</h2>
<p>Dina uppgifter behandlas för följande ändamål:</p>
<ul>
<li>Granskning, handläggning och uppföljning av finansieringsförfrågan;</li>
<li>Kommunikation med dig om ärendet;</li>
<li>Efterlevnad av rättsliga och regulatoriska skyldigheter;</li>
<li>Förbättring av våra tjänster och användarupplevelse;</li>
<li>Bedfri prevention och webbplatssäkerhet.</li>
</ul>

<h2>Rättslig grund</h2>
<p>Behandlingen grundas på förcontractuella eller avtalsenliga åtgärder, rättsliga skyldigheter, vårt berättigade intresse av att skydda och förbättra våra tjänster samt, i förekommande fall, ditt samtycke.</p>

<h2>Mottagare</h2>
<p>Dina uppgifter kan delas med interna team hos (WEBSITE_NAME), tekniska leverantörer (hosting, e-post) och, vid behov, partners som deltar i handläggningen av ärendet, strikt i nödvändig omfattning. Vi säljer inte dina personuppgifter till tredje part.</p>

<h2>Lagringstid</h2>
<p>Uppgifter sparas så länge som krävs för att hantera din förfrågan och uppfylla rättsliga skyldigheter, och arkiveras eller raderas därefter enligt gällande regler.</p>

<h2>Säkerhet</h2>
<p>(WEBSITE_NAME) tillämpar lämpliga tekniska och organisatoriska åtgärder för att skydda dina uppgifter mot obehörig åtkomst, förlust, förstörelse eller utlämnande.</p>

<h2>Dina rättigheter</h2>
<p>Enligt GDPR har du rätt till tillgång, rättelse, radering, begränsning, invändning, dataportabilitet och att återkalla samtycke när behandlingen grundas på samtycke.</p>
<p>För att utöva dina rättigheter, kontakta oss på (WEBSITE_EMAIL). Du kan även lämna klagomål till behörig tillsynsmyndighet.</p>

<h2>Cookies</h2>
<p>För mer information om cookies, se vår cookiepolicy på denna webbplats.</p>

<h2>Överföringar utanför EU</h2>
<p>I förekommande fall sker överföringar utanför EU med lämpliga skyddsåtgärder enligt gällande regler.</p>

<h2>Ändringar</h2>
<p>(WEBSITE_NAME) förbehåller sig rätten att ändra denna policy när som helst. Den version som gäller är den som publicerats på webbplatsen vid besökstillfället.</p>

<h2>Kontakt</h2>
<p>För frågor om denna policy eller dina personuppgifter: (WEBSITE_EMAIL).</p>
HTML,
];

$contents['ch'] = $contents['de'];
$contents = array_merge($contents, require __DIR__ . '/privacy-policy-extra-locales.php');

$existingLocales = array_map(
    static fn (string $file): string => str_replace('.txt', '', basename($file)),
    glob($root . '/resources/views/elements/legal-notice/*.txt') ?: []
);
$existingLocales[] = 'sq';

foreach (array_diff(array_unique($existingLocales), array_keys($contents)) as $locale) {
    $contents[$locale] = $contents['en'];
}

foreach ($contents as $locale => $html) {
    file_put_contents($contentDir . '/' . $locale . '.txt', $html . "\n");
}

$pageTitles = [
    'fr' => 'Politique de confidentialité',
    'en' => 'Privacy Policy',
    'de' => 'Datenschutzrichtlinie',
    'ch' => 'Datenschutzrichtlinie',
    'es' => 'Política de privacidad',
    'it' => 'Informativa sulla privacy',
    'pt' => 'Política de privacidade',
    'nl' => 'Privacybeleid',
    'pl' => 'Polityka prywatności',
    'sv' => 'Integritetspolicy',
    'fi' => 'Tietosuojakäytäntö',
    'da' => 'Privatlivspolitik',
    'no' => 'Personvernerklæring',
    'cs' => 'Zásady ochrany osobních údajů',
    'sk' => 'Zásady ochrany osobných údajov',
    'hu' => 'Adatvédelmi irányelvek',
    'ro' => 'Politica de confidențialitate',
    'bg' => 'Политика за поверителност',
    'ru' => 'Политика конфиденциальности',
    'tr' => 'Gizlilik Politikası',
    'el' => 'Πολιτική απορρήτου',
    'hr' => 'Pravila o privatnosti',
    'sl' => 'Pravilnik o zasebnosti',
    'lt' => 'Privatumo politika',
    'lv' => 'Privātuma politika',
    'et' => 'Privaatsuspoliitika',
    'sq' => 'Politika e privatësisë',
    'lb' => 'Dateschutzpolitik',
    'hy' => 'Գաղտնիության քաղաքականություն',
    'kk' => 'Құпиялылық саясаты',
    'ky' => 'Купуялык саясаты',
    'uz' => 'Maxfiylik siyosati',
    'tg' => 'Сиёсати махфият',
    'mn' => 'Нууцлалын бодлого',
];

$controllerTitles = [
    'fr' => 'Responsable du traitement',
    'en' => 'Data controller',
    'de' => 'Verantwortlicher',
    'ch' => 'Verantwortlicher',
    'es' => 'Responsable del tratamiento',
    'it' => 'Titolare del trattamento',
    'pt' => 'Responsável pelo tratamento',
    'nl' => 'Verwerkingsverantwoordelijke',
    'pl' => 'Administrator danych',
    'sv' => 'Personuppgiftsansvarig',
    'fi' => 'Rekisterinpitäjä',
    'da' => 'Dataansvarlig',
    'no' => 'Behandlingsansvarlig',
    'cs' => 'Správce údajů',
    'sk' => 'Prevádzkovateľ',
    'hu' => 'Adatkezelő',
    'ro' => 'Operator de date',
    'bg' => 'Администратор на данни',
    'ru' => 'Контролёр данных',
    'tr' => 'Veri sorumlusu',
    'el' => 'Υπεύθυνος επεξεργασίας',
    'hr' => 'Voditelj obrade',
    'sl' => 'Upravljavec',
    'lt' => 'Duomenų valdytojas',
    'lv' => 'Datu pārzinis',
    'et' => 'Vastutav töötleja',
    'sq' => 'Përgjegjësi i përpunimit',
    'lb' => 'Verantwortlechen',
    'hy' => 'Տվյալների վերահսկիչ',
    'kk' => 'Деректерді басқарушы',
    'ky' => 'Маалыматтарды башкаруучу',
    'uz' => 'Ma\'lumotlar nazoratchisi',
    'tg' => 'Масъули коркарди маълумот',
    'mn' => 'Мэдээлэл боловсруулагч',
];

foreach (glob($langDir . '/*.json') as $langFile) {
    $locale = basename($langFile, '.json');
    $data = json_decode(file_get_contents($langFile), true);
    if (!is_array($data)) {
        continue;
    }

    $data['TRAD_683'] = $pageTitles[$locale] ?? $pageTitles['en'];
    $data['TRAD_684'] = $controllerTitles[$locale] ?? $controllerTitles['en'];

    file_put_contents(
        $langFile,
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n"
    );
}

echo 'Generated ' . count($contents) . " privacy-policy content files.\n";
echo 'Updated ' . count(glob($langDir . '/*.json')) . " language JSON files.\n";
