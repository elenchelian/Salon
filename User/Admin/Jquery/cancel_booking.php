<!DOCTYPE html>

<html lang="en">

<head>
  <script src="../../package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="../../package/dist/sweetalert2.css">
</head>
<body>
<?php
$connection = mysqli_connect("localhost", "root", "", "salon");
if(isset($_GET['update'])&&isset($_GET['reason']) ){
$id =$_GET['update'];
$reason = $_GET['reason'];

$sql_Update ="UPDATE booking SET booking_status='canceled',reason='$reason' WHERE id='$id'";
$result = $connection-> query($sql_Update);
}
?>
<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'The Booking has been Canceled !!',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "../pending_list.php";
});
}
</script>
</body>
</html>
