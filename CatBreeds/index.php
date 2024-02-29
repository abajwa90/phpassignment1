<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cats</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    .custom-column {
      margin-bottom: 20px;
    }
    .card {
      background-color: #3498db;
      border: 2px solid #000;
      color: #fff;
    }
    .card-body {
      padding: 1.25rem;
    }
    .card-title {
      margin-bottom: 0.75rem;
    }
    .card-footer {
      background-color: #2c3e50; 
      border-top: 1px solid #000; 
      padding: 0.75rem 1.25rem; 
    }
  </style>
</head>
<body>
  <?php include('includes/nav.php'); ?>
  <?php 
    $connect = mysqli_connect('localhost', 'root', 'root', 'cats');
    $query = 'SELECT id, breedname, origin, descrip, imageURL FROM cats';
    $cats = mysqli_query($connect, $query);
    
    if (mysqli_connect_error()){
      die("Connection error: " . mysqli_connect_error());
    }
  ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="display-4">
          Cat Breeds
        </h1>
      </div>
    </div>
    <div class="row">
      <?php
        foreach($cats as $cat){
          echo '<div class="col-md-4 custom-column"> <!-- Added custom-column class -->
            <div class="card">
              <img class="card-img-top" src="' . $cat['imageURL'] . '" width="300px" height="500px">
              <div class="card-body">
                <h3 class="card-title">' . $cat['breedname'] . '</h3>
                <b>Origin:</b> ' . $cat['origin'] . ' <br>
                Description: ' . $cat['descrip'] . '</br>
              </div>
              <div class="card-footer">
                <form method="GET" action="update.php">
                  <input type="hidden" name="id" value="'. $cat['id'] .'">
                  <button type="submit" name="edit" class="btn btn-success">Edit</button>
                </form>
                <form method="POST" action="deleteCat.php">
                  <input type="hidden" name="id" value="'. $cat['id'] .'">
                  <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>'; 
        }
      ?>
    </div>
  </div>
  
  <?php
    mysqli_close($connect);
  ?>
</body>
</html>
