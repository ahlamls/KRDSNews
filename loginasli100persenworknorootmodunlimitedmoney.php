<?php 
require_once "koneksi.php";

session_start();

if (isset($_SESSION['aid'])) {
	header("Location: adminasli100persenworknorootmodunlimitedmoney.php");
	die("udah login");
} else {
	
	
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $conn->real_escape_string($_POST['username']);
	$password_hashed = $conn->real_escape_string(hash('sha512', $_POST['password']));
	$sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password_hashed'";
$result = $conn->query($sql);	

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $_SESSION['aid'] = $row['id'];
	   header("Location: adminasli100persenworknorootmodunlimitedmoney.php");
	   die("udah login");
    }
} else {
    die("Username atau password salah!");
}
$conn->close();
}

?>
<head>
<title>KRDSNews Admin</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="robots" content="noindex nofollow" />
</head>
<body>
<h1>KRDSNews Admin Login . Defacer mandul 7 turunan</h1>
<form method="POST">
 <label for="fname">Username:</label><br>
 <input type="text" required="" name="username"><br>
  <label for="fname">Password:</label><br>
 <input type="password" required="" name="password"><br>
 <button type="submit">Login</button>
 <hr>
 Powered By KRDSNews - https://github.com/ahlamls/KRDSNews
</form>
</body>