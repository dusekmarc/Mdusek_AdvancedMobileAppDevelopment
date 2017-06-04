<html>
		<head>
	<title>Find a Contact</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
</head>
	<body>
		<div id="page" data-role="page" data-theme="b" style="background-color:rgb(223,238,218)">
	<div data-role="header" data-theme="b" style="background-color:rgb(153,184,147)">
<h1>
	Find your contact
		</h1>	</div>
				<div data-role="content">


					<?php
					include 'config.php';
					include 'opendb.php';

					$company = (isset($_POST['company'])    ? $_POST['company']   : '');

					$sql= "SELECT location.company, location.city, location.address, contact.contact, contact.position, location.phone_fax, contact.email,
						FROM location
						JOIN contact on location.company = contact.company
						WHERE company LIKE '$company' LIMIT 100";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
									echo "Company: " . $row["location.company"]. "<br>";
					        		echo "City: " . $row["location.city"]. "<br>";
					        		echo "Address: " . $row["location.address"]. "<br>";
									echo "Contact: " . $row["contact.contact"]. "<br>";
									echo "Position: " . $row["contact.position"]. "<br>";
									echo "Phone / Fax #:" . $row["location.phone_fax"]. "<br>";
									echo "Email:" . $row["conact.email"]. "<br>";
					    }
					} else {
					    echo "Sorry something went wrong.....Search another business";
					}

					mysqli_close($conn);

					?>
					<br>
        <a href="#pageone" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-left" data-transition="flip" style="background-color:rgb(192,192,192)" >Back to Home Page</a>
				<div data-role="footer" data-theme="b" style="background-color:rgb(153,184,147)">
	  <h4>Marc Dusek 2017</h4>
	</div>
	</body>
</html>