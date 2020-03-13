<?php 
require_once "koneksi.php";
$indexcontent = "";

$sql = "SELECT * FROM `article` ORDER BY `id` DESC LIMIT 0,5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 $title = $row["title"];
	$content = $row["content"];
	$content = htmlentities($content);
	$content = str_replace(PHP_EOL,"<br>",$content);
	
	$time = $row["time"];
	$indexcontent.= "<div class='news'><h3>$title</h3>
<span class='waktu'>$time</span><br>
$content
</div>
</div>
";
    }
} else {
    $indexcontent = "Tidak ada artikel";
}
$conn->close();

 $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, "http://fivem.krds.tech:30210/players.json");
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 8); //timeout in seconds
    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
  
	
$error="";
$playerlist = "";
    // menampilkan hasil curl
	if (curl_errno($ch)) {
    // this would be your first hint that something went wrong
	$error = curl_error($ch);
	$serverstatus = "OFFLINE";
	$curplayer = "0";
} else {
	$serverstatus = "ONLINE";
	$outputx =  json_decode($output, TRUE);
	$curplayer = count($outputx);
	foreach ($outputx as $value) {
    $playerlist .= $value['name'] . " , ";
	}
	$playerlist = htmlentities( $playerlist); 
}

   curl_close($ch);   
?>
<head>
<!-- TAMPILAN SENGAJA BURIK BIAR SUPPORT INTERNET EXPLORER (TOP GLOBAL BROWSER LAMBAT) -->
<title>KRDSNews</title>
<style>
body {
	padding:5px;
	background : #292929;
	color:#ffffff;
	font-family: "Segoe UI"; #target nya windows
}
h3 {
	color:#bbbbff;
	margin-bottom:0px;
}
.news {
	border-radius:5px;
	background:#494949;
	padding-left:5px;
	padding-right:5px;
}
.bannertext {
	margin-top:1px;
	margin-bottom:1px;
	font-size:20px;
}
.waktu {
	font-size:11px;
	color:#ddddff;
}
.ijo {
	color:#00ff00;
}
.cyan {
	color:#00ffff;
}
.playerlist {
	color:#aaaaaa;
	margin-top:1px;
	font-size:10px;
	margin-bottom:15px;
}
</style>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex nofollow" />
</head>
<body>
<center><img src="banner.png" class="banner">
<p class="bannertext" >Server <b class="cyan" ><?= $serverstatus ?></b> | <b class="ijo"><?= $curplayer?></b>/64 Players</p>
<p class="playerlist"><?= $playerlist?></p>
</center>

<?= $indexcontent ?>



<p>Hanya menampilkan 5 berita terakhir</p>
<hr>
Powered By KRDSNews - https://github.com/ahlamls/KRDSNews




</body>
