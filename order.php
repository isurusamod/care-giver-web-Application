<?php
// Include the database connection file
include('partials-front/menu.php');

// Check whether food id is set or not
if (isset($_GET['food_id'])) {
    // Get the Food id and details of the selected food
    $food_id = $_GET['food_id'];

    // Get the details of the selected food
    $sql = "SELECT * FROM tbl_caregiver WHERE id=$food_id";
    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if ($res == false) {
        // Query failed, display error
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Count the rows
    $count = mysqli_num_rows($res);

    // Check whether the data is available or not
    if ($count == 1) {
        // We have data
        // Get the data from Database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        // Food not available
        // Redirect to Home Page
        header('location:' . SITEURL);
        exit();
    }
} else {
    // Redirect to homepage
    header('location:' . SITEURL);
    exit();
}

// Check whether submit button is clicked or not
if (isset($_POST['submit'])) {
    // Get all the details from the form
    $food = $_POST['food'];
    $price = $_POST['price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Calculate the number of days between start and end date
    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $interval = $start->diff($end);
    $qty = $interval->days;

    $total = $price * $qty; // total = price x qty 
    $order_date = date("Y-m-d h:i:sa"); //Order Date
    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];

    // Save the Order in Database
    // Create SQL to save the data
    $sql2 = "INSERT INTO tbl_order SET 
        food = '$food',
        price = $price,
        qty = $qty,
        total = $total,
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'
    ";

    // Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    // Check whether query executed successfully or not
    if ($res2 == true) {
        // Query Executed and Order Saved
        $_SESSION['order'] = "<div class='success text-center'>Caregiver Booking Successful.</div>";
        header('location:' . SITEURL);
        exit();
    } else {
        // Failed to Save Order
        $_SESSION['order'] = "<div class='error text-center'>Failed to Book Caregiver.</div>";
        header('location:' . SITEURL);
        exit();
    }
}
?>

<!-- Food Search Section Starts Here -->
<section class="food-search2">
    <div class="container">
        <h1 class="text-center">Booking and Payment</h1>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Your Selected Caregiver</legend>

                <div class="food-menu-img">
                    <?php
                    // Check whether the image is available or not
                    if ($image_name == "") {
                        // Image not available
                        echo "<div class='error'>Image not Available.</div>";
                    } else {
                        // Image is available
                        ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve" style="width: 150px;">
                        <?php
                    }
                    ?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">Lkr Per One Day <?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Enter Hire Date</div>
                    <input type="date" name="start_date" class="input-responsive" required>
                    
                    <div class="order-label">To</div>
                    <input type="date" name="end_date" class="input-responsive" required>
                </div>
            </fieldset>
            
            <fieldset>
                <legend>Fill the below form</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="Enter your full name" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="Enter your phone number" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="Enter your email" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="4" placeholder="Enter your address" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Booking" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>
<!-- Food Search Section Ends Here -->


<!-- Internal CSS for Styling -->
<style>
    .food-search2 {
        background-image: linear-gradient(to right, rgba(30, 144, 255, 0.8), rgba(173, 216, 230, 0.7)), url("assets/about.jpg");
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 50px 0;
        color: white;
        font-family: 'Arial', sans-serif;
    }
    .food-search2 .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 10px;
    }
    .food-search2 h1 {
        margin-bottom: 20px;
        text-align: center;
        font-size: 36px;
    }
    .food-search2 fieldset {
        border: none;
        margin-bottom: 20px;
    }
    .food-search2 legend {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #FFD700;
    }
    .food-search2 .order-label {
        margin: 10px 0 5px;
        font-weight: bold;
    }
    .food-search2 .input-responsive {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .food-search2 .btn-primary {
        background-color: #FFD700;
        color: #000;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .food-search2 .btn-primary:hover {
        background-color: #FFC300;
    }
</style>
<footer>
    <div class="container">
        <div class="payment-container">
            <h2>Payment Form</h2>
            
            <form id="payment-form">
    <!-- Existing form fields -->
   <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" placeholder="1234 5678 9012 3456" required>
                </div>
                <div class="form-group">
                    <label for="expiry-date">Expiry Date</label>
                    <input type="text" id="expiry-date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" placeholder="123" required>
                </div>
                <div class="form-group">
                    <label for="cardholder-name">Cardholder Name</label>
                    <input type="text" id="cardholder-name" placeholder="Enter your name" required>
                </div>
				 <button type="submit" class="btn">Pay Now</button>
			
    <!-- Other fields... -->
    
    <!-- Payment slip photo upload -->
    <div class="form-group">
        <label for="payment-slip">Upload Payment Slip</label>
        <input type="file" id="payment-slip" accept="image/*" required>
        <small class="text-muted">Accepted formats: JPG, JPEG, PNG. Max file size: 5MB.</small>
    </div>

    <button type="submit" class="btn">Submit Slip</button>
</form>

        </div>
    </div>
</footer>

<style>
    footer {
        background: #333;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }
    footer a {
        color: #FFD700;
        text-decoration: none;
    }
    footer a:hover {
        text-decoration: underline;
    }
    .payment-container {
        margin-top: 30px;
        max-width: 400px;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .payment-container h2 {
        font-size: 24px;
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    .form-group input:focus {
        border-color: #007BFF;
    }
    .btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn:hover {
        background-color: #0056b3;
    }
</style>
<?php include('partials-front/footer.php'); ?>
