<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Records Crud</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <style>
      .m-r-1em{margin-right:1em;}
      .m-b-1em{margin-bottom:1em;}
      .m-l-1em{margin-left:1em;}
      .mt0{margin-top:0;}

    </style>
</head>
       <div class="container">

           <div class="page-header">
              <h1>Read Products</h1>
           </div>

           <?php
           include 'config/database.php';

           $action = isset($_GET['action']) ? $_GET['action']: "";
           if($action == 'deleted'){
             echo "<div class='alert alert-success'>Record was deleted</div>";
           }
           ?>

           <?php
           $query = "SELECT id, username, email, addresss FROM addresses ORDER BY id DESC";
           $stmt = $con->prepare($query);
           $stmt->execute();

           $num = $stmt->rowCount();

           echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create new Product</a>";

           if($num > 0){
               echo "<table class='table table-hover table-responsive table-bordered'>";
                   echo "<tr>";
                     echo "<th>ID</th>";
                     echo "<th>Username</th>";
                     echo "<th>Email</th>";
                     echo "<th>Address</th>";
                     echo "<th>Action</th>";
                   echo "</tr>";

                   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                     extract($row);

                     echo "<tr>";
                         echo "<td>{$id}</td>";
                         echo "<td>{$username}</td>";
                         echo "<td>{$email}</td>";
                         echo "<td>{$addresss}</td>";
                         echo "<td>";
                           // read one record 
                                echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
                                
                                // we will use this links on next part of this post
                                echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

                                // we will use this links on next part of this post
                                echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
                         echo "</td>";
                     echo "</tr>";
                   }
               echo "</table>";
           }else{
            echo "<div class='alert alert-danger'>No records found.</div>";
           }
           ?>

          
           
       </div>

       <script src="js/jquery-2.0.0.min.js"></script>
       <script src="js/bootstrap.js"></script>

         <script type='text/javascript'>
               function delete_user(id){
                 var answer = confirm('Are you sure?');
                 if(answer){
                   window.location = 'delete.php?id=' + id;
                 }
               }
         </script>
</body>
</html>