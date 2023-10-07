<?php require "./views/partial/header.php" ?>
<div class="text-light">
    <center>
        <h1>Welcome to home page</h1>
        <h1>Hi,
            <?= $_SESSION['user']['username'] ?>
            <form action="/session/destroy" method="POST">
                <button class="btn btn-danger">Logout</button>
            </form>
        </h1>
    </center>
    <div>
        <?php foreach ($users as $user): ?>
            Firstname:
            <?= $user['firstname'] ?><br>
            Lastname:
            <?= $user['lastname'] ?><br>
            Middlename:
            <?= $user['middlename'] ?><br>
            Suffix:
            <?= $user['suffix'] ?><br>
            Sex:
            <?= $user['sex'] ?><br>
            Age:
            <?= $user['age'] ?><br>
            Mobile Number:
            <?= $user['mobilenumber'] ?><br>
            Address:
            <?= "{$user['purok']}, {$user['barangay']},  {$user['street']}. {$user['city']}, {$user['province']}, {$user['country']} {$user['zipcode']}." ?><br>
            Username:
            <?= $user['username'] ?><br>
            Email:
            <?= $user['email'] ?><br>
        <?php endforeach; ?>
    </div>
</div>
<?php require "./views/partial/footer.php" ?>