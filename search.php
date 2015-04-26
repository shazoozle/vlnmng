<form method = "GET">
<table>
<tr>
	<td><input type="text" value= "<?php if (isset($_GET['q'])){echo $_GET['q'] ;}?>" name="q"></input></td>
	<td><button type = "submit">Suchen</button></td>
</tr>
</table>
</form>

<?php
include("conn.php");
if(isset($_GET['q'])){
	
$q=$_GET['q'];
$sql = mysql_query("SELECT * FROM `vulns` WHERE `site` LIKE '%$q%' ORDER BY `site` DESC");
$results = mysql_num_rows($sql);
	
switch($results) {
	case 0:
	echo "Keine Lücken zum Suchbegriff <b><i>$q</b></i> in unserer Datenbank gefunden <br>";
	break;
	case 1:
	echo "Eine Lücke gefunden: <br>";
	break;
	default:
	echo $results . " Lücken gefunden: <br>";
}
while($row = mysql_fetch_object($sql)) { 
echo $row->vuln . "<br />";
}}
echo mysql_error();
?>
