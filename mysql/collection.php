<html>


<h1>Collections</h1>

<?php
require "include.php"; // globals

connectdb();


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
	deletebutton('collection.php', 'no_collection', $r['no_collection']);
}
echo "</table>";

disconnectdb();
?>

</html>
