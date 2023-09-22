<?php require "./views/partial/header.php" ?>
<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-0">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>
                            <form action="/login" method="POST">
                                <!-- form -->
                                <div class="form-outline form-white mb-4">
                                    <p class="text-danger">
                                        <?= $error['credentials'] ?? null ?>
                                    </p>
                                    <input type="text" name="username" id="typeEmailX"
                                        class="form-control form-control-lg" 
                                        value="<?= $_POST['username'] ?? null ?>" required />
                                    <label class="form-label" for="typeEmailX">Username</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" 
                                        id="typePasswordX" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div> 
                                
                                <?php if (isset($_SESSION['login_attempt']) && $_SESSION['login_attempt'] > 2): ?>
                                    <?php unset($_SESSION['error']); ?>
                                    <?php unset($_SESSION['attempts']); ?>
                                    <?php $_SESSION['locked'] = time(); ?>
                                    <p id="countdown">Please wait for 30 seconds</p>
                                <?php else: ?>
                                    <button class="btn btn-outline-light btn-lg px-5" name="submit"
                                        type="submit">Login</button>
                                <?php endif; ?>
                                <!-- form -->
                            </form>
                        </div>
                        <div>
                            <p class="mb-0">Don't have an account? <a href="/register"
                                    class="text-white-50 fw-bold">Sign
                                    Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="./validator/js/login/index.js"></script>
<?php require "./views/partial/footer.php" ?>