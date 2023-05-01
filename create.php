<?php
$servername='localhost';
$username='root';
$password='';
$database='work';

$connection=new mysqli($servername,$username,$password,$database);
    $Firstname="";
    $Lastname="";
    $email="";
    $password="";
    $gender="";
    $successMessage="";
    $errorMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $Firstname=$_POST["Firstname"];
        $Lastname=$_POST["Lastname"];
        $email=$_POST["email"];
        $password=sha1($_POST["password"]);
        $gender=$_POST["gender"];

        do{
                if(empty($Firstname)||empty($Lastname)||empty($email)||empty($password)||empty($gender)){
                    $errorMessage="All the fiels are required";
                    break;
                }
                $sql = "INSERT INTO user (Firstname,Lastname,email,password,gender)". "VALUES('$Firstname','$Lastname','$email','$password','$gender')";
                $result=$connection->query($sql);
               if(!$result){
                $errorMessage="Invalid query: ".$connection->error;
                break;
               }

                $Firstname="";
                $Lastname="";
                $email="";
                $password="";
                $gender="";
                $successMessage="User added successfully!";
               
                header("location:/CRUD/index.php");
                exit;

        }while(false);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script scr="
        https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
</head> 
<body>
    <div class="container my-5">
        <h2>New User</h2>

          <?php
                if(!empty($errorMessage)){
                    echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                 </div>
                    ";
                }          
          ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Firstname" value="<?php echo $Firstname;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lastname" value="<?php echo $Lastname;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="gender" value="<?php echo $gender;?>">
                </div>
            </div>

            <?php
              if(!empty($successMessage)){
                echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-3 d-grid'> 
                   <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                   </div>
                </div>
            </div>
                ";
              }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/CRUD/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>