<?php

// All the functions here need that a connection to the database have been
// established

// return an int corresponding to the number of history written by
// the author corresponding to the specified id
function getNbHistoryByAuthor($no_auteur){
	$query = "SELECT count(*) as nb_histoires
              FROM (SELECT DISTINCT no_histoire
                      FROM auteuriser
					            WHERE no_auteur = " . $no_auteur . " ) t;";
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	$r = mysql_fetch_array($result);
	return $r['nb_histoires'];
}

// return the result of a mysql query containing the serie with
// most author. If more than one serie have the max number of author,
// more than one entry might be returned
function getSerieWithMostAuthor(){
// 	$query = "SELECT s.*
//             FROM serie s,
//             		 (SELECT no_serie
//                   FROM (SELECT no_serie, count(*) as nb_auteur
//                        	    FROM (SELECT DISTINCT no_auteur, no_serie
//                   				  		 		  FROM auteuriser ai, appartenance_serie a
//                   										WHERE ai.no_histoire = a.no_histoire) t
//                   					GROUP BY no_serie) t,
//                   					-- Cacul du nb_auteur max
//                        (SELECT max(nb_auteur) as nb_auteur_max
//                         FROM (SELECT no_serie, count(*) as nb_auteur
//                                   FROM (SELECT DISTINCT no_auteur, no_serie
//                         				  		 FROM auteuriser ai, appartenance_serie a
//                         							 WHERE ai.no_histoire = a.no_histoire) t
//                         		      GROUP BY no_serie) t) t2
//                   WHERE nb_auteur = nb_auteur_max) t
//             WHERE s.no_serie = t.no_serie;";SELECT no_serie, count(*) as nb_auteur
	$query = "SELECT s.no_serie, titre_serie, nb_auteur
              FROM serie s,
                   (SELECT no_serie, count(*) as nb_auteur
                      FROM (SELECT DISTINCT no_auteur, no_serie
                              FROM auteuriser ai, appartenance_serie a
                              WHERE ai.no_histoire = a.no_histoire) t
                      GROUP BY no_serie
                      ORDER BY count(*) desc
                      LIMIT 1) t
              WHERE s.no_serie = t. no_serie";
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	
	return $result;		
}

// return the result of a mysql_query containing the histories ranked
// by the number of albums in which they appear.
function getHistoryRankedByNbAlbums(){
	$query = "SELECT h.*, nb_albums
            FROM histoire h,
            		 (SELECT no_histoire, count(*) as nb_albums
                  FROM contenir c,
                  		 (SELECT no_volume
                  		  FROM album_sans_collection
                  			UNION
                  			SELECT no_volume
                  			FROM album_avec_collection) v
                  WHERE v.no_volume = c.no_volume
                  GROUP BY no_histoire
                  ORDER BY count(*) desc) t
            WHERE h.no_histoire = t.no_histoire;";
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	
	return $result;		
}

// return a number corresponding to the average of author participating
// to the revue specified by the title, from the starting_year until the
// ending_year
function getAverageAuthor($title,$starting_year, $ending_year){
	$query = "SELECT avg(nb_auteurs) as nb_moyen_auteurs
            FROM (SELECT no_volume, count(*) as nb_auteurs
                  FROM (SELECT DISTINCT no_auteur, c.no_volume
                  	   			FROM auteuriser a,
                  				 			 contenir c,
                  				 			 revue r,
                  				 			 volume v
                  		      WHERE v.titre = '" . $title . "'" .
                  		      " AND v.annee_edition >= " . $starting_year .
                  		      "	AND v.annee_edition <= " . $ending_year .
                  		      " AND r.no_volume = v.no_volume
                  		      	AND c.no_volume = v.no_volume
                  		      	AND c.no_histoire = a.no_histoire) t
                  GROUP BY no_volume) t;";
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	
	$r = mysql_fetch_array($result);
	return $r['nb_moyen_auteurs'];
}

?>