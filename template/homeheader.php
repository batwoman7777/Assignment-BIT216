<?php
session_start();
require_once 'inc/dbcall.php';
$db = new Db();
//if not set
if (!isset($_SESSION['name'])) {
    $db->redirect('login.php');
}
//signout
if (isset($_GET['logout'])) {
    unset($_SESSION["name"]);
    unset($_SESSION["usertype"]);
    $_SESSION["logoutmsg"] = "Succefully signed out";
    $db->redirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HELPFIT - Training System</title>

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

    </head>
    <body id="page-top">
        <!-- Navigation
      //-->
        <nav class="navbar new navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logo2 copy.png" alt="" width="175"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="home.php">Home</a>
                        </li>
                        <?php // $_SESSION['usertype'];// USER TYpe = 1 member , 2= trainer     ?>
                        <?php if ($_SESSION['usertype'] == 2): ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="recordSession.php">Record Session</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="viewHistoryTrainer.php">View Training History</a>
                            </li>
                        <?php endif; ?>
                        <!-- if member show this !-->
                        <?php if ($_SESSION['usertype'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#page-top">Register Session</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="viewHistoryMember.php">View Training History</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="home.php?logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>