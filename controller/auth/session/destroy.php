<?php
if ($_SERVER['HTTP_SEC_FETCH_SITE'] === "none") {
    echo "<h1>404 Not Found <a href='/'>Go Back</a></h1>";
    exit;
}
session_destroy();
redirect('/login');