<?php 

session_start();

$con = mysqli_connect('localhost', 'root', "");

mysqli_select_db($con, 'helpaid');

$username = $_POST['username'];
$password = $_POST['password'];

//select from table-name where column-name = $var
$s = "select * from organization2 where usr ='$username' && Password ='$password' ";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    $_success = "Login successful";
    $_SESSION['username'] = $username;
}
else{
    $_failed = "Login Failed";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!--main css-->
     <link rel="stylesheet" href="main_gen.css" type="text/css">
     <title>Confirmation</title>
</head>
<body class="body">
<nav class="navbar navbar-expand-lg navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand m-0">
                <img class="img" src="helpaid_logo.jpg" alt="logo">
            </a>
            <ul class="navigation navbar-nav justify-content-end align-items-center p-0 p-lg-3">
                <h3 class="text-left text-light me-4 p-1 border">Hello, <?php echo $username ?></h3>
                <li class="item nav-item"><a class="link a nav-link" href="index.html">Home</a></li>
                <li class="item nav-item"><a class="link a nav-link" href="#">About</a></li>
                <li class="item nav-item"><a class="link a nav-link" href="#">Contacts</a></li>
                <li class="item nav-item"><a class="link a nav-link" href="#">Blog</a></li>
            </ul>
            <div class="hamburger-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav> 
    <div class="successful-box w-50 mx-auto text-center">
        <?php
        if($num == 1){
            $message = $_success;
            $action = "addApplicant.php";
            $value = "Add Applicant";
        }
        else{
            $message = $_failed;
            $action = "replogin.html";
            $value = "Try Again";
        }
        ?>
        <h1 class="h1 p-5"><?php echo $message ?></h1>
        <form action="<?php echo $action ?>">
            <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
        <input type="submit" name="submit" class="a d-inline-block p-2 px-5 btn btn-success" value="<?php echo $value ?>"/>
        </form>
    </div>
<script>
</script>
</body>
</html>