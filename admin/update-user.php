<?php include "header.php";

if(isset($_POST['submit'])){

  $user_id = $_POST['user_id'];
  $fname = $_POST['f_name'];
  $lname = $_POST['l_name'];
  $user = $_POST['username'];
  $role = $_POST['role'];

  include 'config.php';

  $sql1 = "UPDATE user SET first_name= '$fname', last_name='$lname', username='$user', role= '$role' WHERE user_id ='$user_id'";
  $result = mysqli_query($conn, $sql1) or die("Quary Failed");

  
  if (mysqli_query($conn, $sql1)) {
   header("Location: http://localhost/newproject/admin/users.php");
  }

  mysqli_close($conn);


}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php 
                
                include 'config.php';

                $id = $_GET['id'];
                $sql ="SELECT * FROM user WHERE user_id ={$id}";
                $result = mysqli_query($conn, $sql) or die("Quary Failed");

                if(mysqli_num_rows($result) > 0) {

                  while($row = mysqli_fetch_assoc($result)) {

                ?>
           
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value ="<?php echo $row['user_id']?>" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value ="<?php echo $row['first_name']?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control"  placeholder="" value="<?php echo $row['username']?> " required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                         <?php
                            if( $row['role'] == 1){
                              echo "<option value='0'  >normal User</option> 
                              <option value='1' selected>Admin</option>";
                            }
                            else {
                              echo "<option value='0' selected >normal User</option> 
                                    <option value='1' >Admin</option>";
                            }
                          ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->


                  <?php
                }
              }?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>