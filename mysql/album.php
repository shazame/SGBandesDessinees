<html>


<h1>Albums</h1>

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
	$query = "INSERT INTO Volume (titre, annee_edition) values ("
	       . "'" . $_POST['titre'] . "', "
	       . "'" . $_POST['annee_edition'] . "')";

	$rv = mysql_query($query);
	if (!$rv) { die("l'ajout a échoué."); }

	// get last entry id
	$id = mysql_insert_id();

	if ($_POST['no_collection'] > 0) {
		$query = "INSERT INTO Album_avec_collection "
		       . "values ("
			   . $id . ", "
			   . $_POST['no_collection'] . ", "
			   . $_POST['no_ds_collection'] . ")";
	}

	else {
		$query = "INSERT INTO Album_sans_collection "
		       . "values ("
			   . $id . ", "
		       . $_POST['no_editeur'] . ")";
	}

	$rv = mysql_query($query);
}


$query = "SELECT * FROM Volume";
$result = mysql_query($query);

mysql_close($con);


echo "<table border=1>
	<tr>
	<td>Numero</td>
	<td>Titre</td>
	<td>Annee edition</td>
	</tr>\n";
while($row = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $row['no_volume'] . "</td>\n";
	echo "<td>" . $row['titre'] . "</td>\n";
	echo "<td>" . $row['annee_edition'] . "</td>\n";
	echo "</tr>\n";
}
echo "</table>";

?>

</html>
