//validator
function hasRepeatedLetters(value) {
    if (!value) {
        return false;
    }
    const regex = /([a-zA-Z])\1{3}/;
    return regex.test(value);
}
function validateIfCapitalize(value) {
    if (!value) {
        return true;
    }
    return value === value
        .toLowerCase()
        .split(' ')
        .map(s => s.charAt(0).toUpperCase() + s.substring(1)).join(' ');
}
function containNumbers(value) {
    var regex = /[0-9]+/;
    if (regex.test(value)) {
        return true;
    }
    return false;
}
function containSpecialCharacters(value) {
    var regex = /[!@#$%^&*()\-\/+<>.,?\/\\\|\[\]\{\}]+/;
    if (regex.test(value)) {
        return true
    }
    return false;
}
function containsLetters(value) {
    if (!value) {
        return false;
    }
    if (!/^[0-9]+$/.test(value)) {
        return true
    }
    return false;
}
function validatePhilippineMobileNumber(mobileNumber) {
    if (!mobileNumber) {
        return true;
    }
    if (mobileNumber.length < 11) {
        return false
    }
    var pattern1 = /^(09\d{9})$/;
    var pattern2 = /^(639\d{9})$/;
    if (!pattern1.test(mobileNumber) && !pattern2.test(mobileNumber)) {
        return false
    }
    return true;
}
function isValidAddress(value) {
    if (!value) {
        return true;
    }
    var pattern = /^[a-zA-Z0-9,.\-\s]+$/;
    return pattern.test(value);
}
function validateOneSpacePerWord(input) {
    if (!input) {
        return true;
    }
    var pattern = /^[0-9a-zA-Z,.-]+( [0-9a-zA-Z,.-]+)*$/;
    return pattern.test(input);
}
function startInputContainSpace(input) {
    if (!input) {
        return false;
    }
    var pattern = /^( [0-9a-zA-Z,.-]+)*$/;
    return pattern.test(input);
}
function passwordValidation(value) {
    if (!value) {
        return true;
    }
    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/.test(value)
}
//validate form
document.getElementById('register-form').addEventListener('submit', async (e) => {
    // e.preventDefault();
    //get the value that inputted
    var firstname = document.querySelector("input[name=firstname]").value;
    var middlename = document.querySelector("input[name=middlename]").value;
    var lastname = document.querySelector("input[name=lastname]").value;
    var suffix = document.querySelector("input[name=suffix]").value;
    var sex = document.querySelector("#sex").value;
    var birthdate = document.querySelector("input[name=birthdate]").value;
    var age = document.querySelector("input[name=age]").value;
    var mobilenumber = document.querySelector("input[name=mobilenum]").value;
    var email = document.querySelector("input[name=email]").value;
    var country = document.querySelector("input[name=country]").value;
    var province = document.querySelector("input[name=province]").value;
    var city = document.querySelector("input[name=city]").value;
    var purok = document.querySelector("input[name=purok]").value;
    var barangay = document.querySelector("input[name=barangay]").value;
    var street = document.querySelector("input[name=street]").value;
    var zipcode = document.querySelector("input[name=zipcode]").value;
    var username = document.querySelector("input[name=username]").value;
    var password = document.querySelector("input[name=password]").value;
    var confirmpass = document.querySelector("input[name=confirmpassword]").value;

    //firstname validation
    if (hasRepeatedLetters(firstname)) {
        document.getElementById('is-valid-firstname')
            .innerHTML = "Please enter a firstname without repeated letters.";
        document.getElementById('firstname-label').style.color = "red";
        document.getElementById('firstname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(firstname)) {
        document.getElementById('is-valid-firstname')
            .innerHTML = "Firstname should not contains special characters.";
        document.getElementById('firstname-label').style.color = "red";
        document.getElementById('firstname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containNumbers(firstname)) {
        document.getElementById('is-valid-firstname')
            .innerHTML = "Firstname should not contains numbers.";
        document.getElementById('firstname-label').style.color = "red";
        document.getElementById('firstname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(firstname)) {
        document.getElementById('is-valid-firstname')
            .innerHTML = "Firstname should not start with space.";
        document.getElementById('firstname-label').style.color = "red";
        document.getElementById('firstname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(firstname)) {
        document.getElementById('is-valid-firstname')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('firstname-label').style.color = "red";
        document.getElementById('firstname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateIfCapitalize(firstname)) {
        document.getElementById('is-valid-firstname')
            .innerHTML = "Firstname must be capitalize";
        document.getElementById('firstname-label').style.color = "red";
        document.getElementById('firstname').style.border = "1px solid red";
        return e.preventDefault()
    }
    document.getElementById('is-valid-firstname').innerHTML = "";
    document.getElementById('firstname-label').style.color = "";
    document.getElementById('firstname').style.border = "";



    //middlename validation
    if (hasRepeatedLetters(middlename)) {
        document.getElementById('is-valid-middlename')
            .innerHTML = "Please enter a middlename without repeated letters.";
        document.getElementById('middlename-label').style.color = "red";
        document.getElementById('middlename').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(middlename)) {
        document.getElementById('is-valid-middlename')
            .innerHTML = "Middlename should not contains special characters.";
        document.getElementById('middlename-label').style.color = "red";
        document.getElementById('middlename').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containNumbers(middlename)) {
        document.getElementById('is-valid-middlename')
            .innerHTML = "Middlename should not contains numbers";
        document.getElementById('middlename-label').style.color = "red";
        document.getElementById('middlename').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(middlename)) {
        document.getElementById('is-valid-middlename')
            .innerHTML = "Middlename should not start with space.";
        document.getElementById('middlename-label').style.color = "red";
        document.getElementById('middlename').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(middlename)) {
        document.getElementById('is-valid-middlename')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('middlename-label').style.color = "red";
        document.getElementById('middlename').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(middlename)) {
        document.getElementById('is-valid-middlename')
            .innerHTML = "Middlename must be capitalize";
        document.getElementById('middlename-label').style.color = "red";
        document.getElementById('middlename').style.border = "1px solid red";
        return e.preventDefault()
    }
    document.getElementById('is-valid-middlename').innerHTML = "";
    document.getElementById('middlename-label').style.color = "";
    document.getElementById('middlename').style.border = "";


    //lastname validation
    if (hasRepeatedLetters(lastname)) {
        document.getElementById('is-valid-lastname')
            .innerHTML = "Please enter a lastname without repeated letters.";
        document.getElementById('lastname-label').style.color = "red";
        document.getElementById('lastname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(lastname)) {
        document.getElementById('is-valid-lastname')
            .innerHTML = "Lastname should not contains special characters.";
        document.getElementById('lastname-label').style.color = "red";
        document.getElementById('lastname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containNumbers(lastname)) {
        document.getElementById('is-valid-lastname')
            .innerHTML = "Lastname should not contains numbers";
        document.getElementById('lastname-label').style.color = "red";
        document.getElementById('lastname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(lastname)) {
        document.getElementById('is-valid-lastname')
            .innerHTML = "Lastname should not start with space.";
        document.getElementById('lastname-label').style.color = "red";
        document.getElementById('lastname').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(lastname)) {
        document.getElementById('is-valid-lastname')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('lastname-label').style.color = "red";
        document.getElementById('lastname').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(lastname)) {
        document.getElementById('is-valid-lastname')
            .innerHTML = "Lastname must be capitalize.";
        document.getElementById('lastname-label').style.color = "red";
        document.getElementById('lastname').style.border = "1px solid red";
        return e.preventDefault()
    }
    document.getElementById('is-valid-lastname').innerHTML = "";
    document.getElementById('lastname-label').style.color = "";
    document.getElementById('lastname').style.border = "";


    //suffix validation
    if (hasRepeatedLetters(suffix)) {
        document.getElementById('is-valid-suffix')
            .innerHTML = "Please enter a suffix without repeated letters.";
        document.getElementById('suffix-label').style.color = "red";
        document.getElementById('suffix').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(suffix)) {
        document.getElementById('is-valid-suffix')
            .innerHTML = "Suffix should not contains special characters.";
        document.getElementById('suffix-label').style.color = "red";
        document.getElementById('suffix').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containNumbers(suffix)) {
        document.getElementById('is-valid-suffix')
            .innerHTML = "Suffix should not contains numbers";
        document.getElementById('suffix-label').style.color = "red";
        document.getElementById('suffix').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(suffix)) {
        document.getElementById('is-valid-suffix')
            .innerHTML = "Suffix should not start with space.";
        document.getElementById('suffix-label').style.color = "red";
        document.getElementById('suffix').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(suffix)) {
        document.getElementById('is-valid-suffix')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('suffix-label').style.color = "red";
        document.getElementById('suffix').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(suffix)) {
        document.getElementById('is-valid-suffix')
            .innerHTML = "Suffix must be capitalize.";
        document.getElementById('suffix-label').style.color = "red";
        document.getElementById('suffix').style.border = "1px solid red";
        return e.preventDefault()
    }
    document.getElementById('is-valid-suffix').innerHTML = "";
    document.getElementById('suffix-label').style.color = "";
    document.getElementById('suffix').style.border = "";


    //mobile number validation
    if (containsLetters(mobilenumber)) {
        document.getElementById('is-valid-mobilenum')
            .innerHTML = "Mobile number don't contain strings. Please enter an mobile number value.";
        document.getElementById('mobilenum-label').style.color = "red";
        document.getElementById('mobilenum').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validatePhilippineMobileNumber(mobilenumber)) {
        document.getElementById('is-valid-mobilenum')
            .innerHTML = "Please enter a valid Philippine mobile number. e.g 639123456789 or 09123456789";
        document.getElementById('mobilenum-label').style.color = "red";
        document.getElementById('mobilenum').style.border = "1px solid red";
        return e.preventDefault();
    }
    document.getElementById('is-valid-mobilenum').innerHTML = "";
    document.getElementById('mobilenum-label').style.color = "";
    document.getElementById('mobilenum').style.border = "";


    //email validation
    if (hasRepeatedLetters(email)) {
        document.getElementById('is-valid-email')
            .innerHTML = "Please enter an email without repeated letters.";
        document.getElementById('email-label').style.color = "red";
        document.getElementById('email').style.border = "1px solid red";
        return e.preventDefault()
    }

    //country validation
    if (hasRepeatedLetters(country)) {
        document.getElementById('is-valid-country')
            .innerHTML = "Please enter a country without repeated letters.";
        document.getElementById('country-label').style.color = "red";
        document.getElementById('country').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(country)) {
        document.getElementById('is-valid-country')
            .innerHTML = "Country should not contains special characters.";
        document.getElementById('country-label').style.color = "red";
        document.getElementById('country').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containNumbers(country)) {
        document.getElementById('is-valid-country')
            .innerHTML = "Country should not contains numbers";
        document.getElementById('country-label').style.color = "red";
        document.getElementById('country').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(country)) {
        document.getElementById('is-valid-country')
            .innerHTML = "Country should not start with space.";
        document.getElementById('country-label').style.color = "red";
        document.getElementById('country').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(country)) {
        document.getElementById('is-valid-country')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('country-label').style.color = "red";
        document.getElementById('country').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(country)) {
        document.getElementById('is-valid-country')
            .innerHTML = "Country must be capitalize.";
        document.getElementById('country-label').style.color = "red";
        document.getElementById('country').style.border = "1px solid red";
        return e.preventDefault()
    }
    document.getElementById('is-valid-country').innerHTML = "";
    document.getElementById('country-label').style.color = "";
    document.getElementById('country').style.border = "";



    //province validation
    if (hasRepeatedLetters(province)) {
        document.getElementById('is-valid-province')
            .innerHTML = "Please enter a province without repeated letters.";
        document.getElementById('province-label').style.color = "red";
        document.getElementById('province').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(province)) {
        document.getElementById('is-valid-province')
            .innerHTML = "Province should not contain special characters.";
        document.getElementById('province-label').style.color = "red";
        document.getElementById('province').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containNumbers(province)) {
        document.getElementById('is-valid-province')
            .innerHTML = "Province should not contain numbers";
        document.getElementById('province-label').style.color = "red";
        document.getElementById('province').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(province)) {
        document.getElementById('is-valid-province')
            .innerHTML = "Province should not start with space.";
        document.getElementById('province-label').style.color = "red";
        document.getElementById('province').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(province)) {
        document.getElementById('is-valid-province')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('province-label').style.color = "red";
        document.getElementById('province').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(province)) {
        document.getElementById('is-valid-province')
            .innerHTML = "Please enter a municipal / province with a capitalized first letter for each word.";
        document.getElementById('province-label').style.color = "red";
        document.getElementById('province').style.border = "1px solid red";
        return e.preventDefault()
    }
    document.getElementById('is-valid-province').innerHTML = "";
    document.getElementById('province-label').style.color = "";
    document.getElementById('province').style.border = "";


    //city validation
    if (hasRepeatedLetters(city)) {
        document.getElementById('is-valid-city')
            .innerHTML = "Please enter a municipal or city without repeated letters.";
        document.getElementById('city-label').style.color = "red";
        document.getElementById('city').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(city)) {
        document.getElementById('is-valid-city')
            .innerHTML = "Municipal or City should not contain special characters.";
        document.getElementById('city-label').style.color = "red";
        document.getElementById('city').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containNumbers(city)) {
        document.getElementById('is-valid-city')
            .innerHTML = "Municipal or City should not contain numbers";
        document.getElementById('city-label').style.color = "red";
        document.getElementById('city').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(city)) {
        document.getElementById('is-valid-city')
            .innerHTML = "Municipal or City should not start with space.";
        document.getElementById('city-label').style.color = "red";
        document.getElementById('city').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(city)) {
        document.getElementById('is-valid-city')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('city-label').style.color = "red";
        document.getElementById('city').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(city)) {
        document.getElementById('is-valid-city')
            .innerHTML = "Municipal or City must be captitalize.";
        document.getElementById('city-label').style.color = "red";
        document.getElementById('city').style.border = "1px solid red";
        return e.preventDefault()
    }
    document.getElementById('is-valid-city').innerHTML = "";
    document.getElementById('city-label').style.color = "";
    document.getElementById('city').style.border = "";


    //purok validation
    if (hasRepeatedLetters(purok)) {
        document.getElementById('is-valid-purok')
            .innerHTML = "Please enter a purok without repeated letters.";
        document.getElementById('purok-label').style.color = "red";
        document.getElementById('purok').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(purok)) {
        document.getElementById('is-valid-purok')
            .innerHTML = "Purok should not contain special characters.";
        document.getElementById('purok-label').style.color = "red";
        document.getElementById('purok').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(purok)) {
        document.getElementById('is-valid-purok')
            .innerHTML = "Purok should not start with space.";
        document.getElementById('purok-label').style.color = "red";
        document.getElementById('purok').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(purok)) {
        document.getElementById('is-valid-purok')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('purok-label').style.color = "red";
        document.getElementById('purok').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(purok)) {
        document.getElementById('is-valid-purok')
            .innerHTML = "Purok must be capitalize.";
        document.getElementById('purok-label').style.color = "red";
        document.getElementById('purok').style.border = "1px solid red";
        return e.preventDefault();
    }
    document.getElementById('is-valid-purok').innerHTML = "";
    document.getElementById('purok-label').style.color = "";
    document.getElementById('purok').style.border = "";


    //barangay validation
    if (hasRepeatedLetters(barangay)) {
        document.getElementById('is-valid-barangay')
            .innerHTML = "Please enter a barangay without repeated letters.";
        document.getElementById('barangay-label').style.color = "red";
        document.getElementById('barangay').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(barangay)) {
        document.getElementById('is-valid-barangay')
            .innerHTML = "Barangay should not contain special characters.";
        document.getElementById('barangay-label').style.color = "red";
        document.getElementById('barangay').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(barangay)) {
        document.getElementById('is-valid-barangay')
            .innerHTML = "Barangay should not start with space.";
        document.getElementById('barangay-label').style.color = "red";
        document.getElementById('barangay').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(barangay)) {
        document.getElementById('is-valid-barangay')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('barangay-label').style.color = "red";
        document.getElementById('barangay').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(barangay)) {
        document.getElementById('is-valid-barangay')
            .innerHTML = "Barangay must be capitalize.";
        document.getElementById('barangay-label').style.color = "red";
        document.getElementById('barangay').style.border = "1px solid red";
        return e.preventDefault();
    }
    document.getElementById('is-valid-barangay').innerHTML = "";
    document.getElementById('barangay-label').style.color = "";
    document.getElementById('barangay').style.border = "";


    // street validation
    if (hasRepeatedLetters(street)) {
        document.getElementById('is-valid-street')
            .innerHTML = "Please enter a street without repeated letters.";
        document.getElementById('street-label').style.color = "red";
        document.getElementById('street').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (containSpecialCharacters(street)) {
        document.getElementById('is-valid-street')
            .innerHTML = "Street should not contain special characters.";
        document.getElementById('street-label').style.color = "red";
        document.getElementById('street').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (startInputContainSpace(street)) {
        document.getElementById('is-valid-street')
            .innerHTML = "Street should not start with space.";
        document.getElementById('street-label').style.color = "red";
        document.getElementById('street').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(street)) {
        document.getElementById('is-valid-street')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('street-label').style.color = "red";
        document.getElementById('street').style.border = "1px solid red";
        return e.preventDefault();
    }
    if (!validateIfCapitalize(street)) {
        document.getElementById('is-valid-street')
            .innerHTML = "Street must be capitalize.";
        document.getElementById('street-label').style.color = "red";
        document.getElementById('street').style.border = "1px solid red";
        return e.preventDefault();
    }
    document.getElementById('is-valid-street').innerHTML = "";
    document.getElementById('street-label').style.color = "";
    document.getElementById('street').style.border = "";



    //username validation
    if (hasRepeatedLetters(username)) {
        document.getElementById('is-valid-username')
            .innerHTML = "Please enter a username without repeated letters.";
        document.getElementById('username-label').style.color = "red";
        document.getElementById('username').style.border = "1px solid red";
        return e.preventDefault()
    }
    if (!validateOneSpacePerWord(username)) {
        document.getElementById('is-valid-username')
            .innerHTML = "Double spaces are not allowed.";
        document.getElementById('username-label').style.color = "red";
        document.getElementById('username').style.border = "1px solid red";
        return e.preventDefault();
    }


    //password
    if (!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/.test(password)) {
        document.getElementById('is-valid-password').innerHTML = "Password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long."
        document.getElementById('password-label').style.color = "red";
        document.getElementById('password').style.border = "1px solid red";
        document.getElementById("password-strength").innerHTML = "";
        return e.preventDefault();
    }
    if (password !== confirmpass) {
        //confirm password field
        document.getElementById('is-valid-confirmpassword')
            .innerHTML = "Passwords must match. Please try again";
        document.getElementById('confirmpassword-label').style.color = "red";
        document.getElementById('confirmpassword').style.border = "1px solid red";

        //password field
        document.getElementById('password-label').style.color = "red";
        document.getElementById('password').style.border = "1px solid red";
        return e.preventDefault();
    }
    document.getElementById('is-valid-confirmpassword').innerHTML = "";
    document.getElementById('confirmpassword-label').style.color = "";
    document.getElementById('confirmpassword').style.border = "";
    document.getElementById('is-valid-password').innerHTML = ""
    document.getElementById('password-label').style.color = "";
    document.getElementById('password').style.border = "";

    //if theres no any validation registered
    e.preventDefault();
    const formData = new FormData();
    formData.append('firstname', firstname);
    formData.append('middlename', middlename);
    formData.append('lastname', lastname);
    formData.append('suffix', suffix);
    formData.append('sex', sex);
    formData.append('birthdate', birthdate);
    formData.append('age', age);
    formData.append('mobilenum', mobilenumber);
    formData.append('email', email);
    formData.append('country', country);
    formData.append('province', province);
    formData.append('city', city);
    formData.append('purok', purok);
    formData.append('barangay', barangay);
    formData.append('street', street);
    formData.append('zipcode', zipcode);
    formData.append('username', username);
    formData.append('password', password);
    formData.append('confirmpassword', confirmpass);
    const response = await fetch("http://127.0.0.1:3000/register/store", {
        method: "POST",
        body: formData
    });
    const data = await response.json();
    console.log(data);
    if (!data.ok && data.type === "email") {
        //display error
        document.getElementById("is-valid-email").innerHTML = data.message;
        document.getElementById("email-label").style.color = "red";
        document.getElementById("email").style.border = "1px solid red";
        document.getElementById("is-valid-username").innerHTML = "";
        document.getElementById("username-label").style.color = "";
        document.getElementById("username").style.border = "";
        return;
    } else if (!data.ok && data.type === "username") {
        //display error
        document.getElementById("is-valid-username").innerHTML = data.message;
        document.getElementById("username-label").style.color = "red";
        document.getElementById("username").style.border = "1px solid red";
        document.getElementById("is-valid-email").innerHTML = "";
        document.getElementById("email-label").style.color = "";
        document.getElementById("email").style.border = "";
        return;
    }
    document.getElementById("is-valid-username").innerHTML = "";
    document.getElementById("username-label").style.color = "";
    document.getElementById("username").style.border = "";
    document.getElementById("is-valid-email").innerHTML = "";
    document.getElementById("email-label").style.color = "";
    document.getElementById("email").style.border = "";
    document.getElementById('password-strength').innerHTML = "";
    document.getElementById("display-success").innerHTML = "Successfully Registered. You can now <a href='/login'>Login</a>";
    document.getElementById("display-success").setAttribute("class", "alert alert-success");
    alert(data.message);
    document.querySelectorAll("input").forEach((inputFields) => {
        inputFields.value = "";
    });
})


// firstname validation
var firstname = document.getElementById('firstname');
var firstname_label = document.getElementById('firstname-label');
firstname.addEventListener("input", (e) => {
    var firstnameVal = e.target.value;
    if (hasRepeatedLetters(firstnameVal)) {
        firstname.setCustomValidity("Please enter a firstname without repeated letters.")
        firstname_label.style.color = "red";
        firstname.style.border = "1px solid red";
    }
    if (containSpecialCharacters(firstnameVal)) {
        firstname.setCustomValidity("Firstname should not contains special characters.")
        firstname_label.style.color = "red";
        firstname.style.border = "1px solid red";
    }
    if (containNumbers(firstnameVal)) {
        firstname.setCustomValidity("Firstname should not contains numbers.")
        firstname_label.style.color = "red";
        firstname.style.border = "1px solid red";
    }
    if (startInputContainSpace(firstnameVal)) {
        firstname.setCustomValidity("Firstname should not start with space.")
        firstname_label.style.color = "red";
        firstname.style.border = "1px solid red";
    }
    if (!validateOneSpacePerWord(firstnameVal)) {
        firstname.setCustomValidity("Double spaces are not allowed.")
        firstname_label.style.color = "red";
        firstname.style.border = "1px solid red";
    }
    if (!validateIfCapitalize(firstnameVal)) {
        firstname.setCustomValidity("Firstname must be capitalize")
        firstname_label.style.color = "red";
        firstname.style.border = "1px solid red";
    }
    firstname.setCustomValidity("");
    firstname_label.style.color = "";
    firstname.style.border = "";
});



// middlename validation
const middlename = document.getElementById('middlename');
const middlename_label = document.getElementById('middlename-label');
middlename.addEventListener("input", (e) => {
    var middlenameVal = e.target.value;
    if (hasRepeatedLetters(middlenameVal)) {
        middlename.setCustomValidity("Please enter a middlename without repeated letters.")
        middlename_label.style.color = "red";
        middlename.style.border = "1px solid red";
    }
    if (containSpecialCharacters(middlenameVal)) {
        middlename.setCustomValidity("Middlename should not contains special characters.")
        middlename_label.style.color = "red";
        middlename.style.border = "1px solid red";
    }
    if (containNumbers(middlenameVal)) {
        middlename.setCustomValidity("Middlename should not contains numbers.")
        middlename_label.style.color = "red";
        middlename.style.border = "1px solid red";
    }
    if (startInputContainSpace(middlenameVal)) {
        middlename.setCustomValidity("Middlename should not start with space.")
        middlename_label.style.color = "red";
        middlename.style.border = "1px solid red";
    }
    if (!validateOneSpacePerWord(middlenameVal)) {
        middlename.setCustomValidity("Double spaces are not allowed.")
        middlename_label.style.color = "red";
        middlename.style.border = "1px solid red";
    }
    if (!validateIfCapitalize(middlenameVal)) {
        middlename.setCustomValidity("Middlename must be capitalize")
        middlename_label.style.color = "red";
        middlename.style.border = "1px solid red";
    }
    middlename.setCustomValidity("");
    middlename_label.style.color = "";
    middlename.style.border = "";
});


// lastname validation
const lastname = document.getElementById('lastname');
const lastname_label = document.getElementById('lastname-label');
lastname.addEventListener("input", (e) => {
    var lastnameVal = e.target.value;
    if (hasRepeatedLetters(lastnameVal)) {
        console.log(lastnameVal)
        lastname.setCustomValidity("Please enter a lastname without repeated letters.")
        lastname_label.style.color = "red";
        lastname.style.border = "1px solid red";
    }
    if (containSpecialCharacters(lastnameVal)) {
        lastname.setCustomValidity("Lastname should not contains special characters.")
        lastname_label.style.color = "red";
        lastname.style.border = "1px solid red";
    }
    if (containNumbers(lastnameVal)) {
        lastname.setCustomValidity("Lastname should not contains numbers.")
        lastname_label.style.color = "red";
        lastname.style.border = "1px solid red";
    }
    if (startInputContainSpace(lastnameVal)) {
        lastname.setCustomValidity("Lastname should not start with space.")
        lastname_label.style.color = "red";
        lastname.style.border = "1px solid red";
    }
    if (!validateOneSpacePerWord(lastnameVal)) {
        lastname.setCustomValidity("Double spaces are not allowed.")
        lastname_label.style.color = "red";
        lastname.style.border = "1px solid red";
    }
    if (!validateIfCapitalize(lastnameVal)) {
        lastname.setCustomValidity("Lastname must be capitalize")
        lastname_label.style.color = "red";
        lastname.style.border = "1px solid red";
    }
    lastname.setCustomValidity("");
    lastname_label.style.color = "";
    lastname.style.border = "";
});


//zipcode
document.getElementById('zipcode').addEventListener('input', () => {
    const zipcode = document.getElementById("zipcode");
    const inputValue = zipcode.value.trim();
    const zipcodeInt = parseInt(inputValue);
    if (zipcodeInt < 100 || zipcodeInt > 9811) {
        zipcode.setCustomValidity("Please enter a valid ZIP code");
    } else if (inputValue === "" || isNaN(inputValue)) {
        zipcode.setCustomValidity("Please enter a valid ZIP code");
    } else {
        zipcode.setCustomValidity("");
    }
})


//validate if the user is 18 above
const startInput = document.getElementById('birthdate');
startInput.addEventListener('change', () => {
    const startDate = new Date(startInput.value);
    const today = new Date();
    const age = Math.floor((today - startDate) / (1000 * 60 * 60 * 24 * 365));
    document.getElementById('age').value = age;
    if (isNaN(age)) {
        startInput.setCustomValidity('Invalid Birthdate.');
        startInput.style.border = "1px solid red";
        document.getElementById("birthdate-label").style.color = "red";
        return;
    } else if (age < 18) {
        startInput.setCustomValidity('You must be at least 18 years old to submit this form.');
        startInput.style.border = "1px solid red";
        document.getElementById("birthdate-label").style.color = "red";
        return
    } else if (age > 100) {
        startInput.setCustomValidity('You must be at least 100 years old below to submit this form.');
    } else {
        startInput.setCustomValidity('');
        startInput.style.border = "";
        document.getElementById("birthdate-label").style.color = "";
    }
});



//check password strength real time checker
document.getElementById('password').addEventListener('input', (e) => {
    var password = e.target.value;
    var strengthIndicator = document.getElementById('password-strength');
    document.getElementById('is-valid-password').innerHTML = "";
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
        strengthIndicator.style.color = '#eeb600';
    } else {
        strengthIndicator.innerText = 'Password is Weak';
        strengthIndicator.style.color = 'red';
    }
})


//check if password match
var passwordInput = document.getElementById('password');
var confirmPasswordInput = document.getElementById('confirmpassword');
passwordInput.addEventListener('input', (e) => {
    var password = passwordInput.value;
    var confirmPassword = confirmPasswordInput.value;
    if (password === "") {
        document.getElementById("is-valid-confirmpassword").innerHTML = "";
        document.getElementById("confirmpassword-label").style.color = "";
        document.getElementById("confirmpassword").style.border = "";
        document.getElementById("password-label").style.color = "";
        document.getElementById("password").style.border = "";
    }
    if (password !== confirmPassword && confirmPassword !== "") {
        document.getElementById("is-valid-confirmpassword").innerHTML = "Please make sure your passwords match.";
        document.getElementById("confirmpassword-label").style.color = "red";
        document.getElementById("confirmpassword").style.border = "1px solid red";
    } else {
        document.getElementById("is-valid-confirmpassword").innerHTML = "";
        document.getElementById("confirmpassword-label").style.color = "";
        document.getElementById("confirmpassword").style.border = "";
    }
});
document.getElementById('confirmpassword').addEventListener('input', (e) => {
    var password = passwordInput.value;
    var confirmPassword = confirmPasswordInput.value;
    if (confirmPassword === "") {
        document.getElementById("is-valid-confirmpassword").innerHTML = "";
        document.getElementById("confirmpassword-label").style.color = "";
        document.getElementById("confirmpassword").style.border = "";
        document.getElementById("password-label").style.color = "";
        document.getElementById("password").style.border = "";
    }
    if (password !== confirmPassword) {
        document.getElementById("is-valid-confirmpassword").innerHTML = "Please make sure your passwords match.";
        document.getElementById("confirmpassword-label").style.color = "red";
        document.getElementById("confirmpassword").style.border = "1px solid red";
        document.getElementById("password-label").style.color = "red";
        document.getElementById("password").style.border = "1px solid red";
    } else {
        document.getElementById("is-valid-confirmpassword").innerHTML = "";
        document.getElementById("confirmpassword-label").style.color = "";
        document.getElementById("confirmpassword").style.border = "";
        document.getElementById("password-label").style.color = "";
        document.getElementById("password").style.border = "";
    }
})


//eye icon show password
document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordField = document.getElementById('password');
    var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});
document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    var passwordField = document.getElementById('confirmpassword');
    var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});


//check if username and email is exist
document.getElementById('username').addEventListener("input", async (e) => {
    var username = e.target.value;
    const response = await fetch(`http://127.0.0.1:3000/ajax/fetch.php?username=${username}`);
    if (!username) {
        document.getElementById('is-valid-username').innerHTML = "";
        document.getElementById('username-label').style.color = "";
        document.getElementById('username').style.border = "";
        document.getElementById('button').style.cursor = "";
        document.getElementById('button').disabled = false;
    }
    const data = await response.json();
    if (data.ok) {
        document.getElementById('is-valid-username').innerHTML = data.message;
        document.getElementById('username-label').style.color = "red";
        document.getElementById('username').style.border = "1px solid red";
        document.getElementById('button').disabled = true;
        document.getElementById('button').style.cursor = "not-allowed";
    } else {
        document.getElementById('is-valid-username').innerHTML = "";
        document.getElementById('username-label').style.color = "";
        document.getElementById('username').style.border = "";
        document.getElementById('button').style.cursor = "";
        document.getElementById('button').disabled = false;
    }
});
document.getElementById('email').addEventListener("input", async (e) => {
    var email = e.target.value;
    const response = await fetch(`http://127.0.0.1:3000/ajax/fetch.php?email=${email}`);
    if (!email) {
        document.getElementById('is-valid-email').innerHTML = "";
        document.getElementById('email-label').style.color = "";
        document.getElementById('email').style.border = "";
        document.getElementById('button').style.cursor = "";
        document.getElementById('button').disabled = false;
    }
    const data = await response.json();
    if (data.ok) {
        document.getElementById('is-valid-email').innerHTML = data.message;
        document.getElementById('email-label').style.color = "red";
        document.getElementById('email').style.border = "1px solid red";
        document.getElementById('button').disabled = true;
    } else if (!data.ok) {
        document.getElementById('is-valid-email').innerHTML = "";
        document.getElementById('email-label').style.color = "";
        document.getElementById('email').style.border = "";
        document.getElementById('button').style.cursor = "";
        document.getElementById('button').disabled = false;
    }
});





