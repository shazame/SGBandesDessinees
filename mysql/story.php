<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
require "include.php"; // globals
try{
	 connectdb();
}catch (Exception $e){
    die('Caught exception: ' . $e->getMessage() . "\n");
}
?>

<h1>histoires</h1>

<table>
<form action="story.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre : </td> <td> <input type="text" name="titre"> </td> </tr>

<tr> <td> Annee de premiere parution </td>
	 <td> <select name="annee_parution">
	      <?php optionrange(1900, 2050); ?>
		  </select>
	 </td> </tr>

<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<?php

if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {
		addrow('histoire',
			qw("titre annee_parution"),
			array("'".$_POST['titre']."'", $_POST['annee_parution']));
	}

	else if (isset($_POST['no_histoire']) && $_POST['action'] == "delete") {
		deleterow('histoire', 'no_histoire', $_POST['no_histoire']);
	}

	else if (isset($_POST['no_histoire']) && $_POST['action'] == "edit") {
		echo "<h3>edition</h3>\n";

		// auteuriser
		if (isset($_POST['role']) && isset($_POST['no_auteur']) && $_POST['no_auteur']) {
			addrow('auteuriser',
				qw("no_auteur no_histoire role"),
			array($_POST['no_auteur'], $_POST['no_histoire'], "'".$_POST['role']."'"));
		}

		// Select story
		$query = "SELECT * FROM histoire "
			   . "WHERE no_histoire = " . $_POST['no_histoire'];

		$rv = mysql_query($query);
		$r = mysql_fetch_array($rv);

		// Edit form
		echo "<form action='story.php' method='post'>";
		echo "<select name='no_auteur'>";
		echo "<option value=''>---</option>";
		optionselect("auteur", array('no_auteur', 'nom_auteur', 'prenom_auteur'));
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
}
?>


<table border=1 cellpadding=10>
<tr>
<th>Numero</th>
<th>Titre</th>
<th>Annee de premiere parution</th>
</tr>

<?php
$query = "SELECT * FROM histoire";
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
?>
</table>

<?php
disconnectdb();
?>

</html>
