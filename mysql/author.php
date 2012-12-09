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

	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "delete") {
	$query = "DELETE FROM Auteur "
	       . "WHERE no_auteur = " . $_POST['no_auteur'] . ";";

	$rv = mysql_query($query);

	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}


$query = "SELECT * FROM Auteur";
$result = mysql_query($query);

mysql_close($con);


echo "<table border=1>
	<tr>
	<td>Numero</td>
	<td>Nom</td>
	<td>Prenom</td>
	</tr>\n";
while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_auteur'] . "</td>\n";
	echo "<td>" . $r['nom_auteur'] . "</td>\n";
	echo "<td>" . $r['prenom_auteur'] . "</td>\n";
	// delete button
	echo "<td> <form action='author.php' method='post'>"
	   . "<input type='hidden' name='action' value='delete'>"
	   . "<input type='hidden' name='no_auteur' value=".$r['no_auteur'].">"
	   . "<input type='submit' value='Supprimer'> </td>\n";
 
	echo "</tr>\n";
}
echo "</table>";

?>

</html>
