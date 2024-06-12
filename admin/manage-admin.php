<?php include('partials/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        .main-content {
            padding: 20px;
            background-color: #f7f7f7;
            min-height: 100vh;
        }

        .wrapper {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            margin-right: 10px;
        }

        .btn-danger:hover {
            background-color: #dc3545 !important;
        }

        .btn-secondary:hover {
            background-color: #6c757d !important;
        }

        .tbl-full {
            width: 100%;
            border-collapse: collapse;
        }

        .tbl-full th,
        .tbl-full td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .tbl-full th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br />

            <?php 
                // Display session messages
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                // Other session messages...
            ?>
            <br><br><br>

            <!-- Button to Add Admin -->
            <a href="add-admin.php" class="btn btn-primary">Add Admin</a>

            <br /><br /><br />

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    // Query to Get all Admin
                    $sql = "SELECT * FROM tbl_admin";
                    // Execute the Query
                    $res = mysqli_query($conn, $sql);

                    // Check whether the Query is Executed or Not
                    if($res == true) {
                        // Count Rows to Check whether we have data in the database or not
                        $count = mysqli_num_rows($res); // Function to get all the rows in the database

                        $sn = 1; // Create a Variable and Assign the value

                        // Check the num of rows
                        if($count > 0) {
                            // We Have data in the database
                            while($rows = mysqli_fetch_assoc($res)) {
                                // Using While loop to get all the data from the database.
                                // And while loop will run as long as we have data in the database

                                // Get individual Data
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                // Display the Values in our Table
                                ?>
                                
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn btn-primary">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete Admin</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php include('partials/footer.php'); ?>
