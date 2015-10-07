<?PHP
$con = mysqli_connect("localhost","root","","spk_sekolahsma12");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>