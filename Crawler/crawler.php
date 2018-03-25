<!DOCTYPE html>
<head>
</head>
<link rel="stylesheet" type="text/css" href="crawler.css">
<html>
<body>

<div id="crawler">
	Crawler
<form action = "crawler.php" method = "GET">
	<input type = "text" value="<?php if(isset($_GET['name'])) echo htmlspecialchars($_GET['name']); ?>"  name = "name"><br>
	<input type = "submit" value = "Crawl!">
</form>


<?php	
// Validate url
if(isset($_GET["name"])){
// Variable to check
	$url = $_GET["name"];
	if (filter_var($url, FILTER_VALIDATE_URL)) {
		//echo("$url is a valid URL");
		$flaga = 1;
	} else {
		echo("'$url' is not a valid URL");
	}
}
//Kończenie diva crawler
echo "</div>";
if(isset($url) && isset($flaga)){
$data=file_get_contents($url);
$data = strip_tags($data,"<a>");
$d = preg_split("/<\/a>/",$data);
	foreach ( $d as $k=>$u ){
		if( strpos($u, "<a href=") !== FALSE ){
			$u = preg_replace("/.*<a\s+href=\"/sm","",$u);
			$u = preg_replace("/\".*/","",$u);
			
			if (strpos($u, 'http') !== false) {
				echo '<div id="link">' .$u.'</div>';
			//echo $u."</br>";
			}
			
		}
	}
}

?>


</body>
</html>
