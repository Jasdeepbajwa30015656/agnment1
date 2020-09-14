<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Update the record</title>
  </head>
  <body class="container">
            <h1 class="page-header">Update product record</h1>

            <!-----php code to select  the desired record-->
            <?php

              //check if id value was sent to this page via the get method (?=) from a link
            $id=isset($_GET['id'])? $_GET['id']:die('Error:Record id not found');

            // connect to the database

            include 'connect/connection.php';

            // get the current records from the db based on the ID value
            try
            {
                 //select data form the db
              $query="select id,name,class,image,containment,description,reference,Additional from products where id=:id";
            

             //bind our ? to  id
              $read=$conn->prepare($query);
              $read->bindParam(":id",$id);
              $read->execute();

               //store record into an associative array
              $row=$read->fetch(PDO::FETCH_ASSOC);

              //retrieve individual field data from the array
              $name =$row['name'];
              $class=$row['class'];
              $image =$row['image'];
              $containment =$row['containment'];
              $description=$row['description'];
              $reference=$row['reference'];
              $Additional =$row['Additional'];
            }
            catch(PDOException $exception)
            {
                die('Error: '.$exception->getmessage());
            }

            if($_POST)
            {
             try
             {
              //update sql query
              $query="update products set name=:name,class=:class,image=:image,containment=:containment,description=:description,reference=:reference,Additional=:Additional where id=:id";

              //prepare the query 
              $update=$conn->prepare($query);

              //save post values from the form
                 $id=htmlspecialchars(strip_tags($_POST['id']));
                  $name=htmlspecialchars(strip_tags($_POST['name']));
                   $class=htmlspecialchars(strip_tags($_POST['class']));
                    $image=htmlspecialchars(strip_tags($_POST['image']));
                       $containment=htmlspecialchars(strip_tags($_POST['containment']));
                     $description=htmlspecialchars(strip_tags($_POST['description']));
                      $reference=htmlspecialchars(strip_tags($_POST['reference']));
                    $Additional=htmlspecialchars(strip_tags($_POST['Additional']));


                    //bind our parameter to our query
                  $update->bindParam(':id',$id);
                  $update->bindParam(':name',$name);
                     $update->bindParam(':class',$class);
                  $update->bindParam(':image',$image);
                   $update->bindParam(':containment',$containment);
                     $update->bindParam(':description',$description);
                        $update->bindParam(':reference',$reference);
                  $update->bindParam(':Additional',$Additional);

                  //execute the update query
                  if($update->execute())
                  {
                    echo"<div class='alert alert-success'>Record {$id} was updated.</div>";
                  }
                  else
                  {
                      echo"<div class='alert alert-danger'>Unable to update recorder.Please try again.</div>";
                  }


             }
             catch(PDOException $exception)
             {
               die('Error: '. $exception->getmessage());
             }
            }
            else
            {
              echo "<div class='alert alert-danger'>Record is ready to be updated</div>";
            }
?>

   <h2>Use a form to enter a new SCP page record. </h2>

      <form class="form-group bg-dark text-light p-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] .'?id='. $id);?>" method="POST" >
     
     
     <br>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>" placeholder="Page Name" require>
    <br><br>

     <p></p>:Item
     <br>
    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>" placeholder="Page Name" require>
    <br><br>

     <p></p>:Object Class
     <br>
    <input type="text" class="form-control" name="class" value="<?php echo htmlspecialchars($class, ENT_QUOTES); ?>" placeholder="Page Name" require>
    <br><br>
     <p></p>:Image
     <br>
    <input type="text" class="form-control" name="image" value="<?php echo htmlspecialchars($image, ENT_QUOTES); ?>" placeholder="Page Name" require>
    <br><br>

      <p></p>:Containment
    <br>
    <input type="text" class="form-control" name="containment"  value="<?php echo htmlspecialchars($containment, ENT_QUOTES); ?>" placeholder="heading" require>
    <br><br>


    <p></p>:Description
    <br>
    <input type="text" class="form-control" name="description"  value="<?php echo htmlspecialchars($description, ENT_QUOTES); ?>" placeholder="heading" require>
    <br><br>

    <p></p>:Reference
    <br>
    <input type="text" class="form-control" name="reference" value="<?php echo htmlspecialchars($reference, ENT_QUOTES); ?>" placeholder="paragraph " require>
    <br>

    <p></p>:Additional
    <br>
    <input type="text" class="form-control" name="Additional"  value="<?php echo htmlspecialchars($Additional, ENT_QUOTES); ?>" placeholder="heading" require>
    <br><br>
    
    <hr width="75%">
    <input type="submit" class="btn btn-primary" name="update" value="Save Changes">
</form>
<p><a href="index.php" class="btn btn-info">Back to Index page</a></p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>