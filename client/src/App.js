import './App.css';
import { useState } from 'react';
import Axios from 'axios';


function App() {

  const[nimi, uusiNimi] = useState('');
  const[titteli, uusiTitteli] = useState('');
  const[sahkopostiosoite, uusiSahkopostiosoite] = useState('');
  const[puhelinnumero, uusiPuhelinnumero] = useState('');
  const[henkilolista, uusiHenkilolista] = useState([]);

  const[paivitaPuhelin, uusiPuhelin] = useState('');
  const[paivitaSahkoposti, uusiSahkoposti] = useState('');

  const talletaHenkilo = () => {

    Axios.post('http://localhost:3001/luo', {
      nimi: nimi, 
      titteli: titteli,
      sahkopostiosoite: sahkopostiosoite,
      puhelinnumero: puhelinnumero,

      }).then(() => {
        console.log('Tallennus toimii');
      })
     
  }

  const haeHenkilot = () => {

    Axios.get('http://localhost:3001/hae').then((response) => {

      uusiHenkilolista(response.data);

    })

  }
  
  const paivitaTiedot = (id) => {

    Axios.put('http://localhost:3001/paivitys', {
      id: id,
      sahkoposti: paivitaSahkoposti,
      puhelin: paivitaPuhelin,
    }).then ((response) => {
      alert('Tiedot päivitetty');
    })



  }

const poistaTiedot = (id) => {

Axios.delete("http://localhost:3001/poista/"+id).then((response) => {

  uusiHenkilolista(henkilolista.filter((val) => {
    return val.ID != id
  }))

})

}
  return (
    <div className="App">
      <div className="lomake">
        <label>Nimi</label>
        <input type="text" onChange={(event) => {uusiNimi(event.target.value)}} />
        <label>Titteli</label>
        <input type="text" onChange={(event) => {uusiTitteli(event.target.value)}} />
        <label>Sähköpostiosoite</label>
        <input type="text" onChange={(event) => {uusiSahkopostiosoite(event.target.value)}} />
        <label>Puhelinnumero</label>
        <input type="text" onChange={(event) => {uusiPuhelinnumero(event.target.value)}} />
        <button onClick={talletaHenkilo}>Talleta</button>
        <button onClick={haeHenkilot}>Hae henkilöt</button>

      </div>
      <div className="tiedot">
          {
              henkilolista.map((val, key) => {

                return <div className="kortti" key={val.ID}> {val.nimi} <br />{val.titteli}<br />
                <input type="text" defaultValue={val.Sahköpostiosoite} onChange={(event) => {uusiSahkoposti(event.target.value)}} />
                <br/>
                <input type="text" defaultValue={val.Puhelinnumero} onChange={(event) => {uusiPuhelin(event.target.value)}}></input>
                <button onClick={()=>{paivitaTiedot(val.ID)}}>Päivitä</button>
                <button onClick={()=>{poistaTiedot(val.ID)}}>Poista tiedot</button>
                </div>
              })


          }
      </div>
    </div>

  );
}

export default App;
