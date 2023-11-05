let workMinutes = 25;
let breakMinutes = 5;
let currentMinutes = workMinutes;
let seconds = 0;
let isRunning = false;
let interval;

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
        interval = setInterval(() => {
            if (currentMinutes === 0 && seconds === 0) {
                endPomodoro();
            } else {
                if (seconds === 0) {
                    currentMinutes--;
                    seconds = 59;
                } else {
                    seconds--;
                }
                updateDisplay();
            }
        }, 1000);
        isRunning = true;
        startButton.textContent = "Pausar";
    } else {
        clearInterval(interval);
        isRunning = false;
        startButton.textContent = "Continuar";
    }
}

function resetTimer() {
    clearInterval(interval);
    isRunning = false;
    currentMinutes = workMinutes;
    seconds = 0;
    updateDisplay();
    startButton.textContent = "Comenzar";
}

function stopTimer() {
    clearInterval(interval);
    isRunning = false;
    startButton.textContent = "Comenzar";
}

function endPomodoro() {
    clearInterval(interval);
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

startButton.addEventListener("click", startTimer);
resetButton.addEventListener("click", resetTimer);
stopButton.addEventListener("click", stopTimer);
updateDisplay();
