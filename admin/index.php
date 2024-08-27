<?php
  include "config.php";

?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4" >
                        <img style="width:24.75rem;height:18.75rem; margin-left:51px"  class="logo" src="images/new.png">
                        <h1 class="heading text-primary" style=" margin-left:122px">Admin</h1>
                        <!-- Form Start -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <div  class="login">
                              <input type="submit" name="login" class="btn btn-primary" value="Login" />
                              <a href="http://localhost/newproject/admin/signup.php" name="signup" class="btn btn-primary ml-8">SignUp </a>
                            </div>
                           
                        </form>
                        <!-- /Form End -->

                        <?php
                        session_start();
                         if(isset($_POST['login'])){
                            include 'config.php';
                            $user_name = $_POST['username'];
                            $pass = md5($_POST['password']);
                            $sql = "SELECT user_id, username, role FROM user WHERE username= '{$user_name}' AND password = '{$pass}'";

                            $result = mysqli_query($conn, $sql) or die("Query Failed");

                            if(mysqli_num_rows($result) > 0){
                             
                              while($row = mysqli_fetch_assoc($result)){
                               
                                $_SESSION["username"] = $row['username'];
                                $_SESSION["user_id"] = $row['user_id'];
                                $_SESSION["user_role"] = $row['role'];

                                header("Location: http://localhost/newproject/index.php");
                                exit();
                              }
                            } else {
                              echo "<div class='alert alert-danger'>User Not Found</div>";
                            }
                         }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>