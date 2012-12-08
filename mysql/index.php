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

<form action="author.php" method="post">
<input type="hidden" name="action" value="add">
Nom:    <input type="text" name="nom_auteur">
Prenom: <input type="text" name="prenom_auteur">
<br />
<input type="submit" value="Ajouter">
</form>


<h3>Editeurs</h3>

<form action="editor.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<form action="editor.php" method="post">
<input type="hidden" name="action" value="add">
Nom : <input type="text" name="nom_editeur">
<br />
<input type="submit" value="Ajouter">
</form>


<h3>Albums</h3>

<form action="album.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<form action="album.php" method="post">
<input type="hidden" name="action" value="add">
Titre : <input type="text" name="titre">
Annee d'edition :
<select name="annee_edition">
<?php
	for ($i = 1900; $i < 2050; $i++) {
		echo "<option value=" . $i . ">" . $i . "</option>";
    }
?>
</select>
<br>
Collection :
<select name="no_collection">
<option value="-1">Aucune</option>
<?php
	$result = mysql_query("SELECT no_volume, nom_collection FROM Volume");
	while($r = mysql_fetch_array($result)) {
		echo "<option value=" . $r['no_volume'] . ">"
			. $r['no_volume'] . " - " . $r['titre']
			. "</option>\n";
    }
?>
</select>
<br />
Editeur (si pas de collection) :
<select name="no_editeur">
<?php
	$result = mysql_query("SELECT no_editeur, nom_editeur FROM Editeur");
	while($r = mysql_fetch_array($result)) {
		echo "<option value=" . $r['no_editeur'] . ">"
			. $r['no_editeur'] . " - " . $r['nom_editeur']
			. "</option>";
    }
?>
</select>
<br />
<input type="submit" value="Ajouter">
</form>


<h3>Histoires</h3>

<form action="story.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<form action="story.php" method="post">
<input type="hidden" name="action" value="add">
Titre : <input type="text" name="titre">
Annee de premiere parution :
<select name="annee_parution">
<?php
	for ($i = 1900; $i < 2050; $i++) {
		echo "<option value=" . $i . ">" . $i . "</option>";
    }
?>
</select>
<br />
<input type="submit" value="Ajouter">
</form>

<?php
	mysql_close($con);
?>
</html>
