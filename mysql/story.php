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

else if ($_POST['action'] == "edit") {
	echo "<h3>Edition</h3>\n";

	// Auteuriser
	if (isset($_POST['role']) && isset($_POST['no_auteur'])) {
		$query = "INSERT INTO Auteuriser values ( "
			   . $_POST['no_auteur'] . ", "
			   . $_POST['no_histoire'] . ", "
			   . "'" . $_POST['role'] . "')";

		$rv = mysql_query($query);
		if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
	}

	// Select author
	$query = "SELECT * FROM Histoire "
		   . "WHERE no_histoire = " . $_POST['no_histoire'];

	$rv = mysql_query($query);
	$r = mysql_fetch_array($rv);

	// Edit form
	echo "<form action='histoire.php' method='post'>";
	echo "<select name='no_auteur'>";
	optionselect("Auteur", array('no_auteur', 'nom_auteur', 'prenom_auteur'));
	echo "</select>";
	echo " est "
	     . "<select name='role'>"
	     . "<option value='drawing'>dessinateur</option>"
	     . "<option value='script'>scenariste</option>"
	     . "<option value='both'>les deux</option>"
		 . "</select>"
		 . " pour "
	     . $r['titre'];
	echo "<input type='hidden' name='no_histoire' value=".$r['no_histoire'].">";
	echo "<input type='hidden' name='action' value='edit'>";
	echo "<input type='submit' value='Valider'> </form> </td>";
	echo "</form>";

	echo "<hr>";
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
	echo "<td>";
	// delete button
	deletebutton('story.php', 'no_histoire', $r['no_histoire']);
	// edit button
	editbutton('story.php', 'no_histoire', $r['no_histoire']);
	echo "</td>";
}
echo "</table>";

disconnectdb();

?>

</html>
