<?php

use Ti\Cardfraudsm\SessionManager;


$session = new SessionManager();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> <?php section('Customer'); ?></title>
    <meta name="csrf-token" content="<?php CSRFToken(); ?>">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?php echo url('assets/img/logo.png'); ?>" />
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo url('assets/css/datatables.min.css'); ?>" type="text/css">
   
    <link rel="stylesheet" href="<?php echo url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/magnific-popup.css'); ?>">



    <!-- dash -->
    <link href="<?php echo url('assets/css/ven/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/ven/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/ven/quill/quill.snow.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/ven/quill/quill.bubble.css'); ?>" rel="stylesheet">
    <link href="<?php echo url('assets/css/ven/remixicon/remixicon.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo url('assets/css/ven/style.css'); ?>" rel="stylesheet">
    <!-- l -->

    <link rel="stylesheet" href="<?php echo url('assets/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/sweetalert2.css'); ?>">
</head>

<body onload="loadchart()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar mb-lg-1">
        <div class="container">
            <a class="navbar-brand bg-dark p-3 " href="<?php route('/home'); ?>">TOM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown ml-auto">
                        <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                            My Transactions</a>
                        <div aria-labelledby="userInfo" class="dropdown-menu">

                            <a href="<?php route('/view/order'); ?>" class="dropdown-item"><i class="fa fa-cog"></i> My Orders</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php route('/payments'); ?>" class="dropdown-item"><i class="fa fa-cog"></i> Payments</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php route('/transactions'); ?>" class="dropdown-item"><i class="fa fa-cog"></i> My Transactions</a>
                        </div>
                    </li>

                    <li class="nav-item"><a href="<?php route('/products'); ?>" class="nav-link">Products</a></li>

                    <li class="nav-item"><a href="<?php route('/viewcart'); ?>" class="nav-link">Cart <span class="badge rounded-pill bg-danger position-absolute top-0 start-100 translate-middle text-white mr-3"><?php echo $countcart ?></span></a></li>
                    <i class="mr-3"></i>
                    <li class="nav-item dropdown ml-auto">
                        <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                            <img src="<?php echo url('assets/img/avatar.png'); ?>" alt="Profile Picture" style="max-width: 1.5rem;" class="img-fluid rounded-circle shadow">
                        </a>
                        <div aria-labelledby="userInfo" class="dropdown-menu">
                            <a href="#" class="dropdown-item">
                                <strong class="d-block text-uppercase headings-font-family" id="flname">
                                    <span><i class="fa fa-user"></i> <?php echo $_SESSION['name'] . " " . $_SESSION['surname']; ?></span>
                                </strong>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a href="<?php route('/my-account'); ?>" class="dropdown-item"><i class="fa fa-cog"></i> My Profile</a>

                            <div class="dropdown-divider"></div><a href="<?php route('/logout'); ?>" class="dropdown-item"><i class="fa fa-sign-out-alt"></i> Logout</a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-2">

    </div>