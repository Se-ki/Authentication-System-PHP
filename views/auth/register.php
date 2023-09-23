<?php require "./views/partial/header.php" ?>
<section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="text-bg-success p-3">
                    <?= $error['success'] ?? null ?>
                </div>
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #4835d4;">General Infomation</h3>
                                    <form action="/register" method="POST">
                                        <div class="row"> <!-- firstname  and lastname row -->
                                            <!-- firstname -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input
                                                        class="form-control form-control-sm <?= isset($error['firstname']) ? "is-invalid" : null ?>"
                                                        type="text" value="<?= $user['firstname'] ?? null ?>"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="3"
                                                        maxlength="20" name="firstname" required>
                                                    <?= isset($error['firstname']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Firstname</label>" : "<label for='floatingInput'>Firstname</label>" ?>
                                                    <span class="text-danger fs-6">
                                                        <?= $error['firstname'] ?? null ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- lastname -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input
                                                        class="form-control form-control-sm <?= isset($error['lastname']) ? "is-invalid" : null ?>"
                                                        type="text" value="<?= $user['lastname'] ?? null ?>"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="3"
                                                        maxlength="20" name="lastname" required>
                                                    <?= isset($error['lastname']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Lastname</label>" : "<label for='floatingInput'>Lastname</label>" ?>
                                                    <span class="text-danger fs-6">
                                                        <?= $error['lastname'] ?? null ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> <!-- middlename  and suffixname row -->
                                            <!-- middlename -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input
                                                        class="form-control form-control-sm <?= isset($error['middlename']) ? "is-invalid" : null ?>"
                                                        type="text" value="<?= $user['middlename'] ?? null ?>"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="2"
                                                        maxlength="20" name="middlename">
                                                    <?= isset($error['middlename']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Middlename</label>" : "<label for='floatingInput'>Middlename</label>" ?>
                                                    <span class="text-danger fs-6">
                                                        <?= $error['middlename'] ?? null ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- suffix -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input
                                                        class="form-control form-control-sm <?= isset($error['suffix']) ? "is-invalid" : null ?>"
                                                        type="text" value="<?= $user['suffix'] ?? null ?>"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="2"
                                                        maxlength="3" name="suffix">
                                                    <?= isset($error['suffix']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Suffix</label>" : "<label for='floatingInput'>Suffix e.g., Jr, Sr, II</label>" ?>
                                                    <span class="text-danger fs-6">
                                                        <?= $error['suffix'] ?? null ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- sex -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating">
                                                <select class="form-select form-select mb-3" id="floatingSelect"
                                                    aria-label="Large select example" name="sex">
                                                    <option value="Male" <?= isset($user['sex']) && $user['sex'] === "Male" ? "selected" : null ?>>Male</option>
                                                    <option value="Female" <?= isset($user['sex']) && $user['sex'] === "Female" ? "selected" : null ?>>Female</option>
                                                </select>
                                                <label for="floatingSelect">Sex</label>
                                            </div>
                                        </div>

                                        <!-- age -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['age']) ? "is-invalid" : null ?>"
                                                    type="number" value="<?= $user['age'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="age" required>
                                                <?= isset($error['username']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Age</label>" : "<label for='floatingInput'>Age</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['age'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- username -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['username']) ? "is-invalid" : "" ?>"
                                                    type="text" value="<?= $user['username'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="username" required>
                                                <?= isset($error['username']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Username</label>" : "<label for='floatingInput'>Username</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['username'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- password -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['password']) ? "is-invalid" : null ?>"
                                                    type="password" value="<?= $user['password'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="password" required>
                                                <?= isset($error['password']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Password</label>" : "<label for='floatingInput'>Password</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['username'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- confirm password -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['confirm']) ? "is-invalid" : null ?>"
                                                    type="password" value="<?= $user['confirmpassword'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="confirmpassword" required>
                                                <?= isset($error['confirm']) ? "<label class='text-danger' for='floatingInputInvalid'>Doesn't match</label>" : "<label for='floatingInput'>Confirm Password</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['confirm'] ?? null ?>
                                                </span>
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
                                            <input
                                                class="form-control form-control-sm <?= isset($error['country']) ? "is-invalid" : null ?>"
                                                type="text" value="<?= $user['country'] ?? null ?>"
                                                placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                minlength="3" maxlength="20" name="country" required>
                                            <?= isset($error['country']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Country</label>" : "<label for='floatingInput'>Country</label>" ?>
                                            <span class="text-danger text-bg-light fs-6">
                                                <?= $error['country'] ?? null ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- municipal/city and province -->
                                        <!-- municipal/city -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['city']) ? "is-invalid" : null ?>"
                                                    type="text" value="<?= $user['city'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="2" maxlength="20" name="city" required>
                                                <?= isset($error['city']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Municipal / City</label>" : "<label for='floatingInput'>Municipal / City</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['city'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- province -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['province']) ? "is-invalid" : null ?>"
                                                    type="text" value="<?= $user['province'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="2" maxlength="20" name="province" required>
                                                <?= isset($error['province']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Province</label>" : "<label for='floatingInput'>Province</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['province'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- barangay and zipcode -->
                                        <!-- barangay -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['barangay']) ? "is-invalid" : null ?>"
                                                    type="text" value="<?= $user['barangay'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="1" maxlength="20" name="barangay" required>
                                                <?= isset($error['barangay']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Barangay</label>" : "<label for='floatingInput'>Barangay</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['barangay'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- zipcode -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm" type="text" value="123123"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="2" maxlength="10" name="zipcode" required>
                                                <label for='floatingInput'>Zipcode</label>
                                                <span class="text-danger fs-6">
                                                    <!-- error output -->
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- contact number -->
                                    <div class="form-outline form-white">
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['mobilenum']) ? "is-invalid" : null ?>"
                                                    type="text" value="<?= $user['mobilenum'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="mobilenum" required>
                                                <?= isset($error['mobilenum']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Mobile Number</label>" : "<label for='floatingInput'>Mobile Number</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['mobilenum'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- email -->
                                    <div class="mb-4">
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input
                                                    class="form-control form-control-sm <?= isset($error['email']) ? "is-invalid" : null ?>"
                                                    type="text" value="<?= $user['email'] ?? null ?>"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="60" name="email" required>
                                                <?= isset($error['email']) ? "<label class='text-danger' for='floatingInputInvalid'>Invalid Email</label>" : "<label for='floatingInput'>Email</label>" ?>
                                                <span class="text-danger fs-6">
                                                    <?= $error['email'] ?? null ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-light btn-lg"
                                        data-mdb-ripple-color="dark">Register</button>

                                    <p class="text-center mt-5 mb-0 text-dark">Have already an account? <a href="/login"
                                            class="fw-bold text-body"><u>Login here</u></a></p>


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
<script src="./validator/js/register/index.js"></script>
<?php require "./views/partial/footer.php" ?>