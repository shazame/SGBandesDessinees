<?php

// All the functions here need that a connection to the database have been
// established

// return an int corresponding to the number of history written by
// the author corresponding to the specified id
function getNbHistoryByAuthor($no_auteur){
	$query = "SELECT count(*) as nb_histoires
              FROM (SELECT DISTINCT no_histoire
                      FROM auteuriser
					            WHERE no_auteur" . $no_auteur . " = 5) t;";
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	$r = mysql_fetch_array($result);
	return $r['nb_histoires'];
}

?>