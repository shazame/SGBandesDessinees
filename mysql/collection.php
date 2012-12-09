<html>


<h1>Collections</h1>

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

	$query = "INSERT INTO Collection (nom_collection, no_editeur) values ("
	       . "'" . $_POST['nom_collection'] . "', "
	       . "'" . $_POST['no_editeur'] . "')";

	$rv = mysql_query($query);
	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "delete") {
	$query = "DELETE FROM Collection "
	       . "WHERE no_collection = " . $_POST['no_collection'] . ";";

	$rv = mysql_query($query);

	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}


echo "<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>Editeur</th>
	</tr>\n";

$query = "SELECT * FROM Collection";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_collection'] . "</td>\n";
	echo "<td>" . $r['nom_collection'] . "</td>\n";
	echo "<td>" . $r['no_editeur'] . "</td>\n";
	// delete button
	echo "<td> <form action='collection.php' method='post'>"
	   . "<input type='hidden' name='action' value='delete'>"
	   . "<input type='hidden' name='no_collection' value=".$r['no_collection'].">"
	   . "<input type='submit' value='Supprimer'> </form> </td>\n";
	echo "</tr>\n";
}
echo "</table>";

mysql_close($con);
?>

</html>
