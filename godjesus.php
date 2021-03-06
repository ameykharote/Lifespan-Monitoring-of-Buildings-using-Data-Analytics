<?php
session_start();
$database ='project';
$username = 'root'; 
$password = '';
$builds = $_SESSION['build'];

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM `markers` WHERE bname='$builds' ";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row['area']) . '" ';
  echo 'address="' . parseToXML($row['bname']) . '" ';
  echo 'prediction="' . parseToXML($row['prediction']) . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
 
  echo '/>';
}

// End XML file
echo '</markers>';

?>
