<?php 
include('roution/manu.php');
include('config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Admin</title>
</head>
<body>
  <!--- content site start --->
  <div class="content">
    <div class="wrapper">
      <h1>Manage Admin</h1>
      <?php 
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      ?>
      <br>
      <a href="add_admin.php" id="add-btn">Add Admin</a>
      
      <table class="admintbl">
        <tr>
          <th>No.</th>
          <th>Snumber</th>
          <th>Full Name</th>
          <th>User Name</th>
          <th>Actions</th>
        </tr>

        <?php
        // Getting data from the database
        $sql = "SELECT * FROM tbl_admin";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
          $counter = mysqli_num_rows($res);

          if ($counter > 0) {
            $i = 0;
            while ($rows = mysqli_fetch_assoc($res)) {
              $id = $rows['Id'];
              $fname = $rows['Full_name'];
              $username = $rows['Username'];
              $i++;
              ?>

              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $id; ?></td>
                <td><?php echo $fname; ?></td>
                <td><?php echo $username; ?></td>
                <td>
                  <a href="#" id="update-btn">Update Admin</a>
                  <a href="#" id="del-btn">Delete Admin</a>
                </td>
              </tr>

              <?php 
            }
          }
        }
        ?>
      </table>
    </div>
  </div>
  <!--- content site end --->
</body>
</html>
<?php include('roution/footer.php'); ?>
