<?php 
require_once "koneksi.php";

session_start();

if (!isset($_SESSION['aid'])) {
	header("Location: loginasli100persenworknorootmodunlimitedmoney.php");
	die("login dulu");
} else {
	
	
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$title = $conn->real_escape_string($_POST['title']);
	$content = $conn->real_escape_string($_POST['content']);
	
	$sql = "INSERT INTO `article` (`id`, `time`, `title`, `content`) VALUES (NULL, NOW(), '$title', '$content');";

if ($conn->query($sql) === TRUE) {
    die("sukses ditambahkan");
} else {
    die("Gagal ditambahkan " . $conn->error);
}
$conn->close();
}

//

?>
<head>
<title>KRDSNews Admin</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="robots" content="noindex nofollow" />
</head>
<body>
<a href="logoutasli100persenworknorootmodunlimitedmoney.php">Logout</a>
<h1>KRDSNews Admin Panel . Add New Article</h1>
<form method="POST">
 <label for="fname">Title:</label><br>
 <input type="text" required="" name="title"><br>
  <label for="fname">Content:</label><br>
 <textarea name="content" required="" rows="24" cols="50"></textarea><br>
 <button type="submit">Post</button>
 <hr>
 Powered By KRDSNews - https://github.com/ahlamls/KRDSNews
</form>
</body>