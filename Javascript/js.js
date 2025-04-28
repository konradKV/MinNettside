document.getElementById("button1").addEventListener("click", playSound);

function playSound() {
  const audio = new Audio("bilder/musikk.webm");
  audio.play().catch(error => {
    console.error("Error playing audio:", error);
  });
}