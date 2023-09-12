<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location: rlogin.html");
}
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .dropbtn {
      padding: 16px;
      font-size: 16px;
      border: none;
      justify-content: center;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
      justify-content: center;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #ddd;}
    
    .dropdown:hover .dropdown-content {display: block;}

    .logo {
  border-radius: 50%;
}
.php{
    text-align: center;
  }
  .lo{
  justify-content: center;
  padding-left: 1350px;
}
.sb1{
      padding-left: 1300px;
    }
    </style>
</head>
<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <div class="logo">
              <img src="fylogo.png" alt="Avatar" height="50" width="50">
            </div>
            <span class="ml-3 text-xl">FoundYou</span>
          </a>
          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="index.html">Home</a>
            <div class="dropdown">
              <button class="dropbtn">SignUp</button>
              <div class="dropdown-content">
                <a href="stusignup.html">Student</a>
                <a href="rsignup.html">Recruiter</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">LogIn</button>
              <div class="dropdown-content">
                <a href="stulogin.html">Student</a>
                <a href="rlogin.html">Recruiter</a>
              </div>
            </div>
            <a class="mr-5 hover:text-gray-900" href="about.html">AboutUs</a>
          </nav>
        </div>
      </header>
      <div class="php">
        Welcome
      <?php
      echo $_SESSION['username'];
      ?>
      </div>
      <div class="lo">
          <a href="rlogout.php">
            Log Out
          </a>
        </div>
      <div>
      <div class="text-center">
        <a href="jobdisform.html">Application Recieved</a>
      </div>
      <div class="sb1">
      <div class="dropdown">
              <button class="dropbtn">Filters</button>
                <div class="dropdown-content">
                <div class="dropdown">
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <button class="dropbtn">Sort By</button>
                <div class="dropdown-content">
                                    
                                    <select name="flag">
     <option value="0">Name</option>
     <option value="1">Date</option>
   </select>
   <br>
   <button type=submit>Apply</button>
                                    </form>
                </div>
                </div>
              </div>
            </div>
  </div>
            <?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "foundyou";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if($_REQUEST['flag']==0){
  $sql = "SELECT * FROM jobapp order by sname";
  }
else{
$sql = "SELECT * FROM jobapp";
}
}
else{
  $sql = "SELECT * FROM jobapp";
  }

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    if($_SESSION['username']==$row["rname"]){
    ?>
      <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
          <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
              <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                <span class="font-semibold title-font text-gray-700">
                  <?php
                  echo $row["sname"];
                  ?>
                </span>
                <span class="mt-1 text-gray-500 text-sm">
                  <?php
                  echo $row["date"];
                  ?>
                  </span>
                </div>
              <div class="md:flex-grow">
                <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">For the post of 
                  <?php
                  echo $row["post"];
                  ?>
                </h2>
                <p class="leading-relaxed"></p>
                <a  href="candidate.php" class="text-indigo-500 inline-flex items-center mt-4">See More
                  <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
      </section>
    <?php
  }
}
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
      <div class="text-center">
        <a href="jobdisform.php">Post Job</a>
      </div>
      <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
          <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <div class="logo">
              <img src="fylogo.png" alt="Avatar" height="50" width="50">
            </div>
            <span class="ml-3 text-xl">FoundYou</span>
          </a>
          <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2022 FoundYou —
            <a href="https://twitter.com/mangalnikhil21" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@mangalnikhil21</a>
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
      </footer>
</body>
</html>