<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/Naturfag.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biogassprosjekt</title>
</head>
<body>
    <nav>
        <div>
            <a href="../Html/HvordanFungererBiogass.html">Hvordan Fungerer Biogass?</a>
            <a href="../Html/StatestikkNaturfag.html">statestikk</a>          
        </div>
    </nav>

    <section class="hero">
        <h1>Velkommen til Biogassprosjektet</h1>
        <p>Utforsk hvordan vi kan brruke matavfall til å produsere bærekraftig energi.</p>
        <img src="../Bilder/Gass.jpg">
    </section>

    <main>
        <section id="introduksjon">
            <h2>Introduksjon</h2>
            <p>Dette prosjektet handler om å lage biogass ved å bruke matavfall som råmateriale. Målet er å vise hvordan vi kan utnytte biologisk nedbrytbart avfall på en bærekraftig måte.</p>
        </section>

        <section id="forskningssporsmal">
            <h2>Forskningsspørsmål</h2>
            <p><strong>Problemstilling:</strong> Hvordan kan matavfall brukes til å produsere biogass som en alternativ energikilde?</p>
        </section>

        <section id="eksperiment">
            <h2>Eksperiment</h2>
            <p>For å lage biogass har vi gjort følgende:</p>
            <ul>
                <li>Lagt frukt og annen mat som kan råtne i en plastflaske.</li>
                <li>Plassert en ballong på toppen for å samle opp gassen som produseres.</li>
                <li>Overvåket prosessen i 2 uker.</li>
            </ul>
        </section>
        <section id="resultater">
            <h2>Resultater</h2>
            <p>Under dette eksperimentet oppdaget vi at det ikke ble produsert så mye biogass som vi hadde forventet. Dette kan skyldes flere feilkilder:</p>
            <ul>
                <li>Ikke nok varme: Temperaturen i rommet hvor eksperimentet ble utført var ikke høy nok for å fremme anaerob nedbrytning.</li>
                <li>For lite vann: Det var ikke nok vann i flasken for å opprettholde en optimalt fuktig miljø for mikroorganismene.</li>
                <li>Ugyldig materiale: Bruken av frukt og annen mat som kan råtne kan ikke ha vært det beste valget for å produsere biogass.</li>
            </ul>
            <p>For å forbedre eksperimentet neste gang, vil vi:</p>
            <ul>
                <li>Øke temperaturen i rommet.</li>
                <li>Legge til mer vann i flasken.</li>
                <li>Prøve med andre typer matavfall som kan være mer egnet for biogassproduksjon.</li>
            </ul>
            <img src="../biogassBILDE.webp" alt="Resultater av biogassprosjektet">
        </section>

        <section class="interactive">
            <h2>Interaktiv del</h2>
            <p>Se hvordan biogass kan brukes som energikilde ved å trykke på knappen under:</p>
            <button id="popup-btn">Hva kan biogass brukes til?</button>
        </section>

        <section id="lydclip">
            <h2>Vår biogass podcast!</h2>
            <p>Lytt til et lydklipp om biogassproduksjon:</p>
            <audio controls>
                <source src="../Bilder/Podcast.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </section>

        <!-- Popup and overlay -->
        <div class="popup-overlay" id="popup-overlay"></div>
        <div class="popup" id="popup">
            <h3>Biogass Bruksområder</h3>
            <p>Biogass kan brukes til:</p>
            <ul>
                <li>Matlaging</li>
                <li>Oppvarming</li>
                <li>Strømproduksjon</li>
            </ul>
            <button class="close-btn" id="close-btn">Lukk</button>
        </div>
    </main>

    <script>
        // Select elements
        const popupBtn = document.getElementById("popup-btn");
        const popup = document.getElementById("popup");
        const overlay = document.getElementById("popup-overlay");
        const closeBtn = document.getElementById("close-btn");

        // Show popup
        popupBtn.addEventListener("click", () => {
            popup.style.display = "block";
            overlay.style.display = "block";
        });

        // Hide popup
        closeBtn.addEventListener("click", () => {
            popup.style.display = "none";
            overlay.style.display = "none";
        });

        // Hide popup when clicking outside
        overlay.addEventListener("click", () => {
            popup.style.display = "none";
            overlay.style.display = "none";
        });
    </script>
</body>
</html>
