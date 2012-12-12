<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require "include.php"; // globals
try{
	 connectdb();
}catch (Exception $e){
    die('Caught exception: ' . $e->getMessage() . "\n");
}
?>

<h1>Auteurs</h1>

<h3>Ajout</h3>

<table>
<form action="author.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td>
     <td> <input type="text" name="nom_auteur"> </td> </tr>
<tr> <td> Prenom </td>
     <td> <input type="text" name="prenom_auteur"> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> </tr>
</form>
</table>

<hr>


<?php
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
		echo "<form action='author.php' method='post'>"
		   . "<table>"
		   . "<tr>"
		   . "<td>Nom</td>"
		   . "<td><input type='text' name='nom_auteur' value=".$r['nom_auteur']."></td>"
		   . "</tr>"
		   . "<tr>"
		   . "<td>Prenom</td>"
		   . "<td><input type='text' name='prenom_auteur' value=".$r['prenom_auteur']."></td>"
		   . "</tr>"
		   . "</table>"
		   . "Cet auteur est "
		   . "<select name='role'>"
		   . "<option value='drawing'>dessinateur</option>"
		   . "<option value='script'>scenariste</option>"
		   . "<option value='both'>les deux</option>"
		   . "</select>"
		   . " pour "
		   . "<select name='no_histoire'>"
		   . "<option value=''>---</option>";
			optionselect("histoire", qw("no_histoire titre"), "");
		echo "</select>"
		   . "<input type='hidden' name='no_auteur' value=".$r['no_auteur'].">"
		   . "<input type='hidden' name='action' value='edit'>"
		   . "<input type='submit' value='Valider'> </form> </td>\n"
		   . "</form>";

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
?>
</table>";

<?php
disconnectdb();
?>

</html>
