<!DOCTYPE html>

<html>

<head>
 <title>Author Details</title>
 <link rel="stylesheet" href="styleSheet.css">
</head>

<body>
    <?php include('header.html'); ?>
	<h1>Author Details</h1>
	<?php
		$querySelect = "SELECT DonorId, Fname, Lname, PhoneNumber, Address, Gender, BloodType FROM donors WHERE DonorId={$_GET['id']}";
                
                if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                  die( "Could not connect to database </body></html>" );

                if ( !mysqli_select_db( $database, "hospital" ) )
                     die( "Could not open products database </body></html>" );

                if ( !( $result = mysqli_query( $database, $querySelect ) ) )  {
                      print( "<p>Could not execute query!</p>" );
                      die( mysqli_error() . "</body></html>" );
                }

                mysqli_close( $database );
				echo"<table class='details'>";
                while ( $row = mysqli_fetch_row( $result ) ) {
                    echo "<tr><td>ID: </td><td>{$row[0]}</td></tr>
					<tr><td>First Name: </td><td>{$row[1]}</td></tr>
					<tr><td>Last Name: </td><td>{$row[2]}</td></tr>
					<tr><td>Phone Number: </td><td>{$row[3]}</td></tr>
					<tr><td>Address: </td><td>{$row[4]}</td></tr>
					<tr><td>Gender: </td><td>{$row[5]}</td></tr>
					<tr><td>Blood Type: </td><td>{$row[6]}</td></tr>";
               }
			   echo"</table>";


	?>
	
	<img src="images/blood4.png" class="lower_left">
	
</body>

</html>