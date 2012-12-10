<html>


<h1>Series</h1>

<?php
require "include.php"; // globals

connectdb();


if (isset($_POST['titre_serie']) && $_POST['action'] == "add") {
	addrow('Serie',
		qw("titre_serie"),
		array("'".$_POST['titre_serie']."'"));
}

else if (isset($_POST['no_serie']) && $_POST['action'] == "delete") {
	deleterow('Serie', 'no_serie', $_POST['no_serie']);
}

?>


<table border=1 cellpadding=10>
	<tr>
	<th>Numero</th>
	<th>Titre</th>
	</tr>

<?php

$query = "SELECT * FROM Serie";
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
echo "</table>";

disconnectdb();
?>

</html>
