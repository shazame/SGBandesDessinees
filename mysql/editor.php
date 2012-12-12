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

<h1>Editeurs</h1>

<h3>Ajout</h3>

<table>
<form action="editor.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_editeur"> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>


<?php

if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {
		addrow('editeur',
			qw("nom_editeur"),
			array("'".$_POST['nom_editeur']."'"));
	}

	else if (isset($_POST['no_editeur']) && $_POST['action'] == "delete") {
		deleterow('editeur', 'no_editeur', $_POST['no_editeur']);
	}

	else if (isset($_POST['no_editeur']) && $_POST['action'] == "edit") {
		echo "<h3>Edition</h3>\n";

		if (isset($_POST['nom_editeur'])) {
			updaterow('editeur',
				'no_editeur', $_POST['no_editeur'],
				qw("nom_editeur"), array("'". $_POST['nom_editeur']."'"));
		}

		// Select author
		$query = "SELECT * FROM editeur "
			   . "WHERE no_editeur = " . $_POST['no_editeur'];

		$rv = mysql_query($query);
		$r = mysql_fetch_array($rv);

		// Edit form
		echo "<form action='editor.php' method='post'>";
		echo "Nom <input type='text' name='nom_editeur' value='".$r['nom_editeur']."'>";
		echo "<input type='hidden' name='no_editeur' value='".$r['no_editeur']."'>";
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
	<th>Prenom</th>
	</tr>


<?php

$query = "SELECT * FROM editeur";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_editeur'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	echo "<td>";
	// edit button
	editbutton('editor.php', array('no_editeur' => $r['no_editeur']));
	// delete button
	deletebutton('editor.php', 'no_editeur', $r['no_editeur']);
	echo "</td>";
	echo "</tr>";
}
?>
</table>

<?php
disconnectdb();
?>

</html>
