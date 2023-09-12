<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location: rlogin.html");
}
 if (isset($_POST['form_submitted'])): 
     $name = $_POST['name'];
     $jobhrs = $_POST['jobhours'];
     $pinc = $_POST['pincode'];
     $sal = $_POST['salary'];
     $jobdis = $_POST['jobdisc'];

$server = "localhost";
$username = "root";
$password = "123456";
$dbname = "foundyou";
echo "TRYING TO ESTABLISH CONNECTION<br>";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
echo "CONNECTION ESTABLISHED<br>";
$rname = $_SESSION['username'];


$sql = "INSERT INTO jobdata (rname,jobpost, jobhours, pincode, salary, jobdisc) VALUES ('$rname','$name', '$jobhrs', '$pinc','$sal', '$jobdis')";

if (mysqli_query($conn, $sql)) {
 echo "post added successfully";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
<?php else: ?>
	<?php endif; ?>
