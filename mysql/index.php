<html>
<head>
	<title>SGBandeDessinees</title>
</head>

<?php
	require "include.php"; // globals
	connectdb();
?>

<body>
<h1>SGBandeDessinees</h1>

<h3>Auteurs</h3>

<form action="author.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="author.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_auteur"> </td> </tr>
<tr> <td> Prenom </td> <td> <input type="text" name="prenom_auteur"> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>


<hr>
<h3>Editeurs</h3>

<form action="editor.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="editor.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_editeur"> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>


<hr>
<h3>Collection</h3>

<form action="collection.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="collection.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Nom </td> <td> <input type="text" name="nom_collection"> </td> </tr>

<tr> <td> Editeur : </td>
	 <td> <select name="no_editeur">
	      <option value="-1">Inconnu</option>
	<?php optionselect("Editeur", array('no_editeur', 'nom_editeur')); ?>
	</select> 
	</td> </tr>

<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>
<h3>Series</h3>

<form action="serie.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="serie.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre_serie"></td></tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>
<h3>Revues</h3>

<form action="mag.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="mag.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre"></td></tr>
<tr> <td> Numero </td>
	 <td> <select name="no_revue">
	 <?php optionrange(0, 1000); ?>
	 </select> </td> </tr>
<tr> <td> Annee d'edition </td>
	 <td> <select name="annee_edition">
	 <?php optionrange(1900, 2050); ?>
	 </select> </td> </tr>
<tr> <td> Editeur </td>
	 <td> <select name="no_editeur">
	 <option value="-1">Inconnu</option>
	 <?php optionselect("Editeur", array('no_editeur', 'nom_editeur')); ?>
	 </select> </td> </tr>
<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<hr>
<h3>Albums</h3>

<form action="album.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="album.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre </td> <td> <input type="text" name="titre"> </td> </tr>

<tr> <td> Annee d'edition </td>
	 <td> <select name="annee_edition">
	 <?php optionrange(1900, 2050); ?>
	 </select> </td> </tr>

<tr> <td> Collection </td>
	 <td> <select name="no_collection">
	      <option value="-1">Aucune</option>
	 <?php optionselect("Collection", array('no_collection', 'nom_collection')); ?>
	</select> </td> </tr>

<tr> <td> Numero dans la collection </td>
	 <td> <select name="no_ds_collection">
	 <?php optionrange(0, 1000); ?>
	 </select> </td> </tr>

<tr> <td> Editeur (si pas de collection) </td>
	 <td> <select name="no_editeur">
	 <option value="-1">Inconnu</option>
	 <?php optionselect("Editeur", array('no_editeur', 'nom_editeur')); ?>
	 </select> </td> </tr>

<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>


<hr>
<h3>Histoires</h3>

<form action="story.php" method="post">
<input type="hidden" name="action" value="list">
<input type="submit" value="Lister">
</form>

<table>
<form action="story.php" method="post">
<input type="hidden" name="action" value="add">
<tr> <td> Titre : </td> <td> <input type="text" name="titre"> </td> </tr>

<tr> <td> Annee de premiere parution </td>
	 <td> <select name="annee_parution">
	      <?php optionrange(1900, 2050); ?>
		  </select>
	 </td> </tr>

<tr> <td> <input type="submit" value="Ajouter"> <td> <tr>
</form>
</table>

<?php disconnectdb(); ?>
</body>
</html>
