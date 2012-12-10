<html>


<h1>Histoires</h1>

<?php
require "include.php"; // globals

connectdb();


if ($_POST['action'] == "add") {
	$query = "INSERT INTO Histoire (titre, annee_parution) values (";
	$query .= "'" . $_POST['titre'] . "', ";
	$query .= $_POST['annee_parution'];
	$query .= ")";

	$rv = mysql_query($query);
	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "delete") {
	$query = "DELETE FROM Histoire "
	       . "WHERE no_histoire = " . $_POST['no_histoire'] . ";";

	$rv = mysql_query($query);
	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}

?>


<table border=1 cellpadding=10>
<tr>
<th>Numero</th>
<th>Titre</th>
<th>Annee de premiere parution</th>
</tr>

<?php
$query = "SELECT * FROM Histoire";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_histoire'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_parution'] . "</td>\n";
	// delete button
	echo "<td>";
	deletebutton('story.php', 'no_histoire', $r['no_histoire']);
	echo "</td>";
}
echo "</table>";

disconnectdb();

?>

</html>
