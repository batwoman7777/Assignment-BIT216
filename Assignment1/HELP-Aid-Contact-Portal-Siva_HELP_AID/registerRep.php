<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "helpaid";
  $con = new mysqli($servername, $username, $password, $dbname);

  $usr=$_POST['usr'];
  $Password=$_POST['Password'];
  $OrganizationName=$_POST['OrganizationName'];
  $MobileNo=$_POST['MobileNo'];
  $JobTitle=$_POST['JobTitle'];

  $s = "SELECT * FROM organization WHERE organizationName = '$OrganizationName'";
  $result = mysqli_query($con, $s);
  $num = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);
  $orgID = $row['OrgID'];

  if($num == 1){
    $s_query = "SELECT * FROM organization2 where usr = '$usr'";
    $result_r = mysqli_query($con, $s_query);
    $num_r = mysqli_num_rows($result_r);
    if($num_r == 1){
      $message = "Representative name already exists";
      $href = "addOrg.html";
      $btn = "Try again";

      header("location.manage.html");
    }else{
      $sql = "INSERT INTO organization2 (usr,	Password,	OrganizationName,	MobileNo,	JobTitle, OrgID)
            VALUES ('$usr', '$Password', '$OrganizationName', '$MobileNo', '$JobTitle', $orgID)";
      mysqli_query($con, $sql);
      $message = "Representative added to system";
      $href = "organization2.php";
      $btn = "View Representatives List";
    }

  }else{
    $message = "Invalid Organization name. Cannot add Representative";
    $href = "./../index.html";
    $btn = "Back to Home Page";
  }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HELP AID ADMIN</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  
  <!-- Custom styles for this template -->
        <link href="css/agency.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
    </head>
   
    <body id="page-top">
      <nav class="navbar new navbar-expand-lg navbar-dark fixed-top p-0 m-0" id="mainNav">
            <div class="container h-100 p-0 px-1">
            <a class="navbar-brand js-scroll-trigger h-100 m-0" href="#"><img src="img/helpaid_logo.jpg" alt="logo" width="130" height="60"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
						<li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="./../index.html"><b>HOME</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
	  
        <section id="signup">
            <br>
          <div class="container vh-100">
            <div class="row justify-content-center align-items-center text-center">
              <div class="col">
                <h1><?php echo $message ?></h1>
              <form action="<?php echo $href ?>" method = "post"><br>
          <input type="submit" class="btn btn-success" value="<?php echo $btn?>">
        </form>

              </div>
            </div>
          </div>
        </section>
	   
     <footer>
       <hr>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; HELP AID 2022</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer> 
      
  </body>
</html>
