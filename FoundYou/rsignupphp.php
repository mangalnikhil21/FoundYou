<?php if (isset($_POST['form_submitted'])): 
     $name = $_POST['name'];
     $email = $_POST['email'];
     $mobile = $_POST['mobile'];
     $passwd = $_POST['password'];
     $cpasswd = $_POST['cpassword'];
     if ($_POST["password"] === $_POST["cpassword"]) {
          // success!
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


$sql = "INSERT INTO rdata (name, email, mobile, password, cpassword) VALUES ('$name', '$email', '$mobile','$passwd', '$cpasswd')";

if (mysqli_query($conn, $sql)) {
 echo "You have been registered successfully";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
     }
else {
   // failed :(
        echo "passwords do not match";
}
?>
<?php else: ?>
	<?php endif; ?>