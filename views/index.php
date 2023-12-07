<?php
if (isset($_SESSION['user']['login'])) {
    header('location: /home');
}

?>
<?php require "./views/partial/header.php" ?>
<?php require "./views/partial/nav.php" ?>
<img src="<?= path('/img/bg-csucc.jpg') ?>" alt="">
<?php require "./views/partial/footer.php" ?>