<html>
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
<body>
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

  $sql = "INSERT INTO organization2 (usr,	Password,	OrganizationName,	MobileNo,	JobTitle)
          VALUES ('$usr', '$Password', '$OrganizationName', '$MobileNo', '$JobTitle')";
		  
  mysqli_query($con, $sql);
  mysqli_close($con);
  
  ?>
  <header id = "header" class = "clear">
    <div class = "container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class = "container-fluid">
          <div class = "navbar-header">
            <a class = "navbar-brand" href = "home2.php"> HELP AID </a>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class = "container">
    <form action="manage.html" method = "post"><br>
      <input type="submit" name="submit" value="Thank You">
    </form>
  </div>
  <section class="copyright py-4 text-center text-white">
      <div class="container">
          <small>"copyright">Copyright &copy; HELP AID 2022</small>
      </div>
  </section>
</body>
</html>
