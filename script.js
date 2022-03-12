const timer = document.getElementById("timer");
const quiz = document.getElementById("quiz");
const submit = document.getElementById("submit");

function formatTime(time) {
	return time < 10 ? `0${time}` : time;
}

function startTimer(minutes, seconds) {
	timer.innerHTML = `${formatTime(minutes)}:${formatTime(seconds)}`;

	setInterval(function () {
		if (minutes == 0 && seconds == 0) {
			submit.click();
		} else {
			seconds--;

			if (seconds < 0) {
				minutes--;
				seconds = 59;
			}

			timer.innerHTML = formatTime(minutes) + ":" + formatTime(seconds);
		}
	}, 1000);
}

startTimer(0, 5);
