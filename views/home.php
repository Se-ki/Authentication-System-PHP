<?php require "./views/partial/header.php" ?>
<div>
    <h1>Welcome to home page</h1>
    <h1>Hi,
        <?= $_SESSION['user']['username'] ?>
    </h1>
    <form action="/session/destroy" method="POST">
        <button class="btn btn-danger">Logout</button>
    </form>
    <?php foreach ($users as $user): ?>
        <?= $user['firstname'] ?>
        <?= $user['lastname'] ?>
        <?= $user['middlename'] ?>
        <?= $user['suffix'] ?>
        <?= $user['sex'] ?>
        <?= $user['age'] ?>
        <?= $user['mobilenumber'] ?>
        <?= $user['address'] ?>
        <?= $user['username'] ?>
        <?= $user['email'] ?>
    <?php endforeach; ?>
</div>
<?php require "./views/partial/footer.php" ?>