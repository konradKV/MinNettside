
<?php
//login check
require_once '/xampp/htdocs/php-crash/Logincheck.php';
requireLogin();
?>
    <!DOCTYPE html> 
    <html>
    <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="/Css/Styles.css">
        <script src="/Javascript/js.js"></script>
        <title>Min Nettside</title>

    </head>
    <body> 
  <?php
        include("Include/navbar.php");
    ?>

                <!-- Hero  -->
        <section id="home">
                <h1>Velkommen til nettsiden min!</h1>
        </section>


        <div class="container">
        <!-- Skills  -->
        <section id="skills">
            <h2>Hva kan jeg?</h2>
            <p>Jeg har ennå mye å lære, men jeg er ivrig etter å bli bedre. Akkurat nå har jeg fått en del erfaring med programmering, særlig i HTML og CSS, og jeg jobber også med å lære JavaScript og Python. Utenfor skolen liker jeg å eksperimentere med spillutvikling og prøve meg på ulike kreative prosjekter.</p>
            <p>Selv om jeg noen ganger føler meg "cooked", jobber jeg hardt for å forbedre meg hver dag. Å bli god på noe tar tid, men jeg er klar for utfordringen!</p>
        </section>


        <!-- About  -->
        <section id="about">
            <h2>    Om meg</h2>
            <p>Hei, jeg heter Konrad, og jeg går på Amalie Skram videregående skole. Jeg har stor interesse for teknologi, spesielt programmering, og jeg bruker mye av fritiden min på å spille dataspill og jobbe med små prosjekter. Jeg har alltid likt å utfordre meg selv med nye ting, enten det handler om å lære et nytt programmeringsspråk eller bli bedre på strategiske spill.</p>
            <p>I tillegg til teknologi og gaming, er jeg glad i å tilbringe tid med venner og utforske nye hobbyer. Jeg håper å fortsette å utvikle mine ferdigheter innenfor IT og en dag kunne jobbe profesjonelt innen dette feltet.</p>
        </section>
        

        <!-- Contact -->
        <section id="contact">
            <h2>Kontakt meg</h2> 
            <p>Jeg er alltid åpen for nye prosjekter eller spørsmål. Hvis du vil ta kontakt med meg, kan du sende meg en e-post eller ringe meg direkte.</p>
            <p>Email: <a href="mailto:kvedoy08@gmail.com">kvedoy08@gmail.com</a></p>
            <p>Telefon: <a href="tel:+4746767066">+47 46767066</a></p>
        </section>  

        <section id="Musikk">
            <h2>Klikk knappen for bakgrunsmusikk</h2>
            <button class="button1" onclick="playSound()">Spill lyd</button>
            <p>Sang: Ballade of Tobias </p>
            <p>Artist: Mats fra 1IMB</p>
            <p> youtube:<a href="https://www.youtube.com/@Mats_Fra_IMB1">https://www.youtube.com/@Mats_Fra_IMB1</a></p>
        </section>


        <!-- AI Chatbot Section -->
        <section id="ai-chatbot">
            <h2>Har du flere spørsmål?</h2> 
            <p>Klikk her for å bruke spørre spørsmål til en AI chatbot som er trent opp til å svare på spørsmål om meg.</p>
            <a href="html/Ai.php"><button class="button1">Klikk her for en AI chatbot</button></a> 
        </section>


</div>
        <!-- External Link -->
        <footer>    
            <h2>Hvor bor eg?</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.8856881926565!2d5.464043420704185!3d60.18262431414696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x463c5f3102904dd1%3A0x7e9c6126456f437c!2sKolabakkane%2012%2C%205200%20Os!5e0!3m2!1sno!2sno!4v1726818631410!5m2!1sno!2sno" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.8856881926565!2d5.464043420704185!3d60.18262431414696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x463c5f3102904dd1%3A0x7e9c6126456f437c!2sKolabakkane%2012%2C%205200%20Os!5e0!3m2!1sno!2sno!4v1726818631410!5m2!1sno!2sno" target="_blank">Besøk W3Schools for mer læring om webutvikling!</a>
        </footer>
    </body>
    </html>

