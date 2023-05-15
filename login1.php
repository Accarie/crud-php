<?php
// include 'connection.php';

// //create connection



// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email=$_POST["email"];
//     $password=($_POST["password"]);

 
//         $result = $conn->query("SELECT * FROM user WHERE email='$email' AND password='$password'");
        
//         if(!$result) {
//             echo "Error :" .$mysqli->error;
//             exit();
//         }
// if($result) {
//     // header("Location:index.php");
//     session_start();
//     $_SESSION["email"]=$email;
//     $_SESSION["password"]=$password;

//     header("Location: /CRUD/index.php");
//     exit();
    
// }else{
//    // header("Location: /CRUD/index.php");
//    echo "login not successful";
// }


//     } 

include 'connection.php';

$email="";
$password="";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $query= "select * from user where email='$email' and password='$password'";
    $result = mysqli_query($conn,$query);
    $count =mysqli_num_rows($result);

    if($count>0){
        
        header("location: /CRUD/index.php");
        exit;
        
    }else{
        echo "login not successful";
    }


    
}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <form method="POST">
    <div class="row mb-3">
    <label class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" name="email">
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-6">
        <input type="password" class="form-control" name="password">
    </div>
</div>
<div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
    </form>
</body>
</html>