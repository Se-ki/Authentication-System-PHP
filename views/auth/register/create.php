<?php require "./views/partial/header.php" ?>
<!-- <section class="h-100 h-custom gradient-custom-2">-->
<div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-0">
        <div class="col-12">
            <div class="text-success p-3" id="display-success">
                <?= $message['success'] ?? null ?>
            </div>
            <div class="card card-registration card-registration-2"
                style="border-radius: 15px; background: linear-gradient(to right,white,white,white,white,white,white,white); ">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="p-3">
                                <form action="" method="POST" id="register-form" class="needs-validation">
                                    <h3 class="mb-3 mt-3">Personal
                                        Information</h3>
                                    <div class="row"> <!-- firstname  and lastname row -->
                                        <!-- firstname -->
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-sm" type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="firstname" id="firstname"
                                                    value="<?= $user['firstname'] ?? null ?>" autofocus required />
                                                <label for='floatingInput' id="firstname-label">Firstname</label>
                                                <span class="text-danger fs-6" id="is-valid-firstname"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-4">
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['middlename'] ?? null ?>" minlength="2"
                                                    maxlength="20" name="middlename" id="middlename" />
                                                <label for='floatingInput' id="middlename-label">Middlename</label>
                                                <span class="text-danger" id="is-valid-middlename"></span>
                                            </div>
                                        </div>

                                        <!-- lastname -->
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-sm" type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['lastname'] ?? null ?>" minlength="3"
                                                    maxlength="20" name="lastname" id="lastname" required />
                                                <label for='floatingInput' id="lastname-label">Lastname</label>
                                                <span class="text-danger fs-6" id="is-valid-lastname"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-4">
                                            <div class="form-floating mb-3">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['suffix'] ?? null ?>" minlength="1" maxlength="3"
                                                    name="suffix" id="suffix" />
                                                <label for='floatingInput' id="suffix-label">Suffix
                                                </label>
                                                <span class="text-danger fs-6" id="is-valid-suffix"></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-2 pb-2">
                                            <div class="form-floating">
                                                <select class="form-select form-select mb-3" id="sex"
                                                    aria-label="Large select example" name="sex">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <label for="floatingSelect">Sex</label>
                                            </div>
                                        </div>

                                        <div class="col-md-2 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input type="date" value="<?= $user['birthdate'] ?? null ?>" min="1960"
                                                    max="2030" id="birthdate" name="birthdate"
                                                    class="form-control input-sm" id="floatingstart"
                                                    placeholder="Birthdate" required />
                                                <label for="floatingstart">Birthdate</label>
                                            </div>
                                        </div>

                                        <div class="col-md-1 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm" type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['age'] ?? null ?>" min="18" max="150" name="age"
                                                    id="age" readonly required />
                                                <label for='floatingInput' id="age-label">Age</label>
                                                <span class="text-danger fs-6" id="is-valid-age"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-2 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['mobilenum'] ?? null ?>" minlength="3"
                                                    maxlength="20" name="mobilenum" id="mobilenum" required />
                                                <label for='floatingInput' id="mobilenum-label">Mobile Number</label>
                                                <span class="text-danger fs-6" id="is-valid-mobilenum"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-5 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="email"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['email'] ?? null ?>"
                                                    style="border: <?= isset($message['error-email']) ? "1px solid red" : "" ?>"
                                                    minlength="5" maxlength="60" name="email" id="email" required />
                                                <label for='floatingInput'
                                                    style="color: <?= isset($message['error-email']) ? "red" : "" ?>"
                                                    id="email-label">Email</label>
                                                <span class="text-danger fs-6" id="is-valid-email">
                                                    <?= $message['error-email'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #region -->
                                    <h3 class="mt-3">
                                        Address
                                        Information</h3>
                                    <div class="row g-3">
                                        <div class="col-md-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['country'] ?? null ?>" minlength="3" maxlength="20"
                                                    name="country" id="country" required />
                                                <label for='floatingInput' id="country-label">Country</label>
                                                <span class="text-danger text-bg-light fs-6"
                                                    id="is-valid-country"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['province'] ?? null ?>" minlength="2"
                                                    maxlength="20" name="province" id="province" required />
                                                <label for='floatingInput' id="province-label">Province</label>
                                                <span class="text-danger fs-6" id="is-valid-province"></span>
                                            </div>
                                        </div>


                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['city'] ?? null ?>" minlength="2" maxlength="20"
                                                    name="city" id="city" required />
                                                <label for='floatingInput' id="city-label">Municipal / City</label>
                                                <span class="text-danger fs-6" id="is-valid-city"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-3 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['barangay'] ?? null ?>" minlength="1"
                                                    maxlength="20" name="barangay" id="barangay" required />
                                                <label for='floatingInput' id="barangay-label">Barangay</label>
                                                <span class="text-danger fs-6" id="is-valid-barangay"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-7 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['address'] ?? null ?>" minlength="10"
                                                    maxlength="100" name="address" id="address" required />
                                                <label for='floatingInput' id="address-label">Address</label>
                                                <span class="text-danger text-bg-light fs-6"
                                                    id="is-valid-address"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm" type="number"
                                                    value="<?= $user['zipcode'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    name="zipcode" id="zipcode" required />
                                                <label for='floatingInput' id="zipcode-label">Zipcode</label>
                                                <span class="text-danger fs-6" id="is-valid-zipcode"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">
                                        Something you
                                        know
                                        Information</h3>
                                    <div class="row g-3">
                                        <div class="col-md-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    style="border: <?= isset($message['error-username']) ? "1px solid red" : "" ?>"
                                                    value="<?= $user['username'] ?? null ?>" minlength="5"
                                                    maxlength="20" name="username" id="username" required />
                                                <label for='floatingInput'
                                                    style="color: <?= isset($message['error-username']) ? "red" : "" ?>"
                                                    id="username-label">Username</label>
                                                <span class="text-danger fs-6" id="is-valid-username">
                                                    <?= $message['error-username'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- password -->
                                        <div class="col-md-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="password"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['password'] ?? null ?>" minlength="3"
                                                    maxlength="80" name="password" id="password" required />
                                                <label for='floatingInput' id="password-label">Password</label>
                                                <i class="fa fa-eye showhide" id="togglePassword"></i>
                                                <span id="password-strength" class="fs-6"></span>
                                                <span class="fs-6 text-danger" id="is-valid-password"></span>
                                            </div>
                                        </div>


                                        <!-- confirm password -->
                                        <div class="col-md-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="password"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    value="<?= $user['confirmpassword'] ?? null ?>" minlength="3"
                                                    maxlength="80" name="confirmpassword" id="confirmpassword"
                                                    required />
                                                <label for='floatingInput' id="confirmpassword-label">Confirm
                                                    Password</label>
                                                <i class="fa fa-eye showhide" id="toggleConfirmPassword"></i>
                                                <span class="text-danger fs-6" id="is-valid-confirmpassword"></span>
                                            </div>
                                        </div>

                                        <button type="submit" id="button" class="btn btn-success btn-lg"
                                            data-mdb-ripple-color="dark">Register</button>
                                        <center>
                                            <p class="mt-2 mb-0 text-dark">Have already an account?
                                                <a href="/login" class="fw-bold text-secondary"><u>Login here</u></a>
                                            </p>
                                        </center>

                                    </div>




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
<script src="../../js/validator/register/index.js"></script>
<?php require "./views/partial/footer.php" ?>