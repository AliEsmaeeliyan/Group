<?php
session_start();


$fileGet = json_decode(file_get_contents( 'user.json' ) , true);
$users = array_column($fileGet , 'username');
$pass = array_column($fileGet , 'pass');

if (in_array($_POST['username'], $users)){
    $key = array_keys($users , $_POST['username']);
   
    if($_POST['pass'] == $pass[$key[0]]){
        $_SESSION['user'] = $_POST['username'];   
        header('Location:chat.php');
    }
    else{
        $_SESSION['error'] = "data is not corect";
        header('Location:loginform.php');
    }
    
}
else{
    $_SESSION['error'] = "data is not corect";
    header('Location:loginform.php');
}
