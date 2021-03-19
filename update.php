<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Crud</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <style>
    textarea{
        color:#000;
    }
    </style>
</head>
       <div class="container">

           <div class="page-header">
              <h1>Read Product</h1>
           </div>

           <?php 
               $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found');

               include 'config/database.php';

               try {
                   $query = "SELECT id, username, email, addresss FROM addresses WHERE id= ? LIMIT 0,1";
                   $stmt = $con->prepare($query);

                   //this is the first question mark
                   $stmt->bindParam(1, $id);

                   $stmt->execute();

                   //get row
                   $row = $stmt->fetch(PDO::FETCH_ASSOC);

                   $username = $row['username'];
                   $email = $row['email'];
                   $addresss = $row['addresss'];

               } catch (PDOException $exception) {
                   die('ERROR: '. $exception->getMessage());
               }
               ?>
               <?php
               if($_POST){
                   try {
                       $query = "UPDATE addresses SET username=:username, email=:email, addresss=:addresss WHERE id = :id";

                       $stmt = $con->prepare($query);

                       $username = htmlspecialchars(strip_tags($_POST['username']));
                       $email = htmlspecialchars(strip_tags($_POST['email']));
                       $addresss= htmlspecialchars(strip_tags($_POST['addresss']));

                       $stmt->bindParam(':username', $username);
                       $stmt->bindParam('email', $email);
                       $stmt->bindParam('addresss', $addresss);
                       $stmt->bindParam('id', $id);

                       if($stmt->execute()){
                           echo "<div class='alert alert-success'>Record was updated.</div>";
                       }
                       else{
                        echo "<div class='alert alert-danger'>Unable to Update record. Please try again</div>";
                       }
                   } catch (PDOException $exception) {
                       die('ERROR:' . $exception->getMessage());
                   }
                }
               
           ?>

           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]. "?id={$id}"); ?>" method="post"> 
              <table class='table table-hover table-responsive table-bordered'>

                  <tr>
                      <td>Name</td>
                      <td><input type="text" name="username" id="" class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES);  ?>"></td>
                  </tr> 

                  <tr>
                      <td>Email</td>
                      <td><input type="text" name="email" id="" class="form-control" value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>"></td>
                  </tr> 
                  <tr>
                      <td>Address</td>
                      <td><textarea name="addresss" id="" cols="30" rows="10" class="form-control" value="<?php echo htmlspecialchars($addresss, ENT_QUOTES);  ?>"></textarea></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td>
                      <input type="submit" value="Save Changes" class="btn btn-primary">
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