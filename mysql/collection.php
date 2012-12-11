<html>


<h1>collections</h1>

<?php
require "include.php"; // globals

connectdb();


if ($_POST['action'] == "add") {
	addrow('collection',
		qw("nom_collection no_editeur"),
		array("'".$_POST['nom_collection']."'", $_POST['no_editeur']));
}

else if (isset($_POST['no_collection']) && $_POST['action'] == "delete") {
	deleterow('collection', 'no_collection', $_POST['no_collection']);
}


echo "<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>editeur</th>
	</tr>\n";

$query = "SELECT * FROM collection";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_collection'] . "</td>\n";
	echo "<td>" . $r['nom_collection'] . "</td>\n";
	echo "<td>" . $r['no_editeur'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('collection.php', 'no_collection', $r['no_collection']);
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

disconnectdb();
?>

</html>
