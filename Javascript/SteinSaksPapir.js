const valg = ["stein", "saks", "papir"];

function spill(spillerValg) {
  const datamaskinValg = valg[Math.floor(Math.random() * valg.length)];

  console.log(`Du valgte: ${spillerValg}`);
  console.log(`Datamaskinen valgte: ${datamaskinValg}`);
  
  if (spillerValg === datamaskinValg) {
    console.log("Det ble uavgjort!");
  } else if ((spillerValg === "stein" && datamaskinValg === "saks") ||
             (spillerValg === "saks" && datamaskinValg === "papir") ||
             (spillerValg === "papir" && datamaskinValg === "stein")) {
    console.log(`Du vant! ${spillerValg.charAt(0).toUpperCase() + spillerValg.slice(1)} slår ${datamaskinValg}.`);
  } else {
    console.log(`Datamaskinen vant! ${datamaskinValg.charAt(0).toUpperCase() + datamaskinValg.slice(1)} slår ${spillerValg}.`);
  }
}

spill("papir");
