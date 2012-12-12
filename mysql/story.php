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

<h1>Histoires</h1>

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

<hr>

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
		echo "<h3>Edition</h3>\n";

		if (isset($_POST['titre'])) {
			updaterow('histoire',
				'no_histoire', $_POST['no_histoire'],
				qw("titre"), array("'". $_POST['titre']."'"));
		}

		if (isset($_POST['annee_parution'])) {
			updaterow('histoire',
				'no_histoire', $_POST['no_histoire'],
				qw("annee_parution"), array($_POST['annee_parution']));
		}

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
		echo "<input type='hidden' name='no_histoire' value='".$r['no_histoire']."'>";
		echo "<input type='hidden' name='action' value='edit'>";
		echo "<table>"
		   . "<tr>"
		   . "<td>Titre</td>"
		   . "<td><input type='text' name='titre' value='".$r['titre']."'></td>"
		   . "</tr>"
		   . "<tr> <td> Annee de parution </td>"
		   . "<td> <select name='annee_parution'>";
		optionrange(1900, 2050, $r['annee_parution']);
		echo "</select> </td> </tr>"
		   . "</table>"
		   . "<select name='no_auteur'>"
		   . "<option value=''>---</option>";
		optionselect("auteur", qw("no_auteur nom_auteur prenom_auteur"), "");
		echo "</select>"
		   . " est "
		   . "<select name='role'>"
		   . "<option value='drawing'>dessinateur</option>"
		   . "<option value='script'>scenariste</option>"
		   . "<option value='both'>les deux</option>"
		   . "</select>"
		   . " pour cette histoire." 
		   . "<br/>"
		   . "<input type='submit' value='Valider'> </form> </td>"
		   . "</form>";

		echo "<hr>";
	}
}
?>


<table border=1 cellpadding=5>
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
	// edit button
	editbutton('story.php', array('no_histoire' => $r['no_histoire']));
	// delete button
	deletebutton('story.php', 'no_histoire', $r['no_histoire']);
	echo "</td>";
}
?>
</table>

<?php
disconnectdb();
?>

</html>
