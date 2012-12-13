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
<a href="index.php">Retour à l'index</a>


<h3>Ajout</h3>

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
			array(sprintf("'%s'", mysql_real_escape_string($_POST['titre'])),
			      sprintf("%d", $_POST['annee_parution'])));

		return;
	}

	else if ($_POST['action'] == "delete") {
		deleterow('histoire',
			qw('no_histoire'), array(sprintf("%d", $_POST['no_histoire'])));

		return;
	}

	else if ($_POST['action'] == "deleteauthors") {
		echo "<h3>Edition</h3>\n";

		if (isset($_POST['no_auteur']) && isset($_POST['no_role'])) {
			deleterow('auteuriser',
				qw('no_histoire no_auteur no_role'),
				array(sprintf("%d", $_POST['no_histoire']),
				      sprintf("%d", $_POST['no_auteur']),
				      sprintf("%d", $_POST['no_role'])));
		}
	}

	else if (isset($_POST['no_histoire']) && $_POST['action'] == "edit") {
		echo "<h3>Edition</h3>\n";

		if (isset($_POST['titre'])) {
			updaterow('histoire',
				qw('no_histoire'), array(sprintf("%d", $_POST['no_histoire'])),
				qw("titre"), array(sprintf("'%s'", mysql_real_escape_string($_POST['titre']))));
		}

		if (isset($_POST['annee_parution'])) {
			updaterow('histoire',
				qw('no_histoire'), array(sprintf("%d", $_POST['no_histoire'])),
				qw("annee_parution"), array(sprintf("%d", $_POST['annee_parution'])));
		}

		// auteuriser
		if (isset($_POST['no_role']) && isset($_POST['no_auteur']) && $_POST['no_auteur']) {
			addrow('auteuriser',
				qw("no_auteur no_histoire no_role"),
				array(sprintf("%d", $_POST['no_auteur']),
				      sprintf("%d", $_POST['no_histoire']),
				      sprintf("'%s'", mysql_real_escape_string($_POST['no_role']."'"))));
		}
	}

	// Select story
	$query = sprintf("SELECT * FROM histoire WHERE no_histoire = %d", $_POST['no_histoire']);

	$rv = mysql_query($query);
	if (!$rv) { die('Requête invalide : ' . mysql_error()); }
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
	   . "<select name='no_role'>";
		optionselect("role", qw("no_role nom_role"), "");
	echo "</select>"
	   . " pour cette histoire." 
	   . "<br/>"
	   . "<input type='submit' value='Valider'> </form> </td>"
	   . "</form>";


	// liste des auteurs
	echo "<h3>Liste des auteurs</h3>";
	echo "<table border=1 cellpadding=5>"
	   . "<tr>"
	   . "<th>Nom</th>"
	   . "<th>Prenom</th>"
	   . "<th>Role</th>"
	   . "</tr>";

	$query = sprintf("SELECT * FROM histoires_et_auteurs WHERE no_histoire = %d", $r['no_histoire']);
	$rv = mysql_query($query);
	if (!$rv) { die(mysql_error()); }

	while($r = mysql_fetch_array($rv)) {
		echo "<tr>\n";
		echo "<td>" . $r['nom_auteur'] . "</td>\n";
		echo "<td>" . $r['prenom_auteur'] . "</td>\n";
		echo "<td>" . $r['nom_role'] . "</td>\n";
		echo "<td>";
		button('story.php',
			array('no_histoire' => $r['no_histoire'],
				  'no_role' => $r['no_role'],
				  'no_auteur' => $r['no_auteur']),
			'deleteauthors',
			'Supprimer');
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

	echo "<hr>";
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
if (!$result) { die('Requête invalide : ' . mysql_error()); }

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_histoire'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_parution'] . "</td>\n";
	echo "<td>";
	button('story.php', array('no_histoire' => $r['no_histoire']), 'edit', 'Editer');
	button('story.php', array('no_histoire' => $r['no_histoire']), 'delete', 'Supprimer');
	echo "</td>";
}
?>
</table>

<?php
disconnectdb();
?>

<a href="index.php">Retour à l'index</a>
</body>
</html>
