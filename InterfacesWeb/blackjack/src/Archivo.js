/*
import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import './App.css';


function App() {
  const [deck, setDeck] = useState(shuffleDeck(createDeck()));
  const [playerHand, setPlayerHand] = useState([drawCard(deck, setDeck)]);
  const [dealerHand, setDealerHand] = useState([drawCard(deck, setDeck), drawCard(deck, setDeck)]);
  const [gameOver, setGameOver] = useState(false);
  const [message, setMessage] = useState('');

  function createDeck() {
    const suits = ['♠', '♥', '♦', '♣'];
    const values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
    let deck = [];
    for (let suit of suits) {
      for (let value of values) {
        deck.push({ suit, value });
      }
    }
    return deck;
  }

  function shuffleDeck(deck) {
    for (let i = deck.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [deck[i], deck[j]] = [deck[j], deck[i]];
    }
    return deck;
  }

  function drawCard(deck, setDeck) {
    const newDeck = deck.slice(0, deck.length - 1);
    setDeck(newDeck);
    return deck[deck.length - 1];
  }

  function calculateHand(hand) {
    let aceCount = 0;
    let handValue = 0;
    for (let card of hand) {
      if (card.value === 'A') {
        aceCount += 1;
        handValue += 11;
      } else if (['K', 'Q', 'J'].includes(card.value)) {
        handValue += 10;
      } else {
        handValue += parseInt(card.value);
      }
    }
    while (handValue > 21 && aceCount > 0) {
      handValue -= 10;
      aceCount -= 1;
    }
    return handValue;
  }

  function handleDrawCard() {
    setPlayerHand([...playerHand, drawCard(deck, setDeck)]);
  }

  function handleEndTurn() {
    while (calculateHand(dealerHand) < 17) {
      setDealerHand([...dealerHand, drawCard(deck, setDeck)]);
    }
    setGameOver(true);
    if (calculateHand(playerHand) > 21) {
      setMessage('Te has pasado de 21. Has perdido.');
    } else if (calculateHand(dealerHand) > 21) {
      setMessage('La banca se ha pasado de 21. Has ganado.');
    } else if (calculateHand(playerHand) > calculateHand(dealerHand)) {
      setMessage('Has ganado.');
    } else {
      setMessage('Has perdido.');
    }
  }

  return (
    <div className='app'>
      <h1>Blackjack</h1>
      <h2>Tu mano ({calculateHand(playerHand)}): {playerHand.map(card => `${card.value}${card.suit}`).join(', ')}</h2>
      <h2>Mano de la banca ({gameOver ? calculateHand(dealerHand) : '?'}): {dealerHand.map((card, index) => index === 0 || gameOver ? `${card.value}${card.suit}` : '?').join(', ')}</h2>
      {!gameOver ? <button onClick={handleDrawCard}>Pedir carta</button> : null}
      {!gameOver ? <button onClick={handleEndTurn}>Plantarse</button> : null}
      {gameOver ? <button onClick={() => window.location.reload()}>Jugar de nuevo</button> : null}
      <h2>{message}</h2>
    </div>
  );
}

ReactDOM.render(<App />, document.getElementById('root'));




*/