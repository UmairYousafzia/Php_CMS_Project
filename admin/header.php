<?php 

session_start();

if(!isset( $_SESSION["username"])){
    header("Location: http://localhost/newproject/admin/");

}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin"  style="display: flex;
            justify-content: space-between;padding: 11px;background-color:lightGray;">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" style=" height:69px;width: 208px;" src="images/newss.png"></a>
                    </div>
                    
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                 
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
    