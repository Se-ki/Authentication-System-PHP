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
                            <input type="hidden" id="timeIncrement" value="<?php echo $timeIncrement; ?>">
                            <form action="" method="" id="session-form">
                                <!-- form -->
                                <div class="mb-4 pb-2">
                                    <div class="form-floating mb-3 text-dark">
                                        <input class="form-control form-control-sm " type="text"
                                            placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                            minlength="3" maxlength="20" name="username" disabled required>
                                        <label for='floatingInput'>Username</label>
                                    </div>
                                </div>

                                <div class="mb-4 pb-2">
                                    <div class="form-floating mb-3 text-dark">
                                        <input class="form-control form-control-sm " type="password"
                                            placeholder=".form-control-sm" aria-label=".form-control-sm example"
                                            minlength="3" maxlength="20" name="password" disabled required>
                                        <label for='floatingInput'>Password</label>
                                    </div>
                                </div>
                                <p class="limitreach" style="color: red">Too many attempts!</p>
                                <div style="color:white; margin-bottom: 30px;" id="total-time-left"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../../js/validator/login/index.js"></script>
<?php require "./views/partial/footer.php" ?>