<html>
<?php

function getHistoryNo($name,$year){
				 $query = "SELECT no_histoire FROM histoire" .
				 					" WHERE titre = \"" . $name . "\"" . 
									" AND annee_parution = " . $year;
				 $result = mysql_query($query);
				 if (!$result) {
    		 		throw new Exception('Requête invalide : ' . mysql_error());
				 }
				 // if the history is already specified, return the number
				 if ($r = mysql_fetch_array($result)){
				    return  $r['no_histoire'];
				 }
				 // if the history isn't contained yet, return false;
				 return FALSE;
}
				 
?>

</html>