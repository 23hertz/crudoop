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
              <h1>Read Product</h1>
           </div>

           <?php
               $id = isset($_GET['id']) ? $_GET['id'] : die('Error:Record ID not found');

               include 'config/database.php';

               try {
                $query = "SELECT id, username, email, addresss FROM addresses WHERE id= ? LIMIT 0,1";
                $stmt= $con->prepare($query);
                $stmt->bindParam(1,$id);
                $stmt->execute();

                //to retrieve row
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $username = $row['username'];
                $email = $row['email'];
                $addresss = $row['addresss'];
               } catch (PDOException $exception) {
                   die('ERROR: ' . $exception->getMessage());
               }

           ?>
           
           <table class='table table-hover table-responsive table-bordered'>
              <tr>
                 <td>Name</td>
                 <td><?php echo htmlspecialchars($username, ENT_QUOTES); ?></td>
              </tr>
              <tr>
                 <td>Email</td>
                 <td><?php echo htmlspecialchars($email, ENT_QUOTES); ?></td>
              </tr>
              <tr>
                 <td>Address</td>
                 <td><?php echo htmlspecialchars($addresss, ENT_QUOTES); ?></td>
              </tr>
              
              <tr>
                  <td></td>
                  <td>
                      <a href='index.php' class='btn btn-danger'>Back to read Page</a>
                  </td>
              </tr>

           </table>        
       </div>

       <script src="js/jquery-2.0.0.min.js"></script>
       <script src="js/bootstrap.js"></script>
</body>
</html>