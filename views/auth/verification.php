<?php require "./views/partial/header.php" ?>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <div class="mb-md-5 mt-md-4 pb-0">
                        <form action="/email/verification" method="POST">
                            <!-- form -->
                            <input type="hidden" name="email" value="<?= $_GET['email'] ?? null ?>" />
                            <div class="form-outline form-white mb-4">
                                <input type="password" name="verification_code" maxlength="6"
                                    placeholder="Enter Verification Code" id="typePasswordX"
                                    class="form-control form-control-lg" required />
                            </div>
                            <p class="text-danger">
                                <?= $error['input_code'] ?? null ?>
                            </p>
                            <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Verify
                                Email</button>
                            <!-- form -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "./views/partial/footer.php" ?>