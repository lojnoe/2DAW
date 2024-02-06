import React, { useState, useEffect } from 'react';
import './index.css';

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
  { nombre: 'jack_of_clubs2.png', valor: 10 },
  { nombre: 'queen_of_clubs2.png', valor: 10 },
  { nombre: 'king_of_clubs2.png', valor: 10 },
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
  { nombre: 'jack_of_diamonds2.png', valor: 10 },
  { nombre: 'queen_of_diamonds2.png', valor: 10 },
  { nombre: 'king_of_diamonds2.png', valor: 10 },
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
  { nombre: 'jack_of_hearts2.png', valor: 10 },
  { nombre: 'queen_of_hearts2.png', valor: 10 },
  { nombre: 'king_of_hearts2.png', valor: 10 },
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
  { nombre: 'jack_of_spades2.png', valor: 10 },
  { nombre: 'queen_of_spades2.png', valor: 10 },
  { nombre: 'king_of_spades2.png', valor: 10 },
  { nombre: 'ace_of_spades.png', valor: 11 },
];

// Función para barajar la baraja de cartas usando el algoritmo Fisher-Yates
function shuffleDeck(deck) {
  // Crear una copia del array original para evitar modificarlo
  const shuffledDeck = [...deck];

  // Algoritmo de barajado Fisher-Yates
  for (let i = shuffledDeck.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    // Intercambiar elementos en los índices i y j
    [shuffledDeck[i], shuffledDeck[j]] = [shuffledDeck[j], shuffledDeck[i]];
  }

  return shuffledDeck;
}

// Componente principal de la aplicación
const App = () => {
  // Estados para las cartas del jugador, del crupier, carta extra, etc.
  const [playerCards, setPlayerCards] = useState([]);
  const [dealerCards, setDealerCards] = useState([]);

  const [showDealerFirstCard, setShowDealerFirstCard] = useState(false);
  const [shuffledDeck, setShuffledDeck] = useState([]);
  const [gameInProgress, setGameInProgress] = useState(true);
  const [showRestartButton, setShowRestartButton] = useState(false);
  const [messages, setMessages] = useState([]);
  const [playerScore, setPlayerScore] = useState(0);
  const [dealerScore, setDealerScore] = useState(0);



  // Efecto para inicializar la baraja y repartir las cartas al comienzo del juego
  useEffect(() => {
    if (!gameInProgress) return;
    // Barajar la baraja inicial y establecerla en el estado
    const initialDeck = shuffleDeck([...baraja_inicial]);
    setShuffledDeck(initialDeck);

    // Repartir cartas al jugador y al crupier al principio del juego
    const initialPlayerCards = [initialDeck.pop()];
    setPlayerCards(initialPlayerCards);

    const initialDealerCards = [initialDeck.pop(), { nombre: 'back.png', valor: 0 }];
    setDealerCards(initialDealerCards);

    setPlayerScore(calculateScore(initialPlayerCards));
    setDealerScore(calculateScore(initialDealerCards));
  }, [gameInProgress]);

  // Función para tomar una carta extra ("hit")
  const handleHit = () => {

    if (!gameInProgress) return;

    const card = shuffledDeck.pop(); // Sacar una carta del mazo barajado
    const updatedPlayerCards = [...playerCards, card]; // Añadir la carta extra a la mano del jugador
    // Calcular la puntuación del jugador con la nueva carta
    const updatedPlayerScore = calculateScore(updatedPlayerCards);

    // Verificar si el jugador se ha pasado de 21
    if (updatedPlayerScore > 21) {
      setPlayerCards([...playerCards, card]);
      setGameInProgress(false);
      setShowRestartButton(true);
      const newMessage = "¡Te has pasado de 21! ¡Has perdido!";
      setMessages([...messages, newMessage]);
      setPlayerScore(updatedPlayerScore);
      // Aquí puedes manejar la lógica para indicar al jugador que ha perdido, como actualizar el estado o mostrar un mensaje al usuario
    } else {
      setPlayerScore(updatedPlayerScore);
      setPlayerCards([...playerCards, card]); // Actualizar la mano del jugador solo si no se ha pasado de 21
    }

  };

  // Función para manejar la acción de plantarse
  const handleStand = () => {
    if (!gameInProgress) return;
    setShowDealerFirstCard(true);

    let dealerHand = [...dealerCards];
    let suma;
    // funcion para quitarl y poner otra 
    if (dealerCards.some(card => card.valor === 0)) {
      dealerHand = dealerHand.slice(0, 1).concat(dealerHand.slice(2));
      const card = shuffledDeck.pop();
      dealerHand.push(card);
      setDealerCards(dealerHand);
      suma = calculateScore(dealerHand);
      setDealerScore(suma);

    }

    // Repartir cartas al crupier hasta que la suma sea 17 o >
    while (suma < 17) {
      const card = shuffledDeck.pop();
      dealerHand = [...dealerHand, card];
      setDealerCards(dealerHand)
      suma = calculateScore(dealerHand);
      setDealerScore(suma);

    }
    compareScores(suma);
    const resultado = compareScores(suma);
    setMessages([...messages, resultado]);
    setGameInProgress(false);
    setShowRestartButton(true);
  };

  // Función para calcular el valor total de las cartas
  const calculateScore = (cards) => {

    return cards.reduce((total, card) => total + card.valor, 0);
  };

  // Funcion para comparar y decidir resultado
  const compareScores = (suma) => {
    if (playerScore === 21) {
      // Blackjack del jugador
      return "¡Blackjack! El jugador gana.";
    } else if (suma === 21) {
      // Blackjack del crupier
      return "¡Blackjack! El crupier gana.";
    } else if (playerScore > 21) {
      // El jugador ha perdido
      return "¡Te has pasado de 21! ¡Has perdido.";
    } else if (suma > 21) {
      // El crupier ha perdido
      return "El crupier ha perdido.";
    } else if (playerScore > suma) {
      // El jugador gana
      return "El jugador gana.";
    } else if (suma > playerScore) {
      // El crupier gana
      return "El crupier gana.";
    } else {
      // Empate
      return "¡Es un empate!";
    }
  };

  const handleDealer = () => {
    if (!gameInProgress) return;
    let updatedDealerCards = [...dealerCards]; // Copia la mano actual del crupier
    const card = shuffledDeck.pop(); // Saca una carta del mazo barajado
    updatedDealerCards.push(card); // Agrega la carta a la mano del crupier
    let suma = calculateScore(updatedDealerCards);
    if (suma > 21) {
      const newMessage = "¡Te has pasado de 21! ¡Has perdido!";
      setMessages([...messages, newMessage]);
      setGameInProgress(false);
      setShowRestartButton(true);

      
    }
    setDealerScore(suma);
    setDealerCards(updatedDealerCards); // Actualiza la mano del crupier

  }
  const handleRestart = () => {
    // Reiniciar el juego
    setGameInProgress(true);
    setShowRestartButton(false);
    setPlayerCards([]);
    setDealerCards([]);

    setShowDealerFirstCard(false);
    setMessages([]);
    setShuffledDeck(shuffleDeck([...baraja_inicial]));
    setPlayerScore(0);
    setDealerScore(0);
  };
  // Interfaz de usuario
  return (
    <div className='container-c'>


      <div className="root">
        {/*container*/}
        <div>
          <div>
            <h2>Puntuación del Crupier: {dealerScore}</h2>
            {/* Mostrar las cartas del crupier, ocultando la primera carta si aún no se ha revelado */}
            {dealerCards.map((card, index) => (
          <div>
              <img className='foto'
                key={index}
                src={`./assets/PNG/${index === 1 && !showDealerFirstCard ? 'back.png' : card.nombre}`}
                alt={card.nombre}
                style={{ width: '100px', height: '150px' }}/>
            </div>
            ))}

          </div>
          <div className='carta'>
            <button onClick={handleDealer} disabled={!gameInProgress}>Pedir carta crupier</button>
            {showRestartButton && <button onClick={handleRestart}>Reiniciar Partida</button>}
          </div>
          <div className="" >
            <h2>Puntuación del Jugador: {playerScore}</h2>
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
          <div className='carta'>
            <button onClick={handleHit} disabled={!gameInProgress}>Pedir carta</button>
            <button onClick={handleStand} disabled={!gameInProgress}>Plantarse</button>
          </div>
          <div className='mensajes'>
            {messages.map((message, index) => (
              <p key={index}>{message}</p>
            ))}
          </div>
        </div>

      </div>
    </div>
  );
};

export default App;

/* Estados para la baraja de cartas, mano del jugador, mano del crupier y estado del juego
  const [deck, setDeck] = useState([]);
  const [playerHand, setPlayerHand] = useState([]);
  const [dealerHand, setDealerHand] = useState([]);
  const [shuffledDeck, setShuffledDeck] = useState([]);
  const [hitCard,setHitCard] = useState([]);
  */

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