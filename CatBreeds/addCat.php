<?php 
  if(isset($_POST['submit'])){
    $breedname = $_POST["breedname"];
    $origin = $_POST["origin"];
    $descrip = $_POST["descrip"];
    $imageURL = $_POST["imageURL"];
    
    $connect = mysqli_connect('localhost', 'root', 'root', 'cats');
    if (!$connect) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $query = "INSERT INTO cats (breedname, origin, descrip, imageURL) VALUES ('$breedname', '$origin', '$descrip','$imageURL')";
    $cats = mysqli_query($connect, $query);
    if($cats){
      header('Location: index.php');
    }else
    {
      echo "Error" . mysqli_error($connect);
    }
  };
  mysqli_close($connect);
?>