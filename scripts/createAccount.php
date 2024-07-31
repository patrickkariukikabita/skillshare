<?php 
session_start();

require_once('../resources/config.php');
if(isset($_POST['email'])&& $_SERVER['REQUEST_METHOD']=='POST'){
    $email=clean($_POST['email']);
    $password=clean($_POST['password']);
    $firstname=clean($_POST['firstname']);
    $lastname=clean($_POST['lastname']);
    $password=md5($password);
    
    //attempt customer login
   $query = "INSERT INTO USERS (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD) VALUES(?,?,?,?)";
    $stt=$conn->prepare($query);
    if( $stt->execute([$firstname,$lastname,$email,$password])){
        $userid=$conn->lastInsertId();
        $_SESSION['userID']=$userid;
        $_SESSION['loggedin']=true;
        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }
    
       
    }
?>