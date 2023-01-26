<?php

session_start();
$user = $_SESSION['user'];

//print_r($_FILES);
//die();

if(!empty($_FILES['img']['name'])){
    $img = $_FILES['img'];
    $path = './image/'.$img['name'];
    move_uploaded_file($img['tmp_name'] , $path); 
}


$output = ['user' => $user , 'text' => $_POST['text'] , 'path' => $path ?? null ];


$fileGet = json_decode(file_get_contents( 'massage.json' ) , true);
if(!$fileGet){

    $usersInfo = [];
    $usersInfo[] = $output;
    file_put_contents ('massage.json', json_encode($usersInfo) , FILE_APPEND);
    header('Location:chat.php');
}

    $fileGet[] = $output;
    file_put_contents ('massage.json', json_encode($fileGet));
    header('Location:chat.php');

 











function randomstring($n){
    $str = range(a,z);
}
    

