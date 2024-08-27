<?php 
include "header.php";
include 'menu.php';

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">Add User</a>
            </div>
            <div class="col-md-12">
                <?php
                include 'config.php';

                // Define the number of records per page
                $limit = 10;

                // Get the current page number from the URL, default is 1
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                
                // Calculate the offset
                $offset = ($page - 1) * $limit;

                // Query to fetch data with LIMIT and OFFSET
                $sql = "SELECT * FROM user LIMIT {$offset}, {$limit}";
                $result = mysqli_query($conn, $sql) or die("Query Failed");

                if(mysqli_num_rows($result) > 0) {
                ?>
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo ($row['role'] == 1) ? "Admin" : "Normal"; ?></td>
                                <td class="edit"><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class="fa fa-edit"></i></a></td>
                                <td class="delete"><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>'><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


                <?php 
                }
                ?>


            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
