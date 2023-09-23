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
                                    <form action="/register" method="POST" onsubmit="return validateForm()">
                                        <div class="row"> <!-- firstname  and lastname row -->
                                            <!-- firstname -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm" type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="3"
                                                        maxlength="20" name="firstname" required>
                                                    <label for='floatingInput'>Firstname</label>
                                                    <span class="text-danger fs-6">
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- lastname -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm" type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="3"
                                                        maxlength="20" name="lastname" required>
                                                    <label for='floatingInput'>Lastname</label>
                                                    <span class="text-danger fs-6">

                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> <!-- middlename  and suffixname row -->
                                            <!-- middlename -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm " type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="2"
                                                        maxlength="20" name="middlename">
                                                    <label for='floatingInput'>Middlename</label>
                                                    <span class="text-danger fs-6">

                                                    </span>
                                                </div>
                                            </div>
                                            <!-- suffix -->
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control form-control-sm " type="text"
                                                        placeholder=".form-control-sm"
                                                        aria-label=".form-control-sm example" minlength="2"
                                                        maxlength="3" name="suffix">
                                                    <label for='floatingInput'>Suffix e.g., Jr, Sr, II</label>
                                                    <span class="text-danger fs-6">

                                                    </span>
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
                                                    minlength="3" maxlength="20" name="age" required>
                                                <label for='floatingInput'>Age</label>
                                                <span class="text-danger fs-6">

                                                </span>
                                            </div>
                                        </div>

                                        <!-- username -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="username" required>
                                                <label for='floatingInput'>Username</label>
                                                <span class="text-danger fs-6">

                                                </span>
                                            </div>
                                        </div>

                                        <!-- password -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="password"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="password"
                                                    oninput="isPasswordRobust(this.value)" required>
                                                <label for='floatingInput'>Password</label>
                                                <span id="password-strength" class="fs-6"></span>
                                            </div>
                                        </div>

                                        <!-- confirm password -->
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="password"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="confirmpassword" required>
                                                <label for='floatingInput'>Confirm Password</label>
                                                <span class="text-danger fs-6">

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
                                            <input class="form-control form-control-sm " type="text"
                                                placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                minlength="3" maxlength="20" name="country" required>
                                            <label for='floatingInput'>Country</label>
                                            <span class="text-danger text-bg-light fs-6">

                                            </span>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- municipal/city and province -->
                                        <!-- municipal/city -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="2" maxlength="20" name="city" required>
                                                <label for='floatingInput'>Municipal / City</label>
                                                <span class="text-danger fs-6">

                                                </span>
                                            </div>
                                        </div>
                                        <!-- province -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="2" maxlength="20" name="province" required>
                                                <label for='floatingInput'>Province</label>
                                                <span class="text-danger fs-6">

                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- barangay and zipcode -->
                                        <!-- barangay -->
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="1" maxlength="20" name="barangay" required>
                                                <label for='floatingInput'>Barangay</label>
                                                <span class="text-danger fs-6">

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
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="20" name="mobilenum" required>
                                                <label for='floatingInput'>Mobile Number</label>
                                                <span class="text-danger fs-6">

                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- email -->
                                    <div class="mb-4">
                                        <div class="mb-4 pb-2">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control form-control-sm " type="text"
                                                    placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                                    minlength="3" maxlength="60" name="email" required>
                                                <label for='floatingInput'>Email</label>
                                                <span class="text-danger fs-6">

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