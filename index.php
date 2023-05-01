<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>CRUD </title> 
</head>
<body>
    <div class='container my-5'>
         <h2>List Of Users</h2>
         <a href='/CRUD/create.php' class='btn btn-primary' role='button'>New user</a><br><br>
         <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername='localhost';
                $username='root';
                $password='';
                $database='work';

                $connection=new mysqli($servername,$username,$password,$database);

                if($connection->connect_error){
                    die('Connection failed: ' . $connection->connect_error);
                }
                $sql='SELECT * FROM USER';
                $result=$connection->query($sql) ;
                if(!$result){
                    die('Invalid qudeleteery: '.$connection->error);
                };
                while($row=$result->fetch_assoc()){
                    echo "
                      <tr>
                    <td>$row[id]</td>
                    <td>$row[Firstname]</td>
                    <td>$row[Lastname]</td>
                    <td>$row[email]</td>
                    <td>$row[password]</td>
                    <td>$row[gender]</td>
                    
                    <td>
                    <a href='/CRUD/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='/CRUD/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                </tr>
                    ";
                };
               ?>
            </tbody>
         </table>

         <a href='/CRUD/export.php' class='btn btn-primary' role='button'>Data Export</a><br><br>
    </div>
</body>
</html>