<?php
session_start();
$database ='project';
$username = 'root'; 
$password = '';
$_SESSION['build'] = $_POST['firstname'];

$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<body>
<!-- Web Forms Example using Bootstrap -->
<div class="progress">
   <!-- Define a Panel that you can use to set these values -->
   <asp:Panel ID="YourPercentagePanel" runat="server" CssClass="progress-bar"></asp:Panel>
</div>

And then in your code behind, simply set the values and properties that Bootstrap needs :

// Define your example percentage (from a database or wherever)
int YourPercentage = 60;

// Set your minimum/maximum percentages
YourPercentagePanel.Attributes["aria-valuemin"] = "0";
YourPercentagePanel.Attributes["aria-valuemax"] = "100";
// Set the current percentage
YourPercentagePanel.Attributes["aria-valuenow"] = YourPercentage.ToString(); // Should be between 0-100
// Set the actual styled width
YourPercentagePanel.Style["width"] = String.Format("{0}%;",YourPercentage);
// Display your Label on the Progress bar (as a percentage)
YourPercentagePanel.Controls.Add(new LiteralControl(String.Format("{0}%;",YourPercentage)));
</body>
</html> 