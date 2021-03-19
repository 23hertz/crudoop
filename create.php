<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Crud</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
</head>
       <div class="container">

           <div class="page-header">
              <h1>Create Product</h1>
           </div>

           <?php
           if($_POST){
               include 'config/database.php';

               try {
                   $query = "INSERT INTO addresses SET username=:username, email=:email, addresss=:addresss";

                   //Prepare  query for execution
                   $stmt = $con->prepare($query);

                   //posted values
                   $username =htmlspecialchars(strip_tags($_POST['username']));
                   $email = htmlspecialchars(strip_tags($_POST['email']));
                   $addresss = htmlspecialchars(strip_tags($_POST['addresss']));

                   // bind parameter
                   $stmt->bindParam(':username', $username);
                   $stmt->bindParam(':email',$email);
                   $stmt->bindParam('addresss',$addresss);

                   //Execute query
                   if($stmt->execute()){
                       echo "<div  class='alert alert-success'>Record was saved.</div>";
                   }else{
                       echo "<div class='alert alert-danger'>Unable To Save record</div>";
                   }

               }
                catch (PDOException $exception) {
                   die('Error: ' . $exception->getMessage());
               }
           }
           ?>
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
               <table class="table table-hover table-responsive table-bordered">
                   <tr>
                       <td>Name</td>
                       <td><input type="text" name="username" class="form-control"></td>
                   </tr>

                   <td>Email</td>
                       <td><input type="text" name="email" class="form-control"></td>
                   </tr> 

                   <tr> 
                   <td>Address</td>
                    <td><textarea name="addresss" class="form-control"></textarea></td>
                   </tr> 

                   <tr>
                   <td></td>
                   <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
               </table>
           </form>

           
       </div>

       <script src="js/jquery-2.0.0.min.js"></script>
       <script src="js/bootstrap.js"></script>
</body>
</html>