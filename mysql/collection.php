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

<h1>Collections</h1>

<h3>Ajout</h3>

<form action="collection.php" method="post">
<table>
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_collection"> </td> </tr>

<tr> <td> Editeur : </td>
	 <td> <select name="no_editeur">
	      <option value="-1">Inconnu</option>
	<?php optionselect("editeur", qw("no_editeur nom_editeur"), "Inconnu"); ?>
	</select> 
	</td> </tr>

<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</table>
</form>

<hr>


<?php
function editform () {

	echo "<h3>Edition</h3>\n";
	
	// Select collection
	$query = sprintf("SELECT * FROM collection WHERE no_collection = %d", $_POST['no_collection']);

	$rv = mysql_query($query);
	if (!$rv) { die('Requête invalide : ' . mysql_error()); }
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
	   . "<input type='submit' value='Valider'>\n"
	   . "</form>";

	echo "<hr>";
}


if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {
		addrow('collection',
			qw("nom_collection no_editeur"),
			array(sprintf("'%s'", mysql_real_escape_string($_POST['nom_collection'])),
			      sprintf("%d", $_POST['no_editeur'])));
	}

	else if (isset($_POST['no_collection']) && $_POST['action'] == "delete") {
		deleterow('collection',
			qw('no_collection'), array(sprintf("%d", $_POST['no_collection'])));
	}

	else if (isset($_POST['no_collection']) && $_POST['action'] == "edit") {

		if (isset($_POST['nom_collection'])) {
			updaterow('collection',
				qw('no_collection'), array(sprintf("%d", $_POST['no_collection'])),
				qw("nom_collection"), array(sprintf("'%s'", mysql_real_escape_string($_POST['nom_collection']))));
		}

		if (isset($_POST['no_editeur'])) {
			updaterow('collection',
				qw('no_collection'), array(sprintf("%d", $_POST['no_collection'])),
				qw("no_editeur"), array(sprintf("'%s'", mysql_real_escape_string($_POST['no_editeur']))));
		}

		editform();
	}
}
?>


<table class="mysqlTable" border=1 cellpadding=5>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>Editeur</th>
	</tr>

<?php

$query = "SELECT C.*, E.nom_editeur FROM collection as C "
       . "inner join editeur as E on E.no_editeur = C.no_editeur";

$result = mysql_query($query);
if (!$result) { die('Requête invalide : ' . mysql_error()); }

$i = 0;
while($r = mysql_fetch_array($result)) {
	if ($i%2 == 0) {
		echo "<tr>\n";
	} else {
		echo "<tr class=\"alt\">\n";
	}
	echo "<td>" . $r['no_collection'] . "</td>\n";
	echo "<td>" . $r['nom_collection'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	echo "<td>";
	echo "<table class=\"innerTable\"><tr><td>";
	button('collection.php', array('no_collection' => $r['no_collection']), 'edit', 'Editer');
	echo "</td><td>";
	button('collection.php', array('no_collection' => $r['no_collection']), 'delete', 'Supprimer');
	echo "</td></tr></table>";
	echo "</td>";
	echo "</tr>";
	$i++;
}
?>
</table>

<?php
disconnectdb();
endBody();
?>

</body>
</html>
