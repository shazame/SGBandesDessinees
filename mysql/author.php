<html>


<h1>Auteurs</h1>

<?php
require "include.php"; // globals

connectdb();


if ($_POST['action'] == "add") {
	// Adding an author
	$query = "INSERT INTO Auteur (nom_auteur, prenom_auteur) values (";
	$query .= "'" . $_POST['nom_auteur'] . "', ";
	$query .= "'" . $_POST['prenom_auteur'] . "'";
	$query .= ")";

	$rv = mysql_query($query);
	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "delete") {
	// deleting an author
	$query = "DELETE FROM Auteur "
	       . "WHERE no_auteur = " . $_POST['no_auteur'] . ";";

	$rv = mysql_query($query);
	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}

else if ($_POST['action'] == "edit") {
	echo "<h3>Edition</h3>\n";

	// Auteuriser
	if (isset($_POST['role']) && isset($_POST['no_histoire'])) {
		$query = "INSERT INTO Auteuriser values ( "
			   . $_POST['no_auteur'] . ", "
			   . $_POST['no_histoire'] . ", "
			   . "'" . $_POST['role'] . "')";

		$rv = mysql_query($query);
		if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
	}

	// Select author
	$query = "SELECT * FROM Auteur "
		   . "WHERE no_auteur = " . $_POST['no_auteur'];

	$rv = mysql_query($query);
	$r = mysql_fetch_array($rv);

	// Edit form
	echo "<form action='author.php' method='post'>";
	echo $r['nom_auteur'] . " " . $r['prenom_auteur'] . " est "
	     . "<select name='role'>"
	     . "<option value='drawing'>dessinateur</option>"
	     . "<option value='script'>scenariste</option>"
	     . "<option value='both'>les deux</option>"
		 . "</select>"
		 . " pour ";
	echo "<select name='no_histoire'>";
	optionselect("Histoire", array('no_histoire', 'titre'));
	echo "</select>";
	echo "<input type='hidden' name='no_auteur' value=".$r['no_auteur'].">";
	echo "<input type='hidden' name='action' value='edit'>";
	echo "<input type='submit' value='Valider'> </form> </td>\n";
	echo "</form>";

	echo "<hr>";
}

?>


<table border=1 cellpadding=5>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>Prenom</th>
	</tr>

<?php

$query = "SELECT * FROM Auteur";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_auteur'] . "</td>\n";
	echo "<td>" . $r['nom_auteur'] . "</td>\n";
	echo "<td>" . $r['prenom_auteur'] . "</td>\n";
	echo "<td>";
	// edit button
	editbutton('author.php', 'no_auteur', $r['no_auteur']);
	// delete button
	deletebutton('author.php', 'no_auteur', $r['no_auteur']);
	echo "</td>";
	echo "</tr>\n";
}
echo "</table>";

disconnectdb();
?>

</html>
