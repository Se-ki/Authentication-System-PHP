// const countdown = document.querySelector("#countdown");
// countdown.addEventListener('load', () => {
//     var timeleft = 30;
//     var downloadTimer = setInterval(() => {
//         if (timeleft <= 0) {
//             clearInterval(downloadTimer);
//             countdown.innerHTML = "Done";
//             document.location.reload();
//         } else {
//             countdown.innerHTML = "Please wait for " + timeleft + " seconds ";
//         }
//         timeleft -= 1;
//     }, 1000);
// })


document.querySelector("#session-form").addEventListener('submit', async (e) => {
    e.preventDefault();
    const username = document.querySelector("input[name=username]").value;
    const password = document.querySelector("input[name=password]").value;
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    const response = await fetch("http://127.0.0.1:3000/login/store", {
        method: "POST",
        body: formData
    })
    const user = await response.json();
    console.log(user)
    if (user.login) {
        window.location.href = '/login';
    }
    document.getElementById("error-message").innerHTML = user.message;
});
//x-www-form-urlencoded