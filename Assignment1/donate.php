<?php

session_start();

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, 'helpaid');

if(isset($_GET['appealID'])){
    $appealID = $_GET['appealID'];
    $s = "select * from appeals where appealID = '$appealID'";
    $result = mysqli_query($con, $s);
    $row = mysqli_fetch_array($result);
    $orgName = $row['OrganizationName'];
    $desc = $row['description'];
    
    $st = "select * from organization where organizationName = '$orgName'";
    $rowB = mysqli_fetch_array(mysqli_query($con, $st));
    $address = $rowB['Address'];
}
else{
    header("location:donate.php");
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
     <link rel="stylesheet" href="donation.css" type="text/css">
    <title>View Appeals - Select organization</title>
</head>
<body class="body">
    <nav class="navbar navbar-expand-lg navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand m-0">
                <img class="img" src="helpaid_logo.jpg" alt="logo">
            </a>
            <ul class="navigation navbar-nav justify-content-end align-items-center p-3">
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
    <div class="form-box container-fluid p-2 my-1 mb-5">
        <form class="form mx-auto mt-3 p-2 mb-5" action="donationConfirmation.php" method="post">
        <h1 class="h1 mb-2 p-0 text-center">Donation</h1>
        <p class="my-1 fst-italic">Organization: <strong><?php echo $orgName?></strong></p>
        <p class="my-1 fst-italic">Address: <strong><?php echo $address?></strong></p>
        <p class="my-1 fst-italic mb-2">Appeal Description: <strong><?php echo $desc?></strong></p>
            <fieldset class="border rounded border-dark p-3 mb-2">
            <legend>For Cash: </legend>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="hidden" name="appealID" value="<?php echo $row['appealID']?>" >
                <input type="text" id="amount" name="amount" class="form-control" placeholder="Donation Amount(RM)">
            </div>
            <div class="form-group">
                <label for="paymentChannel">Payment Channel</label>
                <select id ="paymentChannel" class="form-control form-select" name="paymentChannel">
                    <option value="----Select Payment Channel-----">----Select Payment Channel-----</option>
                    <option value="Cash">Cash</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="reference" id="reference" name="reference" class="form-control" placeholder="Reference No">
            </div>
            </fieldset>
            <fieldset class="mt-1 border rounded border-dark p-3">
            <legend>For Goods: </legend>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" placeholder="Name/short description(Ex: Farm fresh milk, dates etc.)">
            </div>
            <div class="form-group">
                <label for="estimatedValue">Estimated Value</label>
                <input type="estimatedValue" id="estimatedValue" name="estimatedValue" class="form-control" placeholder="Amount of the donation(Ex: 5 cartons)">
            </div>
            </fieldset>
            <div class="form-group d-flex justify-content-center align-items-start m-0">
                <button type="submit" class="button btn btn-success px-3 py-2 mt-2 mx-2">Confirm Donation</button>
                <a href="viewAppeals.html" class="button btn btn-success px-3 py-2 mt-2 mx-2">Cancel</a>
            </div>
        </form>
    </div>
   <footer class="footer w-100 text-center text-lg-start mt-5">
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