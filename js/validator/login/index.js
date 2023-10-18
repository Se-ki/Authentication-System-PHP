// document.querySelector("#session-form").addEventListener('submit', async (e) => {
//     e.preventDefault();
//     const username = document.querySelector("input[name=username]").value;
//     const password = document.querySelector("input[name=password]").value;
//     const formData = new FormData();
//     formData.append('username', username);
//     formData.append('password', password);
//     const response = await fetch("/login/store", {
//         method: "POST",
//         body: formData
//     })
//     const user = await response.json();
//     console.log(user)
//     if (user.login) {
//         window.location.href = '/login';
//         return;
//     }
//     document.getElementById("error-message").innerHTML = user.message;
// });



// Timer
var timeIncrement = document.getElementById("timeIncrement").value;

if (localStorage.getItem("count_timer")) {
    var count_timer = localStorage.getItem("count_timer");
} else {
    var count_timer = 60 * timeIncrement;
}

var minutes = parseInt(count_timer / 60);
var seconds = parseInt(count_timer % 60);
const formData = new FormData();
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
        count_timer = count_timer - 1;
        minutes = parseInt(count_timer / 60);
        seconds = parseInt(count_timer % 60);
        localStorage.setItem("count_timer", count_timer);
        setTimeout("countDownTimer()", 1000);
    }
}
setTimeout("countDownTimer()", 1000);

