<?php

// All the functions here need that a connection to the database have been
// established

// return the result of a mysql query containing the bibliography of the
// author specified by number of author
function getBibliography($no_author){
	$query = "SELECT *
              FROM auteuriser ai, histoire h
			        WHERE ai.no_auteur = " . $no_author .
		" AND ai.no_histoire = h.no_histoire;";
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	
	return $result;
}

// return the result of a mysql query containing the bibliography of the
// author specified by number of author, the datas are ordered by Year
function getBibliographyOrderedByYear($no_author){
	$query = "
SELECT tmp.no_histoire, titre, annee_parution,
			 nom_auteur, prenom_auteur, nom_role
			 FROM auteur a, auteuriser_et_role ai,
			 	 			(SELECT h.no_histoire, h.titre, annee_parution
							 				FROM auteuriser ai, histoire h
			 				 				WHERE ai.no_auteur = " . $no_author .
			 				 				" AND ai.no_histoire = h.no_histoire) tmp
			 WHERE tmp.no_histoire = ai.no_histoire
			 AND ai.no_auteur = a.no_auteur
			 ORDER BY annee_parution;";
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	
	return $result;
}

// return the result of a mysql query containing the bibliography of the
// author specified by number of author, the datas are ordered by serie
function getBibliographyOrderedBySerie($no_author){
	$query = "
SELECT b.no_histoire, titre, annee_parution, nom_auteur, prenom_auteur,
			 nom_role, titre_serie, s.no_serie, no_ds_serie
FROM (SELECT b.no_histoire, titre, annee_parution, nom_auteur, prenom_auteur,
			       nom_role, no_serie, no_ds_serie
        FROM
        	  (SELECT tmp.no_histoire, titre, annee_parution,
        						nom_auteur, prenom_auteur, nom_role
        		  	 FROM auteur a, auteuriser_et_role ai,
        			 	 			(SELECT h.no_histoire, h.titre, annee_parution
        							 				FROM auteuriser ai, histoire h
        			 				 				WHERE ai.no_auteur = " . $no_author . "
        			 				 				AND ai.no_histoire = h.no_histoire) tmp
        			    WHERE tmp.no_histoire = ai.no_histoire
        			    AND ai.no_auteur = a.no_auteur) b
        LEFT OUTER JOIN appartenance_serie a
        ON a.no_histoire = b.no_histoire) b,
      serie s
WHERE s.no_serie = b.no_serie
ORDER BY no_serie, no_ds_serie;";
	
	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	
	return $result;
}

// return the result of a mysql query containing the author working
// on a revue between starting_year and ending_year, the data
// returned also contain the number of volume to which they participated
function getAuthorParticipatingToRevue($title, $starting_year, $ending_year){
	$query = "
SELECT nom_auteur, prenom_auteur, nb_revues
FROM auteur a,
     (SELECT no_auteur, count(*) as nb_revues
     	FROM (SELECT DISTINCT no_auteur, no_revue
             FROM auteuriser a,
                  (SELECT no_histoire, no_revue
                      FROM contenir c,
                           (SELECT v.no_volume, no_revue
                               FROM volume v, revue r
                           		WHERE v.no_volume = r.no_volume
                           		  AND titre = '" . $title . "'
                           			AND annee_edition >= " . $starting_year . "
                           			AND annee_edition <= " . $ending_year . ") r
                  	  WHERE c.no_volume = r.no_volume) h
         		WHERE a.no_histoire = h.no_histoire) t
			GROUP BY no_auteur) t
WHERE t.no_auteur = a.no_auteur;";

	$result = mysql_query($query);	

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	
	return $result;
}

// return the result of a mysql query containing the publication history
// of the story specified by the number of history
function getHistoryOfStory($no_history){
	$query = "
SELECT v.no_volume, titre, annee_edition
  FROM contenir c, volume v
  WHERE c.no_histoire = 1
    AND c.no_volume = v.no_volume
  ORDER BY annee_edition;";

	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	return $result;
}

// return the result of a mysql query containing the different stories
// sharing a title
function getStoriesSharingTitle(){
	$query = "
SELECT h1.no_histoire, h1.titre
  FROM histoire h1, histoire h2
  WHERE h1.no_histoire <> h2.no_histoire
    AND h1.titre = h2.titre
  ORDER BY titre , h1.no_histoire;";

	$result = mysql_query($query);

	if (!$result){
		throw new Exception("Can't connect: " . mysql_error());
	}
	return $result;
}

?>