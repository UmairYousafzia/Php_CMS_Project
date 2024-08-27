
<?php include 'header.php';
include 'menu.php';

if(isset($_POST['save'])){

  $conn = mysqli_connect("localhost","root", "", "newproject") or die("Connection Failed : " . mysqli_connect_error());
  $fname =$_POST['fname'];
  $lname = $_POST['lname'];
  $user =$_POST['user'];
  $pass = md5 ($_POST['password']);
  $role = $_POST['role'];

  $sql = "SELECT username FROM user WHERE  username = '{$user}'";
  
  $result = mysqli_query($conn, $sql) or die("Quary Failed");
  
  
  if(mysqli_num_rows($result) > 0) {

    echo "<p style ='margin-top:20px; font-size:40px; text-align:center; font-weight:bold; color:red'; >User name alredy exist </p>";

  }
  else {

    $sql1 = "INSERT INTO user(first_name, last_name,username,password,role) VALUES ('{$fname}', '{$lname}', '{$user}', '{$pass}', '{$role}')";
    if(mysqli_query($conn, $sql1)){
        echo "<p style='margin-top:20px; font-size:40px; text-align:center; font-weight:bold; color:green;'>User saved successfully</p>";
      } else {
        echo "<p style='margin-top:20px; font-size:40px; text-align:center; font-weight:bold; color:red;'>Failed to save user</p>";
      }


  }

}
?>
<a href="users.php" class="btn btn-primary mt-4 mr-8 float-right"> Back </a>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
