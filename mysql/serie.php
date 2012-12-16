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

<h1>Series</h1>

<h3>Ajout</h3>

<form action="serie.php" method="post">
<table>
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre_serie"></td></tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</table>
</form>

<hr>


<?php
function editform () {

	echo "<h3>Edition</h3>\n";

	// Select serie
	$query = sprintf("SELECT * FROM serie WHERE no_serie = %d", $_POST['no_serie']);

	$rv = mysql_query($query);
	if (!$rv) { die('Requête invalide : ' . mysql_error()); }
	$r = mysql_fetch_array($rv);

	// Edit form
	echo "<form action='serie.php' method='post'>";
	echo "Titre <input type='text' name='titre_serie' value='".$r['titre_serie']."'>";
	echo "<input type='hidden' name='no_serie' value='".$r['no_serie']."'>";
	echo "<input type='hidden' name='action' value='edit'>";
	echo "<input type='submit' value='Valider'>";
	echo "</form>";

	// Ajout d'une histoire
	echo "<form action='serie.php' method='post'>"
	   . "<select name='no_histoire'>"
	   . "<option value=''>---</option>";
	optionselect("histoire", qw("no_histoire titre"), "");
	echo "</select>"
	   . " numéro de série "
	   . "<select name='no_ds_serie'>";
		optionrange(0, 2000, 0);
	echo "</select>"
	   . " est dans cette serie. "
	   . "<input type='hidden' name='no_serie' value='".$r['no_serie']."'>"
	   . "<input type='hidden' name='action' value='addstory'>"
	   . "<input type='submit' value='Valider'>"
	   . "</form>";

	// liste des histoires
	echo "<h3>Liste des histoires</h3>";
	echo "<table class=\"mysqlTable\" border=1 cellpadding=5>"
	   . "<tr>"
	   . "<th>No dans la serie</th>"
	   . "<th>Titre</th>"
	   . "</tr>";

	$query = sprintf("SELECT * FROM histoires_et_series WHERE no_serie = %d", $r['no_serie']);
	$rv = mysql_query($query);
	if (!$rv) { die("Requête invalide " . mysql_error()); }

	$i = 0;
	while($r = mysql_fetch_array($rv)) {
		if ($i%2 == 0) {
			echo "<tr>\n";
		} else {
			echo "<tr class=\"alt\">\n";
		}
		echo "<td>" . $r['no_ds_serie'] . "</td>\n";
		echo "<td>" . $r['titre'] . "</td>\n";
		echo "<td>";
		button('serie.php',
			array('no_histoire' => $r['no_histoire'],
				  'no_serie' => $r['no_serie']),
			'deletestory',
			'Supprimer');
		echo "</td>";
		echo "</tr>";
		$i++;
	}
	echo "</table>";

	echo "<hr>";

}	

if (isset($_POST['action'])) {

	if (isset($_POST['titre_serie']) && $_POST['action'] == "add") {
		addrow('serie',
			qw("titre_serie"),
			array(sprintf("'%s'", mysql_real_escape_string($_POST['titre_serie']))));
	}

	else if (isset($_POST['no_serie']) && $_POST['action'] == "delete") {
		deleterow('serie',
			qw('no_serie'), array(sprintf("%d", $_POST['no_serie'])));
	}

	else if ($_POST['action'] == "deletestory") {

		if (isset($_POST['no_histoire'])) {
			deleterow('appartenance_serie',
				qw('no_histoire no_serie'),
				array(sprintf("%d", $_POST['no_histoire']),
				      sprintf("%d", $_POST['no_serie'])));
		}

		editform();
	}

	else if ($_POST['action'] == "addstory") {
		if (isset($_POST['no_histoire']) && $_POST['no_histoire'] && isset($_POST['no_ds_serie'])) {
			addrow('appartenance_serie',
				qw("no_serie no_histoire no_ds_serie"),
				array(sprintf("%d", $_POST['no_serie']),
				      sprintf("%d", $_POST['no_histoire']),
				      sprintf("%d", $_POST['no_ds_serie'])));
		}

		editform();
	}

	else if (isset($_POST['no_serie']) && $_POST['action'] == "edit") {

		if (isset($_POST['titre_serie'])) {
			updaterow('serie',
				qw('no_serie'), array(sprintf("%d", $_POST['no_serie'])),
				qw("titre_serie"), array(sprintf("'%s'", mysql_real_escape_string($_POST['titre_serie']))));
		}

		editform();
	}

}
?>


<table class="mysqlTable" border=1 cellpadding=5>
	<tr>
	<th>Numero</th>
	<th>Titre</th>
	</tr>

<?php

$query = "SELECT * FROM serie";
$result = mysql_query($query);

$i = 0;
while($r = mysql_fetch_array($result)) {
	if ($i%2 == 0) {
		echo "<tr>\n";
	} else {
		echo "<tr class=\"alt\">\n";
	}
	echo "<td>" . $r['no_serie'] . "</td>\n";
	echo "<td>" . $r['titre_serie'] . "</td>\n";
	echo "<td>";
	button('serie.php', array('no_serie' => $r['no_serie']), 'edit', 'Editer');
	button('serie.php', array('no_serie' => $r['no_serie']), 'delete', 'Supprimer');
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
