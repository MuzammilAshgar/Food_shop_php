<?php
// Include menu and network
include('roution/manu.php');
include('config/conn.php');

// Check if the form has been submitted

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!--- content site starts --->
    <div class="content">
        <div class="wrapper">
            <h1>ADD Admin</h1>

            <?php 
        if (isset($_SESSION['add'])) {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
         }
        ?>

            <form action="" method="post">
                <table class="addtable">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="add_name" id="add_admin_name" placeholder="Enter Your Name"></td>
                    </tr>
                    <tr>
                        <td>User Name:</td>
                        <td><input type="text" name="add_username" id="add_admin_username" placeholder="Enter Your Username"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="Password" name="add_password" id="add_admin_password" placeholder="Enter Your Password"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" class="btn-add" value="Enter "></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!--- content site ends --->
    <?php include('roution/footer.php'); ?>

    <?php
    
    // getting data of form 
    if (isset($_POST['submit'])) {
    // save data in var
    $fname = $_POST['add_name'];
    $username = $_POST['add_username'];
    $pwd = md5($_POST['add_password']); // password with md5 

    // this is query of insert data to database 
    $sql = "INSERT INTO tbl_admin SET 
        Full_name='$fname',
        Username = '$username',
        Password = '$pwd'
        ";

       // execute qury
    if (!$fname == null && !$username == null) {
        
        $res = mysqli_query($conn, $sql);
        
        if ($res) {
        echo "Your data is sand to database";
        $_SESSION['add'] = "new Admin is Added";
        header("location:.$adminpage");};
    }
    else{
        header("refresh: 0;");
        $_SESSION['add'] = "PLZ Enter data";
    }

       }
   

         
?>


</body>
</html>
