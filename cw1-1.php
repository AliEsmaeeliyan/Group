<?php
session_start();
//var_dump(!preg_match('/^[a-zA-Z0-9_]{3,32}$/' , $_POST['username']));
//die();

if(!preg_match('/^[a-zA-Z0-9_]{3,32}$/' , $_POST['username'])){
    $_SESSION['flash_message'] = "plese Enter carect username";
    header('Location:rigester.php');  
}
elseif(!preg_match('/^[a-z\s]{3,32}$/' , $_POST['name'])){
    $_SESSION['flash_message'] = "plese Enter carect name"; 
   header('Location:rigester.php'); 
   
}
else{
    $fileGet = json_decode(file_get_contents( 'user.json' ) , true);
if(!$fileGet){

    $usersInfo = [];
    $usersInfo[] = $_POST;

    file_put_contents ('user.json', json_encode($usersInfo) , FILE_APPEND);
}

$users = array_column($fileGet , 'username');
$emails = array_column($fileGet , 'email');
if(in_array($_POST['username'], $users ) &&  in_array($_POST['email'], $emails)){
    $_SESSION['flash_message'] = "shoam ghblan rigester kardid"; 
   header('Location:rigester.php'); 
}
else{
    $fileGet[] = $_POST;
    file_put_contents ('user.json', json_encode($fileGet));
  header('Location:loginform.php');
}

}











