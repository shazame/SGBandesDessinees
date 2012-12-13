<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
	<title>SGBandeDessinees</title>
</head>


<body>
<h1>SGBandeDessinees</h1>

<ul>
<li><a href="author.php">Auteurs</a></li>
<li><a href="editor.php">Editeurs</a></li>
<li><a href="collection.php">Collection</a></li>
<li><a href="serie.php">Series</a></li>
<li><a href="mag.php">Revues</a></li>
<li><a href="album.php">Albums</a></li>
<li><a href="story.php">Histoires</a></li>
</ul>

<?php
require "include.php";

connectdb();

$query = "SELECT * FROM auteur";
$r = mysql_query($query);
if (!$r) { die("BEW" . mysql_error()); }

formattable($r);

disconnectdb();
?>

</body>
</html>
