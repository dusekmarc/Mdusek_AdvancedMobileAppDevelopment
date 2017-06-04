<html>
		<head>
	<title>Here's your items needed:</title>
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

<h1>Items needed below:</h1>
</div>
				<div data-role="content">


					<?php
					include 'config.php';
					include 'opendb.php';

					$sql= "SELECT project_name, item, quantity
					FROM project_list";
					$result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
					    echo "Item: " . $row["item"]. "<br>";
							echo "Quantity:" . $row["quantity"]. "<br>";
							echo "Project Name: " . $row["project_name"]. "<br><hr>";
					    }
					} else {
					    echo "Oops....Please try search for another project";
					}

					mysqli_close($conn);

					?>
          <a href="#pageone" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-left" data-transition="flip" style="background-color:rgb(192,192,192)" >Back to Home Page</a>
				<div data-role="footer" data-theme="b" style="background-color:rgb(133,87,85)">
	  <h4>Marc Dusek 2017</h4>
	</div>
	</div>
	</div>
	</body>
</html>
