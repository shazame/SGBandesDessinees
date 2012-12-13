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

<h1>Revues</h1>
<a href="index.php">Retour à l'index</a>


<h3>Ajout</h3>

<table>
<form action="mag.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre"></td></tr>
<tr> <td> Numero </td>
	 <td> <select name="no_revue">
	 <?php optionrange(0, 1000); ?>
	 </select> </td> </tr>
<tr> <td> Annee d'edition </td>
	 <td> <select name="annee_edition">
	 <?php optionrange(1900, 2050); ?>
	 </select> </td> </tr>
<tr> <td> editeur </td>
	 <td> <select name="no_editeur">
	 <option value="-1">Inconnu</option>
	 <?php optionselect("editeur", qw("no_editeur nom_editeur"), ""); ?>
	 </select> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>

<?php

function editform () {

	echo "<h3>Edition</h3>\n";

	// Select mag
	$query = sprintf (
			 "SELECT * FROM volume as V, revue as R "
		   . "WHERE V.no_volume = %d "
		   . "AND R.no_volume = %d",
		   $_POST['no_volume'], $_POST['no_volume']);

	$rv = mysql_query($query);
	if (!$rv) { die('Requête invalide : ' . mysql_error()); }
	$r = mysql_fetch_array($rv);

	// Edit form
	echo "<form action='mag.php' method='post'>"
	   . "<table>"
	   . "<tr>"
	   . "<td>Titre</td>"
	   . "<td><input type='text' name='titre' value='".$r['titre']."'></td>"
	   . "</tr>"
	   . "<tr> <td> Annee d'edition </td>"
	   . "<td> <select name='annee_edition'>";
	optionrange(1900, 2050, $r['annee_edition']);
	echo "</select> </td> </tr>"
	   . "<tr> <td>Numero</td>"
	   . "<td> <select name='no_revue'>";
	optionrange(0, 1000, $r['no_revue']);
	echo "</select> </td> </tr>"
	   . "</tr>"
	   . "<tr>"
	   . "<td>Editeur</td>"
	   . "<td><select name='no_editeur'>";
		optionselect("editeur", qw("no_editeur nom_editeur"), $r['no_editeur']);
	echo "</select></td>"
	   . "</tr>"
	   . "</table>"
	   . "<input type='hidden' name='no_volume' value='".$r['no_volume']."'>"
	   . "<input type='hidden' name='action' value='edit'>"
	   . "<input type='submit' value='Valider'> </form> </td>\n"
	   . "</form>";

	// Ajout d'une histoire
	echo "<form action='mag.php' method='post'>"
	   . "<select name='no_histoire'>"
	   . "<option value=''>---</option>";
	optionselect("histoire", qw("no_histoire titre"), "");
	echo "</select>"
	   . " est dans ce volume. "
	   . "<input type='hidden' name='no_volume' value='".$r['no_volume']."'>"
	   . "<input type='hidden' name='type_album' value='".$_POST['type_album']."'>"
	   . "<input type='hidden' name='action' value='addstory'>"
	   . "<input type='submit' value='Valider'>"
	   . "</form>";

	// liste des histoires
	echo "<h3>Liste des histoires</h3>";
	echo "<table border=1 cellpadding=5>"
	   . "<tr>"
	   . "<th>Titre</th>"
	   . "</tr>";

	$query = sprintf("SELECT * FROM volumes_et_histoires WHERE no_volume = %d", $r['no_volume']);
	$rv = mysql_query($query);
	if (!$rv) { die("Requête invalide " . mysql_error()); }

	while($r = mysql_fetch_array($rv)) {
		echo "<tr>\n";
		echo "<td>" . $r['titre'] . "</td>\n";
		echo "<td>";
		button('mag.php',
			array('no_histoire' => $r['no_histoire'],
				  'no_volume' => $r['no_volume']),
			'deletestory',
			'Supprimer');
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

	echo "<hr>";
}


if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {

		addrow('volume',
			qw("titre annee_edition"),
			array(sprintf("'%s'", mysql_real_escape_string($_POST['titre'])),
			      sprintf('%d', $_POST['annee_edition'])));

		// get last entry's id
		$id = mysql_insert_id();

		addrow('revue',
			qw("no_volume no_revue no_editeur"),
			array($id, sprintf('%d', $_POST['no_revue']), sprintf("%d", $_POST['no_editeur'])));
	}


	else if ($_POST['action'] == "deletestory") {

		if (isset($_POST['no_histoire'])) {
			deleterow('contenir',
				qw('no_histoire no_volume'),
				array(sprintf("%d", $_POST['no_histoire']),
				      sprintf("%d", $_POST['no_volume'])));
		}

		editform();
	}

	else if ($_POST['action'] == "addstory") {
		if (isset($_POST['no_histoire']) && $_POST['no_histoire']) {
			addrow('contenir',
				qw("no_volume no_histoire"),
				array(sprintf("%d", $_POST['no_volume']),
				      sprintf("%d", $_POST['no_histoire'])));
		}

		editform();
	}

	else if (isset($_POST['no_volume']) && $_POST['action'] == "delete") {
		deleterow('volume',
			qw('no_volume'), array(sprintf("%d", $_POST['no_volume'])));
	}

	else if (isset($_POST['no_volume']) && $_POST['action'] == "edit") {

		if (isset($_POST['titre'])) {
			updaterow('volume',
				qw('no_volume'), array(sprintf("%d", $_POST['no_volume'])),
				qw("titre"), array(sprintf("'%s'", mysql_real_escape_string($_POST['titre']))));
		}

		if (isset($_POST['annee_edition'])) {
			updaterow('volume',
				qw('no_volume'), array(sprintf("%d", $_POST['no_volume'])),
				qw("annee_edition"), array(sprintf("%d", $_POST['annee_edition'])));
		}

		if (isset($_POST['no_revue'])) {
			updaterow('revue',
				qw('no_volume'), array(sprintf("%d", $_POST['no_volume'])),
				qw("no_revue"), array(sprintf("%d", $_POST['no_revue'])));
		}

		if (isset($_POST['no_editeur'])) {
			updaterow('revue',
				qw('no_volume'), array(sprintf("%d", $_POST['no_volume'])),
				qw("no_editeur"), array(sprintf("%d", $_POST['no_editeur'])));
		}

		editform();
	}

}
?>


<table border=1 cellpadding=5>
<tr>
<th>Numero volume</th>
<th>Numero revue</th>
<th>Titre</th>
<th>Annee edition</th>
<th>Editeur</th>
</tr>

<?php
$query = "SELECT V.*, R.no_revue, E.nom_editeur "
	. "FROM (volume as V inner join revue as R on V.no_volume = R.no_volume) "
	. "inner join editeur E on E.no_editeur = R.no_editeur";

$result = mysql_query($query);
if (!$result) { die('Requête invalide : ' . mysql_error()); }

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['no_revue'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	echo "<td>";
	button('mag.php', array('no_volume' => $r['no_volume']), 'edit', 'Editer');
	button('mag.php', array('no_volume' => $r['no_volume']), 'delete', 'Supprimer');
	echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
disconnectdb();
?>

<a href="index.php">Retour à l'index</a>
</body>
</html>
