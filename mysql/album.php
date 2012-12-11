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

<h3>Ajout</h3>

<table>
<form action="album.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre"> </td> </tr>

<tr> <td> Annee d'edition </td>
	 <td> <select name="annee_edition">
	 <?php optionrange(1900, 2050); ?>
	 </select> </td> </tr>

<tr> <td> collection </td>
	 <td> <select name="no_collection">
	      <option value="-1">Aucune</option>
	 <?php optionselect("collection", array('no_collection', 'nom_collection')); ?>
	</select> </td> </tr>

<tr> <td> Numero dans la collection </td>
	 <td> <select name="no_ds_collection">
	 <?php optionrange(0, 1000); ?>
	 </select> </td> </tr>

<tr> <td> editeur (si pas de collection) </td>
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

		if ($_POST['no_collection'] > 0) {
			addrow('album_avec_collection',
				qw("no_volume no_collection no_ds_collection"),
				array($id, $_POST['no_collection'], $_POST['no_ds_collection']));
		}

		else {
			if ($_POST['no_editeur'] > 0) {
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
}
?>




<h3>Sans collection</h3>

<table border=1 cellpadding=10>
<tr>
<th>Numero</th>
<th>Titre</th>
<th>Annee edition</th>
</tr>

<?php
$query = "SELECT V.* "
	   . "FROM volume as V inner join album_sans_collection as A "
	   . "on V.no_volume = A.no_volume";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_volume'] . "</td>\n";
	echo "<td>" . $r['titre'] . "</td>\n";
	echo "<td>" . $r['annee_edition'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('album.php', 'no_volume', $r['no_volume']);
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
<th>collection</th>
</tr>

<?php
$query = "SELECT V.*, C.nom_collection, A.no_ds_collection "
	   . "FROM (volume as V inner join album_avec_collection as A "
	   . "on V.no_volume = A.no_volume) inner join collection as C "
	   . "on A.no_collection = C.no_collection";

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
	echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
disconnectdb();
?>

</html>
