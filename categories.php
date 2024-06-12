<?php include('partials-front/menu.php'); ?>

<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Choose male or female caregiver</h2>

        <?php 
            // Display all the categories that are active
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Count Rows
            $count = mysqli_num_rows($res);

            // Check whether categories are available or not
            if($count > 0) {
                // Categories Available
                while($row = mysqli_fetch_assoc($res)) {
                    // Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>category-givers.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                if($image_name == "") {
                                    // Image not Available
                                    echo "<div class='error'>Image not found.</div>";
                                } else {
                                    // Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            <h3 class="float-text text-white category-title"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            } else {
                // Categories Not Available
                echo "<div class='error'>Category not found.</div>";
            }
        ?>
        
        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

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

    .categories {
        background-color: #e0f7fa;
        padding: 50px 0;
    }

    .categories .box-3 {
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        margin-bottom: 20px;
        text-align: center;
        position: relative;
        padding: 10px;
    }

    .categories .box-3 img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease-in-out;
    }

    .categories .box-3:hover img {
        transform: scale(1.1);
    }

    .categories .box-3:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .float-container {
        position: relative;
    }

    .float-text {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        padding: 20px 0;
        background: rgba(0, 0, 0, 0.7);
        transition: background 0.3s ease-in-out;
    }

    .categories .box-3:hover .float-text {
        background: rgba(0, 0, 0, 0.9);
    }

    .text-white {
        color: #fff;
        font-size: 1.2em;
    }

    .category-title {
        font-weight: bold;
        background-color: rgba(40, 180, 99, 0.8);
        padding: 10px 15px;
        border-radius: 5px;
        display: inline-block;
        margin: 10px 0;
        transition: background 0.3s ease-in-out;
    }

    .categories .box-3:hover .category-title {
        background-color: rgba(40, 180, 99, 1);
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
