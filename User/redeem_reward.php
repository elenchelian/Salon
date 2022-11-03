<!DOCTYPE html>

<html lang="en">

<head>
  <script src="package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="package/dist/sweetalert2.css">
</head>
<body>
<?php
$connection = mysqli_connect("localhost", "root", "", "salon");
if(isset($_GET['update']) && isset($_GET['email'])&& isset($_GET['point'])){
$id =$_GET['update'];
$email = $_GET['email'];
$point=$_GET['point'];
$date = date('Y-m-d');
$query ="SELECT * FROM reward_item where id = '$id'";
$result = mysqli_query($connection,$query) ;
$rows = mysqli_num_rows($result);
$getval = $result->fetch_assoc();
    if($rows==1){
      $reward_item = $getval['reward_item'];
      $reward_point = $getval['reward_point'];
      $sql_Insert ="INSERT INTO reward_point(id,email,redeem_item,points,date) VALUES('id','$email','$reward_item','$reward_point','$date') ";
      $result = $connection-> query($sql_Insert);
      $latestpoint = $point-$reward_point;
      $sql_Update ="UPDATE user SET reward_points='$latestpoint' WHERE email='$email'";
      $result = $connection-> query($sql_Update);
      session_start();
      // unset($_SESSION['getpoint']);
      $_SESSION['getpoint'] = $latestpoint;
     }else{
    // echo'<script>alert("Your Username and Password is Invalid")</script>';
}

}
?>
<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'The Item has been Redeemed',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "reward_page.php";
});
}
</script>
</body>
</html>
