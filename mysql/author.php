<html>


<h1>Auteurs</h1>

<?php
$con = mysql_connect();

if (!$con) {
	die("Can't connect: " . mysql_error());
}

if (!mysql_select_db("test", $con)) {
	mysql_close($con);
	die("Can't select db");
}


$result = mysql_query("SELECT * FROM Auteur");

while($row = mysql_fetch_array($result)) {
	echo $row['nom_auteur'] . " " . $row['prenom_auteur'];
	echo "<br/>\n";
}

mysql_close($con);
?>

</html>
