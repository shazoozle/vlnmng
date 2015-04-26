<body style="background:#000000;" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<?php
include ("conn.php");

$concat = mysql_query("SELECT site,GROUP_CONCAT(vuln) FROM vulns GROUP BY site;");

echo "<table border =\"0.1\">\n
<tr>\n
	<th><font color=\"#04B404\">Site</font></th>\n
	<th><font color=\"#04B404\">vulns</font></th>\n
</tr>\n";
while($row=mysql_fetch_array($concat)){
	echo "<tr><td><font color=\"#04B404\">" . $row['site'] . "</font></td>";
	echo "<td><font color=\"#04B404\">" . str_replace(",","<br>",$row['GROUP_CONCAT(vuln)']) . "</font></td></tr>";
}
echo "</table>";
