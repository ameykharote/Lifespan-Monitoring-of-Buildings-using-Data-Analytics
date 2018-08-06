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
  <style>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
	   
	    body {
      font: 400 15px/1.8 Lato, sans-serif;
       background-color:black;
	  
     
  }
  h1,h2, h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 2px;      
      font-size: 20px;
      color: white;

  }
  .container {
      padding: 80px 120px;
	  
	  
  }
      #map {
        height: 90%;
      width:95%;border:5px solid #2d2d30;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 90%;
        margin: 0;
       padding:0.25cm 2cm;
	    background-color:black;
      }
	


table {
	border: 3px solid black;
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 15px;
	border: 4px solid #2d2d30;
}


tr:nth-child(even){background-color: #f2f2f2}

th {
	border: 4px solid #2d2d30;
    background-color: #4CAF50;
    color: white;
}
.nav-tabs li a {
      color: #777;
  }
  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
</style>
</head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Prevention is better than cure</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/programs/Proj%20Code/part1/ninosh.php#home">HOME</a></li>
        <li><a href="http://localhost/programs/Proj%20Code/part1/ninosh.php#idea">THE IDEA</a></li>
        <li><a href="http://localhost/programs/Proj%20Code/part1/ninosh.php#awareness">AWARENESS</a></li>
        <li><a href="http://localhost/programs/Proj%20Code/part1/ninosh.php#check">CHECK HEALTH</a></li>
        </ul>
    </div>
  </div>
</nav><br><br><br><h2 style="text-align :center;" >Click On The Marker To Know The Predicted Lifespan Of Your Building</h2>
    <div id ="map" class="container">
<script>
	
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(19.146948, 72.930470),
          zoom: 10,
          //mapTypeId: 'satellite',
          mapTypeId: google.maps.MapTypeId.HYBRID

        });

        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl("http://localhost/programs/Proj%20Code/part1/godjesus.php", function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var prediction = markerElem.getAttribute('prediction');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = prediction
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
		  
		map.addListener('center_changed', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 5000);
        });

        marker.addListener('click', function() {
          map.setZoom(18);
          map.setCenter(marker.getPosition());
        });

		  
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA420tY8tQZQHYmnZXUMRr50RxkZvM5lkM&callback=initMap">
    </script>
</div>
<div class ="container-fluid">
<div class="col-sm-6">
<h3 style ="text-align: justify;"><br><?php echo "Health Report Of : ".$_SESSION['build'];?> </h3> </div>



<?php
$nob = $_SESSION['build'];
$rownob = "SELECT * FROM `table 3` WHERE `buildingname` = '$nob'";
$result1 = mysql_query($rownob);
$numrows=mysql_num_rows($result1);




if($numrows>0)
{
 
 echo "<table width='100%'' border=1>

            <tr>
			<th>Date Of Construction</th>
			<th>Age of Building</th>
            <th>Cracks In Column</th>
            <th>Cracks In Beam</th>
            <th>Cracks In Wall</th>
			<th>Cracks In Slab</th>
            <th>Exposed Steel In Column</th>
			<th>Exposed Steel In Beam </th>
			<th>Dampness Seen</th>
			<th>Leakage In Plumbing Lines</th>
			<th>Last Time Maintenance Done</th>
			<th>Total No of Maintenance Done</th>
			</tr>";
		
      while($data = mysql_fetch_assoc($result1)) 
      {
		   
		   echo "<tr>";
		   echo "<td  align =center>".$data["DOC"]."</td>";
		   echo "<td  align =center>".$data["Age"]."</td>";
		   
           if (($data['Ccolumn'])<=2)
		   {
            echo "<td  align =center>Negligible </td>";
		   }
			else if (($data['Ccolumn'])>2 &&(($data['Ccolumn'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
		   else if ((($data['Ccolumn'])>4 && (($data['Ccolumn'])<=7)))  
		   {

			 echo"<td  align =center>Major</td>";
		   }
            else if ((($data['Ccolumn'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }





           if (($data['Cbeam'])<=2)
		   {
            echo "<td  align =center> Negligible</td>";
		   }
			else if (($data['Cbeam'])>2 &&(($data['Cbeam'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
            else if ((($data['Cbeam'])>4 && (($data['Cbeam'])<=7))) 
		   {
			 echo"<td  align =center>Major</td>";
		   }
            else if ((($data['Cbeam'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }
		   
			
		  if (($data['Cwall'])<=2)
		   {
            echo "<td  align =center> Negligible</td>";
		   }
			else if (($data['Cwall'])>2 &&(($data['Cwall'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
           else if ((($data['Cwall'])>4 && (($data['Cwall'])<=7))) 
		   {
			 echo"<td  align =center>Major</td>";
		   }
           else if ((($data['Cwall'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }
		   
			
          
            if (($data['CSlab'])<=2)
		   {
            echo "<td  align =center>Negligible</td>";
		   }
			else if (($data['CSlab'])>2 &&(($data['CSlab'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
           else if ((($data['CSlab'])>4 && (($data['CSlab'])<=7))) 
		   {
			 echo"<td  align =center>Major</td>";
		   }
            else if ((($data['CSlab'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }
		   
		   
		   
            if (($data['EScolumn'])<=2)
		   {
            echo "<td  align =center> Negligible</td>";
		   }
			else if (($data['EScolumn'])>2 &&(($data['EScolumn'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
           else if ((($data['EScolumn'])>4 && (($data['EScolumn'])<=7))) 
		   {
			 echo"<td  align =center>Major</td>";
		   }
           else if ((($data['EScolumn'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }
		   
		   
		   
            if (($data['ESbeam'])<=2)
		   {
            echo "<td  align =center> Negligible</td>";
		   }
			else if (($data['ESbeam'])>2 &&(($data['ESbeam'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
           else if ((($data['ESbeam'])>4 && (($data['ESbeam'])<=7))) 
		   {
			 echo"<td  align =center>Major</td>";
		   }
           else if ((($data['ESbeam'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }
		   
		   
		   if (($data['Dampness'])<=2)
		   {
            echo "<td  align =center> Negligible</td>";
		   }
			else if (($data['Dampness'])>2 &&(($data['Dampness'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
           else if ((($data['Dampness'])>4 && (($data['Dampness'])<=7))) 
		   {
			 echo"<td  align =center>Major</td>";
		   }
            else if ((($data['Dampness'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }
		   
		   
		   if (($data['Leakage'])<=2)
		   {
            echo "<td  align =center> Negligible</td>";
		   }
			else if (($data['Leakage'])>2 &&(($data['Leakage'])<=4.0))
		   { 
			 echo "<td  align =center> Minor</td>";
		   }
           else if ((($data['Leakage'])>4 && (($data['Leakage'])<=7))) 
		   {
			 echo"<td  align =center>Major</td>";
		   }
           else if ((($data['Leakage'])>7))
		   {
			 echo "<td  align =center>Critical</td>" ;
		   }
		  echo "<td  align =center>".$data["Lastmaintenance"]."</td>";
		  echo "<td  align =center>".$data["TNOmaintenance"]."</td>";
          echo "</tr>";
		   echo "</table>"; }}
            
			else {
            echo "0 results";
            }

	echo "</br>";
	echo "</br>";
echo '<h3 >Lifespan Progress Report</h3>';
echo '<div class="col-sm-8">';
$rownob2 = "SELECT * FROM `markers` WHERE `bname` = '$nob'";
$result2 = mysql_query($rownob2);
$numrows1=mysql_num_rows($result2);
if($numrows1>0)
{
 while($data1 = mysql_fetch_assoc($result2)) {
	 if ($data1["prediction"]>0 && $data1["prediction"]<11)
      {
 echo '<div class="progress">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="'.$data1["prediction"].'"
  aria-valuemin="0" aria-valuemax="100" style="width:'.$data1["prediction"].'%">'.$data1["prediction"].' Years Left </div>
</div>';
  echo '<div class="alert alert-danger">
  <strong>Critical Condition of Building. Urgent need of repair.PLease Contact An Structural Audit Officer For Further Details</strong> 
</div>';
 } 

	  else if ($data1["prediction"]>=11 && $data1["prediction"]<20) {
 echo '<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="'.$data1["prediction"].'"
  aria-valuemin="0" aria-valuemax="100" style="width:'.$data1["prediction"].'%">'.$data1["prediction"].' Years Left </div>
</div>';
  echo '<div class="alert alert-warning">
  <strong>Poor Condition Of building.Needs Repair After 6-7 Years to Maintain health.</strong>.
</div>';
 } 
	  else if ($data1["prediction"]>=20) {
  echo '<div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'.$data1["prediction"].'"
  aria-valuemin="0" aria-valuemax="100" style="width:'.$data1["prediction"].'%">'.$data1["prediction"].'  Years Left </div>
</div>';
  echo '<div class="alert alert-info">
  <strong>Good condition of Building. Needs repair after 10-15 Years for better lifespan and maintenance of good health.</strong> 
</div>';
 } 
		  
	  }} echo '</div>';
?>
<br><br><br><br><br><br><br><br><br>
</div>
</div>
</div>


		

	
</body>
</html>