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
<a href="index.php">Retour à l'index</a>

<h3>Ajout</h3>

<table>
<form action="collection.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_collection"> </td> </tr>

<tr> <td> Editeur : </td>
	 <td> <select name="no_editeur">
	      <option value="-1">Inconnu</option>
	<?php optionselect("editeur", qw("no_editeur nom_editeur")); ?>
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

	else if (isset($_POST['no_collection']) && $_POST['action'] == "edit") {
		echo "<h3>Edition</h3>";

		if (isset($_POST['nom_collection'])) {
			updaterow('collection',
				'no_collection', $_POST['no_collection'],
				qw("nom_collection"), array("'". $_POST['nom_collection']."'"));
		}

		if (isset($_POST['no_editeur'])) {
			updaterow('collection',
				'no_collection', $_POST['no_collection'],
				qw("no_editeur"), array("'". $_POST['no_editeur']."'"));
		}

		// Select collection
		$query = "SELECT * FROM collection "
			   . "WHERE no_collection = " . $_POST['no_collection'];

		$rv = mysql_query($query);
		if (!$rv) {
			die('Requête invalide : ' . mysql_error());
		}
		$r = mysql_fetch_array($rv);

		// Edit form
		echo "<form action='collection.php' method='post'>"
		   . "<table>"
		   . "<tr>"
		   . "<td>Nom</td>"
		   . "<td><input type='text' name='nom_collection' value='".$r['nom_collection']."'></td>"
		   . "</tr>"
		   . "<tr>"
		   . "<td>Editeur</td>"
		   . "<td><select name='no_editeur'>";
			optionselect("editeur", qw("no_editeur nom_editeur"), $r['no_editeur']);
		echo "</select></td>"
		   . "</tr>"
		   . "</table>"
		   . "<input type='hidden' name='no_collection' value='".$r['no_collection']."'>"
		   . "<input type='hidden' name='action' value='edit'>"
		   . "<input type='submit' value='Valider'> </form> </td>\n"
		   . "</form>";

		echo "<hr>";
	}
}
?>


<table border=1 cellpadding=5>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>Editeur</th>
	</tr>

<?php

$query = "SELECT C.*, E.nom_editeur FROM collection as C "
       . "inner join editeur as E on E.no_editeur = C.no_editeur";

$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_collection'] . "</td>\n";
	echo "<td>" . $r['nom_collection'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	echo "<td>";
	editbutton('collection.php', array('no_collection' => $r['no_collection']));
	deletebutton('collection.php', 'no_collection', $r['no_collection']);
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
