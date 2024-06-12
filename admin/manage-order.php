<?php 
// Include the partial menu
include('partials/menu.php'); 

// Your existing HTML and CSS code remains the same

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Booking Caregiver</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        /* Your existing CSS styles */
    </style>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1 class="text-center">Manage Booking Caregiver</h1>

            <br><br>

            <?php 
                if(isset($_SESSION['update'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['update']}</div>";
                    unset($_SESSION['update']);
                }
            ?>
            <br><br>

            <table class="tbl-full table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Order Date</th>
                        <th width="10%">Name</th>
                        <th width="5%">Price</th>
                        <th width="10%">Days</th>
                        <th width="6%">Total</th>
                        <th width="8%">Status</th>
                        <th width="10%">Customer</th>
                        <th width="10%">Contact</th>
                        <th width="15%">Email</th>
                        <th width="10%">Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        $sn = 1;

                        if($count > 0) {
                            while($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $food = isset($row['food']) ? $row['food'] : 'N/A';
                                $price = isset($row['price']) ? $row['price'] : 'N/A';
                                $qty = isset($row['qty']) ? $row['qty'] : 'N/A';
                                $total = isset($row['total']) ? $row['total'] : 'N/A';
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $order_date; ?></td>
                                    <td><?php echo $food; ?></td>
                                    <td><?php echo '$' . $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo '$' . $total; ?></td>
                                    <td>
                                        <?php 
                                            if($status == "Ordered") {
                                                echo "<span class='status-label status-ordered'>$status</span>";
                                            } elseif($status == "On Delivery") {
                                                echo "<span class='status-label status-on-delivery'>$status</span>";
                                            } elseif($status == "Delivered") {
                                                echo "<span class='status-label status-delivered'>$status</span>";
                                            } elseif($status == "Cancelled") {
                                                echo "<span class='status-label status-cancelled'>$status</span>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_contact; ?></td>
                                    <td><?php echo $customer_email; ?></td>
                                    <td><?php echo $customer_address; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn btn-secondary btn-sm">Update Booking</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='12' class='error text-center'>Orders not Available</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
