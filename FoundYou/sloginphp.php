<?php
session_start();
if (isset($_POST['form_submitted'])): 
$email = $_POST['email'];
$passwd = $_POST['password'];
$server = "localhost";
$username = "root";
$password = "123456";
$dbname = "foundyou";
echo "TRYING TO ESTABLISH CONNECTION<br>";
// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
echo "CONNECTION ESTABLISHED<br>";
echo "Something Went Wrong<br>";

//$query = "SELECT * FROM table1 where fname = '$fullname'";
//SELECT * FROM MyGuests where firstname = 'jyoti ' OR '1'='1'
//jyoti ' OR '1'='1
//$result = mysqli_query($conn, $query);

$sql = "SELECT * FROM studata where email = ? and password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $passwd);
$stmt->execute();
$result = $stmt->get_result();

// fetch associative array 
while($row = $result->fetch_assoc()) {
//while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['username']=$row['name'];
    $_SESSION['semail']=$row['email'];
    header("Location: stufeed.php");
}

mysqli_close($conn);
?>


 <?php else: ?>
	<?php endif; ?>
