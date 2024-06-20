<?php include 'config.php';
session_start(); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Delete Account</h2>
    <h1>Are you Sure you want to delete it</h1>
    <div class="container">
      <form method="post" action="">
        <div>
          <button type="submit" name="yes" class="btn btn-primary">Yes</button>
          <button type="submit" name="no" class="btn btn-primary">No</button>
        </div>
      </form>
    </div>
    <?php
    if (isset($_POST['yes'])){
      $profession = $_GET['title'];
      $id = $_SESSION['id'];
      $query = "DELETE FROM alumnistatus WHERE id = '$id' and title = '$profession'";
      $result = mysqli_query($conn, $query);
      if ($result){
        header("Location: http://localhost:2011");
      }else{
        echo "<script>Deletion was unsuccessfull</script>";
      }
    }
    if (isset($_POST['no'])){
      header("Location: http://localhost:2011");
    }
    ?>
  </body>
</html>
