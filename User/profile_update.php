<!DOCTYPE html>

<html lang="en">

<head>
  <script src="package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="package/dist/sweetalert2.css">
</head>
<body>
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "salon");
if(isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['username']) && isset($_GET['address'])){
$firstname =$_GET['firstname'];
$lastname = $_GET['lastname'];
$username =$_GET['username'];
$address = $_GET['address'];
$sql_Update ="UPDATE user SET firstname='$firstname ',lastname='$lastname',username='$username',address='$address' WHERE email='{$_SESSION["email"]}'";
$result = $connection-> query($sql_Update);
}
?>
<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'Your profile has been Updated',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "edit_profile.php";
});
}
</script>
</body>
</html>
