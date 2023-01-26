<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location:loginform.php');
}
else{



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="style1.css"> 
</head>
<body>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-6">
        <div class="card" id="chat2">
          <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0">Chat</h5>
           <a href="http://localhost/cws/week7/php/loginform.php"><button type="button" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark" name="logout">log out
            </button></a> 
          </div>
          <div class=" card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
          <?php dispaly();  
          ?>
          </div>
          <form action="write.php" method="post" enctype="multipart/form-data">
          <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
            <input type="text" class="msg form-control form-control-lg"  placeholder="Type message" name="text" maxlength="100">
             <input type="file" accept="image" name="img"> 
              <button type="submit"><img src="send.svg" alt=""></button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>

<?php
}

function dispaly(){
  $msgs = json_decode (file_get_contents('massage.json') , true);
  foreach($msgs as $msg){

    if($msg['user'] == $_SESSION['user']){
      if(!empty($msg["path"])){
        echo '<div class=" text-secondary d-flex gap-5 "><div class = "user">' .$msg["user"].'</div>'.'<img class= "myImg" src="'.$msg["path"].' ">'.'<div class="text">'. $msg["text"].'</div>' .'</div>';
       }
       else{
        echo '<div class=" text-secondary  d-flex gap-5 "><div class = "user">'.$msg["user"].'</div>'.'<div class="text">'. $msg["text"].'</div>' .'</div>';
       }
   
    }else{
      if(!empty($msg["path"])){
        echo '<div class="text-primary  d-flex gap-5 "><div class = "user">' .$msg["user"].'</div>'.'<img class= "myImg" src="'.$msg["path"].' ">'.'<div class="text">'. $msg["text"].'</div>'.'</div>';
       }
       else{
    echo  '<div class=" text-primary  d-flex gap-5"><div class = "user">'.$msg["user"].'</div>'.'<div class="text">'. $msg["text"].'</div>' . '</div>';
    }
 }
 
}
if($msg["role"] == "admin"){
  
}
}



