<html>


<h1>Auteurs</h1>

<?php
require "config.php"; // globals

$con = mysql_connect($host, $user, $passwd);

if (!$con) {
	die("Can't connect: " . mysql_error());
}

if (!mysql_select_db($dbname, $con)) {
	mysql_close($con);
	die("Can't select db");
}


if ($_POST['action'] == "add") {
	$query = "INSERT INTO Auteur (nom_auteur, prenom_auteur) values (";
	$query .= "'" . $_POST['nom_auteur'] . "', ";
	$query .= "'" . $_POST['prenom_auteur'] . "'";
	$query .= ")";

	$rv = mysql_query($query);

	if (!$rv) {
		echo "l'ajout a échoué.";
	}
}


$query = "SELECT * FROM Auteur";
$result = mysql_query($query);

mysql_close($con);


echo "<table border=1> <tr> <td>Numero</td> <td>Nom</td> <td>Prenom</td> </tr>\n";
while($row = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $row['no_auteur'] . "</td>\n";
	echo "<td>" . $row['nom_auteur']    . "</td>\n";
	echo "<td>" . $row['prenom_auteur'] . "</td>\n";
	echo "</tr>\n";
}
echo "</table>";

?>

</html>
