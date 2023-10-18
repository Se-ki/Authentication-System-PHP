<?php require "./views/partial/header.php" ?>
<section class="gradient-custom">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-0">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>
                            <form action="/login/store" method="POST" id="session-form">
                                <!-- form -->
                                <p class="text-danger" id="error-message">
                                    <?= $message ?>
                                </p>
                                <div class="mb-4 pb-2">
                                    <div class="form-floating mb-3 text-dark">
                                        <input class="form-control form-control-sm " type="text"
                                            placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                            minlength="3" maxlength="20" name="username" required>
                                        <label for='floatingInput'>Username</label>
                                    </div>
                                </div>

                                <div class="mb-4 pb-2">
                                    <div class="form-floating mb-3 text-dark">
                                        <input class="form-control form-control-sm " type="password"
                                            placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                            minlength="3" maxlength="20" name="password" required>
                                        <label for='floatingInput'>Password</label>
                                    </div>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                    <center>
                        <div style="margin-bottom:-110px">
                            <p style="position:relative; bottom:80px" class="mb-0">Don't have an account? <a
                                    href="/register" class="text-white-50 fw-bold">Sign
                                    Up</a>
                            </p>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../../js/validator/login/index.js"></script>
<?php require "./views/partial/footer.php" ?>