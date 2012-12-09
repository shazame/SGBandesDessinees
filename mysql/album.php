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
	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }

	// get last entry's id
	$id = mysql_insert_id();

	if ($_POST['no_collection'] > 0) {
		$query = "INSERT INTO Album_avec_collection "
		       . "values ("
			   . $id . ", "
			   . $_POST['no_collection'] . ", "
			   . $_POST['no_ds_collection'] . ")";
		echo $query;
	}

	else {
		if ($_POST['no_editeur'] > 0) {
			$query = "INSERT INTO Album_sans_collection "
				   . "values ("
				   . $id . ", "
				   . $_POST['no_editeur'] . ")";
		}

		else {
			$query = "INSERT INTO Album_sans_collection (no_volume) "
				   . "values (" . $id . ");";
		}
	}

	$rv = mysql_query($query);
	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "delete") {
	$query = "DELETE FROM Volume "
	       . "WHERE no_volume = " . $_POST['no_volume'] . ";";

	$rv = mysql_query($query);

	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}


echo "<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Titre</th>
	<th>Annee edition</th>
	</tr>\n";

$query = "SELECT * FROM Volume";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	// delete button
	echo "<td> <form action='album.php' method='post'>"
	   . "<input type='hidden' name='action' value='delete'>"
	   . "<input type='hidden' name='no_volume' value=".$r['no_volume'].">"
	   . "<input type='submit' value='Supprimer'> </form> </td>\n";
	echo "</tr>\n";
}
echo "</table>";

mysql_close($con);
?>

</html>
