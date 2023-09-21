<?php require "./views/partial/header.php" ?>
<!-- Section: Design Block -->
<section class="">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
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
                            <form action="/email" method="POST">
                                <p class="text-danger">
                                    <?= $error['credentials'] ?? null ?>
                                </p>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example3" class="form-control"
                                        value="<?= $_POST['email'] ?? null ?>" />
                                    <label class="form-label" for="form3Example3">Email</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                                    Verify Email
                                </button>
                                <div>
                                    <p>Already have an account? <a href="./login" class="text-blacl-50 fw-bold">
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
<script src="./validator/js/index.js"></script>
<!-- Section: Design Block -->
<?php require "./views/partial/footer.php" ?>