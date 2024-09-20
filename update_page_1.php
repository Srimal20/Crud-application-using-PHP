<?php include('header.php'); ?>
<?php include('db_con.php'); ?>



<?php
// Fetch student data by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data for the student with the given ID
    $query = "SELECT * FROM `student` WHERE `id` = $id"; 
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);  
    }
}
?>

<?php
// Handle form submission for updating student details
if (isset($_POST['update_students'])) {

    // Retrieve the `id_new` value from the hidden input
    $idnew = $_POST['id_new'];

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $age = $_POST['age'];

    // SQL Update query
    $query = "UPDATE `student` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = $idnew";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        // After update, redirect to the index page with a success message
        header('Location: index.php?update_msg=You have successfully updated the data.');
        exit(); // Ensure the script stops after redirection
    }
}
?>

<!-- Form to update student details -->
<form action="update_page_1.php" method="post">

    <!-- Hidden input to store the student ID -->
    <input type="hidden" name="id_new" value="<?php echo $id; ?>">

    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required value="<?php echo $row['last_name']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="age" name="age" required value="<?php echo $row['age']; ?>">
    </div>

    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>

<?php include('footer.php'); ?>
