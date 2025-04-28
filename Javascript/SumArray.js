function sumArray(tallListe) {
  let sum = 0;
  for (let i = 0; i < tallListe.length; i++) {
    sum += tallListe[i];
  }
  return sum;
}

const tallListe = [1, 2, 3, 4, 5];
console.log(sumArray(tallListe));

