function isPasswordRobust(password) {
    var strengthIndicator = document.getElementById('password-strength');
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
    var isStrong = regex.test(password);

    if (!password) {
        strengthIndicator.innerText = '';
        return;
    }

    if (isStrong) {
        strengthIndicator.innerText = 'Password is Strong';
        strengthIndicator.style.color = 'green';
    } else if (password.length >= 8) {
        strengthIndicator.innerText = 'Password is Medium';
        strengthIndicator.style.color = 'yellow';
    } else {
        strengthIndicator.innerText = 'Password is Weak';
        strengthIndicator.style.color = 'red';
    }
}
// document.getElementById('togglePassword').addEventListener('click', function () {
//     var passwordField = document.getElementById('password');
//     console.log('click')
//     var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
//     passwordField.setAttribute('type', type);

//     var eyeIcon = document.querySelector('#togglePassword i');
//     eyeIcon.classList.toggle('fa-eye-slash');
// });