<?php require "./views/partial/header.php" ?>
<!-- Section: Design Block -->
<section class="">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        Security <br />
                        <span class="text-primary">Information System</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                        quibusdam tempora at cupiditate quis eum maiores libero
                        veritatis? Dicta facilis sint aliquid ipsum atque?
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <form action="/register" method="POST">
                                <p class="text-danger">
                                    <?= $error['credentials'] ?? null ?>
                                </p>
                                <p class="text-success">
                                    <?= $error['success'] ?? null ?>
                                </p>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="firstname" maxlength="15" id="form3Example1"
                                                class="form-control" value="<?= $_POST['firstname'] ?? null ?>" />
                                            <label class="form-label" for="form3Example1">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="lastname" maxlength="15" id="form3Example2"
                                                class="form-control" value="<?= $_POST['lastname'] ?? null ?>" />
                                            <label class="form-label" for="form3Example2">Last name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="middlename" maxlength="15" id="form3Example1"
                                                class="form-control" value="<?= $_POST['middlename'] ?? null ?>" />
                                            <label class="form-label" for="form3Example1">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="extensionName" maxlength="15" id="form3Example2"
                                                class="form-control" value="<?= $_POST['extensionName'] ?? null ?>" />
                                            <label class="form-label" for="form3Example2">Suffix name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <select name="sex" value="" class="form-control" id="">
                                        <option selected disabled>Sex</option>
                                        <option <?= isset($_POST['sex']) && $_POST['sex'] === "Male" ? "selected" : "" ?>
                                            value="Male">
                                            Male
                                        </option>
                                        <!-- $_POST['sex'] === "Male" ? "selected" : "" -->
                                        <option <?= isset($_POST['sex']) && $_POST['sex'] === "Female" ? "selected" : "" ?>
                                            value="Female">
                                            Female
                                        </option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="number" name="age" id="form3Example3" class="form-control"
                                        value="<?= $_POST['age'] ?? null ?>" />
                                    <label class="form-label" for="form3Example3">Age</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" name="contactNumber" id="form3Example3" class="form-control"
                                        value="<?= $_POST['contactNumber'] ?? null ?>" />
                                    <label class="form-label" for="form3Example3">Contact Number</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="country" id="form3Example1" class="form-control"
                                                value="<?= $_POST['country'] ?? null ?>" />
                                            <label class="form-label" for="form3Example1">Country</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="province" id="form3Example2" class="form-control"
                                                value="<?= $_POST['province'] ?? null ?>" />
                                            <label class="form-label" for="form3Example2">Province</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="city" id="form3Example1" class="form-control"
                                                value="<?= $_POST['city'] ?? null ?>" />
                                            <label class="form-label" for="form3Example1">Municipal / City</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="barangay" id="form3Example2" class="form-control"
                                                value="<?= $_POST['barangay'] ?? null ?>" />
                                            <label class="form-label" for="form3Example2">Barangay</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Username input -->
                                <div class="form-outline mb-4">
                                    <input type="username" name="username" id="form3Example3" class="form-control"
                                        value="<?= $_POST['username'] ?? null ?>" />
                                    <label class="form-label" for="form3Example3">Username</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example3" class="form-control" value="" />
                                    <label class="form-label" for="form3Example3">Email</label>
                                </div>

                                <!-- Password input -->
                                <div id="password-strength"></div>
                                <div class="form-outline form-white mb-4">
                                    <input class="form-control form-control-sm" type="password" name="password"
                                        id="password" autocomplete="off"
                                        title="at least one number and one uppercase and lowercase letter and one special character, and at least 8 or more characters"
                                        oninput="isPasswordRobust(this.value)">
                                    <label for="password">Password</label>
                                </div>
                                <p class="text-danger">
                                    <?= $error['password'] ?? null ?>
                                </p>

                                <!-- Confirm Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="confirmPassword" id="form3Example4"
                                        class="form-control" />
                                    <label class="form-label" for="form3Example4">Confirm Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                                    Sign up
                                </button>

                                <div>
                                    <p>Already have an account? <a href="/login" class="text-blacl-50 fw-bold">
                                            Login </a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<script src="./validator/js/register/index.js"></script>
<!-- Section: Design Block -->
<?php require "./views/partial/footer.php" ?>