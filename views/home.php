<?php require "./views/partial/header.php" ?>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css/index.css">
<section>
    <div class="row p-3 mb-4">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center p-4">
                    <img id="image" src="../img/temp-profile.png" alt="avatar" class="rounded-circle img-fluid">
                    <?php foreach ($users as $user): ?>
                        <h4 class="my-2">
                            Hello,
                            <?= $user['username'] ?>
                        </h4>
                    </div>
                </div>
            </div>
            <div class=" col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9" style="text-transform: capitalize;">
                                <p class="text-muted mb-0">
                                    <?= $user['firstname'] ?>
                                    <?= $user['middlename'] ?>
                                    <?= $user['lastname'] ?>
                                    <?= $user['suffix'] ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Sex</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <?= $user['sex'] ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <?= $user['email'] ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Birthdate</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <?php
                                    $date = date_create($user['birthdate']);
                                    echo date_format($date, "F d, Y");
                                    ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Age</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <?= $user['age'] ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <?= $user['mobilenumber'] ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9" style="text-transform: capitalize;">
                                <p class="text-muted mb-0">
                                    <?= $user['purok'] ?>,
                                    <?= $user['barangay'] ?>,
                                    <?= $user['city'] ?>,
                                    <?= $user['province'] ?>,
                                    <?= $user['country'] ?>
                                    <?= $user['zipcode'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p id="changeinput">
                                End Session</p>
                        </div>
                        <div class="col-sm-9">
                            <form action="/session/destroy" method="POST">
                                <button class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require "./views/partial/footer.php" ?>