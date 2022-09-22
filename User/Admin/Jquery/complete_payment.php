<!DOCTYPE html>

<html lang="en">

<head>
  <script src="../../package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="../../package/dist/sweetalert2.css">
</head>
<body>
<?php
$connection = mysqli_connect("localhost", "root", "", "salon");
if(isset($_GET['update']) && isset($_GET['payment'])&& isset($_GET['email'])&& isset($_GET['service']) ){
$id =$_GET['update'];
$payment = $_GET['payment'];
$emails = $_GET['email'];
$service = $_GET['service'];

$sql = "SELECT * FROM user where email='$emails';";
// var_dump($sql);
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $current_points=  $row['reward_points']+75;
    $add_points= 75;
    // $latest_points = $current_points+75;


    }
  }

  $sql_Update ="UPDATE booking SET booking_deposit='$payment',booking_status='completed' WHERE id='$id'";
  $result = $connection-> query($sql_Update);
  $sql_point ="UPDATE user SET reward_points='$current_points'WHERE email='$emails'";
  $result = $connection-> query($sql_point);
  $sql_history ="INSERT INTO reward_point (id,email,service,points)VALUES('id','$emails','$service','75')";
  $result = $connection-> query($sql_history);
}
?>
<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'The Payment Has been completed !!',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "../complete_payment.php";
});
}
</script>
</body>
</html>
