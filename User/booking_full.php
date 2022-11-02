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
    type: 'warning',
    title: 'Booking slots for the day is full !!',
    showConfirmButton: false,
    timer: 3500
  }).then(function() {
    window.location = "book_appoinment_page.php";
});
}
</script>
</body>
</html>
