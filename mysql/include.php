<?php

{

	$con;


	function connectdb() {
		$user = "";
		$passwd = "";
		$bdd = "test";

		ini_set('display_errors',1);
		error_reporting(E_ALL);

		$con = mysql_connect("localhost", $user, $passwd);

		if (!$con) {
		  throw new Exception("Can't connect: " . mysql_error());
			//die("Can't connect: " . mysql_error());
		}

		if (!mysql_set_charset('utf8', $con)) {
			echo "Error : Impossible to define charset.\n";
		}

		if (!mysql_select_db($bdd, $con)) {
			mysql_close($con);
		  throw new Exception("Can't select db");
			//die("Can't select db");
		}
	}

	function disconnectdb() {
		if (isset($con)) {
			mysql_close($con);
		}
	}
}


function qw ($str) {
	// MOUAHAHAH
	return explode(" ", $str);
}


function optionrange($i, $j, $selected) {
	for ($x = $i; $x < $j; $x++) {
		if ($x == $selected) {
			echo "<option selected='selected' value='" . $x . "'>" . $x . "</option>\n";
		} else {
			echo "<option value='" . $x . "'>" . $x . "</option>\n";
		}
	}
}


function optionselect($from, $attr, $selected) {
	// attr is an array containing all attributes to retrieve
	// first attribute must be the key as it will be used for each 
	// option's value
	$query = "SELECT DISTINCT " . $attr[0];
	for ($i = 1; $i < count($attr); ++$i) {
		$query .= ", " . $attr[$i];
	}
	$query .= " FROM " . $from;

	$result = mysql_query($query);
	if (!$result) { die('Requête invalide : ' . mysql_error()); }

	while($r = mysql_fetch_array($result)) {
		if ($r[$attr[0]] == $selected) {
			echo "<option selected='selected' value='" . $r[$attr[0]] . "'>" . $r[$attr[0]];
		} else {
			echo "<option value='" . $r[$attr[0]] . "'>" . $r[$attr[0]];
		}
		for ($i = 1; $i < count($attr); ++$i) {
			echo " - " . $r[$attr[$i]];
		}
		echo "</option>";
	}
}


function button($action, $attrs, $val, $txt) {
	echo "<form action='" . $action . "' method='post'>"
	   . "<input type='hidden' name='action' value='".$val."'>";
	foreach($attrs as $i => $val) {
	   echo "<input type='hidden' name='" . $i . "' value='" . $val . "'>";
	}
	echo "<input type='submit' value='".$txt."'> </form>\n";
}


function addrow($to, $attrs, $vals) {
	$query = "INSERT INTO " . $to . " (" . $attrs[0];
	for ($i = 1; $i < count($attrs); $i++) {
		$query .= ", " . $attrs[$i];
	}
	$query .= ") values (" . $vals[0];
	for ($i = 1; $i < count($attrs); $i++) {
		$query .= ", " . $vals[$i];
	}
	$query .= ")";

	$rv = mysql_query($query);
	if (!$rv) { die("l'ajout a échoué : " . mysql_error()); }
}


function updaterow($from, $keys, $vals, $attrs, $newvals) {
	$query = "UPDATE " . $from . " SET "
	       . $attrs[0] . " = " . $newvals[0];
	for ($i = 1; $i < count($attrs); $i++) {
		$query .= ", " . $attrs[$i] . " = " . $newvals[$i];
	}
	$query .= " WHERE " . $keys[0] . " = " . $vals[0];
	for ($i = 1; $i < count($keys); $i++) {
		$query .= " AND " . $keys[$i] . " = " . $vals[$i];
	}

	$rv = mysql_query($query);
	if (!$rv) { die("la mise à jour a échoué : " . mysql_error()); }
}


function deleterow($from, $keys, $vals) {
	$query = "DELETE FROM " . $from
		. " WHERE " . $keys[0] . " = " . $vals[0];
	for ($i = 1; $i < count($keys); $i++) {
		$query .= " AND " . $keys[$i] . " = " . $vals[$i];
	}

	$rv = mysql_query($query);
	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}


function formattable($resource) {
	echo "<table class=\"mysqlTable\" border=1 >";

	$r = mysql_fetch_assoc($resource);

	if (!$r) { die("Ressource vide " . mysql_error()); }	

	// column titles
	foreach($r as $i => $val) { echo "<th>$i</th>"; }

	$k = 0;
	do {
		if ($k%2 == 0) {
			echo "<tr>\n";
		} else {
			echo "<tr class=\"alt\">\n";
		}
		foreach($r as $i => $val) { echo "<td>$val</td>"; }
		echo "</tr>";
		$k++;
	} while ($r = mysql_fetch_assoc($resource));

	echo "</table>";
}

function beginBody() {
	echo "
		<header>
		<h1 id=\"nav\"><a href=\"index.php\">SGBandeDessinées</a></h1>
		</header>

		<table id=\"bodytotal\">
		<tbody>
		<tr>
		<td id=\"colonne\">
		<dl class=\"menubordure\">
		<dt>Tables</dt>
		<dd> <ul>
		<li><a href=\"author.php\">Auteurs</a></li>
		<li><a href=\"editor.php\">Editeurs</a></li>
		<li><a href=\"collection.php\">Collection</a></li>
		<li><a href=\"serie.php\">Series</a></li>
		<li><a href=\"mag.php\">Revues</a></li>
		<li><a href=\"album.php\">Albums</a></li>
		<li><a href=\"story.php\">Histoires</a></li>
		</ul> </dd>
		</dl>

		<dl class=\"menubordure\">
		<dt>Requêtes</dt>
		<dd> <ul>
		<li><a href=\"request.php\">Consultation</a></li>
		<li><a href=\"statistics.php\">Statistiques</a></li>
		</ul> </dd>
		</dl>
		</td>

		<td id=\"mainbordure\">
		<div id=\"mainframe\">
		";
}

function endBody() {
	echo "
		</div>
		</td>
		</tr>
		</tbody>
		</table>
		";
}

?>
