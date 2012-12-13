<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<h1>test</h1>
<?php
require "include.php"; // globals
try{
	 connectdb();
}catch (Exception $e){
    die('Caught exception: ' . $e->getMessage() . "\n");
}
?>
<?php

$formular_needed = True;
$no_author_needed = False;

if (isset($_POST['action'])) {
	
	if ($_POST['request'] == "getBibliography"){
		if ($_POST['no_author'] == ''){
			$no_author_needed = True;
		}
		else{
			echo "getBibliography";
			$formular_needed = False;
		}
	}
	
	if ($_POST['request'] == "getBibliographyOrderedByYear"){
		if ($_POST['no_author'] == ''){
			$no_author_needed = True;
		}
		else{
			echo "getBibliographyOrderedByYear";
			$formular_needed = False;
		}
	}


}
if ($formular_needed){
	echo "<form action='test_request.php' method='post'>"
	   . "La requête désirée est :"
	   . "<select name='request'>"
	   . "<option value='getBibliography'>Bibliographie</option>"
	   . "<option value='getBibliographyOrderedByYear'>"
     . "Bibliographie triée par date</option>"
	   . "<option value='both'>les deux</option>"
		 . "</select>";
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
	echo "<input type='hidden' name='action' value='request'>"
		 . "<input type='submit' value='Valider'> </form> </td>\n"
		 . "</form>";
}
?>
</html>