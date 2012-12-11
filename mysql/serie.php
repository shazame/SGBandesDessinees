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

<h1>Series</h1>

<h3>Ajout</h3>

<table>
<form action="serie.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre_serie"></td></tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>


<?php

if (isset($_POST['action'])) {

	if (isset($_POST['titre_serie']) && $_POST['action'] == "add") {
		addrow('serie',
			qw("titre_serie"),
			array("'".$_POST['titre_serie']."'"));
	}

	else if (isset($_POST['no_serie']) && $_POST['action'] == "delete") {
		deleterow('serie', 'no_serie', $_POST['no_serie']);
	}
}
?>


<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Titre</th>
	</tr>

<?php

$query = "SELECT * FROM serie";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_serie'] . "</td>\n";
	echo "<td>" . $r['titre_serie'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('serie.php', 'no_serie', $r['no_serie']);
	echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
disconnectdb();
?>

</html>
