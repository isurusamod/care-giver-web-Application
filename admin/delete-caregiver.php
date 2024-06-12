<?php
// Include constants file for SITEURL and database connection
include('../config/constants.php');

// Check if ID and image_name are set in the URL
if(isset($_GET['id']) && isset($_GET['image_name'])) {
    // Get the ID and image_name from the URL
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Remove the physical image file if it exists
    if($image_name != "") {
        // Image path
        $path = "../images/caregiver/" . $image_name;

        // Remove the image file
        $remove = unlink($path);

        // Check if the image was removed successfully
        if($remove == false) {
            // Set the session message
            $_SESSION['remove'] = "<div class='alert alert-danger'>Failed to remove caregiver image.</div>";

            // Redirect to Manage Caregiver page
            header('location:' . SITEURL . 'admin/manage-caregiver.php');

            // Stop the process
            die();
        }
    }

    // Delete the caregiver record from the database
    $sql = "DELETE FROM tbl_caregiver WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if($res == true) {
        // Set success message and redirect
        $_SESSION['delete'] = "<div class='alert alert-success'>Caregiver deleted successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-caregiver.php');
    } else {
        // Set error message and redirect
        $_SESSION['delete'] = "<div class='alert alert-danger'>Failed to delete caregiver.</div>";
        header('location:' . SITEURL . 'admin/manage-caregiver.php');
    }
} else {
    // Redirect to Manage Caregiver page if ID or image_name is not set
    $_SESSION['unauthorize'] = "<div class='alert alert-danger'>Unauthorized Access.</div>";
    header('location:' . SITEURL . 'admin/manage-caregiver.php');
}
?>
