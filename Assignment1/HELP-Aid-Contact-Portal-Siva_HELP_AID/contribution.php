<?php 

session_start();

if(!isset($_SESSION['username'])){
    header('location:replogin.php');
}

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, 'helpaid');

if(isset($_GET['appealID'])){
    $appealID =  $_GET['appealID'];
    $s = "select * from appeals where appealID = '$appealID'";
    $result = mysqli_query($con, $s);
    $row = mysqli_fetch_array($result);
    $fromDate = $row['fromDate'];
    $toDate = $row['toDate'];
    $organizationName = $row['OrganizationName'];
    $receivedDate = date("jS F Y, l");
}
else{
    header("location:appealsContribution.php");
}
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
     <link rel="stylesheet" href="./../donation.css" type="text/css">
    <title>Help-Aid</title>
</head>
<body class="body">
    <nav class="navbar navbar-expand-lg navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand m-0">
                <img class="img" src="./../helpaid_logo.jpg" alt="logo">
            </a>
            <ul class="navigation navbar-nav justify-content-end align-items-center p-0 p-lg-3">
                <h3 class="text-left text-light me-4 p-2 border rounded"><i class="fa-solid fa-heart"></i>Hello, <?php echo $_SESSION['username'] ?></h3>
                <li class="item nav-item"><a class="link a nav-link" href="./../index.html">Home</a></li>
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
    <div class="form-box container-fluid p-2 my-1 mb-5">
        <h1 class="h1 p-lg-3 p-md-3 mb-3 p-0 text-center">Donor contribution</h1>
        <p class="my-1 fst-italic text-center">Appeal ID: <strong><?php echo $appealID?></strong></p>
        <p class="my-1 fst-italic text-center">From Date: <strong><?php echo $fromDate?></strong></p>
        <p class="my-1 fst-italic text-center">To Date: <strong><?php echo $toDate?></strong></p>
        <p class="my-1 fst-italic text-center">Current Day: <strong><?php echo $receivedDate?></strong></p>
        <p class="my-1 fst-italic text-center">Organization: <strong><?php echo $organizationName?></strong></p>
        <form class="form mx-auto" action="contributionProcess.php" method="post">
          <fieldset class="border rounded border-dark p-3 mb-2">
            <legend>For Cash: </legend>
            <input type="hidden" name="receivedDate" value="<?php echo $receivedDate?>" >
            <input type="hidden" name="appealID" value="<?php echo $appealID?>" >
            <input type="hidden" name="organizationName" value="<?php echo $organizationName?>" >
               <div class="form-group">
                 <label for="CashAmount">CASH AMOUNT:</label>
                 <input type="text" class="form-control" id="CashAmount" placeholder="Enter Cash Amount" name= "CashAmount" >
               </div>
               
               <div class="form-group">
                 <label for="paymentChannel">PAYMENT VIA :</label>
                <select id ="paymentChannel" class="form-control form-select" name="paymentChannel">
                    <option value="----Select Payment Channel-----">----Select Payment Channel-----</option>
                    <option value="Cash">Cash</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                </select>
              </div>
              
               <div class="form-group">
                 <label for="ReferenceNo">REFERENCE NO :</label>
                 <input type="text" class="form-control" id="ReferenceNo" placeholder="Enter Reference No" name= "ReferenceNo" >
               </div>
          </fieldset>
          <fieldset class="border rounded border-dark p-3 mb-2">
            <legend>For Goods: </legend>
      
									<div class="form-group">
										<label for="Description">DESCRIPTION:</label>
										<input type="text" class="form-control" id="Description" placeholder="Fill Up as per contribution" name= "Description" >
									</div>
									
									<div class="form-group">
										<label for="EstimatedValue">ESTIMATED VALUE:</label>
										<input type="text" class="form-control" id="EstimatedValue" placeholder="Fill Up as per contribution" name= "EstimatedValue" >
									</div>
            </fieldset>
               <div class="form-group">
                 <input type="submit" class = "btn btn-success" name="Record" value="Record">
               </div>
        </form>
    </div><!--footer-->
   <footer class="footer w-100 text-center text-lg-start mt-6">
       <div class="row container-fluid justify-content-center align-items-center p-4">
           <div class="col-lg-3 col-md-6 mb-4"><img src="./../helpaid.png" alt="logo"><h3 class="h3 logo">HELP-Aid</h3>
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


        
                       