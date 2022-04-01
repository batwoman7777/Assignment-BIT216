<?php 

session_start();
if(!isset($_SESSION['username'])){
    header('location:replogin.php');
}
$con = mysqli_connect('localhost', 'root', "");

mysqli_select_db($con, 'helpaid');

$user = $_SESSION['username'];
$s = "select * from organization2 where usr = '$user'";

$result = mysqli_query($con, $s);
$row = mysqli_fetch_array($result);
$orgName = $row['OrganizationName'];

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
    <title>View Appeals - Select organization</title>
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
    <div class="table-display container-fluid p-lg-5 p-md-5 p-2 my-5">
    <p class="ms-3 my-1 fst-italic">Organization Name: <strong><?php echo $orgName?></strong></p>
    <p class="ms-3 my-1 fst-italic">Representative: <strong><?php echo $user?></strong></p>
    <h1 class="h1 my-3 p-0 text-center">Current Appeals</h1>
        <small class="text-danger pb-1">(Disclaimer: Only click on NOT ACTIVE appeals for disbursement)</small>

    <?php
    $statement = "select * from appeals where OrganizationName = '$orgName'";
    $resultAppeal = mysqli_query($con, $statement);
    ?>
        <table class="table table-bordered table-light table-striped border">
        <thead>
            <tr>
                <th>AppealID</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Description</th>
                <th>Outcome {Contribution Details}</th>
                <th>Applicant List</th>
            </tr>
        </thead>
            <tbody >
                <?php
                $f=0;
                while($rowApp = mysqli_fetch_array($resultAppeal)) {
                if($f%2==0)
                $class_name="even";
                else
                $class_name="odd";
                ?>
            <tr class="<?php if(isset($class_name)) echo $class_name;?>">
            <td><?php echo $rowApp["appealID"];?></td>
            <td><?php echo $rowApp["fromDate"]; ?></td>
            <td><?php echo $rowApp["toDate"]; ?></td>
            <td><?php echo $rowApp["description"]; ?></td>
            <td><?php echo$rowApp["outcome"]; ?></td>
            <?php 
            if($rowApp['outcome'] == "ACTIVE"){
                $link = "Not Available";
            }
            else{
                $link = "View Applicants";
            }
                ?>
            <td><a href="applicantList.php?<?php echo 'appealID='.$rowApp['appealID'] ?>" target="__blank"><?php echo $link?></a></td>
            </tr>
            <?php
            $f++;
            }
            ?> 
            </tbody>
        </table>
        </div>
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
   <!--Bootstrap JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>