<!DOCTYPE html>

<html lang="en">

<head>
  <script src="../../package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="../../package/dist/sweetalert2.css">
</head>
<body>
<?php
$connection = mysqli_connect("localhost", "root", "", "salon");
if(isset($_GET['update']) ){
$id =$_GET['update'];

$sql_Update ="DELETE FROM reward_item WHERE id='$id'";
$result = $connection-> query($sql_Update);
}
?>
<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'The Reward has been deleted !!',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "../manage_reward.php";
});
}
</script>
</body>
</html>
