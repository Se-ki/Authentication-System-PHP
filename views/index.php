<?php
if (!empty($_SESSION['username'])) {
    header('location: /home.php');
}

?>
<?php require "./views/partial/header.php" ?>
<?php require "./views/partial/nav.php" ?>
<?php require "./views/partial/footer.php" ?>