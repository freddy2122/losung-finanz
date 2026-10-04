<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Section Témoignages — Vente de robots</title>

<!-- Bootstrap 5 (CSS + JS) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Polices -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<style>
  :root{
    --ink:#121826;
    --ink-soft:#4b5468;
    --bg-page:#eef1f6;
    --surface:#ffffff;
    --surface-border:#dde2ec;
    --accent:#0e4a37;
    --accent-ink:#0a3327;
    --accent-soft:#e1ede7;
    --star:#c7983f;
    --shadow: 0 20px 40px -24px rgba(18,24,38,0.28);
  }

  @media (prefers-color-scheme: dark){
    :root:not([data-theme="light"]){
      --ink:#eef1f8;
      --ink-soft:#a7aec2;
      --bg-page:#0e1118;
      --surface:#161b26;
      --surface-border:#262d3d;
      --accent:#4fae84;
      --accent-ink:#7fd1a8;
      --accent-soft:#17352b;
      --star:#d7ac5c;
      --shadow: 0 20px 44px -22px rgba(0,0,0,0.65);
    }
  }
  :root[data-theme="dark"]{
    --ink:#eef1f8;
    --ink-soft:#a7aec2;
    --bg-page:#0e1118;
    --surface:#161b26;
    --surface-border:#262d3d;
    --accent:#4fae84;
    --accent-ink:#7fd1a8;
    --accent-soft:#17352b;
    --star:#d7ac5c;
    --shadow: 0 20px 44px -22px rgba(0,0,0,0.65);
  }

  *{ box-sizing:border-box; }
  body{
    margin:0;
    background:var(--bg-page);
    color:var(--ink);
    font-family:"IBM Plex Sans", system-ui, -apple-system, Segoe UI, sans-serif;
  }

  /* ===================== Section Témoignages ===================== */
  .testimonials-section{
    position:relative;
    padding:88px 0 100px;
    overflow:hidden;
    background-image:
      radial-gradient(circle at 1px 1px, color-mix(in srgb, var(--accent) 16%, transparent) 1px, transparent 1.6px);
    background-size:26px 26px;
    background-position:center top;
  }
  .testimonials-section::before{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(180deg, var(--bg-page) 0%, transparent 14%, transparent 86%, var(--bg-page) 100%);
    pointer-events:none;
  }

  .section-head{
    max-width:640px;
    margin:0 auto 56px;
    text-align:center;
    position:relative;
    z-index:1;
  }
  .eyebrow{
    display:inline-block;
    font-family:"Chakra Petch", sans-serif;
    font-weight:600;
    font-size:0.78rem;
    letter-spacing:0.14em;
    text-transform:uppercase;
    color:var(--accent-ink);
    background:var(--accent-soft);
    padding:6px 14px;
    border-radius:4px;
    margin-bottom:18px;
  }
  .section-head h2{
    font-family:"Chakra Petch", sans-serif;
    font-weight:700;
    font-size:clamp(1.7rem, 3vw, 2.4rem);
    line-height:1.2;
    margin:0 0 14px;
    text-wrap:balance;
  }
  .section-head .lead-text{
    color:var(--ink-soft);
    font-size:1.05rem;
    line-height:1.6;
    margin:0;
  }

  .testimonial-carousel{
    position:relative;
    z-index:1;
    max-width:760px;
    margin:0 auto;
  }

  .t-card{
    background:var(--surface);
    border:1px solid var(--surface-border);
    border-radius:18px;
    box-shadow:var(--shadow);
    padding:48px 44px 36px;
    position:relative;
    min-height:340px;
    display:flex;
    flex-direction:column;
  }
  .t-card .quote-mark{
    position:absolute;
    top:18px;
    left:36px;
    font-family:"Chakra Petch", sans-serif;
    font-size:4.5rem;
    font-weight:700;
    line-height:1;
    color:var(--accent-soft);
    user-select:none;
  }
  .t-stars{
    color:var(--star);
    letter-spacing:3px;
    font-size:1.05rem;
    margin-bottom:18px;
    position:relative;
    z-index:1;
  }
  .t-stars .dim{ color:var(--surface-border); }

  .t-quote{
    font-size:1.2rem;
    line-height:1.65;
    color:var(--ink);
    margin:0 0 28px;
    position:relative;
    z-index:1;
    flex:1;
  }

  .t-footer{
    display:flex;
    align-items:center;
    gap:14px;
    padding-top:20px;
    border-top:1px solid var(--surface-border);
  }
  .t-avatar{
    width:52px;
    height:52px;
    flex:none;
    border-radius:50%;
    object-fit:cover;
    border:2px solid var(--accent-soft);
    box-shadow:0 0 0 1px var(--surface-border);
  }
  .t-id strong{
    display:block;
    font-size:0.98rem;
    font-weight:600;
  }
  .t-id span{
    display:block;
    color:var(--ink-soft);
    font-size:0.86rem;
  }
  .t-tag{
    margin-left:auto;
    font-family:"Chakra Petch", sans-serif;
    font-size:0.72rem;
    font-weight:600;
    letter-spacing:0.08em;
    text-transform:uppercase;
    color:var(--ink-soft);
    border:1px solid var(--surface-border);
    padding:5px 10px;
    border-radius:20px;
    white-space:nowrap;
  }

  .t-controls{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:22px;
    margin-top:34px;
  }
  .t-arrow{
    width:42px;
    height:42px;
    border-radius:50%;
    border:1px solid var(--surface-border);
    background:var(--surface);
    color:var(--ink);
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    transition:background .15s ease, color .15s ease, transform .15s ease;
  }
  .t-arrow:hover{
    background:var(--accent);
    border-color:var(--accent);
    color:#fff;
    transform:translateY(-1px);
  }
  .t-arrow:focus-visible{
    outline:2px solid var(--accent);
    outline-offset:2px;
  }
  .t-progress{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:7px;
    width:220px;
  }
  .t-progress-track{
    width:100%;
    height:4px;
    border-radius:2px;
    background:var(--surface-border);
    overflow:hidden;
  }
  .t-progress-fill{
    height:100%;
    width:0%;
    background:var(--accent);
    border-radius:2px;
    transition:width .25s ease;
  }
  .t-counter{
    font-family:"Chakra Petch", sans-serif;
    font-size:0.76rem;
    letter-spacing:0.06em;
    color:var(--ink-soft);
    font-variant-numeric:tabular-nums;
  }

  @media (prefers-reduced-motion: reduce){
    .t-arrow, .t-progress-fill{ transition:none; }
  }

  @media (max-width: 576px){
    .t-card{ padding:40px 26px 28px; }
    .t-quote{ font-size:1.08rem; }
  }
</style>
</head>
<body>

<!-- ===== Copier à partir d'ici : Section Témoignages ===== -->
<section class="testimonials-section" id="temoignages">
  <div class="container">

    <div class="section-head">
      <span class="eyebrow">Kundenbewertungen</span>
      <h2>Sie haben unsere Finanzdienstleistungen in Anspruch genommen</h2>
      <p class="lead-text">Fiktive Beispielbewertungen zu Finanzierung und Betreuung.</p>
    </div>

    <div id="robotTestimonialCarousel" class="carousel slide testimonial-carousel" data-bs-ride="carousel" data-bs-interval="6000">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe eine Finanzierung in Höhe von 75.000 € für mein Projekt erhalten. Ich habe die Seriosität und die Qualität der Betreuung sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Illustration für Markus Schneider">
              <div class="t-id">
                <strong>Markus Schneider</strong>
              </div>
         
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für mein Projekt benötigte ich 120.000 €. Die Kommunikation war von Anfang bis Ende klar und professionell.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Illustration für Anna Müller">
              <div class="t-id">
                <strong>Anna Müller</strong>
                
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★<span class="dim">★</span></div>
            <p class="t-quote">„Ich habe eine Finanzierung von 250.000 € für mein berufliches Projekt angefragt. Ich habe die Erreichbarkeit und die Seriosität des Teams sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Illustration für Thomas Weber">
              <div class="t-id">
                <strong>Thomas Weber</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für meinen Finanzierungsbedarf von 90.000 € erhielt ich eine Betreuung, die ich als sehr professionell empfunden habe.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/76.jpg" alt="Illustration für Sophie Wagner">
              <div class="t-id">
                <strong>Sophie Wagner</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Meine Finanzierung in Höhe von 350.000 € hat mir ermöglicht, mein Projekt voranzubringen. Ich habe die Qualität der Kommunikation sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/21.jpg" alt="Illustration für Michael Becker">
              <div class="t-id">
                <strong>Michael Becker</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★<span class="dim">★</span></div>
            <p class="t-quote">„Ich habe eine Finanzierung von 60.000 € erhalten. Die einzelnen Schritte wurden mir klar erklärt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/51.jpg" alt="Illustration für Julia Hoffmann">
              <div class="t-id">
                <strong>Julia Hoffmann</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Bei einer Finanzierung von 180.000 € habe ich die schnelle Reaktion und die Seriosität des Services sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/9.jpg" alt="Illustration für Daniel Fischer">
              <div class="t-id">
                <strong>Daniel Fischer</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für mein Projekt benötigte ich 500.000 €. Ich habe die professionelle Kommunikation und die Betreuung meiner Anfrage sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/5.jpg" alt="Illustration für Laura Schmidt">
              <div class="t-id">
                <strong>Laura Schmidt</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe eine Finanzierung von 95.000 € erhalten. Die Betreuung war klar und professionell.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/15.jpg" alt="Illustration für Andreas Keller">
              <div class="t-id">
                <strong>Andreas Keller</strong>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★<span class="dim">★</span></div>
            <p class="t-quote">„Bei einer Finanzierung von 200.000 € habe ich die Erreichbarkeit der Ansprechpartner und die Klarheit der Informationen sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/12.jpg" alt="Illustration für Claudia Bauer">
              <div class="t-id">
                <strong>Claudia Bauer</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich benötigte 450.000 € für eine größere Investition. Ich habe die sorgfältige Bearbeitung meiner Anfrage sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/24.jpg" alt="Illustration für Stefan Richter">
              <div class="t-id">
                <strong>Stefan Richter</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Meine Finanzierung von 80.000 € hat mir ermöglicht, mein Projekt zu verwirklichen. Die Kommunikation war sehr gut.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/18.jpg" alt="Illustration für Katharina Wolf">
              <div class="t-id">
                <strong>Katharina Wolf</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe 300.000 € für mein Projekt erhalten. Die Betreuung und die Erreichbarkeit des Teams waren sehr zufriedenstellend.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/31.jpg" alt="Illustration für Peter Schäfer">
              <div class="t-id">
                <strong>Peter Schäfer</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★<span class="dim">★</span></div>
            <p class="t-quote">„Bei einem Finanzierungsbedarf von 150.000 € habe ich die Qualität der Kommunikation und die Professionalität des Services sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/23.jpg" alt="Illustration für Lisa Neumann">
              <div class="t-id">
                <strong>Lisa Neumann</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für mein Projekt benötigte ich 600.000 €. Ich habe die Seriosität und die klare Kommunikation sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/38.jpg" alt="Illustration für Frank Zimmermann">
              <div class="t-id">
                <strong>Frank Zimmermann</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe eine Finanzierung von 110.000 € erhalten. Der Ablauf wurde mir klar und strukturiert erklärt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/29.jpg" alt="Illustration für Maria Krüger">
              <div class="t-id">
                <strong>Maria Krüger</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für mein Projekt benötigte ich 275.000 €. Ich habe die Erreichbarkeit und die Professionalität des Teams sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/46.jpg" alt="Illustration für Christian Hartmann">
              <div class="t-id">
                <strong>Christian Hartmann</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★<span class="dim">★</span></div>
            <p class="t-quote">„Ich habe eine Finanzierung von 425.000 € angefragt und die sorgfältige Betreuung meiner Anfrage sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/37.jpg" alt="Illustration für Nicole Lange">
              <div class="t-id">
                <strong>Nicole Lange</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für mein Projekt benötigte ich eine Finanzierung von 700.000 €. Ich habe die Qualität der Kommunikation und die sorgfältige Betreuung sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/52.jpg" alt="Illustration für Matthias König">
              <div class="t-id">
                <strong>Matthias König</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe 135.000 € für mein Projekt erhalten. Die bereitgestellten Informationen waren klar und verständlich.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/41.jpg" alt="Illustration für Sabine Werner">
              <div class="t-id">
                <strong>Sabine Werner</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Bei einer Finanzierung von 320.000 € habe ich die schnelle Reaktion und die Professionalität des Services sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/59.jpg" alt="Illustration für Jürgen Maier">
              <div class="t-id">
                <strong>Jürgen Maier</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Meine Finanzierung von 85.000 € hat mir ermöglicht, mein Projekt voranzubringen. Ich habe die Betreuung sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/47.jpg" alt="Illustration für Melanie Krause">
              <div class="t-id">
                <strong>Melanie Krause</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★<span class="dim">★</span></div>
            <p class="t-quote">„Ich benötigte 550.000 €. Die Kommunikation war seriös und die Informationen wurden klar vermittelt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/64.jpg" alt="Illustration für Robert Lehmann">
              <div class="t-id">
                <strong>Robert Lehmann</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe eine Finanzierung von 175.000 € erhalten. Ich habe die Erreichbarkeit und die Qualität der Betreuung sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/55.jpg" alt="Illustration für Nina Schubert">
              <div class="t-id">
                <strong>Nina Schubert</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für ein Projekt mit einem Finanzierungsbedarf von 800.000 € habe ich die Seriosität der Betreuung und die Qualität der Kommunikation sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/71.jpg" alt="Illustration für Wolfgang Mayer">
              <div class="t-id">
                <strong>Wolfgang Mayer</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe eine Finanzierung von 140.000 € erhalten. Die Kommunikation war professionell und gut organisiert.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/62.jpg" alt="Illustration für Sandra Braun">
              <div class="t-id">
                <strong>Sandra Braun</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für mein Projekt benötigte ich eine Finanzierung von 225.000 €. Ich habe die Erreichbarkeit des Teams und die bereitgestellten Erklärungen sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/79.jpg" alt="Illustration für Florian Hofmann">
              <div class="t-id">
                <strong>Florian Hofmann</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe 375.000 € erhalten. Die Bearbeitung meiner Anfrage war seriös und die Informationen waren klar.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/73.jpg" alt="Illustration für Petra Seidel">
              <div class="t-id">
                <strong>Petra Seidel</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Für mein Projekt benötigte ich eine Finanzierung von 1.000.000 €. Ich habe die Professionalität und die Qualität der Kommunikation sehr geschätzt.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/women/86.jpg" alt="Illustration für Sebastian Graf">
              <div class="t-id">
                <strong>Sebastian Graf</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="t-card">
            <span class="quote-mark">&rdquo;</span>
            <div class="t-stars">★★★★★</div>
            <p class="t-quote">„Ich habe eine Finanzierung von 650.000 € für mein Projekt erhalten. Ich bin mit der Qualität der Betreuung und der Kommunikation sehr zufrieden.“</p>
            <div class="t-footer">
              <img class="t-avatar" src="https://randomuser.me/api/portraits/men/81.jpg" alt="Illustration für Monika Busch">
              <div class="t-id">
                <strong>Monika Busch</strong>
                <span>Finanzierung</span>
              </div>
              <span class="t-tag">Finanzierung</span>
            </div>
          </div>
        </div>

      </div>

      <div class="t-controls">
        <button class="t-arrow" type="button" data-bs-target="#robotTestimonialCarousel" data-bs-slide="prev" aria-label="Témoignage précédent">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        </button>

        <div class="t-progress">
          <div class="t-progress-track">
            <div class="t-progress-fill" id="tProgressFill"></div>
          </div>
          <span class="t-counter" id="tCounter">1 / 30</span>
        </div>

        <button class="t-arrow" type="button" data-bs-target="#robotTestimonialCarousel" data-bs-slide="next" aria-label="Témoignage suivant">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        </button>
      </div>

    </div>
  </div>
</section>
<!-- ===== Fin de la section Témoignages ===== -->

<script>
  // Synchronise la barre de progression et le compteur avec le carrousel Bootstrap
  var carouselEl = document.getElementById('robotTestimonialCarousel');
  var total = carouselEl.querySelectorAll('.carousel-item').length;
  var fillEl = document.getElementById('tProgressFill');
  var counterEl = document.getElementById('tCounter');

  function updateProgress(index) {
    fillEl.style.width = ((index + 1) / total * 100) + '%';
    counterEl.textContent = (index + 1) + ' / ' + total;
  }

  carouselEl.addEventListener('slide.bs.carousel', function (e) {
    updateProgress(e.to);
  });

  updateProgress(0);
</script>

</body>
</html>
