let workMinutes = 25;
let breakMinutes = 5;
let currentMinutes = workMinutes;
let seconds = 0;
let isRunning = false;
let timeout;

const minutesDisplay = document.getElementById("minutes");
const secondsDisplay = document.getElementById("seconds");
const startButton = document.getElementById("start");
const resetButton = document.getElementById("reset");
const stopButton = document.getElementById("stop");

function updateDisplay() {
    minutesDisplay.textContent = currentMinutes < 10 ? `0${currentMinutes}` : currentMinutes;
    secondsDisplay.textContent = seconds < 10 ? `0${seconds}` : seconds;
}

function startTimer() {
    if (!isRunning) {
        const audio1 = document.getElementById("comenzar");
        audio1.play();
        isRunning = true;
        startButton.textContent = "Pausar";
        countdown();
    } else {
        isRunning = false;
        clearTimeout(timeout);
        startButton.textContent = "Continuar";
    }
}

function resetTimer() {
    isRunning = false;
    currentMinutes = workMinutes;
    seconds = 0;
    clearTimeout(timeout);
    updateDisplay();
    startButton.textContent = "Comenzar";
}

function stopTimer() {
    isRunning = false;
    clearTimeout(timeout);
    startButton.textContent = "Comenzar";
}

function endPomodoro() {
    isRunning = false;
    startButton.textContent = "Comenzar";

    // Reproducir el sonido al final del Pomodoro
    const audio = document.getElementById("audio");
    audio.play();

    // Cambiar entre tiempo de trabajo y tiempo de descanso
    if (currentMinutes === workMinutes) {
        currentMinutes = breakMinutes;
    } else {
        currentMinutes = workMinutes;
    }

    seconds = 0;
    updateDisplay();
}

function countdown() {
    if (currentMinutes === 0 && seconds === 0) {
        endPomodoro();
    } else {
        if (seconds === 0) {
            if (currentMinutes > 0) {
                currentMinutes--;
                seconds = 59;
            }
        } else {
            seconds--;
        }
        updateDisplay();
        timeout = setTimeout(countdown, 1000);
    }
}

startButton.addEventListener("click", startTimer);
resetButton.addEventListener("click", resetTimer);
stopButton.addEventListener("click", stopTimer);
updateDisplay();
