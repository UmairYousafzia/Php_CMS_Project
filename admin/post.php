<?php include "header.php"; 
include 'menu.php';
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
               
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php 
                            include 'config.php';
                            $sql = "SELECT *  FROM post";
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0){
                                
                                while($row = mysqli_fetch_assoc($result)) {



                        
                        ?>
                       
                          <tr>
                              <td class='id'><?php echo $row['post_id']?></td>
                              <td><?php echo $row['title']?></td>
                              <td><?php echo $row['description']?></td>
                              <td><?php echo $row['category']?></td>
                              <td><?php echo $row['post_date']?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row["post_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row["post_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                      <?php 
                                    
                                }

                            }?>
                      </tbody>
                  </table>
                
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
