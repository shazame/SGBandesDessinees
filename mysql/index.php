<html>
<head>
	<title>SGBandeDessinees</title>
</head>

<?php
	require "config.php"; // globals

	$con = mysql_connect($host, $user, $passwd);

	if (!$con) {
		die("Can't connect: " . mysql_error());
	}

	if (!mysql_select_db($dbname, $con)) {
		mysql_close($con);
		die("Can't select db");
	}
?>

<h1>SGBandeDessinees</h1>

<h3>Auteurs</h3>

<form action="author.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="author.php" method="post">
<input type="hidden" name="action" value="add">
<tr>
	<td> Nom: </td>
	<td> <input type="text" name="nom_auteur"> </td>
</tr>
<tr>
	<td> Prenom: </td>
	<td> <input type="text" name="prenom_auteur"> </td>
</tr>
<tr>
	<td> <input type="submit" value="Ajouter"> <td>
<tr>
</form>
</table>


<h3>Editeurs</h3>

<form action="editor.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="editor.php" method="post">
<input type="hidden" name="action" value="add">
<tr>
	<td> Nom : </td>
	<td> <input type="text" name="nom_editeur"> </td>
</tr>
<tr>
	<td> <input type="submit" value="Ajouter"> <td>
<tr>
</form>
</table>


<h3>Collection</h3>

<form action="collection.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="collection.php" method="post">
<input type="hidden" name="action" value="add">
<tr>
	<td> Nom : </td>
	<td> <input type="text" name="nom_collection"> </td>
</tr>
<tr>
	<td> Editeur : </td>
	<td> <select name="no_editeur">
	     <option value="-1">Inconnu</option>
	<?php
		$result = mysql_query("SELECT no_editeur, nom_editeur FROM Editeur");
		while($r = mysql_fetch_array($result)) {
			echo "<option value=" . $r['no_editeur'] . ">"
				. $r['no_editeur'] . " - " . $r['nom_editeur']
				. "</option>";
		}
	?>
	</select> </td>
</tr>
<tr>
	<td> <input type="submit" value="Ajouter"> <td>
<tr>
</form>
</table>


<h3>Albums</h3>

<form action="album.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="album.php" method="post">
<input type="hidden" name="action" value="add">
<tr>
	<td> Titre : </td>
	<td> <input type="text" name="titre"> </td>
</tr>
<tr>
	<td> Annee d'edition : </td>
	<td> <select name="annee_edition">
	<?php
		for ($i = 1900; $i < 2050; $i++) {
			echo "<option value=" . $i . ">" . $i . "</option>";
		}
	?>
	</select> </td>
</tr>
<tr>
	<td> Collection : </td>
	<td> <select name="no_collection">
	     <option value="-1">Aucune</option>
	<?php
		$result = mysql_query("SELECT no_collection, nom_collection FROM Collection");
		while($r = mysql_fetch_array($result)) {
			echo "<option value=" . $r['no_collection'] . ">"
				. $r['no_collection'] . " - " . $r['nom_collection']
				. "</option>\n";
		}
	?>
	</select> </td>
</tr>
<tr>
	<td> Numero dans la collection : </td>
	<td> <select name="no_ds_collection">
	<?php
		for ($i = 0; $i < 1000; $i++) {
			echo "<option value=" . $i . ">" . $i . "</option>";
		}
	?>
	</select> </td>
</tr>
<tr>
	<td> Editeur (si pas de collection) : </td>
	<td> <select name="no_editeur">
	<option value="-1">Inconnu</option>
	<?php
		$result = mysql_query("SELECT no_editeur, nom_editeur FROM Editeur");
		while($r = mysql_fetch_array($result)) {
			echo "<option value=" . $r['no_editeur'] . ">"
				. $r['no_editeur'] . " - " . $r['nom_editeur']
				. "</option>";
		}
	?>
	</select> </td>
</tr>
<tr>
	<td> <input type="submit" value="Ajouter"> <td>
<tr>
</form>
</table>


<h3>Histoires</h3>

<form action="story.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="story.php" method="post">
<input type="hidden" name="action" value="add">
<tr>
	<td> Titre : </td>
	<td> <input type="text" name="titre"> </td>
</tr>
<tr>
	<td> Annee de premiere parution : </td>
	<td> <select name="annee_parution">
	<?php
		for ($i = 1900; $i < 2050; $i++) {
			echo "<option value=" . $i . ">" . $i . "</option>";
		}
	?>
	</select> </td>
</tr>
<tr>
	<td> <input type="submit" value="Ajouter"> <td>
<tr>
</form>
</table>

<?php
	mysql_close($con);
?>
</html>
