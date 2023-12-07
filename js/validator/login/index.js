// Timer
var timeIncrement = document.getElementById("timeIncrement").value;
// localStorage.clear("count_timer");
if (localStorage.getItem("count_timer")) {
    var count_timer = localStorage.getItem("count_timer");
} else {
    var count_timer = 30 * timeIncrement;
}

var minutes = parseInt(count_timer / 60);
var seconds = parseInt(count_timer % 60);
// const formData = new FormData();
async function countDownTimer() {
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    document.getElementById("total-time-left").innerHTML =
        " Please wait for " + minutes + " Minutes " + seconds + " Seconds";
    if (count_timer == 0) {
        localStorage.clear("count_timer");
        window.location.href = "/login";
    } else {
        history.pushState(null, document.title, location.href);
        window.addEventListener('popstate', function (event) {
            history.pushState(null, document.title, location.href);
        });

        count_timer = count_timer - 1;
        minutes = parseInt(count_timer / 60);
        seconds = parseInt(count_timer % 60);
        localStorage.setItem("count_timer", count_timer);
        setTimeout("countDownTimer()", 1000);
    }
}
setTimeout("countDownTimer()", 1000);







