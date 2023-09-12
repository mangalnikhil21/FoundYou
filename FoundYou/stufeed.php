<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location: stulogin.html");
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
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
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
  text-align: right;
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
          <a href="slogout.php">
            Log Out
          </a>
        </div>
        <div>
      <h1 style="text-align: center;">Jobs Available for you</h1>
      <div class="sb1">
      <div class="dropdown">
              <button class="dropbtn">Filters</button>
                <div class="dropdown-content">
                <div class="dropdown">
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <button class="dropbtn">Sort By</button>
                <div class="dropdown-content">
                                    
                                    <select name="flag">
     <option value="1">Date</option>
     <option value="0">Name</option>
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
  $sql = "SELECT * FROM jobdata order by rname";
  }
else{
$sql = "SELECT * FROM jobdata";
}
}
else{
  $sql = "SELECT * FROM jobdata";
  }

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    ?>
<section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
          <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="recruiter" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://source.unsplash.com/400x400/?<?php
                echo $row["jobpost"];
                ?>">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
              <h2 class="text-sm title-font text-gray-500 tracking-widest">
                <?php
                echo $row["rname"];
                ?>
              </h2>
              <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
              <?php
                echo $row["jobpost"];
                ?>
              </h1>
              <div class="flex mb-4">
                <span class="flex items-center">
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <span class="text-gray-600 ml-3"></span>
                </span>
                <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                  </a>
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                  </a>
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                    </svg>
                  </a>
                </span>
              </div>
              <p class="leading-relaxed"></p>
              <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
              <div class="flex">

                <?php


if (isset($_POST['form_submitted'])){

            
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

$sname=$_SESSION['username'];
$semail=$_SESSION["semail"];
$rname=$row["rname"];
$post=$row["jobpost"];
$myDate = date('Y/m/d');  

$sql = "SELECT * FROM jobapp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $flag=0;
  while($row = mysqli_fetch_assoc($result)){


if($row["semail"]==$semail && $row["post"]==$post){
    echo '<script>alert("Applied Already")</script>';
    echo '<script>alert("Please Login Again")</script>';
    $flag=1;
    ?>
    <script type="text/javascript">location.href = 'stulogin.html';</script>
<?php
    }

  }

if($flag==0){

    $sql = "INSERT INTO jobapp (sname, date, rname, post, semail)
    VALUES ('$sname', '$myDate', '$rname', '$post', '$semail')";
    
    if (mysqli_query($conn, $sql)) {
      echo '<script>alert("Applied Successfully")</script>';
      echo '<script>alert("Please Login Again")</script>';
      ?>
    <script type="text/javascript">location.href = 'stulogin.html';</script>
<?php
    } 
    
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


}

else{

  $sql = "INSERT INTO jobapp (sname, date, rname, post, semail)
  VALUES ('$sname', '$myDate', '$rname', '$post', '$semail')";
  
  if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Applied Successfully")</script>';
    echo '<script>alert("Please Login Again")</script>';
    ?>
    <script type="text/javascript">location.href = 'stulogin.html';</script>
<?php
  } 
  
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  
  }

}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="form_submitted" value="1" />
                <div class="flex">
          <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Apply Now</button>
          <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
            </svg>
          </button>
        </div>
            </div>
          </div>
        </div>
      </section>
</form>
    <?php
  }
}
 else {
  echo "0 results";
}

mysqli_close($conn);
?>
      
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