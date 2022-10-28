<?php include "connect.php";

$id = $_GET['updateid'];
$sql = "select * from crud where id = $id";
$result = mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mob = $_POST["mobile"];
    $pwd = $_POST["password"];
    

    // $sql = "Insert into crud (`name`, `email`, `mobile`, `password`) values ('".$name."', '".$email."', '".$mob."', '".$pwd."')";
    $sql = "update crud set id =$id , name='$name',email='$email',mobile='$mob',password='$pwd' where id=$id ";
   
    $result = mysqli_query($conn,$sql);
    if($result){
        // echo "Updated";
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }


}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>UPDATE Operations</title>
  </head>
  <body>
    <div class="container my-5" >

    <form method="post" >
  <div class="form-group">
    <label>Name </label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $name; ?>">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" value="<?php echo $mobile; ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password" value="<?php echo $password; ?>">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>
    </div>


  </body>
</html>