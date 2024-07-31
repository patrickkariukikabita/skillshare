<?php
session_start();
require_once('../resources/config.php');

if (isset($_POST['name']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = ucwords(clean($_POST['name'])); 
    $category_description = clean($_POST['desc']);

    // Check if the category already exists
    $check_query = "SELECT * FROM CATEGORIES WHERE NAME = ?";
    $check_stt = $conn->prepare($check_query);
    $check_stt->execute([$category_name]);

    if ($check_stt->fetch()) {
        echo 2;
        exit;
    }

    // Insert category data into the database
    $query = "INSERT INTO CATEGORIES (NAME, DESCRIPTION) VALUES (?, ?)";
    $stt = $conn->prepare($query);

    if ($stt->execute([$category_name, $category_description])) {
        echo 1;
        exit;
    } else {
        echo 3;
        exit;
    }
}
?>
