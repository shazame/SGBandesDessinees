<html>


<h1>Editeurs</h1>

<?php
require "include.php"; // globals

connectdb();


if ($_POST['action'] == "add") {
	addrow('Editeur',
		qw("nom_editeur"),
		array("'".$_POST['nom_editeur']."'"));
}

else if (isset($_POST['no_editeur']) && $_POST['action'] == "delete") {
	deleterow('Editeur', 'no_editeur', $_POST['no_editeur']);
}

?>

<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Prenom</th>
	</tr>


<?php

$query = "SELECT * FROM Editeur";
$result = mysql_query($query);

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_editeur'] . "</td>\n";
	echo "<td>" . $r['nom_editeur'] . "</td>\n";
	echo "<td>";
	// delete button
	deletebutton('editor.php', 'no_editeur', $r['no_editeur']);
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

disconnectdb();
?>

</html>
