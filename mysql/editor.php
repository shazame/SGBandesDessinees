<html>


<h1>Editeurs</h1>

<?php
require "include.php"; // globals

connectdb();


if ($_POST['action'] == "add") {
	$query = "INSERT INTO Editeur (nom_editeur) values (";
	$query .= "'" . $_POST['nom_editeur'] . "'";
	$query .= ")";

	$rv = mysql_query($query);

	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "delete") {
	$query = "DELETE FROM Editeur "
	       . "WHERE no_editeur = " . $_POST['no_editeur'] . ";";

	$rv = mysql_query($query);

	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}


$query = "SELECT * FROM Editeur";
$result = mysql_query($query);


echo "<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Prenom</th>
	</tr>\n";
while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_editeur'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	// delete button
	deletebutton('editor.php', 'no_editeur', $r['no_editeur']);
}
echo "</table>";

disconnectdb();
?>

</html>
