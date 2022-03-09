<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:replogin.php');
}

$con = mysqli_connect('localhost', 'root', "");

mysqli_select_db($con, 'helpaid');

$ID = $_POST['ID'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobileNo = $_POST['mobileNo'];
$address = $_POST['address'];
$income = $_POST['income'];

//select from table-name where column-name = $var
$s = "select * from applicant where ID = '$ID'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $message = "Applicant already exists";
}else{
    $reg = "insert into applicant(ID, Fullname, Email, MobileNo, Address, Income) values ('$ID', '$fullname', '$email', '$mobileNo', '$address', '$income')";
    $_SESSION['identity'] = $ID;
    mysqli_query($con, $reg);
}

?>

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
            <h3 class="text-left text-light me-4 p-2 border rounded"><i class="fa-solid fa-heart"></i>Hello, <?php echo $_SESSION['username'] ?></h3>
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
        if($num == 0){
            $message = "Registration successful";
            $href = "addDocuments.php";
            $value = "Add Documents";
        }
        else{
            $message = "Applicant already exists";
            $href = "addApplicant.php";
            $value = "Try Again"; 
        }?>
        <h1 class="h1 p-5"><?php echo $message ?></h1>
        <form action="<?php echo $href ?>">
            
        <input type="submit" name="submit" class="a d-inline-block p-2 px-5 btn btn-success" value="<?php echo $value ?>"/>
        </form>
    </div>
    </body>
    </html>