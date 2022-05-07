<?php
session_start();
include"connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>New User</title>
    <?php include"logincss.php"; ?>
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
    
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" action="" method="post">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>
            <?php 
                      
                      if (isset($_SESSION["message"]) && $_SESSION["message"]) {
                          printf("<b>%s</b>", $_SESSION["message"]);
                         
                          unset($_SESSION["message"]);
                      } 
                      ?>

            <?php $userf= $_SESSION['username']; ?>
            <div class="mb-3">
              <input type="hidden" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="UserName" name ="user" value="<?php echo $userf?>">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="password"name ="pass1">
            </div>
            <div class="mb-3">
              <input type="password" name="pass2" class="form-control" id="password" placeholder="type again password">
            </div>
            <div class="text-center"><input type="submit" name ="update"class="btn btn-color px-5 mb-5 w-100" value="Login"></div>
           <?php 
            if(isset($_POST['update'])){
                $p1=$_POST['pass1'];
                $p2=$_POST['pass2'];
                if($p1==$p2){
                    $sql = "UPDATE users SET password='".$p2."' WHERE username='".$userf."'";

                    if ($conn->query($sql) === TRUE) {
                    //echo "Record updated successfully";
                    header("location:../admin/dist");
                    } else {
                    echo "Error updating record: " . $conn->error;
                    echo $sql;
                    }
                }
                else{
                    $_SESSION['message']="Type same password in both the field";
                    header(0);
                }
            }

            ?>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html>