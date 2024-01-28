
import React, { useState, useEffect } from 'react';
import './App.css';

// Definir los palos y los valores de las cartas

const baraja_inicial = [
  { nombre: '2_of_clubs.png', valor: 2 },
  { nombre: '3_of_clubs.png', valor: 3 },
  { nombre: '4_of_clubs.png', valor: 4 },
  { nombre: '5_of_clubs.png', valor: 5 },
  { nombre: '6_of_clubs.png', valor: 6 },
  { nombre: '7_of_clubs.png', valor: 7 },
  { nombre: '8_of_clubs.png', valor: 8 },
  { nombre: '9_of_clubs.png', valor: 9 },
  { nombre: '10_of_clubs.png', valor: 10 },
  { nombre: 'jack_of_clubs.png', valor: 10 },
  { nombre: 'queen_of_clubs.png', valor: 10 },
  { nombre: 'king_of_clubs.png', valor: 10 },
  { nombre: 'ace_of_clubs.png', valor: 11 },
  { nombre: '2_of_diamonds.png', valor: 2 },
  { nombre: '3_of_diamonds.png', valor: 3 },
  { nombre: '4_of_diamonds.png', valor: 4 },
  { nombre: '5_of_diamonds.png', valor: 5 },
  { nombre: '6_of_diamonds.png', valor: 6 },
  { nombre: '7_of_diamonds.png', valor: 7 },
  { nombre: '8_of_diamonds.png', valor: 8 },
  { nombre: '9_of_diamonds.png', valor: 9 },
  { nombre: '10_of_diamonds.png', valor: 10 },
  { nombre: 'jack_of_diamonds.png', valor: 10 },
  { nombre: 'queen_of_diamonds.png', valor: 10 },
  { nombre: 'king_of_diamonds.png', valor: 10 },
  { nombre: 'ace_of_diamonds.png', valor: 11 },
  { nombre: '2_of_hearts.png', valor: 2 },
  { nombre: '3_of_hearts.png', valor: 3 },
  { nombre: '4_of_hearts.png', valor: 4 },
  { nombre: '5_of_hearts.png', valor: 5 },
  { nombre: '6_of_hearts.png', valor: 6 },
  { nombre: '7_of_hearts.png', valor: 7 },
  { nombre: '8_of_hearts.png', valor: 8 },
  { nombre: '9_of_hearts.png', valor: 9 },
  { nombre: '10_of_hearts.png', valor: 10 },
  { nombre: 'jack_of_hearts.png', valor: 10 },
  { nombre: 'queen_of_hearts.png', valor: 10 },
  { nombre: 'king_of_hearts.png', valor: 10 },
  { nombre: 'ace_of_hearts.png', valor: 11 },
  { nombre: '2_of_spades.png', valor: 2 },
  { nombre: '3_of_spades.png', valor: 3 },
  { nombre: '4_of_spades.png', valor: 4 },
  { nombre: '5_of_spades.png', valor: 5 },
  { nombre: '6_of_spades.png', valor: 6 },
  { nombre: '7_of_spades.png', valor: 7 },
  { nombre: '8_of_spades.png', valor: 8 },
  { nombre: '9_of_spades.png', valor: 9 },
  { nombre: '10_of_spades.png', valor: 10 },
  { nombre: 'jack_of_spades.png', valor: 10 },
  { nombre: 'queen_of_spades.png', valor: 10 },
  { nombre: 'king_of_spades.png', valor: 10 },
  { nombre: 'ace_of_spades.png', valor: 11 },
];

function shuffleDeck(deck) {
  // Create a copy of the original array to avoid modifying the original array
  const shuffledDeck = [...deck];

  // Fisher-Yates shuffle algorithm
  for (let i = shuffledDeck.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    // Swap elements at indices i and j
    [shuffledDeck[i], shuffledDeck[j]] = [shuffledDeck[j], shuffledDeck[i]];
  }

  return shuffledDeck;
}

// Baraja el deck al comienzo


const App = () => {
  /* Estados para la baraja de cartas, mano del jugador, mano del crupier y estado del juego
  const [deck, setDeck] = useState([]);
  const [playerHand, setPlayerHand] = useState([]);
  const [dealerHand, setDealerHand] = useState([]);
  const [shuffledDeck, setShuffledDeck] = useState([]);
  const [hitCard,setHitCard] = useState([]);
  */

  const [playerCards, setPlayerCards] = useState([]);
  const [dealerCards, setDealerCards] = useState([]);
  const [hitCard, setHitCard] = useState([]);
  const [showDealerFirstCard, setShowDealerFirstCard] = useState(false);
  const [shuffledDeck, setShuffledDeck] = useState([]);

  useEffect(() => {
    const initialDeck = shuffleDeck([...baraja_inicial]); // Barajar la baraja inicial
    setShuffledDeck(initialDeck); // Establecer la baraja barajada en el estado

    // Repartir cartas al jugador y al crupier al principio del juego
    const initialPlayerCards = [initialDeck.pop()]; // Sacar una carta para el jugador
    setPlayerCards(initialPlayerCards); // Establecer la mano del jugador en el estado

    const initialDealerCards = [initialDeck.pop(), { name: 'back.png', value: 0 }]; // Sacar una carta para el crupier y poner otra carta oculta
    setDealerCards(initialDealerCards); // Establecer la mano del crupier en el estado
  }, []);


  /* Función para inicializar la baraja con el array de cartas
  const initializeDeck = () => {
    // Copiar el array de cartas para evitar mutar el original
    const newDeck = [...baraja_inicial];
    // Barajar la baraja
    shuffleDeck(newDeck);
    // Establecer la nueva baraja en el estado
    setDeck(newDeck);
  };

  


  // Función para repartir cartas a jugador y crupier
  const dealCards = () => {
    // Repartir dos cartas al jugador y dos al crupier
    setPlayerHand([drawCard(), drawCard()]);
    setDealerHand([drawCard(), { carta: "back.png", valor: 0 }]);
  };

  // Función para tomar una carta de la baraja
  const drawCard = () => {
    // Si la baraja está vacía, inicializar una nueva baraja
    if (deck.length === 0) initializeDeck();
    // Tomar una carta de la baraja (última carta)
    return deck.pop();
  };
*/


// Funcion para meter una carta al pulsar el boton.
  const handleHit = () => {
    const card = shuffledDeck.pop(); // saca una carta 
    setHitCard(card); // establece la carta extra en el mazo
    setPlayerCards([...playerCards, card]); // y la incluye en el mazo
  }


// Función para manejar la acción de plantarse
const handleStand = () => {
  setShowDealerFirstCard(true);

  // Draw cards for the dealer until the sum is 17 or higher
  let dealerHand = [...dealerCards];
  while (calculateScore(dealerHand) < 17) {
    const card = shuffledDeck.pop();
    dealerHand = [...dealerHand, card];
  }

  // Remove the hidden card from the dealer's hand
  dealerHand = dealerHand.slice(0, 1).concat(dealerHand.slice(2));
  setDealerCards(dealerHand);
};
// Funcion para calcular la puntuacion de las manos
const calculateScore = (cards) => {
  return cards.reduce((total, card) => total + card.valor, 0);
};
// Calcular el puntaje del jugador y del crupier
const playerScore = calculateScore(playerCards);
const dealerScore = calculateScore(dealerCards);




  return (
    <div>
      {/* Interfaz de usuario */}
      <div>
        <div>
          <h2>Dealer Score: {dealerScore}</h2>
          {/* Mostrar las cartas del crupier, ocultando la primera carta si aún no se ha revelado */}
          {dealerCards.map((card, index) => (
            <img
              key={index}
              src={`./assets/PNG/${showDealerFirstCard || index === 0 ? card.nombre : 'back.png'}`}
              alt={card.nombre}
              style={{ width: '100px', height: '150px' }}
            />
          ))}
        </div>
        <div>
          {/* Botones para pedir una carta adicional ("hit") o plantarse */}
          <button onClick={handleHit}>Hit</button>
          <button onClick={handleStand}>Stand</button>
        </div>
        <div>
          <h2>Player Score: {playerScore}</h2>
          {/* Mostrar las cartas del jugador */}
          {playerCards.map((card, index) => (
            <img
              key={index}
              src={`./assets/PNG/${card.nombre}`}
              alt={card.nombre}
              style={{ width: '100px', height: '150px' }}
            />
          ))}
        </div>
      </div>
    </div>
  );
};

export default App;
