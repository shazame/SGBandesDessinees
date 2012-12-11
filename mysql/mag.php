<html>


<?php
require "include.php"; // globals

connectdb();


if ($_POST['action'] == "add") {

	addrow('Volume',
		qw("titre annee_edition"),
		array("'".$_POST['titre']."'", $_POST['annee_edition']));

	// get last entry's id
	$id = mysql_insert_id();

	addrow('Revue',
		qw("no_volume no_revue"),
		array($id, $_POST['no_revue']));

	if ($_POST['no_editeur'] > 0) {
		addrow('edition_des_revues',
			qw("no_volume no_editeur"),
			array($id, $_POST['no_editeur']));
	}
}

else if (isset($_POST['no_volume']) && $_POST['action'] == "delete") {
	deleterow('Volume', 'no_volume', $_POST['no_volume']);
}
?>



<h1>Revues</h1>

<table border=1 cellpadding=10>
<tr>
<th>Numero volume</th>
<th>Numero revue</th>
<th>Titre</th>
<th>Annee edition</th>
</tr>

<?php
$query = "SELECT V.*, R.no_revue "
	   . "FROM Volume as V inner join Revue as R "
	   . "on V.no_volume = R.no_volume";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['no_revue'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('mag.php', 'no_volume', $r['no_volume']);
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

disconnectdb();
?>
