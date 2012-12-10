<?php

{
	$con;
	$user;
	$host;
	$passwd;

	function connectdb() {
		$con = mysql_connect($host, $user, $passwd);

		if (!$con) {
			die("Can't connect: " . mysql_error());
		}

		if (!mysql_select_db("test", $con)) {
			mysql_close($con);
			die("Can't select db");
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


function optionrange($i, $j) {
	for ($x = $i; $x < $j; $x++) {
		echo "<option value=" . $x . ">" . $x . "</option>\n";
	}
}


function optionselect($from, $attr) {
	// attr is an array containing all attributes to retrieve
	// first attribute must be the key as it will be used for each 
	// option's value
	$query = "SELECT " . $attr[0];
	for ($i = 1; $i < count($attr); ++$i) {
		$query .= ", " . $attr[$i];
	}
	$query .= " FROM " . $from;

	$result = mysql_query($query);

	while($r = mysql_fetch_array($result)) {
		echo "<option value=" . $r[$attr[0]] . ">" . $r[$attr[0]];
		for ($i = 1; $i < count($attr); ++$i) {
			echo " - " . $r[$attr[$i]];
		}
		echo "</option>";
	}
}


function editbutton($action, $key, $val) {
	echo "<form action='" . $action . "' method='post'>"
	   . "<input type='hidden' name='action' value='edit'>"
	   . "<input type='hidden' name='" . $key . "' value=" . $val . ">"
	   . "<input type='submit' value='Editer'> </form>\n";
}

function deletebutton($action, $key, $val) {
	echo "<form action='" . $action . "' method='post'>"
	   . "<input type='hidden' name='action' value='delete'>"
	   . "<input type='hidden' name='" . $key . "' value=" . $val . ">"
	   . "<input type='submit' value='Supprimer'> </form>\n";
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


function deleterow($from, $key, $value) {
	$query = "DELETE FROM " . $from
	       . " WHERE " . $key . " = " . $value;

	$rv = mysql_query($query);
	if (!$rv) { die("la suppression a échoué : " . mysql_error()); }
}
?>
