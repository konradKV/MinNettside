<script>
  let brukerScore = 0;
  let robotScore = 0;

  function spill() {
    let brukerValg = document.getElementById("brukerValg").value;
    let robotValg = Math.random();

    if (robotValg < 0.34) {
      robotValg = "stein";
    } else if (robotValg <= 0.67) {
      robotValg = "saks";
    } else {
      robotValg = "papir";
    }

    let result = "";
    if (brukerValg === robotValg) {
      result = "Det ble uavgjort!";
    } else if (brukerValg === "stein") {
      if (robotValg === "saks") {
        result = "Bruker vant! Stein knuser saks.";
        brukerScore++;
      } else {
        result = "Robot vant! Papir dekker stein.";
        robotScore++;
      }
    } else if (brukerValg === "saks") {
      if (robotValg === "papir") {
        result = "Bruker vant! Saks kuttes papir.";
        brukerScore++;
      } else {
        result = "Robot vant! Stein knuser saks.";
        robotScore++;
      }
    } else if (brukerValg === "papir") {
      if (robotValg === "stein") {
        result = "Bruker vant! Papir dekker stein.";
        brukerScore++;
      } else {
        result = "Robot vant! Saks kuttes papir.";
        robotScore++;
      }
    }

    document.getElementById("result").innerHTML = result;
    document.getElementById("score").innerHTML = "Score: Bruker - " + brukerScore + ", Robot - " + robotScore;
  }
</script>

<input id="brukerValg" type="text" placeholder="Skriv inn stein, saks eller papir">
<button onclick="spill()">Spill</button>
<p id="result"></p>
<p id="score"></p>

