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

<h1>Statistiques</h1>

<?php
require "utils_statistics.php";
$selected_action = "getNbHistoryByAuthor";

$formular_needed = True;
$no_author_needed = False;
$revue_title_needed = False;
$starting_year_needed = False;
$ending_year_needed = False;


if (isset($_POST['action'])) {
	
	$selected_action = $_POST['request'];
	
	if ($_POST['request'] == "getNbHistoryByAuthor"){
		if ($_POST['no_author'] == ''){
			$no_author_needed = True;
		}
		else{
			try{
				$result = getNbHistoryByAuthor($_POST['no_author']);
			}catch(Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			echo "L'auteur spécifié a écrit " . $result . " histoire";
			if ($result > 1) { echo "s";}
			echo ".";
			$formular_needed = False;
		}
	}
	
	if ($_POST['request'] == "getSerieWithMostAuthor"){
			try{
				$result = getSerieWithMostAuthor();
			}catch(Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			formattable($result);
		$formular_needed = False;
	}
	
	if ($_POST['request'] == "getHistoryRankedByNbAlbums"){
			try{
				$result = getHistoryRankedByNbAlbums();
			}catch(Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			formattable($result);
		$formular_needed = False;
	}
	
	if ($_POST['request'] == "getAverageAuthor"){
		if ($_POST['revue_title'] == '' ||
				$_POST['starting_year'] == '' ||
				$_POST['ending_year'] == ''){
			$revue_title_needed = True;
			$starting_year_needed = True;
			$ending_year_needed = True;
		}
		else{
			try{
				$result = getAverageAuthor($_POST['revue_title'],
																	 $_POST['starting_year'],
																	 $_POST['ending_year']);
			}catch(Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			echo "La moyenne d'auteur participant à la revue "
				 . $_POST['revue_title']
				 . " de " . $_POST['starting_year']
				 . " à " . $_POST['ending_year']
				 . " est de " . $result . ".";
			$formular_needed = False;
		}
	}


}
if ($formular_needed){
	$actionValues = array("getNbHistoryByAuthor",
												"getSerieWithMostAuthor",
												"getHistoryRankedByNbAlbums",
												"getAverageAuthor");
	$actionDescription = array("Le nombre d'histoire auxquels participe un auteur",
														 "La série comportant le plus d'auteurs",
														 "Les histoires triées par nombre d'albums",
														 "La moyenne d'auteur participant à une revue");
	$nb_actions = count($actionValues);
	echo "<form action='statistics.php' method='post'>"
	   . "La requête désirée est :"
		 . "<select name='request'>";
	for ($i = 0; $i < $nb_actions; $i++){
		echo "<option ";
		if ($actionValues[$i] == $selected_action){
			echo "selected ";
		}
		echo "value='" . $actionValues[$i] . "'>" . $actionDescription[$i]
			 . "</option>";
	}
	echo  "</select>";
	if ($no_author_needed){
			echo " pour "
	       . "<select name='no_author'>"
				 . "<option value=''>---</option>";
			optionselect("auteur", qw("no_auteur nom_auteur prenom_auteur"), "");
		  echo "</select>";
	}
	else{
		echo "<input type='hidden' name='no_author' value=''>";
	}
	if ($revue_title_needed){
			echo " pour "
	       . "<select name='revue_title'>"
				 . "<option value=''>---</option>";
			optionselect("volumes_revues", qw("titre"), "");
		  echo "</select>";
	}
	else{
		echo "<input type='hidden' name='revue_title' value=''>";
	}
	if ($starting_year_needed){
		echo "<select name='starting_year'>";
		optionrange(1900,2050,0);
		echo "</select>";
	}
	else{
		echo "<input type='hidden' name='starting_year' value=''>";
	}
	if ($ending_year_needed){
		echo "<select name='ending_year'>";
		optionrange(1900,2050,0);
		echo "</select>";
	}
	else{
		echo "<input type='hidden' name='ending_year' value=''>";
	}
	echo "<input type='hidden' name='action' value='request'>"
		 . "<input type='submit' value='Valider'> </form> </td>\n"
		 . "</form>";
}

	endBody();
?>

</body>
</html>
