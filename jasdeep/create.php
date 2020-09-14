<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Enter a new product</title>
  </head>
     <body class="container">
      <h1 class="page_header">Enter a new product</h1>
      <?php
        
        if($_POST)
        {
            //connect to the database

            include 'connect/connection.php';

            try
            {
                  //insert query

                  $query="insert into products set name=:name,class=:class,image=:image,containment=:containment,description=:description,reference=:reference,Additional=:Additional";

                  //prepare query for execution
                  $statement=$conn->prepare($query);

                  $name=htmlspecialchars(strip_tags($_POST['name']));
                   $class=htmlspecialchars(strip_tags($_POST['class']));
                    $image=htmlspecialchars(strip_tags($_POST['image']));
                     $containment=htmlspecialchars(strip_tags($_POST['containment']));
                      $description=htmlspecialchars(strip_tags($_POST['description']));
                       $reference=htmlspecialchars(strip_tags($_POST['reference']));
                  $Additional=htmlspecialchars(strip_tags($_POST['Additional']));
              
                  //bind our parameter to our query
                  $statement->bindParam(':name',$name);
                  $statement->bindParam(':class',$class);
                   $statement->bindParam(':image',$image);
                  $statement->bindParam(':containment',$containment);
                  $statement->bindParam(':description',$description);
                  $statement->bindParam(':reference',$reference);
                     $statement->bindParam(':Additional',$Additional);

                

                  //execute the query
                  if($statement->execute())
                  {
                    echo"<div class='alert alert-success'>Record was created</div>";
                  }
                  else
                  {
                    echo"<div class='alert alert-danger'>Unable to save record.</div>";
                  }

            }
            catch(PDOException $exception)
            {
                 die('ERROR: ' . $exception->getMessage());
            }
        }

    ?>
    <h2>please enter a new SCP file ....</h2>
       <p><a href="index.php" class="btn btn-warning">Back to index page</a></p>

    <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label>Name:</label>
    <br>
    <input type="text" name="name" class="form-control">
    <br>
    <label>Object class:</label>
    <br>
    <input type="text" name="class" class="form-control">
    <br>
    <label>Image:</label>
    <br>
    <input type="text" name="image" class="form-control">
    <br>
    <label>Containment:</label>
    <br>
    <input type="text" name="containment" class="form-control">
    <br>
    <label>Description:</label>
    <br>
    <input type="text" name="description" class="form-control">
    <br>
    <label>Reference:</label>
    <br>
    <input type="text" name="reference" class="form-control">
    <br>
    <label>Additional</label>
    <br>
    <input type="text" name="Additional" class="form-control">
    <br>
    <input type="submit" value="Save" class="btn btn-primary">
    </form>
 



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>