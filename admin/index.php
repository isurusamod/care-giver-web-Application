<?php include('partials/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        .main-content {
            padding: 20px;
            background: #f7f7f7;
            min-height: 100vh;
        }

        .wrapper {
            max-width: 1200px;
            margin: auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h1 {
            font-size: 3rem;
            color: #333;
        }

        .card p {
            font-size: 1.2rem;
            color: #666;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1 class="text-center">Administrator Dashboard</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php 
                                $sql = "SELECT * FROM tbl_category";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                            ?>
                            <h1><?php echo $count; ?></h1>
                            <p>Caregiver Categories</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php 
                                $sql2 = "SELECT * FROM tbl_caregiver";
                                $res2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($res2);
                            ?>
                            <h1><?php echo $count2; ?></h1>
                            <p>Total Caregivers</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php 
                                $sql3 = "SELECT * FROM tbl_order";
                                $res3 = mysqli_query($conn, $sql3);
                                $count3 = mysqli_num_rows($res3);
                            ?>
                            <h1><?php echo $count3; ?></h1>
                            <p>Booking Total Caregiver</p>
                        </div>
                    </div>
                </div>

              
                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php 
                                $sql6 = "SELECT * FROM tbl_order WHERE status = 'Ordered'";
                                $res6 = mysqli_query($conn, $sql6);
                                $count6 = mysqli_num_rows($res6);
                            ?>
                            <h1><?php echo $count6; ?></h1>
                            <p>Pending Caregiver Orders</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php 
                                $sql7 = "SELECT * FROM tbl_order WHERE status = 'On Delivery'";
                                $res7 = mysqli_query($conn, $sql7);
                                $count7 = mysqli_num_rows($res7);
                            ?>
                            <h1><?php echo $count7; ?></h1>
                            <p>Sending Caregiver</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php 
                                $sql7 = "SELECT * FROM tbl_order WHERE status = 'Cancelled'";
                                $res7 = mysqli_query($conn, $sql7);
                                $count7 = mysqli_num_rows($res7);
                            ?>
                            <h1><?php echo $count7; ?></h1>
                            <p>Cancelled Caregiver Orders</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php 
                                $sql8 = "SELECT * FROM tbl_admin";
                                $res8 = mysqli_query($conn, $sql8);
                                $count8 = mysqli_num_rows($res8);
                            ?>
                            <h1><?php echo $count8; ?></h1>
                            <p>System Administrator</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
