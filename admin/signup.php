
<?php include 'header.php';

if(isset($_POST['save'])){

    include 'config.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['user'];
    $pass = md5($_POST['password']); 
    $role = $_POST['role'];

    $sql = "SELECT * FROM user WHERE username = '{$username}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed");

    if(mysqli_num_rows($result) >0 ){

       
        echo "<p style ='margin-top:20px; font-size:40px; text-align:center; font-weight:bold; color:red'; >User name alredy exist </p>";

    }
    else {

        $sql1 = "INSERT INTO user( first_name, last_name, username,password, role) VALUES ('{$fname}', '{$lname}', '{$username}', '{$pass}', '{$role}')";
        
        $result = mysqli_query($conn, $sql1) or die("Quarry Failed");

                header("Location: http://localhost/newproject/admin");


    }


}
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              
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
