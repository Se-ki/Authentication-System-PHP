var timeleft = 30;
var downloadTimer = setInterval(() => {
    if (timeleft <= 0) {
        clearInterval(downloadTimer);
        document.getElementById("countdown").innerHTML = "Done";
        document.location.reload();
    } else {
        document.getElementById("countdown").innerHTML = "Please wait for " + timeleft + " seconds ";
    }
    timeleft -= 1;
}, 1000);