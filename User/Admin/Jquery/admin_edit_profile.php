<!DOCTYPE html>
<html lang="en">
<head>
  <script src="../../package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="../../package/dist/sweetalert2.css">
</head>
<body>
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "salon");
if(isset($_GET['username']) ){
$username =$_GET['username'];
$sql_Update ="UPDATE admin_user SET username='$username' WHERE email='{$_SESSION["admin_email"]}'";
$result = $connection-> query($sql_Update);
}
?>
<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'The Admin profile has been Updated !!',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "../admin_edit_profile.php";
});
}
</script>
</body>
</html>
