<?php include('partials/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Caregiver Category</title>
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

        .btn-primary {
            background-color: #6c63ff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #5750f0;
        }

        .btn-secondary {
            background-color: #f39c12;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
        }

        .btn-secondary:hover, .btn-danger:hover {
            opacity: 0.8;
        }

        .tbl-full {
            width: 100%;
            border-collapse: collapse;
        }

        .tbl-full th, .tbl-full td {
            padding: 10px;
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
            <h1 class="text-center">Add Caregiver Category</h1>

            <br><br>
            <?php 
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['remove'])) {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if(isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['no-category-found'])) {
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                }

                if(isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['failed-remove'])) {
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }
            ?>
            <br><br>

            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary mb-4">Add Category</a>

            <table class="tbl-full table table-bordered">
                <tr>
                    <th>Nu</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $sql = "SELECT * FROM tbl_category";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    $sn = 1;

                    if($count > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                ?>

                <tr>
                    <td><?php echo $sn++; ?>.</td>
                    <td><?php echo $title; ?></td>
                    <td>
                        <?php  
                            if($image_name != "") {
                                echo "<img src='".SITEURL."images/category/$image_name' width='100px'>";
                            } else {
                                echo "<div class='error'>Image not Added.</div>";
                            }
                        ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Category</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Category</a>
                    </td>
                </tr>

                <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'><div class='error text-center'>No Category Added.</div></td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
