<html>



<?php
require "include.php"; // globals

connectdb();


if ($_POST['action'] == "add") {

	addrow('Volume',
		array('titre', 'annee_edition'),
		array("'".$_POST['titre']."'", $_POST['annee_edition']));

	// get last entry's id
	$id = mysql_insert_id();

	if ($_POST['no_collection'] > 0) {
		addrow('Album_avec_collection',
			array('no_volume', 'no_collection', 'no_ds_collection'),
			array($id, $_POST['no_collection'], $_POST['no_ds_collection']));
	}

	else {
		if ($_POST['no_editeur'] > 0) {
			addrow('Album_sans_collection',
				array('no_volume', 'no_editeur'),
				array($id, $_POST['no_editeur']));
		}

		else {
			addrow('Album_sans_collection', array('no_volume'), array($id));
		}
	}
}

else if (isset($_POST['no_volume']) && $_POST['action'] == "delete") {
	deleterow('Volume', 'no_volume', $_POST['no_volume']);
}
?>



<h1>Albums</h1>

<h3>Sans collection</h3>

<table border=1 cellpadding=10>
<tr>
<th>Numero</th>
<th>Titre</th>
<th>Annee edition</th>
</tr>

<?php
$query = "SELECT V.* "
	   . "FROM Volume as V inner join Album_sans_collection as A "
	   . "on V.no_volume = A.no_volume";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('album.php', 'no_volume', $r['no_volume']);
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

disconnectdb();
?>



<h3>Avec collection</h3>

<table border=1 cellpadding=10>
<tr>
<th>Numero</th>
<th>Titre</th>
<th>Annee edition</th>
<th>Collection</th>
</tr>

<?php
$query = "SELECT V.*, C.nom_collection, A.no_ds_collection "
	   . "FROM (Volume as V inner join Album_avec_collection as A "
	   . "on V.no_volume = A.no_volume) inner join Collection as C "
	   . "on A.no_collection = C.no_collection";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>" . $r['nom_collection'] . " #" . $r['no_ds_collection'] . " </td>\n";
	echo "<td>";
	// delete button
	deletebutton('album.php', 'no_volume', $r['no_volume']);
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

disconnectdb();
?>

</html>
