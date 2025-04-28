// Når DOM er ferdig lastet
document.addEventListener('DOMContentLoaded', () => {
    // Hent board og winner elementer fra DOM
    const boardElement = document.getElementById('board');
    const winnerElement = document.getElementById('winner');
    // Initialiser board, currentPlayer, winner og wins
    let board = ['', '', '', '', '', '', '', '', ''];
    let currentPlayer = 'X';
    let winner = null; 
    let wins = { X: 0, O: 0 }; 
  
    // Funksjon for å opprette board
    function createBoard() {  
      boardElement.innerHTML = '';
      board.forEach((cell, index) => {
        const cellElement = document.createElement('div');
        cellElement.classList.add('cell');
        cellElement.textContent = cell;
        cellElement.addEventListener('click', () => makeMove(index));
        boardElement.appendChild(cellElement);
      });
    }
  
    // Funksjon for å gjøre et trekk
    function makeMove(index) {
      if (board[index] === '' && !checkWinner()) {
        board[index] = currentPlayer;
        currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
        createBoard();
        winner = checkWinner(); // Sjekk for vinner etter hvert trekk
        if (winner) {
          wins[winner]++; // Øk antall seire for vinneren
          winnerElement.textContent = `${winner} wins!`;
          displayWins(); // Vis oppdaterte seire
        } else if (!board.includes('')) {
          winnerElement.textContent = 'It\'s a draw!';
        }
      }
    }
  
    // Funksjon for å sjekke om det er en vinner
    function checkWinner() {
      const winningCombinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8],
        [0, 3, 6], [1, 4, 7], [2, 5, 8],
        [0, 4, 8], [2, 4, 6]
      ];
  
      for (const combination of winningCombinations) {
        const [a, b, c] = combination;
        if (board[a] && board[a] === board[b] && board[a] === board[c]) {
          return board[a];
        }
      }
  
      return null;
    }
  
    // Funksjon for å tilbakestille spillet
    function resetGame() {
      board = ['', '', '', '', '', '', '', '', ''];
      currentPlayer = 'X';
      winner = null; // Tilbakestill vinner til null
      winnerElement.textContent = '';
      createBoard();
    }
  
    // Funksjon for å vise seire
    function displayWins() {
      const winsElement = document.createElement('div');
      winsElement.textContent = `Wins: X - ${wins.X}, O - ${wins.O}`;
      boardElement.appendChild(winsElement);
    }
  
    // Sørg for at reset-knappen er riktig koblet
    window.resetGame = resetGame;
  
    // Initialiser boardet når siden lastes
    createBoard();
  });

