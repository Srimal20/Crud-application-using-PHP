<?php
include('db_con.php');  // Connect to the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    $query = "INSERT INTO student (first_name, last_name, age) VALUES ('$first_name', '$last_name', '$age')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Student added successfully!";
        header("Location: index.php");  // Redirect back to main page
    } else {
        echo "Failed to add student: " . mysqli_error($connection);
    }
}
?>

