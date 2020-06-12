<!DOCTYPE html>

<html>

<head>
 <title>Donors</title>
 <link rel="stylesheet" href="styleSheet.css">
</head>

<body>
    <?php include('header.html'); ?>
	<h1>📋 List of Blood Donors:</h1>
	<?php
                if (isset($_GET['deleteId'])){
                    $queryDelete = "Delete FROM donors WHERE DonorId={$_GET['deleteId']}";
                
                    if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                      die( "Could not connect to database </body></html>" );

                    if ( !mysqli_select_db( $database, "hospital" ) )
                         die( "Could not open products database </body></html>" );

                    if ( !( $result = mysqli_query( $database, $queryDelete ) ) )  {
                          print( "<p>Could not execute query!</p>" );
                          die( mysqli_error() . "</body></html>" );
                    }

                    mysqli_close( $database );
					
					echo '<script>alert("Donor deleted successfully !")</script>';
                    
                }
        
        
		$querySelect = "SELECT Fname, Lname, DonorId FROM donors";
                
                if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                  die( "Could not connect to database </body></html>" );

                if ( !mysqli_select_db( $database, "hospital" ) )
                     die( "Could not open products database </body></html>" );

                if ( !( $result = mysqli_query( $database, $querySelect ) ) )  {
                      print( "<p>Could not execute query!</p>" );
                      die( mysqli_error() . "</body></html>" );
                }

                mysqli_close( $database );
				
                echo"<table class='list'>";
                while ( $row = mysqli_fetch_row( $result ) ) {
                    echo "<tr><td>🙍‍♂️ </td><td><a href='donorDetails.php?id={$row[2]}' class='name'>{$row[0]} {$row[1]}</a> </td> ";
                    echo "<td><a href='donors.php?deleteId={$row[2]}' class='delete'>Delete</a></td></tr>";
               }
			   echo"</table>";
	?>
	
</body>

</html>