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

<h1>Consultation</h1>

<?php
require "utils_request.php";
$selected_action = "getBibliography";

$formular_needed = True;
$no_author_needed = False;
$revue_title_needed = False;
$starting_year_needed = False;
$ending_year_needed = False;
$no_history_needed = False;


if (isset($_POST['action'])) {
	
	$selected_action = $_POST['request'];
	
	if ($_POST['request'] == "getBibliography"){
		if ($_POST['no_author'] == ''){
			$no_author_needed = True;
		}
		else{
			try{
				$result = getBibliography($_POST['no_author']);
			}catch (Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			formattable($result);
			$formular_needed = False;
		}
	}
	
	if ($_POST['request'] == "getBibliographyOrderedByYear"){
		if ($_POST['no_author'] == ''){
			$no_author_needed = True;
		}
		else{
			try{
				$result = getBibliographyOrderedByYear($_POST['no_author']);
			}catch (Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			formattable($result);
			$formular_needed = False;
		}
	}
	
	if ($_POST['request'] == "getBibliographyOrderedBySerie"){
		if ($_POST['no_author'] == ''){
			$no_author_needed = True;
		}
		else{
			try{
				$result = getBibliographyOrderedBySerie($_POST['no_author']);
			}catch (Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			formattable($result);
			$formular_needed = False;
		}
	}
	
	if ($_POST['request'] == "getAuthorParticipatingToRevue"){
		if ($_POST['revue_title'] == '' ||
				$_POST['starting_year'] == '' ||
				$_POST['ending_year'] == ''){
			$revue_title_needed = True;
			$starting_year_needed = True;
			$ending_year_needed = True;
		}
		else{
			try{
				$result = getAuthorParticipatingToRevue($_POST['revue_title'],
																								$_POST['starting_year'],
																								$_POST['ending_year']);
			}catch (Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			try{
			formattable($result);
			}catch(Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			$formular_needed = False;
		}
	}
	
	if ($_POST['request'] == "getHistoryOfStory"){
		if ($_POST['no_history'] == ''){
			$no_history_needed = True;
		}
		else{
			try{
				$result = getHistoryOfStory($_POST['no_history']);
			}catch (Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			formattable($result);
			$formular_needed = False;
		}
	}
	
	if ($_POST['request'] == "getStoriesSharingTitle"){
			try{
				$result = getStoriesSharingTitle($_POST['no_history']);
			}catch (Exception $e){
				die('Caught exception: ' . $e->getMessage() . "\n");
			}
			formattable($result);
		$formular_needed = False;
	}


}
if ($formular_needed){
	$actionValues = array("getBibliography",
												"getBibliographyOrderedByYear",
												"getBibliographyOrderedBySerie",
												"getAuthorParticipatingToRevue",
												"getHistoryOfStory",
												"getStoriesSharingTitle");
	$actionDescription = array("Bibliographie",
														 "Bibliographie triée par date avec
                                  collaborateurs",
														 "Bibliographie triée par série avec
                                  collaborateurs",
														 "Auteurs participants à la revue",
														 "Historique d'une histoire",
														 "Histoire différentes portant le même nom");
	$nb_actions = count($actionValues);
	echo "<form action='request.php' method='post'>"
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
	if ($no_history_needed){
			echo " pour "
	       . "<select name='no_history'>"
				 . "<option value=''>---</option>";
			optionselect("histoire", qw("no_histoire titre"), "");
		  echo "</select>";
	}
	else{
		echo "<input type='hidden' name='no_history' value=''>";
	}
	echo "<input type='hidden' name='action' value='request'>"
		 . "<input type='submit' value='Valider'> </form> </td>\n"
		 . "</form>";
}

	endBody();
?>

</body>
</html>
