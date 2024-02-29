<?php 
  if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $connect = mysqli_connect('localhost', 'root', 'root', 'cats');
    if (!$connect) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $query = "DELETE FROM cats WHERE `id` = '$id'";
    $cat = mysqli_query($connect, $query);
    if($cat){
      header('Location: index.php');
      exit;
    }else
    {
      echo mysqli_error($connect);
    }
  }
  mysqli_close($connect);
?>