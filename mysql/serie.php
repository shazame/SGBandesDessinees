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
<a href="index.php">Retour à l'index</a>


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

	else if (isset($_POST['no_serie']) && $_POST['action'] == "edit") {
		echo "<h3>Edition</h3>\n";

		if (isset($_POST['titre_serie'])) {
			updaterow('serie',
				'no_serie', $_POST['no_serie'],
				qw("titre_serie"), array("'". $_POST['titre_serie']."'"));
		}


		// Select serie
		$query = "SELECT * FROM serie "
			   . "WHERE no_serie = " . $_POST['no_serie'];

		$rv = mysql_query($query);
		$r = mysql_fetch_array($rv);

		// Edit form
		echo "<form action='serie.php' method='post'>";
		echo "titre <input type='text' name='titre_serie' value='".$r['titre_serie']."'>";
		echo "<input type='hidden' name='no_serie' value='".$r['no_serie']."'>";
		echo "<input type='hidden' name='action' value='edit'>";
		echo "<input type='submit' value='Valider'> </form> </td>";
		echo "</form>";

		echo "<hr>";
	}
}
?>


<table border=1 cellpadding=5>
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
	editbutton('serie.php', array('no_serie' => $r['no_serie']));
	deletebutton('serie.php', 'no_serie', $r['no_serie']);
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
