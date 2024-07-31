<?php 
session_start();

require_once('../resources/config.php');
if(isset($_POST['email'])&& $_SERVER['REQUEST_METHOD']=='POST'){
    $email=clean($_POST['email']);
    $password=clean($_POST['loginpassword']);
    $x=0;
    $password=md5($password);
    
    //attempt customer login
    $query="select * from USERS where EMAIL=? and PASSWORD=?";
    $stt=$conn->prepare($query);
    $stt->execute([$email,$password]);
    if($stt->rowCount()>0){
    //   logining succccessful
       $results=$stt->fetch(PDO::FETCH_ASSOC);
       $userid=$results['ID'];
       $_SESSION['userID']=$userid;
       $_SESSION['loggedin']=true;
        echo 1;
        exit;
    }else{
        echo 2;
    }
    
    }
?>