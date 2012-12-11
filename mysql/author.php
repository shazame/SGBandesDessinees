<html>


<h1>auteurs</h1>

<?php
require "include.php"; // globals
try{
	 connectdb();
}catch (Exception $e){
    die('Caught exception: ' . $e->getMessage() . "\n");
}

if (isset($_POST['action'])) {
	if ($_POST['action'] == "add") {
		// Adding an author
		addrow('auteur',
			qw("nom_auteur prenom_auteur"),
			array("'".$_POST['nom_auteur']."'", "'".$_POST['prenom_auteur']."'"));
	}

	else if (isset($_POST['no_auteur']) && $_POST['action'] == "delete") {
		deleterow('auteur', 'no_auteur', $_POST['no_auteur']);
	}

	else if (isset($_POST['no_auteur']) && $_POST['action'] == "edit") {
		echo "<h3>edition</h3>\n";

		// auteuriser
		if (isset($_POST['role']) && isset($_POST['no_histoire']) && $_POST['no_histoire']) {
			addrow('auteuriser',
				qw("no_auteur no_histoire role"),
				array($_POST['no_auteur'], $_POST['no_histoire'], "'".$_POST['role']."'"));
		}

		if (isset($_POST['nom_auteur'])) {
			updaterow('auteur',
				'no_auteur', $_POST['no_auteur'],
				qw("nom_auteur"), array("'". $_POST['nom_auteur']."'"));
		}

		if (isset($_POST['prenom_auteur'])) {
			updaterow('auteur',
				'no_auteur', $_POST['no_auteur'],
				qw("prenom_auteur"), array("'". $_POST['prenom_auteur']."'"));
		}

		// Select author
		$query = "SELECT * FROM auteur "
			   . "WHERE no_auteur = " . $_POST['no_auteur'];

		$rv = mysql_query($query);
		if (!$rv) {
			die('Requête invalide : ' . mysql_error());
		}
		$r = mysql_fetch_array($rv);

		// Edit form
		echo "<form action='author.php' method='post'>";
		echo "<table>";
		echo "<tr>";
		echo "<td>Nom</td>"
		   . "<td><input type='text' name='nom_auteur' value=".$r['nom_auteur']."></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Prenom</td>"
		   . "<td><input type='text' name='prenom_auteur' value=".$r['prenom_auteur']."></td>";
		echo "</tr>";
		echo "</table>";
		echo "Cet auteur est "
			 . "<select name='role'>"
			 . "<option value='drawing'>dessinateur</option>"
			 . "<option value='script'>scenariste</option>"
			 . "<option value='both'>les deux</option>"
			 . "</select>"
			 . " pour ";
		echo "<select name='no_histoire'>";
		echo "<option value=''>---</option>";
		optionselect("histoire", array('no_histoire', 'titre'));
		echo "</select>";
		echo "<input type='hidden' name='no_auteur' value=".$r['no_auteur'].">";
		echo "<input type='hidden' name='action' value='edit'>";
		echo "<input type='submit' value='Valider'> </form> </td>\n";
		echo "</form>";

		echo "<hr>";
	}
}
?>


<table border=1 cellpadding=5>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>Prenom</th>
	</tr>

<?php

$query = "SELECT * FROM auteur";
$result = mysql_query($query);
if (!$result) {
    die('Requête invalide : ' . mysql_error());
}

echo $result . "\n";

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

mysql_free_result($result);

disconnectdb();
?>

</html>
