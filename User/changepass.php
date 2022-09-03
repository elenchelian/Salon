<!DOCTYPE html>

<html lang="en">

<head>
  <script src="package/dist/sweetalert2.js"></script>
  <link rel="stylesheet" href="package/dist/sweetalert2.css">
</head>
<body>

<body onload="JSalert()">
<script type="text/javascript">
function JSalert(){
  Swal({
    position: 'center',
    type: 'success',
    title: 'The Password has been changed Successfully !!',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location = "dashboard.php";
});
}
</script>
</body>
</html>
