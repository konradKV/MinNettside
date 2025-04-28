const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;

// Konfigurer Express til å bruke EJS og body-parser
app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({ extended: true }));

// Opprett en tilkobling til SQLite-databasen
const db = new sqlite3.Database('database.db');

// Rute for å vise brukerne
app.get('/', (req, res) => {
    db.all('SELECT * FROM users', [], (err, rows) => {
        if (err) {
            console.error(err.message);
            res.status(500).send("Database error!");
        } else {
            res.render('index', { users: rows });
        }
    });
});

// Rute for å legge til en ny bruker
app.post('/add', (req, res) => {
    const { name, email } = req.body;
    db.run('INSERT INTO users (name, email) VALUES (?, ?)', [name, email], (err) => {
        if (err) {
            console.error(err.message);
        }
        res.redirect('/'); // Oppdater siden
    });
});

// Rute for å slette en bruker
app.post('/delete', (req, res) => {
    const { id } = req.body;
    db.run('DELETE FROM users WHERE id = ?', [id], (err) => {
        if (err) {
            console.error(err.message);
        }
        res.redirect('/'); // Oppdater siden
    });
});

// Start serveren
app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}/`);
});