<html>


<h1>Editeurs</h1>

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
	$query = "INSERT INTO Histoire (titre, annee_parution) values (";
	$query .= "'" . $_POST['titre'] . "', ";
	$query .= $_POST['annee_parution'];
	$query .= ")";

	echo $query;
	$rv = mysql_query($query);

	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "delete") {
	$query = "DELETE FROM Histoire "
	       . "WHERE no_histoire = " . $_POST['no_histoire'] . ";";

	echo $query;
	$rv = mysql_query($query);

	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}


$query = "SELECT * FROM Histoire";
$result = mysql_query($query);

mysql_close($con);


echo "<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Titre</th>
	<th>Annee de premiere parution</th>
	</tr>\n";
while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_histoire'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_parution'] . "</td>\n";
	// delete button
	echo "<td> <form action='story.php' method='post'>"
	   . "<input type='hidden' name='action' value='delete'>"
	   . "<input type='hidden' name='no_histoire' value=".$r['no_histoire'].">"
	   . "<input type='submit' value='Supprimer'> </form> </td>\n";
	echo "</tr>\n";
}
echo "</table>";

?>

</html>
