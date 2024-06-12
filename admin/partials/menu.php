<?php 

    include('../config/constants.php'); 
   include('login-check.php');

?>


<html>
    <head>
        <title>Care giver-web</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="manage-category.php">Caregiver Category</a></li>
                    <li><a href="manage-caregiver.php">Caregivers</a></li>
                    <li><a href="manage-order.php">Bokking Section</a></li>
                    <li><a href="manage-admin.php">Active Admin</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->