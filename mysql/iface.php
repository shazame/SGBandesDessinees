<?php
echo "Hello\n";

$con = mysql_connect();

if (!$con) {
	echo "ARGH!\n";
}
else {
	echo "SUPER!\n";
}
?>
