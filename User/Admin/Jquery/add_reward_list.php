<!DOCTYPE html>
<html lang="en">
<head>
  <script src="../../package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="../../package/dist/sweetalert2.css">
</head>
<body>
<?php
require_once '../pdo.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "salon");

// if(isset($_POST["fileToUpload"]) && isset($_POST["reward_name"]) && isset($_POST["reward_point"])){
  // echo "Filename: sdas <br>";
  if($_FILES['fileToUpload']['size'] != 0){

      $reward_name = $_POST["reward_name"];
      $reward_point = $_POST["reward_point"];
      $file = $_FILES['fileToUpload'];
      $filename1 = $_FILES['fileToUpload']['name'];

      // echo "Filename: " . $_FILES['fileToUpload']['name']."<br>";
      // echo "Filename: " . $filename1."<br>";
      $filename ="assets/reward_item/$filename1";
      if( move_uploaded_file($file["tmp_name"],"../../assets/reward_item/$filename1")){
          $stmt = $pdo->prepare("INSERT INTO reward_item (id,reward_item,reward_point,reward_path)VALUES('id','$reward_name','$reward_point','$filename')");
          $stmt->execute();

        // header("Location: manage_reward.php");
        // return;
      }
      }
?>
<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'The Reward Has been added !!',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "../manage_reward.php";
});
}
</script>
</body>
</html>
