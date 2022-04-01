<?php
session_start();

$con = mysqli_connect('localhost', 'root', "");

mysqli_select_db($con, 'helpaid');

$s = "select * from organization";

$result = mysqli_query($con, $s);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" />
    <!--google font-->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;500&display=swap" rel="stylesheet" crossorigin="anonymous">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!--main css-->
     <link rel="stylesheet" href="main_gen.css" type="text/css">
    <title>Help-Aid</title>
</head>
<body class="body">
    <nav class="navbar navbar-expand-lg navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand m-0">
                <img class="img" src="helpaid_logo.jpg" alt="logo">
            </a>
            <ul class="navigation navbar-nav justify-content-end align-items-center p-0 p-lg-3">
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
    <div class="form-box container-fluid p-2 mb-5">
        <h1 class="h1 p-lg-3 p-md-3 p-0 text-center">self-register form</h1>
        <p class="my-2 text-center fst-italic">(Please select an organization to get registered)</p>
        <form class="form mx-auto mb-5" action="registerValidation.php" method="post">
            <div class="form-group">
                <label for="orgName">Organization Name:</label>
                <select id ="orgName" aria-label="org" class="form-control form-select" name = "orgName" required>
                    <option value="Organization Name Will Appear Here">---Select Org Name---</option>
                        <?php
                            $i=0;
                            while($row = mysqli_fetch_array($result)) {
                            if($i%2==0)
                            $classname="even";
                            else
                            $classname="odd";
                        ?>
                        <?php if(isset($classname)) echo $classname;?>
                        <option value="<?php echo $row["organizationName"]; ?>"><?php echo $row["organizationName"]; ?></option>
                        <?php
                            $i++;
                            }
                            ?> 
                    </select>
            </div>
            <div class="form-group">
                <label for="ID">IC/Passport No.</label>
            <input type="text" id="ID" name="ID" class="form-control" placeholder="passport/IC no" required>
            </div>
            <div class="form-group">
                <label for="fullname" name="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="name in IC/Passport" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="abc@xyz.com" required>
            </div>
            <div class="form-group">
                <label for="mobileNo">Mobile No.</label>
            <input type="tel" id="mobileNo" name="mobileNo" class="form-control" placeholder="handphone number" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="current address" required>
            </div>
            <div class="form-group">
                <label for="income">Household Income</label>
            <input type="number" id="income" name="income" class="form-control" placeholder="yearly household income" required>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="button btn btn-success">Register</button>
            </div>
        </form>
    </div><!--footer-->
   <footer class="footer w-100 text-center text-lg-start mt-6">
       <div class="row container-fluid justify-content-center align-items-center p-4">
           <div class="col-lg-3 col-md-6 mb-4"><img src="helpaid.png" alt="logo"><h3 class="h3 logo">HELP-Aid</h3>
            </div>
           <div class="col-lg-3 col-md-6 mb-4"><h3 class="h3 p-2">Contact</h3>
            <ul class="ul list-unstyled">
                <li class="li"><a class="a" href="mailto: helpaid@gmail.com"><i class="fa-solid fa-envelope me-2"></i>Mail us</a></li>
                <li class="li"><a class="a" href="tel: +88013243325"><i class="fa-solid fa-phone me-2"></i>Call us</a></li>
            </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4"><h3 class="h3 p-2">About</h3>
                <ul class="ul list-unstyled">
                    <li class="li"><a class="a" href="#">Who we are?</a></li>
                    <li class="li"><a class="a" href="#">Our history</a></li>
                </ul>
            </div>
           <div class="col-lg-3 col-md-6 mb-4">
            <ul class="list-unstyled list-inline text-lg-start text-center">
                <li class="list-inline-item">
                  <a class="btn-floating btn-fb mx-1">
                    <i class="fa-brands fa-facebook"> </i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-floating btn-insta mx-1">
                    <i class="fa-brands fa-instagram"> </i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-floating btn-tw mx-1">
                    <i class="fa-brands fa-twitter"> </i>
                  </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-in mx-1">
                        <i class="fa-brands fa-linkedin-in"> </i>
                    </a>
                  </li>
               </ul>
           </div>
       </div>
   </footer>
   <div class="copyright p-4 font-small text-center w-100 m-0">&copy; Rights Reserved 2022</div>

   <!--script JS-->
   <script src="hamburger.js"></script>
   <script>
   </script>
   <!--Bootstrap JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>