<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        #home{
            color: black;
        }
    </style>
</head>
<body>

<div style="background: #7878d7;"><span><a id="home" href="http://localhost/demoJson/index.php">HOME</a></span> </div>

<div class="container">

    <form action="http://localhost/demoJson/adduser.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <div class="form-group">
            <label for="pwd">Import Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="importPassword">
        </div>
        <button type="submit" class="btn btn-primary" name="signup">Signup</button>
    </form>
</div>

</body>
</html>
<?php
include 'Data.php';
include 'User.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $importPassword=$_POST['importPassword'];
    if (empty($username)||empty($password)||empty($importPassword)){
        echo 'Please enter username and password!';
        return $user;
}
    elseif ($password!=$importPassword){
        echo 'Please enter password!';
        return $user;
    }
    else
        $user= new  User($username, $password,$importPassword);
        Data::addUser($user);
        echo 'Sign Up Success!!';
}


?>
