<?php
session_start();
$localStorageData = json_decode(file_get_contents('php://input'), true);
$_SESSION['count'] = $localStorageData;
echo json_encode([
    "count" => $localStorageData,
]);