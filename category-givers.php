<?php include('partials-front/menu.php'); ?>

<?php 
    // Check whether id is passed or not
    if(isset($_GET['category_id'])) {
        // Category id is set and get the id
        $category_id = $_GET['category_id'];
        
        // Get the Category Title Based on Category ID
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        
        // Execute the Query
        $res = mysqli_query($conn, $sql);
        
        // Check if the query executed successfully
        if($res == true) {
            // Get the value from Database
            $row = mysqli_fetch_assoc($res);
            // Get the Title
            $category_title = $row['title'];
        } else {
            // Redirect to Home page if query fails
            header('location:'.SITEURL);
        }
    } else {
        // Category not passed
        // Redirect to Home page
        header('location:'.SITEURL);
    }
?>


<section class="food-search text-center">
    <div class="container">
        <h2>Caregivers with many years of service experience in <?php echo $category_title; ?></h2>
    </div>
</section>

<section class="food-menu">
    <div class="container">

        <?php 
            // Create SQL Query to Get based on Selected Category
            $sql2 = "SELECT * FROM tbl_caregiver WHERE category_id=$category_id";
            
            // Execute the Query
            $res2 = mysqli_query($conn, $sql2);
            
            // Count the Rows
            $count2 = mysqli_num_rows($res2);
            
            
            if($count2 > 0) {
           
                while($row2 = mysqli_fetch_assoc($res2)) {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                if($image_name == "") {
                                    // Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                } else {
                                    // Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">LKR <?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>

                    <?php
                }
            } else {
                
                echo "<div class='error'>No any Caregiver available.</div>";
            }
        ?>

        <div class="clearfix"></div>
    </div>
</section>


<?php include('partials-front/footer.php'); ?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .text-center {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    .food-search {
        background-color: #28B463;
        padding: 40px 0;
    }

    .food-search h2 {
        color: #fff;
        font-size: 2em;
        margin: 0;
    }

    .food-menu {
        background-color: #e0f7fa;
        padding: 50px 0;
    }

    .food-menu-box {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        display: flex;
        align-items: center;
    }

    .food-menu-box:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .food-menu-img {
        flex: 1;
        overflow: hidden;
    }

    .food-menu-img img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease-in-out;
    }

    .food-menu-box:hover .food-menu-img img {
        transform: scale(1.1);
    }

    .food-menu-desc {
        flex: 2;
        padding: 20px;
    }

    .food-menu-desc h4 {
        font-size: 1.5em;
        margin: 0 0 10px;
        color: #333;
    }

    .food-price {
        font-size: 1.2em;
        color: #28B463;
        margin-bottom: 10px;
    }

    .food-detail {
        font-size: 1em;
        color: #666;
        margin-bottom: 10px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1em;
        border: none;
        border-radius: 5px;
        transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .btn-primary {
        background: #28B463;
        color: #fff;
        text-decoration: none;
    }

    .btn-primary:hover {
        background: #239B56;
        transform: scale(1.05);
    }

    .error {
        color: red;
        font-weight: bold;
        text-align: center;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
z