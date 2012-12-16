<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>SGBandeDessinées</title>
	<link rel="stylesheet" type="text/css" href="style.css" />

	<?php
	require "include.php"; // globals
	try{
		connectdb();
	}catch (Exception $e){
		die('Caught exception: ' . $e->getMessage() . "\n");
	}
	?>

</head>

<body>

<?php
	beginBody();
?>

<h1>Histoires</h1>

<h3>Ajout</h3>

<form action="story.php" method="post">
<table>
<input type="hidden" name="action" value="add">
<tr> <td> Titre : </td> <td> <input type="text" name="titre"> </td> </tr>

<tr> <td> Annee de premiere parution </td>
	 <td> <select name="annee_parution">
	      <?php optionrange(1900, 2050, 1900); ?>
		  </select>
	 </td> </tr>

<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</table>
</form>

<hr>

<?php

function editform () {

	echo "<h3>Edition</h3>\n";

	// Select story
	$query = sprintf("SELECT * FROM histoire WHERE no_histoire = %d", $_POST['no_histoire']);

	$rv = mysql_query($query);
	if (!$rv) { die('Requête invalide : ' . mysql_error()); }
	$r = mysql_fetch_array($rv);

	// Edit form
	echo "<form action='story.php' method='post'>";
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
	   . "<input type='hidden' name='action' value='edit'>"
	   . "<input type='hidden' name='no_histoire' value='".$r['no_histoire']."'>"
	   . "<input type='submit' value='Valider'>"
	   . "</form>";

	// Ajout d'un auteur
	echo "<form action='story.php' method='post'>"
	   . "L'auteur "
	   . "<select name='no_auteur'>"
	   . "<option value=''>---</option>";
	optionselect("auteur", qw("no_auteur nom_auteur prenom_auteur"), "");
	echo "</select>"
	   . " est "
	   . "<select name='no_role'>";
		optionselect("role", qw("no_role nom_role"), "");
	echo "</select>"
	   . " pour cette histoire. " 
	   . "<input type='hidden' name='action' value='addauthor'>"
	   . "<input type='hidden' name='no_histoire' value='".$r['no_histoire']."'>"
	   . "<input type='submit' value='Valider'>"
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
			'deleteauthor',
			'Supprimer');
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

	echo "<hr>";
}

if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {
		addrow('histoire',
			qw("titre annee_parution"),
			array(sprintf("'%s'", mysql_real_escape_string($_POST['titre'])),
			      sprintf("%d", $_POST['annee_parution'])));
	}

	else if ($_POST['action'] == "delete") {
		deleterow('histoire',
			qw('no_histoire'), array(sprintf("%d", $_POST['no_histoire'])));
	}

	else if ($_POST['action'] == "deleteauthor") {

		if (isset($_POST['no_auteur']) && isset($_POST['no_role'])) {
			deleterow('auteuriser',
				qw('no_histoire no_auteur no_role'),
				array(sprintf("%d", $_POST['no_histoire']),
				      sprintf("%d", $_POST['no_auteur']),
				      sprintf("%d", $_POST['no_role'])));
		}

		editform();
	}

	else if ($_POST['action'] == "addauthor") {
		if (isset($_POST['no_role']) && isset($_POST['no_auteur']) && $_POST['no_auteur'] && $_POST['no_role']) {
			addrow('auteuriser',
				qw("no_auteur no_histoire no_role"),
				array(sprintf("%d", $_POST['no_auteur']),
				      sprintf("%d", $_POST['no_histoire']),
				      sprintf("%d", $_POST['no_role'])));
		}

		editform();
	}

	else if (isset($_POST['no_histoire']) && $_POST['action'] == "edit") {

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

		editform();
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
endBody();
?>

</body>
</html>
