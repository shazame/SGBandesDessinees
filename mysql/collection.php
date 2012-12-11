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

<h1>Collections</h1>

<table>
<form action="collection.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_collection"> </td> </tr>

<tr> <td> Editeur : </td>
	 <td> <select name="no_editeur">
	      <option value="-1">Inconnu</option>
	<?php optionselect("editeur", array('no_editeur', 'nom_editeur')); ?>
	</select> 
	</td> </tr>

<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>


<?php

if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {
		addrow('collection',
			qw("nom_collection no_editeur"),
			array("'".$_POST['nom_collection']."'", $_POST['no_editeur']));
	}

	else if (isset($_POST['no_collection']) && $_POST['action'] == "delete") {
		deleterow('collection', 'no_collection', $_POST['no_collection']);
	}
}
?>


<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>editeur</th>
	</tr>

<?php

$query = "SELECT * FROM collection";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_collection'] . "</td>\n";
	echo "<td>" . $r['nom_collection'] . "</td>\n";
	echo "<td>" . $r['no_editeur'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('collection.php', 'no_collection', $r['no_collection']);
	echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
disconnectdb();
?>

</html>
