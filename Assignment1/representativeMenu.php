<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location:replogin.php');
}

$orgName = $_SESSION['OrganizationName'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--main css-->
    <link rel="stylesheet" href="popup.css">
    <title>Representative Menu</title>
  </head>
  <body>
    <div class="container-fluid popup w-100 p-lg-0 pt-5">
      <div class="popup-menu w-100">
        <div class="popup-option w-100 text-center"><a class="popup-link w-100 d-inline-block p-5" href="confirmation.php">Login</a></div>
        <div class="popup-option w-100 text-center"><a class="popup-link w-100 d-inline-block p-5" href="addApplicant.php">Add Applicant</a></div>
        <div class="popup-option w-100 text-center"><a class="popup-link w-100 d-inline-block p-5" href="recordDisbursement.php">Record Disbursements</a></div>
        <div class="popup-option w-100 text-center"><a class="popup-link w-100 d-inline-block p-5" href="appealsContribution.php">Record Contribution</a></div>
        <div class="popup-option w-100 text-center"><a class="popup-link w-100 d-inline-block p-5" href="HELP-Aid-Contact-Portal-Siva_HELP_AID/organizeAid.php">Organize Aid Appeals</a></div>
        <form>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

    </script>
  </body>
</html>