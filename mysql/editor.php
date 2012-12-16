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

<h1>Editeurs</h1>

<h3>Ajout</h3>

<form action="editor.php" method="post">
<table>
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_editeur"> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</table>
</form>

<hr>


<?php
function editform () {

	echo "<h3>Edition</h3>\n";
	
	// Select author
	$query = sprintf("SELECT * FROM editeur WHERE no_editeur = %d", $_POST['no_editeur']);

	$rv = mysql_query($query);
	if (!$rv) { die('Requête invalide : ' . mysql_error()); }
	$r = mysql_fetch_array($rv);

	// Edit form
	echo "<form action='editor.php' method='post'>";
	echo "Nom <input type='text' name='nom_editeur' value='".$r['nom_editeur']."'>";
	echo "<input type='hidden' name='no_editeur' value='".$r['no_editeur']."'>";
	echo "<input type='hidden' name='action' value='edit'>";
	echo "<input type='submit' value='Valider'>";
	echo "</form>";

	echo "<hr>";
}

if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {
		addrow('editeur',
			qw("nom_editeur"),
			array(sprintf("'%s'", mysql_real_escape_string($_POST['nom_editeur']))));
	}

	else if (isset($_POST['no_editeur']) && $_POST['action'] == "delete") {
		deleterow('editeur',
			qw('no_editeur'), array(sprintf("%d", $_POST['no_editeur'])));
	}

	else if (isset($_POST['no_editeur']) && $_POST['action'] == "edit") {

		if (isset($_POST['nom_editeur'])) {
			updaterow('editeur',
				qw('no_editeur'), array(sprintf("%d", $_POST['no_editeur'])),
				qw("nom_editeur"), array(sprintf("'%s'", mysql_real_escape_string($_POST['nom_editeur']))));
		}

		editform();
	}
}
?>

<table border=1 cellpadding=5>
	<tr>
	<th>Numero</th>
	<th>Prenom</th>
	</tr>


<?php

$query = "SELECT * FROM editeur";
$result = mysql_query($query);
if (!$result) { die('Requête invalide : ' . mysql_error()); }

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_editeur'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	echo "<td>";
	button('editor.php', array('no_editeur' => $r['no_editeur']), 'edit', 'Editer');
	button('editor.php', array('no_editeur' => $r['no_editeur']), 'delete', 'Supprimer');
	echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
disconnectdb();
endBody();
?>

</body>
</html>
