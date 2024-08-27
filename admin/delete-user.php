<?php
include 'config.php';


$user_id = $_GET['id'];

// Fetch the role of the user
$sql = "SELECT role FROM user WHERE user_id = {$user_id}";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Check if the role is 0, if so, delete the user
    if ($row['role'] == 0) {
        $sql = "DELETE FROM user WHERE user_id = {$user_id}";
        if (mysqli_query($conn, $sql)) {
            header("Location: http://localhost/newproject/admin/users.php");
        }
        else {
            header("Location: http://localhost/newproject/admin/users.php");
        }
    } 
} else {
    echo "User not found.";
}

mysqli_close($conn);
?>
