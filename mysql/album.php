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


<h1>Albums</h1>
<a href="index.php">Retour à l'index</a>


<h3>Ajout</h3>

<table>
<form action="album.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre"> </td> </tr>

<tr> <td> Annee d'edition </td>
	 <td> <select name="annee_edition">
	 <?php optionrange(1900, 2050, 0); ?>
	 </select> </td> </tr>

<tr> <td> collection </td>
	 <td> <select name="no_collection">
	      <option value="-1">Aucune</option>
	 <?php optionselect("collection", qw("no_collection nom_collection"), ""); ?>
	</select> </td> </tr>

<tr> <td> Numero dans la collection </td>
	 <td> <select name="no_ds_collection">
	 <?php optionrange(0, 1000, 0); ?>
	 </select> </td> </tr>

<tr> <td> editeur (si pas de collection) </td>
	 <td> <select name="no_editeur">
	 <option value="">Inconnu</option>
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
			array("'".$_POST['titre']."'", $_POST['annee_edition']));

		// get last entry's id
		$id = mysql_insert_id();

		if ($_POST['no_collection'] > 0) {
			addrow('album_avec_collection',
				qw("no_volume no_collection no_ds_collection"),
				array($id, $_POST['no_collection'], $_POST['no_ds_collection']));
		}

		else {
			if (isset($_POST['no_editeur']) && $_POST['no_editeur']) {
				addrow('album_sans_collection',
					qw("no_volume no_editeur"),
					array($id, $_POST['no_editeur']));
			}

			else {
				addrow('album_sans_collection', qw("no_volume"), array($id));
			}
		}
	}

	else if (isset($_POST['no_volume']) && $_POST['action'] == "delete") {
		deleterow('volume', 'no_volume', $_POST['no_volume']);
	}

	else if (isset($_POST['no_volume']) && isset($_POST['type_album']) && $_POST['action'] == "edit") {
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

		if (isset($_POST['no_collection']) && $_POST['type_album'] == 'album_avec_collection') {
			updaterow('album_avec_collection',
				'no_volume', $_POST['no_volume'],
				qw("no_collection"), array("'". $_POST['no_collection']."'"));
		}

		if (isset($_POST['no_ds_collection']) && $_POST['type_album'] == 'album_avec_collection') {
			updaterow('album_avec_collection',
				'no_volume', $_POST['no_volume'],
				qw("no_ds_collection"), array("'". $_POST['no_ds_collection']."'"));
		}

		if (isset($_POST['no_editeur']) && $_POST['type_album'] == 'album_sans_collection') {
			updaterow('album_sans_collection',
				'no_volume', $_POST['no_volume'],
				qw("no_editeur"), array("'". $_POST['no_editeur']."'"));
		}

		// Select album
		$query = sprintf("SELECT * FROM volume V, %s A WHERE V.no_volume = %d AND A.no_volume = %d",
			   mysql_real_escape_string($_POST['type_album']), $_POST['no_volume'], $_POST['no_volume']);

		$rv = mysql_query($query);
		if (!$rv) { die('Requête invalide : ' . mysql_error()); }
		$r = mysql_fetch_array($rv);

		echo "<form action='album.php' method='post'>"
		   . "<table>"
		   . "<tr>"
		   . "<td>Titre</td>"
		   . "<td><input type='text' name='titre' value='".$r['titre']."'></td>"
		   . "</tr>"
		   . "<tr> <td> Annee d'edition </td>"
		   . "<td> <select name='annee_edition'>";
		optionrange(1900, 2050, $r['annee_edition']);

		if ($_POST['type_album'] == 'album_avec_collection') {
			echo "<tr>"
			   . "<td>Collection</td>"
			   . "<td><select name='no_collection'>";
				optionselect("collection", qw("no_collection nom_collection"), $r['no_collection']);
			echo "</select></td> </tr>";

			echo "<tr> <td> Numero dans la collection </td>"
	 		   . "<td> <select name='no_ds_collection'>";
		 	optionrange(0, 1000, $r['no_ds_collection']);
	 		echo "</select> </td> </tr>";
		}

		else {
			echo "<tr>"
			   . "<td>Editeur</td>"
			   . "<td><select name='no_editeur'>";
				optionselect("editeur", qw("no_editeur nom_editeur"), $r['no_editeur']);
			echo "</select></td> </tr>";
		}


		echo "</table>"
		   . "<input type='hidden' name='type_album' value='".$_POST['type_album']."'>"
		   . "<input type='hidden' name='no_volume' value='".$r['no_volume']."'>"
		   . "<input type='hidden' name='action' value='edit'>"
		   . "<input type='submit' value='Valider'> </form> </td>\n"
		   . "</form>";

		echo "<hr>";
	}
}
?>




<h3>Sans collection</h3>

<table border=1 cellpadding=5>
<tr>
<th>Numero</th>
<th>Titre</th>
<th>Annee edition</th>
<th>Editeur</th>
</tr>

<?php
$query = "SELECT * from albums_et_editeurs";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('album.php', 'no_volume', $r['no_volume']);
	editbutton('album.php', array('no_volume' => $r['no_volume'],
	                              'type_album' => 'album_sans_collection'));
	echo "</td>";
	echo "</tr>";
}
?>
</table>



<h3>Avec collection</h3>

<table border=1 cellpadding=10>
<tr>
<th>Numero</th>
<th>Titre</th>
<th>Annee edition</th>
<th>Collection</th>
</tr>

<?php
$query = "SELECT * from albums_et_collections";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>" . $r['nom_collection'] . " #" . $r['no_ds_collection'] . " </td>\n";
	echo "<td>";
	// delete button
	deletebutton('album.php', 'no_volume', $r['no_volume']);
	editbutton('album.php', array('no_volume' => $r['no_volume'],
	                              'type_album' => 'album_avec_collection'));
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
