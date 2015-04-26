<?php
$db = mysql_connect('localhost', 'root', '');
if(! $db ){
die ('meh -> ' . mysql_error());
}
mysql_select_db('vulnscript');
?>
