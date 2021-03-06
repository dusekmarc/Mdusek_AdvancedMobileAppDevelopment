<html>
		<head>
	<title>Find your project items</title>
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
		<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b" style="background-color:rgb(133,87,85)">
<h1>
	Questions about the materials?  Ask the experts!
		</h1>	</div>
				<div data-role="content">


					<?php
					include 'config.php';
					include 'opendb.php';

					$project_name = (isset($_POST['project_name'])    ? $_POST['project_name']   : '');

					$sql= "SELECT project_list.project_name, project_list.item, item_contact.contact_name, item_contact.phone_fax, item_contact.email
					FROM project_list
					JOIN item_contact on project_list.item = item_contact.item
					WHERE project_name LIKE '$project_name'";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
					        echo "Project Name: " . $row["project_name"]. "<br>";
					        echo "Item: " . $row["item"]. "<br>";
							echo "Contact Name: " . $row["contact_name"]. "<br>";
							echo "Email: " . $row["email"]. "<br>";
							echo "Phone/Fax:" . $row["phone_fax"]. "<br><hr>";
					    }
					} else {
					    echo "Oops....Please try search for another project.";
					}

					mysqli_close($conn);

					?>
					<a href="#pageone" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-left" data-transition="flip" style="background-color:rgb(192,192,192)" >Back to Home Page</a>
				<div data-role="footer" data-theme="b" style="background-color:rgb(133,87,85)">
	  <h4>Marc Dusek 2017</h4>
	</div>
	</body>
</html>
