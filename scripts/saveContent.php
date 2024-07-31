<?php
session_start();
require_once('../resources/config.php');

if (isset($_POST['title']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = ucwords(clean($_POST['title'])); 
    $skillid = clean($_POST['skillid']);
    $userID=clean($_POST['userID']);
    $content = clean($_POST['content']);

    // Insert category data into the database
    $query = "INSERT INTO CONTENT (TITLE, CONTENT,USERID,SKILLID) VALUES (?,?,?,?)";
    $stt = $conn->prepare($query);
    if ($stt->execute([$title, $content,$userID,$skillid])) {
        echo 1;
        exit;
    } else {
     echo 0;
    }

}
?>