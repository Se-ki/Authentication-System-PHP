<?php require "./views/partial/header.php" ?>
<section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="text-success p-3">
                    <?= $message['success'] ?? null ?>
                </div>
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">General Infomation</h3>
                                    <form action="/register" method="POST" id="register-form"
                                        onsubmit="return validateForm(event)">
                                        <div class="row"> <!-- firstname  and lastname row -->
                                            <!-- firstname -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm" type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="3"
                                                        maxlength="20" name="firstname" id="firstname"
                                                        value="<?= $user['firstname'] ?? null ?>" />
                                                    <label for='floatingInput' id="firstname-label">Firstname</label>
                                                    <span class="text-danger fs-6" id="is-valid-firstname"></span>
                                                </div>
                                            </div>
                                            <!-- lastname -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm" type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example"
                                                        value="<?= $user['lastname'] ?? null ?>" minlength="3"
                                                        maxlength="20" name="lastname" id="lastname">
                                                    <label for='floatingInput' id="lastname-label">Lastname</label>
                                                    <span class="text-danger fs-6" id="is-valid-lastname"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> <!-- middlename  and suffixname row -->
                                            <!-- middlename -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm " type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example"
                                                        value="<?= $user['middlename'] ?? null ?>" minlength="2"
                                                        maxlength="20" name="middlename" id="middlename" />
                                                    <label for='floatingInput' id="middlename-label">Middlename</label>
                                                    <span class="text-danger" id="is-valid-middlename"></span>
                                                </div>
                                            </div>
                                            <!-- suffix -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm " type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example"
                                                        value="<?= $user['suffix'] ?? null ?>" minlength="1"
                                                        maxlength="3" name="suffix" id="suffix" />
                                                    <label for='floatingInput' id="suffix-label">Suffix e.g., Jr, Sr,
                                                        II</label>
                                                    <span class="text-danger fs-6" id="is-valid-suffix"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- sex -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating">
                                                <select class="form-select form-select mb-3" id="floatingSelect"
                                                    aria-label="Large select example" name="sex">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <label for="floatingSelect">Sex</label>
                                            </div>
                                        </div>

                                        <!-- age -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm" type="number"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['age'] ?? null ?>" min="5" max="200" minlength="3"
                                                    maxlength="20" name="age" id="age">
                                                <label for='floatingInput' id="age-label">Age</label>
                                                <span class="text-danger fs-6" id="is-valid-age"></span>
                                            </div>
                                        </div>

                                        <!-- username -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['username'] ?? null ?>" minlength="5"
                                                    maxlength="20" name="username" id="username">
                                                <label for='floatingInput' id="username-label">Username</label>
                                                <span class="text-danger fs-6" id="is-valid-username">
                                                    <?= $message['error-username'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- password -->
                                        <div class="mb-4 pb-2">
                                            <span class="fs-6 text-danger" id="is-valid-password"></span>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="password"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['password'] ?? null ?>" minlength="3"
                                                    maxlength="80" name="password" id="password" />
                                                <label for='floatingInput' id="password-label">Password</label>
                                                <i class="fa fa-eye showhide" id="togglePassword"></i>
                                                <span id="password-strength" class="fs-6"></span>
                                            </div>
                                        </div>


                                        <!-- confirm password -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="password"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['confirmpassword'] ?? null ?>" minlength="3"
                                                    maxlength="80" name="confirmpassword" id="confirmpassword">
                                                <label for='floatingInput' id="confirmpassword-label">Confirm
                                                    Password</label>
                                                <i class="fa fa-eye showhide" id="toggleConfirmPassword"></i>
                                                <span class="text-danger fs-6" id="is-valid-confirmpassword"></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-6 bg-indigo text-white">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5">Contact Details</h3>
                                    <!-- country -->
                                    <div class="mb-4 pb-2">
                                        <div class="form-floating mb-3 text-dark">
                                            <input class="form-control form-control-sm " type="text"
                                                placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                value="<?= $user['country'] ?? null ?>" minlength="3" maxlength="20"
                                                name="country" id="country">
                                            <label for='floatingInput' id="country-label">Country</label>
                                            <span class="text-danger text-bg-light fs-6" id="is-valid-country"></span>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- municipal/city and province -->
                                        <!-- province -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['province'] ?? null ?>" minlength="2"
                                                    maxlength="20" name="province" id="province">
                                                <label for='floatingInput' id="province-label">Province</label>
                                                <span class="text-danger fs-6" id="is-valid-province"></span>
                                            </div>
                                        </div>
                                        <!-- municipal/city -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['city'] ?? null ?>" minlength="2" maxlength="20"
                                                    name="city" id="city">
                                                <label for='floatingInput' id="city-label">Municipal / City</label>
                                                <span class="text-danger fs-6" id="is-valid-city"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- barangay and zipcode -->
                                        <!-- barangay -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['barangay'] ?? null ?>" minlength="1"
                                                    maxlength="20" name="barangay" id="barangay">
                                                <label for='floatingInput' id="barangay-label">Barangay</label>
                                                <span class="text-danger fs-6" id="is-valid-barangay"></span>
                                            </div>
                                        </div>
                                        <!-- zipcode -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm" type="text"
                                                    value="<?= $user['zipcode'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="2" maxlength="10" name="zipcode">
                                                <label for='floatingInput'>Zipcode</label>
                                                <span class="text-danger fs-6">
                                                    <!-- error output -->
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- address -->
                                    <div class="mb-4 pb-2">
                                        <div class="form-floating mb-3 text-dark">
                                            <input class="form-control form-control-sm " type="text"
                                                placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                value="<?= $user['address'] ?? null ?>" minlength="10" maxlength="100"
                                                name="address" id="address">
                                            <label for='floatingInput' id="address-label">Address</label>
                                            <span class="text-danger text-bg-light fs-6" id="is-valid-address"></span>
                                        </div>
                                    </div>

                                    <!-- contact number -->
                                    <div class="form-outline form-white">
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['mobilenum'] ?? null ?>" minlength="3"
                                                    maxlength="20" name="mobilenum" id="mobilenum">
                                                <label for='floatingInput' id="mobilenum-label">Mobile Number</label>
                                                <span class="text-danger fs-6" id="is-valid-mobilenum"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- email -->
                                    <div class="mb-4">
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="email"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['email'] ?? null ?>" minlength="5" maxlength="60"
                                                    name="email" id="email">
                                                <label for='floatingInput' id="email-label">Email</label>
                                                <span class="text-danger fs-6" id="is-valid-email"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" id="button" class="btn btn-success btn-lg"
                                        data-mdb-ripple-color="dark">Register</button>

                                    <p class="text-center mt-5 mb-0 text-light">Have already an account? <a
                                            href="/login" class="fw-bold text-secondary"><u>Login here</u></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require "./views/partial/footer.php" ?>