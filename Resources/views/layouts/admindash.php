<?php

use Ti\Cardfraudsm\SessionManager;


 $session = new SessionManager();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> <?php section('Administrator'); ?></title>
    <meta name="csrf-token" content="<?php CSRFToken(); ?>">
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar mb-lg-1">
    <div class="container">
        <a class="navbar-brand bg-dark p-3 " href="/">TOM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ml-auto">
                    <a id="configurationsInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    Configurations</a>
                    <div aria-labelledby="userInfo" class="dropdown-menu">
                    <a href="<?php route('/roles');?>" class="dropdown-item"><i class="fa fa-cog"></i> System Roles</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/users');?>" class="dropdown-item"><i class="fa fa-users"></i> System Users</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/systemlogs');?>" class="dropdown-item"><i class="fa fa-file"></i> System Reports</a>

                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/audits');?>" class="dropdown-item"><i class="fa fa-database"></i> Audit Trail</a>
                </div>
                </li>

                <li class="nav-item dropdown ml-auto">
                    <a id="configurationsInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    Accounts</a>
                    <div aria-labelledby="userInfo" class="dropdown-menu">
                    <a href="<?php route('/admin/customers');?>" class="dropdown-item"><i class="fa fa-users"></i> Customers</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/admin/bank/accounts');?>" class="dropdown-item"><i class="fa fa-university"></i> Bank Accounts</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/admin/bank/credits');?>" class="dropdown-item"><i class="fa fa-credit-card"></i> Cards Details</a>

                    </div>
                </li>
                <li class="nav-item dropdown ml-auto">
                    <a id="configurationsInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    Inventory</a>
                    <div aria-labelledby="userInfo" class="dropdown-menu">
                    <a href="<?php route('/admin/categories');?>" class="dropdown-item"><i class="fa fa-users"></i> Categories</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/admin/products');?>" class="dropdown-item"><i class="fa fa-university"></i> Products</a>
                  
                    </div>
                </li>
                <li class="nav-item"><a href="<?php route('/admin/transactions');?>" class="nav-link">Transactions</a></li>
                <li class="nav-item dropdown ml-auto">
                    <a id="configurationsInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    Fraud Detection</a>
                    <div aria-labelledby="userInfo" class="dropdown-menu">
                    <a href="<?php route('/admin/analysis');?>" class="dropdown-item"><i class="fa fa-file"></i> Export Transactions CSV</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="fa fa-university"></i> Analysis Fraud</a>
                  
                    </div>
                </li>
               
                <li class="nav-item dropdown ml-auto">
                <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    <img src="<?php echo url('assets/img/avatar.png'); ?>" alt="Profile Picture" style="max-width: 1.5rem;" class="img-fluid rounded-circle shadow">
                </a>
                <div aria-labelledby="userInfo" class="dropdown-menu">
                    <a href="#" class="dropdown-item">
                        <strong class="d-block text-uppercase headings-font-family" id="flname" >
                            <span><i class="fa fa-user"></i> <?php echo $_SESSION['name'] . " " . $_SESSION['surname']; ?></span>
                        </strong>
                    </a>
                   
                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/profile');?>" class="dropdown-item"><i class="fa fa-cog"></i> My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php route('/changepassword/userid/'.$_SESSION['admin_id'] );?>" class="dropdown-item"><i class="fa fa-lock"></i> Change Password</a>
                    <div class="dropdown-divider"></div><a href="<?php route('/admin/logout');?>" class="dropdown-item" ><i class="fa fa-sign-out-alt"></i> Logout</a>

                </div>
            </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-2">
  
</div>