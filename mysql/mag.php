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
	 <?php optionselect("editeur", array('no_editeur', 'nom_editeur')); ?>
	 </select> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>

<?php

if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {

		addrow('volume',
			qw("titre annee_edition"),
			array("'".$_POST['titre']."'", $_POST['annee_edition']));

		// get last entry's id
		$id = mysql_insert_id();

		addrow('revue',
			qw("no_volume no_revue"),
			array($id, $_POST['no_revue']));

		if ($_POST['no_editeur'] > 0) {
			addrow('edition_des_revues',
				qw("no_volume no_editeur"),
				array($id, $_POST['no_editeur']));
		}
	}

	else if (isset($_POST['no_volume']) && $_POST['action'] == "delete") {
		deleterow('Volume', 'no_volume', $_POST['no_volume']);
	}

	else if (isset($_POST['no_volume']) && $_POST['action'] == "edit") {
		echo "<h3>Edition</h3>";

		if (isset($_POST['titre'])) {
			updaterow('volume',
				'no_volume', $_POST['no_volume'],
				qw("titre"), array("'". $_POST['titre']."'"));
		}

		if (isset($_POST['annee_edition'])) {
			updaterow('volume',
				'no_volume', $_POST['no_volume'],
				qw("annee_edition"), array("'". $_POST['annee_edition']."'"));
		}

		if (isset($_POST['no_revue'])) {
			updaterow('revue',
				'no_volume', $_POST['no_volume'],
				qw("no_revue"), array("'". $_POST['no_revue']."'"));
		}

		if (isset($_POST['no_editeur'])) {
			updaterow('edition_des_revues',
				'no_volume', $_POST['no_volume'],
				qw("no_editeur"), array("'". $_POST['no_editeur']."'"));
		}

		// Select mag
		$query = "SELECT * FROM volume as V, revue as R "
		       . "WHERE V.no_volume = " . $_POST['no_volume'] . " "
		       . "AND R.no_volume = " . $_POST['no_volume'];

		$rv = mysql_query($query);
		if (!$rv) {
			die('Requête invalide : ' . mysql_error());
		}
		$r = mysql_fetch_array($rv);

		// Edit form
		echo "<form action='mag.php' method='post'>"
		   . "<table>"
		   . "<tr>"
		   . "<td>Titre</td>"
		   . "<td><input type='text' name='titre' value=".$r['titre']."></td>"
		   . "</tr>"
		   . "<tr> <td> Annee d'edition </td>"
		   . "<td> <select name='annee_edition'>";
		optionrange(1900, 2050);
		echo "</select> </td> </tr>"
		   . "</tr>"
		   . "<tr> <td>Numero</td>"
		   . "<td> <select name='no_revue'>";
		optionrange(0, 1000);
		echo "</select> </td> </tr>"
		   . "</tr>"
		   . "<tr>"
		   . "<td>Editeur</td>"
		   . "<td><select name='no_editeur'>";
			optionselect("editeur", qw("no_editeur nom_editeur"));
		echo "</select></td>"
		   . "</tr>"
		   . "</table>"
		   . "<input type='hidden' name='no_volume' value=".$r['no_volume'].">"
		   . "<input type='hidden' name='action' value='edit'>"
		   . "<input type='submit' value='Valider'> </form> </td>\n"
		   . "</form>";

		echo "<hr>";
	}

}
?>


<table border=1 cellpadding=5>
<tr>
<th>Numero volume</th>
<th>Numero revue</th>
<th>Titre</th>
<th>Annee edition</th>
</tr>

<?php
$query = "SELECT V.*, R.no_revue "
	   . "FROM volume as V inner join revue as R "
	   . "on V.no_volume = R.no_volume";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['no_revue'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>";
	deletebutton('mag.php', 'no_volume', $r['no_volume']);
	editbutton('mag.php', 'no_volume', $r['no_volume']);
	echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
disconnectdb();
?>

