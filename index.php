<?php include('header.php'); ?>
<?php include('db_con.php'); ?>



<div class="box1">
    <h2>ALL STUDENTS</h2>
    <!-- This is the button that will trigger the modal when clicked -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
  ADD STUDENT
</button>

</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM `student`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>

                    <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</td>
                </tr>
        <?php
            }
        }
        
        ?>
        <!-- This is the modal itself -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Your form or content goes here -->
        <form method="post" action="add_student.php">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" required>
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" required>
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" required>
          </div>
          <button type="submit" class="btn btn-primary">Save Student</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </tbody>
</table>




<!-- Modal to Add Student -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_student.php" method="POST">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" required>
          </div>
          <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" required>
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php
// Display the success message (if it exists)
if (isset($_GET['update_msg'])) {
    echo '<div style="color: red; text-align: center; margin-top: 20px; font-weight: bold;">' . $_GET['update_msg'] . '</div>';
}
?>

<?php
// Display the success message (if it exists)
if (isset($_GET['delete_msg'])) {
    echo '<div style="color: red; text-align: center; margin-top: 20px; font-weight: bold;">' . $_GET['delete_msg'] . '</div>';
}
?>

<?php include('footer.php'); ?>
