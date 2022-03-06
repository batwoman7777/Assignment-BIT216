<?php
  session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HELP AID</title>
    <meta name = "viewport" content = "width = device-width initial-scale = 1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href = "/css/bootstrap.min.css">

    <link rel= "stylesheet" href="style.css">

    <script type = "text/javascript"></script>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src = "js/bootstrap.min.js"></script>
    <style>
    </style>
   </head>
    <body>
      <header id = "header" class = "clear">
        <div class = "container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class = "container-fluid">
              <div class = "navbar-header">
                <a class = "navbar-brand" href = "home.html"> HELP AID </a>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <div class = "container">
      <?php
      if(isset($_POST['Login']))
      {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "helpaid";
        $con = new mysqli($servername, $username, $password, $dbname);

        $username=$_POST['username'];
        $password=$_POST['pwd'];

        if($username!='' && $password!='')
        {
          $sql = "select * from admin WHERE username='$username' and password='$password'";
          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0)
          {
            $_SESSION['username']=$username;
            header('location:home.php');
          }
          else
          {
            echo'Username not found and invalid password';
          }
        }

        else
        {
          echo'Enter both username and password';
        }
      }
      ?>
        <form action="login.html" method = "post"><br>
          <input type="submit" name="Back" value="Back">
        </form>
      </div>

    <footer id = "footer" class = "clear">
      <h5> Copyright &copy; HELP AID </h5>
    </footer>

  </body>
</html>
