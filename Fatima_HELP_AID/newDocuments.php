<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location:replogin.php');
}

$con = mysqli_connect('localhost', 'root', "");

mysqli_select_db($con, 'helpaid');

$ID = $_POST['ID'];

if(isset($_POST['submit'])){

    $message = '';
    $fileCount = count($_FILES['file']['name']);
    for($i=0; $i<$fileCount; $i++){
        $fileName = $_FILES['file']['name'][$i];
        $sql = "insert into documents(title, applicantID, content) values('$fileName', '$ID', '$fileName')";

        if($con->query($sql) == TRUE){
            $message = "File(s) uploaded successfully";
        }else{
            $message = "ERROR";
        }

        move_uploaded_file($_FILES['file']['tmp_name'][$i], 'documents/'.$fileName);
    }
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
                <h3 class="text-left text-light me-4 p-1 border">Hello, <?php echo $_SESSION['username'] ?></h3>
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
        <h1 class="h1 p-5"><?php echo $message ?></h1>
        <p class="p-2">Thank you for using us!</p>
        <form action="addApplicant.php" class="d-inline-block">
            <button type="submit" name="submit" class="button btn btn-success me-1">Add Applicant</button>
        </form>
        <form action="logout.php" class="d-inline-block">
            <button type="submit" name="submit" class="button btn btn-success me-1">Log out</button> 
        </form>
    </div>
<script>
</script>
</body>
</html>