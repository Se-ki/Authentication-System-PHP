function validateForm() {
    var firstname = document.querySelector("input[name=firstname]").value;
    var middlename = document.querySelector("input[name=middlename]").value;
    var lastname = document.querySelector("input[name=lastname]").value;
    var suffix = document.querySelector("input[name=suffix]").value;
    var age = document.querySelector("input[name=age]").value;
    var contactnumber = document.querySelector("input[name=contactnumber]").value;
    var country = document.querySelector("input[name=country]").value;
    var province = document.querySelector("input[name=province]").value;
    var city = document.querySelector("input[name=city]").value;
    var barangay = document.querySelector("input[name=barangay]").value;
    var username = document.querySelector("input[name=username]").value;
    var email = document.querySelector("input[name=email]").value;
    var password = document.querySelector("input[name=password]").value;
    var confirmpass = document.querySelector("input[name=confirmPassword]").value;
    console.log(firstname);
    return false;
}

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