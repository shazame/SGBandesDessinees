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

if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {

		addrow('volume',
			qw("titre annee_edition"),
			array(sprintf('%s', mysql_real_escape_string($_POST['titre'])),
			      sprintf('%d', $_POST['annee_edition'])));

		// get last entry's id
		$id = mysql_insert_id();

		addrow('revue',
			qw("no_volume no_revue"),
			array($id, sprintf('%d', $_POST['no_revue'])));

		if ($_POST['no_editeur'] > 0) {
			addrow('edition_des_revues',
				qw("no_volume no_editeur"),
				array($id, sprintf("%d", $_POST['no_editeur'])));
		}
	}

	else if (isset($_POST['no_volume']) && $_POST['action'] == "delete") {
		deleterow('Volume', 'no_volume', sprintf("%d", $_POST['no_volume']));
	}

	else if (isset($_POST['no_volume']) && $_POST['action'] == "edit") {
		echo "<h3>Edition</h3>";

		if (isset($_POST['titre'])) {
			updaterow('volume',
				'no_volume', sprintf("%d", $_POST['no_volume']),
				qw("titre"), array(sprintf("'%s'", mysql_real_escape_string($_POST['titre']))));
		}

		if (isset($_POST['annee_edition'])) {
			updaterow('volume',
				'no_volume', sprintf("%d", $_POST['no_volume']),
				qw("annee_edition"), array(sprintf("%d", $_POST['annee_edition'])));
		}

		if (isset($_POST['no_revue'])) {
			updaterow('revue',
				'no_volume', sprintf("%d", $_POST['no_volume']),
				qw("no_revue"), array(sprintf("%d", $_POST['no_revue'])));
		}

		if (isset($_POST['no_editeur'])) {
			updaterow('revue',
				'no_volume', sprintf("%d", $_POST['no_volume']),
				qw("no_editeur"), array(sprintf("%d", $_POST['no_editeur'])));
		}

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
	editbutton('mag.php', array('no_volume' => $r['no_volume']));
	deletebutton('mag.php', 'no_volume', $r['no_volume']);
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
