<?php require "./views/partial/header.php" ?>
<div>
    <h1>Welcome to home page</h1>
    <form action="" method="POST">
        <h1>Hi,
            <?= $_SESSION['user']['username'] ?>
        </h1>
        <button class="btn btn-danger">Logout</button>
    </form>
    <?php foreach ($users as $user): ?>
        <?= $user['firstname'] ?>
        <?= $user['lastname'] ?>
        <?= $user['middlename'] ?>
        <?= $user['extensionName'] ?>
        <?= $user['sex'] ?>
        <?= $user['age'] ?>
        <?= $user['contactNumber'] ?>
        <?= $user['address'] ?>
        <?= $user['username'] ?>
        <?= $user['email'] ?>
        <?= $user['contactNumber'] ?>
    <?php endforeach; ?>
</div>
<?php require "./views/partial/footer.php" ?>