<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><big>For the People, By the People.</big></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Let Live.</h1>
					</header>
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/pic01.png" alt="Pic 01" />
							</div>
							<header>
								<h3>Recent<br /> News!</h3>
							</header>
							<p>We need to be updated with the information <br />that happens outside our four walls too!</p>
							<footer>
								<a href="news.html" class="button">View More</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/pic02.jpg" alt="Pic 02" />
							</div>
							<header>
								<h3>Maintenance<br /> An Integral part.</h3>
							</header>
							<p>We are hardly aware and mostly least bothered <br />to check if our buildings our maintained up to date.
							<br /> Let's know the good side to it!</p>
							<footer>
								<a href="maintenance.html" class="button">View More</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<h3>KNOW YOUR BUILDINGS HEALTH</h3>

				<!--<form action="file:///C:/Users/PMK/Desktop/Building/Amey/part1/index2.html" method="post">

						<div class="field half first">
							<label for="List">Region</label>
							<select>
                                                  <option value=""></option>
                                                  <option value="Mumbai City">Mumbai City</option> 
                                                  <option value="Mumbai Suburban">Mumbai Suburban</option>
                                                  <option value="Thane City">Thane City</option>
                                                  <option value="Thane District">Thane District</option>
                                                 </select> 
                        </div>
						<div class="field half">
							<label for="List">Area</label>
							<select>
                                                  <option value=""></option>
                                                  <option value="Worli">Worli</option>
                                                  <option value="Parel">Parel</option>
                                                  <option value="Colaba">Colaba</option>
                                                 </select> 
                        </div>
                        <div class="field half first">
							<label for="List">Locality</label>
							<select>
                                                  <option value=""></option>
                                                  <option value="Adarsh Nagar">Adarsh Nagar</option>
                                                  <option value="MIG Colony">MIG Colony</option>
                                                  <option value="LIG Colony">LIG Colony</option>
                                                 </select> 
                        </div>
                        <div class="field half">
							<label for="List">Buildings</label>
							<select>
                                                  <option value=""></option>
                                                  <option value="Building Number 1">Building No 41</option>
                                                   <option value="Building Number 2">Building No 42</option>
                                                  <option value="Building Number 3">Building No 43</option>
                                                 </select> 
                        </div>
						<ul class="actions">
							<li><input value="Check" class="button alt" type="submit"></li>
						</ul>-->

					<!--<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
						</div>-->	
<form method="POST" action="index1.php" onsubmit="ninomap.php"> 
 AREA:<br>
  <input type="text" name="lastname" >
  <br>
 BUILDING NAME:<br>
  <input type="text" name="firstname">
  <br><br>
  <ul class="actions">
<li><input value="Check" class="button alt" type="submit"></a></li>
</ul>
</form>


			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>