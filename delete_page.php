<?php include('db_con.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $query = "DELETE FROM `student` WHERE `id` = '$id'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        // Corrected: Pass the $connection parameter to mysqli_error
        die("Query Failed: " . mysqli_error($connection));
    } else {
        // Redirect with a success message
        header('Location: index.php?delete_msg=You have deleted the record.');
    }
}
?>
