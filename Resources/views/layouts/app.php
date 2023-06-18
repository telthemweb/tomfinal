<?php

use Ti\Cardfraudsm\SessionManager;


$session = new SessionManager();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tom Online Shopping</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?php echo url('assets/img/logo.png'); ?>"/>
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap.min.css'); ?>"  type="text/css">
    <link rel="stylesheet" href="<?php echo url('assets/css/datatables.min.css'); ?>"  type="text/css">
    <link rel="stylesheet" href="<?php echo url('assets/css/chosen.css'); ?>"  type="text/css">
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap-datepicker.min.css'); ?>"  type="text/css">

    <link rel="stylesheet" href="<?php echo url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/magnific-popup.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap-datepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/jquery.timepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/fonts/flaticon/flaticon.css'); ?>">
   
    <link rel="stylesheet" href="<?php echo url('assets/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/sweetalert2.css'); ?>">
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar mb-lg-1"> -->
   
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    TOM
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                   
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    
                         <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        
                        
                       
                    </ul>
                </div>
            </div>
        </nav>