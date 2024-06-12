<?php include('partials/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Caregiver</title>
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

        .btn-primary, .btn-secondary, .btn-danger {
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #6c63ff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5750f0;
        }

        .btn-secondary {
            background-color: #f39c12;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .tbl-full {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tbl-full th, .tbl-full td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .tbl-full th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1 class="text-center">Add Caregivers</h1>

            <br><br>

            <a href="<?php echo SITEURL; ?>admin/add-Caregiver.php" class="btn btn-primary mb-4">Add Caregiver</a>

            <br><br><br>

            <?php 
                if(isset($_SESSION['add'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['add']}</div>";
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['delete']}</div>";
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['upload']}</div>";
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unauthorize'])) {
                    echo "<div class='alert alert-danger'>{$_SESSION['unauthorize']}</div>";
                    unset($_SESSION['unauthorize']);
                }

                if(isset($_SESSION['update'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['update']}</div>";
                    unset($_SESSION['update']);
                }
            ?>

            <table class="tbl-full table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM tbl_caregiver";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn = 1;

                        if($count > 0) {
                            while($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $age = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $title; ?></td>
                                    <td>Lkr <?php echo $age; ?></td>
                                    <td>
                                        <?php  
                                            if($image_name == "") {
                                                echo "<div class='error'>Image not Added.</div>";
                                            } else {
                                                echo "<img src='".SITEURL."images/food/$image_name' width='100px'>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-caregiver.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-caregiver.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo "<tr> <td colspan='7' class='error text-center'>Caregiver not Added Yet.</td> </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
