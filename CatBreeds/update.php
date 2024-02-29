<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  <?php include('includes/nav.php'); ?>
  <?php 
    if(isset($_POST['update'])){
      // print_r($_POST);  
      $id = $_POST["id"];
      $connect = mysqli_connect('localhost', 'root', 'root', 'cats');
      $query = "SELECT id, breedname, origin, temperament, imageURL FROM cats WHERE `id` = '$id'";
      $student = mysqli_query($connect, $query);
      if($student){
        // echo "success";
        // header('Location: index.php');
        // exit;
      }else
      {
        echo mysqli_error($connect);
      }
    }
  ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="display-4 mt-5 mb-4">
          Update Cat
        </h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
      <form method="POST" action="addCat.php">
        <div class="mb-3">
          <label for="breedname" class="form-label">Breed Name</label>
          <input type="text" class="form-control" id="breedname" name="breedname" aria-describedby="Breed Name">
        </div>
        <div class="mb-3">
          <label for="origin" class="form-label">Origin</label>
          <input type="text" class="form-control" id="origin" name="origin" aria-describedby="Origin">
        </div>
        <div class="mb-3">
          <label for="descrip" class="form-label">Description</label>
          <input type="text" class="form-control" id="descrip" name="descrip" aria-describedby="descrip">
        </div>
        <div class="mb-3">
          <label for="imageURL" class="form-label">Image URL</label>
          <input type="text" class="form-control" id="imageURL" name="imageURL" aria-describedby="ImageURL">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add a Cat Breed </button>
      </form>
      </div>
    </div>
  </div>

</body>
</html>