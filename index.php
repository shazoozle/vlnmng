<table>
	<tr>
		<td><font color="#04B404">Website</font></td>
		<td><input type = "text" name = "website"></input></td>
	</tr>
	<tr>
		<td><font color ="#04B404">Lücke</font></td>
		<td><input type = "text" name = "vuln"></input></td>
	</tr>
	<tr>
	<td><input type = "radio" name = "vulnkind" value= "xss"><font color="#04B404">XSS</font></td>
	<td><input type = "radio" name = "vulnkind" value= "sqli"><font color="#04B404">SQLi</font>
	<input type = "radio" name = "vulnkind" value= "lfi"><font color="#04B404">lfi</font>
	<input type = "radio" name = "vulnkind" value= "rfi"><font color="#04B404">rfi</font>
	<input type = "radio" name = "vulnkind" value= "other"><font color="#04B404">other</font></td>
	</tr>
	<td/>
	<td><div align = "right"><button type = "submit">Eintragen</button></div></td>
	
</table>
</form>
<?php
error_reporting(E_ALL);
include ('conn.php');
$website = $_POST['website'];
$vuln = $_POST['vuln'];

//Eintragen
if ($_POST['website'] && $_POST['vuln']){
$sql = 'INSERT INTO vulns '.
'(site, vuln, kind) '.
'VALUES ("' . $_POST['website'] . '", "<a href=\"' . $_POST['vuln'] . '\">' . $_POST['vuln'] . '<a>", "' . $_POST['vulnkind'] . '")';

$retval = mysql_query( $sql, $db );
if(! $retval )
{
  die('Eintragen nicht erfolgreich: ' . mysql_error());
}
echo " Passt!<br>";
}

elseif (isset($_POST['website']) && isset($_POST['vuln'])) {
	echo "Bitte alles ausfüllen<br>";
}

echo "<a href =\"ausgabe.php\">Schwachstellen</a><br>";
echo "<a href =\"search.php\">Suche</a><br>";

//Überpfrüfung ob schon Einträge vorhanden sind
if(isset ($_POST['website']) && isset($_POST['vuln']) && $_POST['website'] != "" && $_POST['vuln'] != ""){
$exischeck = "SELECT * FROM `vulns` WHERE `site` LIKE '%$website%'";
echo "Es sind bereits " . mysql_num_rows(mysql_query($exischeck)) . " Einträge vorhanden.";
}
?>
</body>
