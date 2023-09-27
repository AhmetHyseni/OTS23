const express = require('express');
const app = express();
const mysql = require('mysql');
const cors = require('cors');

app.use(cors());
app.use(express.json());

const db = mysql.createConnection({
    user: 'root',
    host: 'localhost',
    password: '',
    database: 'henkilorekisteri'
})

app.post('/luo', (req, res) => {

    const nimi = req.body.nimi;
    const titteli = req.body.titteli;
    const sahkoposti = req.body.sahkopostiosoite;
    const puhelin = req.body.puhelinnumero;

    db.query("INSERT INTO henkilorekisteri (nimi, puhelinnumero, sahkopostiosoite, titteli) VALUES (?,?,?,?)", 
    [nimi, puhelin, sahkoposti, titteli], (err, result) => {
        if(err)
        {
            console.log(err);
        }
        else
        {
            res.send(result);
        }
    })
})


app.get('/hae', (req, res) => {
    db.query("SELECT * FROM henkilorekisteri", (err, result) => {
        if(err)
        {
            console.log(err);
        }
        else{
            res.send(result);
        }
    })
})

app.put('/paivitys', (req, res) => {

    const id = req.body.id;
    const puhelin = req.body.puhelin;
    const sahkoposti = req.body.sahkoposti;

    db.query("UPDATE henkilorekisteri SET puhelinnumero = ?, sahkopostiosoite = ? WHERE ID = ?", [puhelin, sahkoposti, id], (err, result) => {
        if(err)
        {
            console.log(err);
        }
        else
        {
            res.send('Tiedot lisätty');
        }
    })
})

app.delete('/poista/:id', (req, res) => {

    const id = req.params.id;

    db.query("DELETE FROM henkilorekisteri WHERE ID = ?", id, (err, result) => {
        if(err)
        {
            console.log(err);
        }
        else
        {
            res.send(result);
        }
    })
})

app.listen(3001, () => {
    console.log('Palvelin toimii');
})
