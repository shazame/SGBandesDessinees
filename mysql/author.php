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

<h1>Auteurs</h1>
<a href="index.php">Retour à l'index</a>

<h3>Ajout</h3>

<table>
<form action="author.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td>
     <td> <input type="text" name="nom_auteur"> </td> </tr>
<tr> <td> Prenom </td>
     <td> <input type="text" name="prenom_auteur"> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> </tr>
</form>
</table>

<hr>


<?php
if (isset($_POST['action'])) {

	if ($_POST['action'] == "add") {
		// Adding an author
		addrow('auteur',
			qw("nom_auteur prenom_auteur"),
			array(sprintf("'%s'", mysql_real_escape_string($_POST['nom_auteur'])), 
			      sprintf("'%s'", mysql_real_escape_string($_POST['prenom_auteur']))));

		return;
	}

	else if (isset($_POST['no_auteur']) && $_POST['action'] == "delete") {
		deleterow('auteur',
			qw('no_auteur'), array(sprintf("%d", $_POST['no_auteur'])));

		return;
	}

	else if (isset($_POST['no_auteur']) && $_POST['action'] == "edit") {
		echo "<h3>Edition</h3>\n";

		if (isset($_POST['nom_auteur'])) {
			updaterow('auteur',
				qw('no_auteur'), array(sprintf("%d", $_POST['no_auteur'])),
				qw("nom_auteur"), array(sprintf("'%s'", mysql_real_escape_string($_POST['nom_auteur']))));
		}

		if (isset($_POST['prenom_auteur'])) {
			updaterow('auteur',
				qw('no_auteur'), array(sprintf("%d", $_POST['no_auteur'])),
				qw("prenom_auteur"), array(sprintf("'%s'", mysql_real_escape_string($_POST['prenom_auteur']))));
		}
	}

	// Select author
	$query = sprintf("SELECT * FROM auteur WHERE no_auteur = %d", $_POST['no_auteur']);

	$rv = mysql_query($query);
	if (!$rv) { die('Requête invalide : ' . mysql_error()); }
	$r = mysql_fetch_array($rv);

	// Edit form
	echo "<form action='author.php' method='post'>"
	   . "<table>"
	   . "<tr>"
	   . "<td>Nom</td>"
	   . "<td><input type='text' name='nom_auteur' value='".$r['nom_auteur']."'></td>"
	   . "</tr>"
	   . "<tr>"
	   . "<td>Prenom</td>"
	   . "<td><input type='text' name='prenom_auteur' value='".$r['prenom_auteur']."'></td>"
	   . "</tr>"
	   . "</table>"
	   . "<input type='hidden' name='no_auteur' value='".$r['no_auteur']."'>"
	   . "<input type='hidden' name='action' value='edit'>"
	   . "<input type='submit' value='Valider'> </form> </td>\n"
	   . "</form>";

	echo "<hr>";
}
?>


<table border=1 cellpadding=5>
	<tr>
	<th>Numero</th>
	<th>Nom</th>
	<th>Prenom</th>
	</tr>

<?php

$query = "SELECT * FROM auteur";

$result = mysql_query($query);
if (!$result) { die('Requête invalide : ' . mysql_error()); }

while($r = mysql_fetch_array($result)) {
	echo "<tr>\n";
	echo "<td>" . $r['no_auteur'] . "</td>\n";
	echo "<td>" . $r['nom_auteur'] . "</td>\n";
	echo "<td>" . $r['prenom_auteur'] . "</td>\n";
	echo "<td>";
	button('author.php', array('no_auteur' => $r['no_auteur']), 'edit', 'Editer');
	button('author.php', array('no_auteur' => $r['no_auteur']), 'delete', 'Supprimer');
	echo "</td>";
	echo "</tr>\n";
}
?>
</table>

<?php
disconnectdb();
?>

<a href="index.php">Retour à l'index</a>
</body>
</html>
